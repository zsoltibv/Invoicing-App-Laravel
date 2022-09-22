<?php

namespace App\Http\Controllers;

use Andali\Anaf\Anaf;
use App\Models\DateFirma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Andali\Anaf\Rules\ValidVatNumber;
use Illuminate\Support\Facades\Validator;

class DateFirmaController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('pages.date-firma', compact('user'));
    }

    public function getCompanyDetails(Request $request)
    {
        $data = Anaf::for($request->cod_fiscal)->info()->toArray();

        $data['user_id'] = Auth::user()->id;

        if ($this->validateForm($data)) {
            
            (new DateFirma)->storeDateFirma($data);

            return redirect()->route('account.date-firma')->with('message', 'Firm added successfully');
        } else {
            dd('fail');
        }
    }

    public function destroy($id){
        (new DateFirma)->deleteDateFirma($id);

        return redirect()->route('account.date-firma')->with('message', 'Firm deleted successfully');
    }

    public function validateForm($data)
    {
        return Validator::make($data, [
            'cui' => ['required', new ValidVatNumber],
        ]);
    }
}
