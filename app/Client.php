<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'prenom', 'nom', 'adresse', 'solde'
    ];
}
