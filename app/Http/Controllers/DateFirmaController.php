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

    public function edit($id){
        $user = Auth::user();

        return view('pages.date-firma-edit', compact('user'));
    }

    public function getCompanyDetails(Request $request)
    {
        $data = Anaf::for($request->cod_fiscal)->info()->toArray();

        $data['user_id'] = Auth::user()->id;

        if ($this->validateForm($data)) {

            (new DateFirma)->storeDateFirma($data);

            return redirect()->route('account.date-firma')->with('message', 'Firm added successfully');
        } else {
            return redirect()->route('account.date-firma')->with('message', 'Acest cui nu a putut fi gasit');
        }
    }

    public function destroy($id)
    {
        (new DateFirma)->deleteDateFirma($id);

        return redirect()->route('account.date-firma')->with('message', 'Firm deleted successfully');
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $data = $this->validateUpdate($request);

        $dateFirma = (new DateFirma)->updateDateFirma($data, $id);

        return redirect()->route('account.date-firma', compact('user'))->with('message', 'Info updated successfully');
    }

    public function validateUpdate($request)
    {
        return $this->validate($request, [
            'nume_firma' => 'required|string',
            'adresa' => 'required|string',
            'cod_fiscal' => 'required|integer',
            'reg_comertului' => 'required|string',
            'judet' => 'required|string',
            'localitate' => 'required|string',
        ]);
    }

    public function validateForm($data)
    {
        return Validator::make($data, [
            'cui' => ['required', new ValidVatNumber],
        ]);
    }
}
