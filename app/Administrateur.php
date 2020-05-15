<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrateur extends Model
{
    protected $fillable = [
       'id_user'
    ];

    public function administrateur_user()
    {
        return $this->belongsTo(user::class, "id_user");
    }
}
