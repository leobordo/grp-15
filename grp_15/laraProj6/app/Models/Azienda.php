<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Azienda extends Model
{
    protected $table = 'azienda';
    protected $fillable = ['Nome', 'Tipologia', 'Localizzazione', 'RagioneSociale', 'Descrizione', 'Immagine'];
    protected $primaryKey = 'Nome';
    protected $keyType='string';

    public function promozioni()
{
    return $this->hasMany(Promozione::class);
}


}
