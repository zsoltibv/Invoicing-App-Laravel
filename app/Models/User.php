<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function contBancar(){
        return $this->hasMany(ContBancar::class, 'user_id');
    }

    public function dateFirma(){
        return $this->hasOne(DateFirma::class, 'user_id');
    }

    public function dateClient(){
        return $this->hasMany(DateClient::class, 'user_id');
    }

    public function dateProdus(){
        return $this->hasMany(DateProdus::class, 'user_id');
    }

    public function dateFactura(){
        return $this->hasMany(DateFactura::class, 'user_id');
    }

    public function dateStatistici(){
        return $this->hasOne(Statistici::class, 'user_id');
    }

    public function getUserById($id)
    {
        return User::find($id);
    }

    public function updateUser($data, $id){
        $user = User::find($id);

        if (Hash::check($data['old_password'], $user->password)) {
            $user->name = $data['name'];
            $user->email = $data['email'];
            if($data['new_password'] != null){
                $user->password = Hash::make($data['new_password']);
            }
        }

        $user->save();
        return $user;
    }
}
