<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function updateDateFirma($data, $id){
        $user = Auth::user();
        $dateFirma = DateFirma::find($id);

        $dateFirma->denumire = $data['nume_firma'];
        $dateFirma->adresa = $data['adresa'];
        $dateFirma->cui = $data['cod_fiscal'];
        $dateFirma->reg_com = $data['reg_comertului'];
        $dateFirma->judet = $data['judet'];
        $dateFirma->localitate = $data['localitate'];

        $dateFirma->save();
        return $user;
    }
}
