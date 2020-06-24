<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurateur extends Model
{

    public $timestamps = false;
    protected $table = "restaurateur";
   
    protected $fillable = [
        'nom_restaurant', 'logo', 'adresse_mail_contact', 'adresse', 'id_user'
    ];


    public function restaurateur_user()
    {
        return $this->belongsTo(User::class, "id_user");
    }

    public function plat_id()
    {
        return $this->hasMany(Plat::class);
    }
    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }
}
