<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $timestamps = false;
    protected $table = "client";
    
    protected $fillable = [
        'prenom', 'nom', 'adresse', 'solde', 'id_user'
    ];

   

    public function client_user()
    {
        return $this->belongsTo(User::class, "id_user");
    }

    public function commande_id()
    {
        return $this->hasMany(Commande::class);
    }

    public function note_id()
    {
        return $this->hasMany(Note::class);
    }

}
