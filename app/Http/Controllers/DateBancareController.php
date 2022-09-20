<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ContBancar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DateBancareController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $cont_bancar = $user->contBancar;

        return view('pages.date-bancare', compact('user', 'cont_bancar'));
    }

    public function store(Request $request, $id){
        $data = $this->validateForm($request);

        $data['user_id'] = Auth::user()->id;

        (new ContBancar)->storeContBancar($data);

        return redirect()->route('account.date-bancare')->with('message', 'Account added successfully');
    }

    public function validateForm($request)
    {
        return $this->validate($request, [
            'iban' => 'required|string',
            'banca' => 'required|string',
            'moneda' => 'required|string',
        ]);
    }
}
