<?php

namespace App\Http\Controllers;

use App\Models\DateProdus;
use App\Models\Statistici;
use App\Models\DateFactura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $facturi = DateFactura::where('user_id', $user->id)->orderBy('created_at', 'desc')->take(5)->get();
        $produse = DateProdus::where('user_id', $user->id)->orderBy('created_at', 'desc')->take(5)->get();
        $statistici = Statistici::where('user_id', $user->id)->get()->first();

        return view('pages.dashboard', compact('user', 'facturi', 'produse', 'statistici'));
    }
}
