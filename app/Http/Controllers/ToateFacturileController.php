<?php

namespace App\Http\Controllers;

use App\Models\DateClient;
use App\Models\DateFactura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToateFacturileController extends Controller
{
    public function index(){
        $user = Auth::user();
        $factura_db = DateFactura::all();

        // dd($factura);

        return view('pages.factura-all', compact('user', 'factura_db'));
    }
}
