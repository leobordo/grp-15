<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Azienda extends Model
{
    protected $table = 'azienda';
    protected $fillable = ['Id', 'Nome', 'Tipologia', 'Localizzazione', 'RagioneSociale', 'Descrizione', 'Immagine'];
    protected $primaryKey = 'id';
    //protected $keyType='string';

    public function promozioni()
{
    return $this->hasMany(Promozione::class);
}


}
