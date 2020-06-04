<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

    public $table = "note";
    public $timestamps = false;
    
    protected $fillable = [
        'note', 'avis', 'id_plat', 'id_client'
    ];

    public function note_plat()
    {
        return $this->belongsTo(plat::class, 'id_plat');
    }

    public function note_client()
    {
        return $this->belongsTo(client::class, 'id_client');
    }
}
