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

        return view('pages.date-bancare', compact('user'));
    }

    public function store(Request $request, $id){
        $data = $this->validateForm($request);

        $data['user_id'] = Auth::user()->id;

        (new ContBancar)->storeContBancar($data);

        return redirect()->route('account.date-bancare')->with('message', 'Account added successfully');
    }

    public function destroy($id){
        (new ContBancar)->deleteContBancar($id);

        return redirect()->route('account.date-bancare')->with('message', 'Account deleted successfully');
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
