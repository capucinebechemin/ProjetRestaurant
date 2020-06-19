<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    public $table = "plat";
    public $timestamps = false;

    protected $fillable = [
        'nom', 'prix', 'photo', 'id_restaurateur'
    ];

    public function plat_restaurateur()
    {
        return $this->belongsTo(restaurateur::class, "id_restaurateur");
    }

    public function lignecommande_id()
    {
        return $this->hasMany(lignecommande::class);
    }

    public function note_id()
    {
        return $this->hasMany(note::class);
    }
}
