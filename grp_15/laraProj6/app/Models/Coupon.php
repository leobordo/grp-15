<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupon';
    protected $fillable = ['CodiceCoupon', 'Utente', 'Promozione', 'Data', 'Ora'];
    protected $primaryKey = 'CodiceCoupon';

    public function utente()
{
    return $this->belongsTo(Utente::class, 'inserire chiave utente1' );
}
public function azienda2()
{
    return $this->belongsTo(Azienda::class, 'Nome');
}
public function setCodiceCouponAttribute($value)
{
    // Se il valore fornito è vuoto, generiamo un nuovo codice casuale
    if (empty($value)) {
        $value = $this->generateRandomCouponCode();
    }
    $this->attributes['CodiceCoupon'] = $value;
}

private function generateRandomCouponCode()
{
    // Generiamo un codice coupon casuale, ad esempio utilizzando la funzione uniqid() di PHP
    return uniqid();
}


}