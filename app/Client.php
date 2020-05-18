<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'prenom', 'nom', 'adresse', 'solde', 'id_user'
    ];

    public function client_user()
    {
        return $this->belongsTo(user::class, "id_user");
    }

    public function commande_id()
    {
        return $this->hasMany(commande::class);
    }

    public function note_id()
    {
        return $this->hasMany(note::class);
    }

}
