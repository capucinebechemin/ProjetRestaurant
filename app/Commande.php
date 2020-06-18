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

    public function commande_plat()
    {
        return $this->belongsTo(plat::class, "id_plat");
    }

    protected $fillable = [
        'quantite', 'heure_commande', 'reception', 'id_client', 'id_plat'
    ];
}
