<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Andali\Anaf\Anaf;

class DateFirmaController extends Controller
{
    public function index()
    {
        return view('pages.date-firma');
    }

    public function getCompanyDetails()
    {
        $companyInfo = Anaf::for(45185880)->info();
        /* AND YOU CAN ACCESS */
        $companyInfo->denumire;
        $companyInfo->adresa->judet;
        $companyInfo->adresa->localitate;
        $companyInfo->adresa->strada;
        $companyInfo->adresa->stradaNumar;
        $companyInfo->nrRegCom;
        $companyInfo->scpTVA;
        dd($companyInfo);
    }
}
