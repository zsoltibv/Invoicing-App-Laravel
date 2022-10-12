<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\ContBancar;
use App\Models\DateClient;
use App\Models\DateProdus;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use Illuminate\Support\Facades\Auth;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class FacturaController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('pages.factura', compact('user'));
    }

    public function show($preview)
    {
        $user = Auth::user();

        return view('pages.factura-show', compact('user', 'preview'));
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

        $invoice = Invoice::make()
            ->seller($client)
            ->buyer($customer)
            ->addItems($items)
            ->date(Carbon::parse($dataEmiterii))
            ->dueDate(Carbon::parse($dataScadentei));

        return $invoice->stream();

        //return $invoice->render()->toHtml();

        // return redirect()->route('factura.show', $user->id);
    }
}
