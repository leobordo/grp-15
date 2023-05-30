<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupon';
    protected $fillable = ['Id','CodiceCoupon', 'Utente', 'Promozione', 'Data', 'Ora'];
    protected $primaryKey = 'id';
    //protected $keyType='string';

    public function utente()
{
    return $this->belongsTo(Utente::class, 'Utente');
}
 public function promozione()
 {
    return $this->belongsTo(Promozione::class, 'Promozione');
 }


}