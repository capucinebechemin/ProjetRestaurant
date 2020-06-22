<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrateur extends Model
{
    public $table = "administrateur";
    public $timestamps = false;

    protected $fillable = [
       'id_user'
    ];

    public function administrateur_user()
    {
        return $this->belongsTo(User::class, "id_user");
    }
}
