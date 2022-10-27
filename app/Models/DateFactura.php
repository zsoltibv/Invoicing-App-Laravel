<?php

namespace App\Models;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function dateClient(){
        return $this->hasOne(DateClient::class, 'id');
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

    public function deleteDateFactura($id){
        $dateFactura =  DateFactura::find($id);

        $file = basename(Crypt::decrypt($dateFactura->url));
        Storage::delete($file);

        return $dateFactura->delete();
    }
}
