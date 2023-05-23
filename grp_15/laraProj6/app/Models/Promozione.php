<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promozione extends Model
{
    protected $table = 'promozioni';
    protected $fillable = ['NomePromo', 'Azienda', 'DescrizioneSconto', 'PercentualeSconto', 'Scadenza', 'Immagine'];
    protected $primaryKey = 'NomePromo';

    public function azienda()
{
    return $this->belongsTo(Azienda::class, 'Nome');
}


}