<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DateFirma extends Model
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

    public function deleteDateFirma($id){
        return DateFirma::find($id)->delete();
    }

    public function storeDateFirma($data){

        DateFirma::create([
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
}
