<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    public $table = "plat";
    public $timestamps = false;

    protected $fillable = [
        'nom', 'prix', 'photo', 'restaurateur_id','visible'
    ];

    public function plat_restaurateur()
    {
        return $this->belongsTo(Restaurateur::class, "restaurateur_id");
    }

    public function lignecommande_id()
    {
        return $this->hasMany(LigneCommande::class);
    }

    public function note_id()
    {
        return $this->hasMany(Note::class);
    }
}
