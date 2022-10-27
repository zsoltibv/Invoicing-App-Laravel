<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\ContBancar;
use App\Models\DateClient;
use App\Models\DateProdus;
use App\Models\DateFactura;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class FacturaController extends Controller
{
    public $preview = [];
    public $invoice = [];

    public function index()
    {
        $user = Auth::user();

        return view('pages.factura', compact('user'));
    }

    public function show($url)
    {
        $user = Auth::user();
        $factura = DateFactura::where('url', $url)->get()->first();
        $dateClient = DateClient::find($factura->client_id);

        return view('pages.factura-show-final', compact('user', 'factura', 'dateClient'));
    }

    public function preview($url)
    {
        $factura = DateFactura::where('url', Crypt::decrypt($url))->get()->first();
        $user = Auth::user();
        if($factura == null){
            $preview = Crypt::decrypt(Session::get('preview'));
            return view('pages.factura-preview', compact('user', 'preview'));
        }else{
            $preview = Crypt::decrypt($factura->preview);
            return view('pages.factura-preview', compact('user', 'preview'));
        }
    }

    public function download($url)
    {
        $file = basename(Crypt::decrypt($url));
        return Storage::download($file);
    }

    public function destroy($id)
    {
        (new DateFactura)->deleteDateFactura($id);

        return redirect()->route('factura.all')->with('message', 'Factura deleted successfully');
    }

    public function store(Request $request)
    {
        $url = Session::get('url');
        $data['user_id'] = Auth::user()->id;
        $data['client_id'] = Session::get('client_id');
        $data['serie'] =  Session::get('serie');
        $data['pret'] =  Session::get('suma_totala');
        $data['url'] =  Session::get('url');
        $data['preview'] =  Session::get('preview');
        $data['data_emiterii'] =  Session::get('dataEmiterii');
        $data['data_scadentei'] =  Session::get('dataScadentei');

        (new DateFactura)->storeDateFactura($data);

        Session::forget('client_id');
        Session::forget('serie');
        Session::forget('suma_totala');
        Session::forget('url');
        Session::forget('dataEmiterii');
        Session::forget('dataScadentei');

        return redirect()->route('factura.show', $url)->with('message', 'Factura added successfully');
    }

    public function generate(Request $request)
    {
        $user = Auth::user();
        $dateClient = DateClient::find($request->client);
        $dataEmiterii = $request->dataEmiterii;
        $dataScadentei = $request->dataScadentei;

        $client = new Party([
            'name' => $user->dateFirma->denumire,
            'custom_fields' => [
                'CUI' => $user->dateFirma->cui,
                'Reg. Comertului' => $user->dateFirma->reg_com,
                'Judet' => $user->dateFirma->judet,
                'Localitate' => $user->dateFirma->localitate,
                'Adresa' => $user->dateFirma->adresa,
                'IBAN' => $user->contBancar->first()->iban,
                'Banca' => $user->contBancar->first()->banca,
            ],
        ]);

        $customer = new Party([
            'name' => $dateClient->denumire,
            'custom_fields' => [
                'CUI' => $dateClient->cui,
                'Reg. Comertului' => $dateClient->reg_com,
                'Judet' => $dateClient->judet,
                'Localitate' => $dateClient->localitate,
                'Adresa' => $dateClient->adresa,
            ],
        ]);

        $len = count($request->orderProducts);

        for ($i = 0; $i < $len; $i++) {
            $dateProdus = DateProdus::find($request->orderProducts[$i]['product_id']);
            $quantity = $request->orderProducts[$i]['quantity'];
            if (!$dateProdus->tva)
                $items[$i] = (new InvoiceItem())->title($dateProdus->nume)->pricePerUnit($dateProdus->pret)->units($dateProdus->um)->quantity((float)$quantity)->taxByPercent($dateProdus->cota_tva);
            else
                $items[$i] = (new InvoiceItem())->title($dateProdus->nume)->pricePerUnit($dateProdus->pret)->units($dateProdus->um)->quantity((float)$quantity);
        }

        // dd($request);
        $clientNameFormated = preg_replace('/\s+/', '_', $client->name);
        $customerNameFormated = preg_replace('/\s+/', '_', $customer->name);
        $num_padded = sprintf("%04d", DateFactura::all()->count() + 1);
        $serieFactura = Carbon::now()->year . '.' . $num_padded;
        $filename = 'Factura' . $serieFactura . '-' . $clientNameFormated . '-' . $customerNameFormated;

        $invoice = Invoice::make()
            ->seller($client)
            ->buyer($customer)
            ->addItems($items)
            ->date(Carbon::createFromFormat('d/m/Y', $dataEmiterii))
            ->dueDate(Carbon::createFromFormat('d/m/Y', $dataScadentei))
            ->filename($filename)
            ->serialNumberFormat($serieFactura)
            ->save('public');

        // dd($client->name.' '.$customer->name);

        $preview = Str::of($invoice->render()->toHtml())->toHtmlString();

        $request->session()->put('serie', $serieFactura);
        $request->session()->put('preview', Crypt::encrypt($preview));
        $request->session()->put('url', Crypt::encrypt($invoice->url()));
        $request->session()->put('client_id', $dateClient->id);
        $request->session()->put('dataEmiterii', $dataEmiterii);
        $request->session()->put('dataScadentei', $dataScadentei);
        $request->session()->put('suma_totala', $invoice->formatCurrency($invoice->total_amount));

        return view('pages.factura-show', compact('user', 'preview', 'invoice', 'dataEmiterii', 'dataScadentei', 'dateClient'));
    }
}
