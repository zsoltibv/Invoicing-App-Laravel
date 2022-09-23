<?php

namespace App\Http\Controllers;

use App\Models\DateProdus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DateProduseController extends Controller
{
    public function index(){
        $user = Auth::user();

        return view('pages.date-produse', compact('user'));
    }

    public function store(Request $request){
        $data = $this->validateForm($request);

        $data['user_id'] = Auth::user()->id;

        (new DateProdus)->storeDateProdus($data);

        return redirect()->route('account.date-produse')->with('message', 'Product added successfully');
    }

    public function destroy($id)
    {
        (new DateProdus)->deleteDateProdus($id);

        return redirect()->route('account.date-produse')->with('message', 'Product deleted successfully');
    }

    public function validateForm($request)
    {
        return $this->validate($request, [
            'nume' => 'required|string',
            'um' => 'required|integer',
            'pret' => 'required|integer',
            'moneda' => 'required|string',
            'cota_tva' => 'required|integer',
            'tva' => 'required',
        ]);
    }
}
