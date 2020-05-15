<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'prenom', 'nom', 'adresse', 'solde','id_user'
    ];


    public function client_user()
    {
        # la relation inverse se déclare grace a la méthode "hasMany", qui ne prend cette fois en paramètre, que le nom du model "A"
        return $this->belongsTo(users::class, "id_user");
    }

    


}
