<?php

namespace App\Http\Controllers;

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

    public function generate(Request $request){

        $user = Auth::user();
        $dateClient = DateClient::find($request->client);
        $dateProdus = DateProdus::find($request->produs);

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

        $item = (new InvoiceItem())->title($dateProdus->nume)->pricePerUnit($dateProdus->pret)->quantity((float)$dateProdus->um);

        $invoice = Invoice::make()
            ->seller($client)
            ->buyer($customer)
            ->taxRate($dateProdus->cota_tva)
            ->addItem($item);

        return $invoice->render()->toHtml();
    }
}
