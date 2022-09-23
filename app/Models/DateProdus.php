<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DateProdus extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nume',
        'um',
        'pret',
        'moneda',
        'cota_tva',
        'tva',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function storeDateProdus($data){

        DateProdus::create([
            'user_id' => $data['user_id'],
            'nume' => $data['nume'],
            'um' => $data['um'],
            'pret' => $data['pret'],
            'moneda' => $data['moneda'],
            'cota_tva' => $data['cota_tva'],
            'tva' => $data['tva'],
        ]);
    }

    public function deleteDateProdus($id){
        return DateProdus::find($id)->delete();
    }
}
