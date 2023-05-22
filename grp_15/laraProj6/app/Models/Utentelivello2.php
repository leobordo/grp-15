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
        'Email',
        'Telefono',
        'Genere',
        
    ];
    //protected $primaryKey = 'NomeUtente';
    protected $table = 'utentelivello2';
    protected $hidden = [
        
        'Password',
        'remember_token',
    ];
  

}