<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Azienda extends Model
{
    protected $table = 'azienda';
    protected $fillable = ['Nome', 'Tipologia', 'Localizzazione', 'RagioneSociale', 'Descrizione'];
    protected $primaryKey = 'Nome';

    public function promozioni()
{
    return $this->hasMany(Promozione::class);
}


}
