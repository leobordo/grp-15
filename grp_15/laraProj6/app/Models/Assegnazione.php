<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assegnazione extends Model
{
    protected $table = 'assegnazione';
    protected $fillable = ['Id', 'Operatore', 'Azienda'];
    protected $primaryKey = 'id';
}
