<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UtenteLivello2 extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'NomeUtente',
        'Password',
        'Nome',
        'cognome',
        'E-mail',
        'Telefono',
        'Genere',
        
    ];
    protected $primaryKey = 'NomeUtente';
    protected $table = 'utentilivello2';
    protected $hidden = [
        'NomeUtente',
        'Password',
        'remember_token',
    ];
  

}