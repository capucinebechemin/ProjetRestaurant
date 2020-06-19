<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    public $timestamps = false;
    public $table = "commande";

    public function commande_client()
    {
        return $this->belongsTo(client::class, "id_client");
    }
    public function lignecommande_id()
    {
        return $this->hasMany(lignecommande::class);
    }
  

    protected $fillable = [
     'heure_commande', 'reception', 'id_client',
    ];
}
