<?php

namespace App\Http\Controllers;

use App\Models\DateFactura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToateFacturileController extends Controller
{
    public function index(){
        $user = Auth::user();
        $factura = DateFactura::all();

        return view('pages.factura-all', compact('user', 'factura'));
    }
}
