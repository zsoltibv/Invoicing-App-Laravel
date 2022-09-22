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
