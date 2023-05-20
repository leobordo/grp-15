<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UtenteLivello3 extends Authenticatable
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
    protected $primaryKey = 'NomeUtente';
    protected $table = 'utentilivello3';
    protected $hidden = [
        'NomeUtente',
        'Password',
        'remember_token',
    ];


}