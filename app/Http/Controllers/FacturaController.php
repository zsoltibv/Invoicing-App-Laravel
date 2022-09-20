<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacturaController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('pages.factura', compact('user'));
    }
}
