<?php

namespace App\Http\Controllers;

use Andali\Anaf\Anaf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DateFirmaController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('pages.date-firma', compact('user'));
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
