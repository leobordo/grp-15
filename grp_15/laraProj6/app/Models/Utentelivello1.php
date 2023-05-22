<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UtenteLivello1 extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'NomeUtente',
        'Password',
        'Nome',
        'cognome',
        'Email',
        'Telefono',
        'Genere',
        'NumeroCouponTotali',
    ];
    protected $hidden = [
        
        'Password',
        'remember_token',
    ];
    protected $primaryKey = 'NomeUtente';
    protected $table = 'utentelivello1';
    public function numeroCoupon()
{
    return $this->hasMany(Coupon::class)->count();
}

}
