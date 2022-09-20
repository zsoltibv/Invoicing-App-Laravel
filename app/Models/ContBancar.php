<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContBancar extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'iban',
        'banca',
        'moneda',
        'folosit'
    ];

    public function user(){
        return $this->belongTo(User::class);
    }

    public function getContBancarById($id)
    {
        return ContBancar::find($id);
    }

    public function deleteContBancar($id){
        return ContBancar::find($id)->delete();
    }

    public function storeContBancar($data){
        ContBancar::create([
            'user_id' => $data['user_id'],
            'iban' => $data['iban'],
            'banca' => $data['banca'],
            'moneda' => $data['moneda'],
        ]);
    }
}
