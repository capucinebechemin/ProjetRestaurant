<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LigneCommande extends Model
{
    public $timestamps = false;
    public $table = "lignecommande";

    public function ligne_plat()
    {
        return $this->belongsTo(Plat::class, "id_plat");
    }

    public function commande()
    {
        return $this->belongsTo(Commande::class, "commande_id");
    }
  

    protected $fillable = [
     'quantite','id_plat' ,'commande_id'
    ];
}
