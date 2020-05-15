<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurateur extends Model
{
    protected $fillable = [
        'nom_restaurant', 'logo', 'adresse_mail_contact', 'adresse'
    ];
}
