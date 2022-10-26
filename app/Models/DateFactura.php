<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DateFactura extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'client_id',
        'serie',
        'pret',
        'url',
        'preview',
        'data_emiterii',
        'data_scadentei',
        'achitata'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function storeDateFactura($data){
        DateFactura::create([
            'user_id' => $data['user_id'],
            'client_id' => $data['client_id'],
            'serie' => $data['serie'],
            'pret' => $data['pret'],
            'url' => $data['url'],
            'preview' => $data['preview'],
            'data_emiterii' => $data['data_emiterii'],
            'data_scadentei' => $data['data_scadentei'],
        ]);
    }
}
