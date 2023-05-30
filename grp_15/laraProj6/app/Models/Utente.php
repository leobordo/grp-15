<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Utente extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'Id',
        'NomeUtente',
        'Password',
        'Nome',
        'cognome',
        'Email',
        'Telefono',
        'Genere',
        'Livello',
        'NumeroCouponTotali',
    ];
    protected $hidden = [
        'Password',
        'remember_token',
    ];
    protected $primaryKey = 'id';
    protected $table = 'utente';
    public function numeroCoupon()
{
    return $this->hasMany(Coupon::class,'Utente')->count();
}
public function coupons()
{
    return $this->hasMany(Coupon::class,'Utente');
}
public function getAuthPassword()
{
    return $this->Password;
}




}
