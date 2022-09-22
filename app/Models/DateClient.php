<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Andali\Anaf\Rules\ValidVatNumber;

class DateClient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cui',
        'denumire',
        'judet',
        'localitate',
        'adresa',
        'reg_com',
        'tva'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function findDateClientById($id){
        return DateClient::find($id);
    }

    public function storeDateClient($data){

        DateClient::create([
            'user_id' => $data['user_id'],
            'cui' => $data['cui'],
            'denumire' => $data['denumire'],
            'judet' => $data['adresa']['judet'],
            'localitate' => $data['adresa']['localitate'],
            'adresa' => $data['adresa']['strada'].' '.$data['adresa']['stradaNumar'].', '.$data['adresa']['altele'],
            'reg_com' => $data['nrRegCom'],
            'tva' => $data['scpTVA'],
        ]);
    }

    public function deleteDateClient($id){
        return DateClient::find($id)->delete();
    }

    public function validateForm($data)
    {
        return Validator::make($data, [
            'cui' => ['required', new ValidVatNumber],
        ]);
    }
}
