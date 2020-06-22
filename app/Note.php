<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

    public $table = "note";
    public $timestamps = false;
    
    protected $fillable = [
        'note', 'avis', 'id_commande', 'id_client'
    ];

    public function note_plat()
    {
        return $this->belongsTo(Plat::class, 'id_commande');
    }

    public function note_client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }
}
