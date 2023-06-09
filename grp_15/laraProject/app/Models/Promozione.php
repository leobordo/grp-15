<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promozione extends Model
{
    protected $table = 'promozioni';
    protected $fillable = ['Id','NomePromo', 'Azienda', 'DescrizioneSconto','Tipologia', 'PercentualeSconto', 'Scadenza'];
    protected $primaryKey = 'id';
    //protected $keyType='string';

    public function azienda()
{
    return $this->belongsTo(Azienda::class, 'Azienda');
}
public function hasPercentuale()
 {
    return $this->PercentualeSconto!=null;
 }

}