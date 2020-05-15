<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurateur extends Model
{
    protected $fillable = [
        'nom_restaurant', 'logo', 'adresse_mail_contact', 'adresse', 'id_user'
    ];

    public function restaurateur_user()
    {
        return $this->belongsTo(user::class, "id_user");
    }

    public function plat_id()
    {
        return $this->hasMany(plat::class);
    }
}
