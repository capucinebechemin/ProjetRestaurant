<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LigneCommande extends Model
{
    public $timestamps = false;
    public $table = "lignecommande";

    public function ligne_plat()
    {
        return $this->belongsTo(plat::class, "id_plat");
    }
    public function id_commande()
    {
        return $this->belongsTo(commande::class, "id_commande");
    }
  

    protected $fillable = [
     'quantite','id_plat' ,'id_commande'
    ];
}
