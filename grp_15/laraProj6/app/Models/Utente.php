<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
    return $this->hasMany(Coupon::class)->count();
}

}
