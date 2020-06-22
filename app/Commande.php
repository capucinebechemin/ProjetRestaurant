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

    public function ligneCommandes()
    {
        return $this->hasMany(LigneCommande::class);
    }
  

    protected $fillable = [
     'heure_commande', 'reception', 'id_client',
    ];
}
