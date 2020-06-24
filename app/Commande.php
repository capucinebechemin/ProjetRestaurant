<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    public $timestamps = false;
    public $table = "commande";

    public function commande_client()
    {
        return $this->belongsTo(Client::class, "id_client");
    }
    public function restaurateur()
    {
        return $this->belongsTo(Restaurateur::class, "restaurateur_id");
    }

    public function ligneCommandes()
    {
        return $this->hasMany(LigneCommande::class);
    }
    public function Notes()
    {
        return $this->hasMany(Note::class);
    }
  

    protected $fillable = [
     'heure_commande', 'reception', 'id_client','restaurateur_id'
    ];
}
