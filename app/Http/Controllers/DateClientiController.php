<?php

namespace App\Http\Controllers;

use Andali\Anaf\Anaf;
use App\Models\DateClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DateClientiController extends Controller
{
    public function index(){
        $user = Auth::user();

        return view('pages.date-clienti', compact('user'));
    }

    public function edit($id){
        $user = Auth::user();

        $client_id = (new DateClient)->findDateClientById($id);

        return view('pages.date-clienti-edit', compact('user', 'client_id'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $data = $this->validateUpdate($request);

        $dateFirma = (new DateClient)->updateDateClient($data, $id);

        return redirect()->route('account.date-clienti', compact('user'))->with('message', 'Client updated successfully');
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

    public function destroy($id)
    {
        (new DateClient)->deleteDateClient($id);

        return redirect()->route('account.date-clienti')->with('message', 'Client deleted successfully');
    }

    public function getCompanyDetails(Request $request)
    {
        $data = Anaf::for($request->cod_fiscal)->info()->toArray();

        $data['user_id'] = Auth::user()->id;

        if ((new DateClient)->validateForm($data)) {

            (new DateClient)->storeDateClient($data);

            return redirect()->route('account.date-clienti')->with('message', 'Client added successfully');
        } else {
            return redirect()->route('account.date-clienti')->with('message', 'Acest cui nu a putut fi gasit');
        }
    }
}
