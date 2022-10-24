<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\ContBancar;
use App\Models\DateClient;
use App\Models\DateProdus;
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

    public function show($id)
    {
        $user = Auth::user();

        return view('pages.factura-show', compact('user'));
    }

    public function preview(Request $request)
    {
        $user = Auth::user();
        $preview = Session::get('preview');
        Session::forget('preview');

        return view('pages.factura-preview', compact('user', 'preview'));
    }

    public function download(Request $request){
        $file = basename(Crypt::decrypt($request->url));  
        return Storage::download($file);
    }

    public function store(Request $request){
        dd($request);
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

        for($i = 0; $i < $len; $i++){
            $dateProdus = DateProdus::find($request->orderProducts[$i]['product_id']);
            $quantity = $request->orderProducts[$i]['quantity'];
            if(!$dateProdus->tva)
                $items[$i] = (new InvoiceItem())->title($dateProdus->nume)->pricePerUnit($dateProdus->pret)->units($dateProdus->um)->quantity((float)$quantity)->taxByPercent($dateProdus->cota_tva);
            else
                $items[$i] = (new InvoiceItem())->title($dateProdus->nume)->pricePerUnit($dateProdus->pret)->units($dateProdus->um)->quantity((float)$quantity);
        }

        // dd($request);
        $clientNameFormated = preg_replace('/\s+/', '_', $client->name);
        $customerNameFormated = preg_replace('/\s+/', '_', $customer->name); 

        $invoice = Invoice::make()
            ->seller($client)
            ->buyer($customer)
            ->addItems($items)
            ->date(Carbon::createFromFormat('d/m/Y', $dataEmiterii))
            ->dueDate(Carbon::createFromFormat('d/m/Y', $dataScadentei))
            ->filename($clientNameFormated . '-' . $customerNameFormated)
            ->save('public');

        // dd($client->name.' '.$customer->name);

        // return $invoice->render()->toHtml();
        // return redirect()->route('factura.show', $user->id);
        // return redirect()->route('factura.show', $user->id, $preview); -> jobb lenne

        $preview = Str::of($invoice->render()->toHtml())->toHtmlString();
        
        $request->session()->put('preview', $preview);
        
        // return redirect()->route('factura.show', $user->id);

        return view('pages.factura-show', compact('user', 'preview', 'invoice', 'dataEmiterii', 'dataScadentei', 'dateClient'));
    }
}
