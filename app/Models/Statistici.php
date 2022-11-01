<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Statistici extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'suma_facturata',
        'suma_incasata',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function storeStatistici($id)
    {
        Statistici::create([
            'user_id' => $id,
            'suma_facturata' => 0,
            'suma_incasata' => 0,
        ]);
    }

    public function updateSumaFacturata($suma_facturata, $id, $ok){

        $statistici = Statistici::where('user_id', $id)->get()->first();
        
        if($ok === true){
            $statistici->increment('suma_facturata', $suma_facturata);
        }else{
            $statistici->decrement('suma_facturata', $suma_facturata);
        }

        $statistici->save();
    }

}
