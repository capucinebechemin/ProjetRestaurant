<?php

namespace App\Http\Controllers;

use App\Restaurateur;
use App\Plat;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class controllerRestaurateur extends Controller
{
    
public function profile(){
    $user = \Auth::user();
    $resto = Restaurateur::where('id_user', $user->id)->first();
    $plats = Plat::where('id_restaurteur', $resto->id)->all();

    return view('restaurateur.profile',compact('resto', 'plats'));
}

public function update(Request $request){

    $request->validate([
        'nom' => 'required',
        'logo' => 'required',
        'mail' => 'required|email',
        'adresse' => 'required',
    ]);

    $user = \Auth::user();
    $resto = Restaurateur::where('id_user', $user->id)->first();

    $resto->nom_restaurant = $request->get('nom');

    $resto->adresse_mail_contact = $request->get('mail');
    $resto->adresse = $request->get('adresse');
    $resto->id_user = $user->id;

    $newlogo = $request->file('logo');

    $resto->logo = $newlogo->store('uploads', 'public');

    $resto->save();


    return redirect()->route('home');

}


public function plat(){
    $user = \Auth::user();
    $resto = Restaurateur::where('id_user', $user->id)->first();
    return view('restaurateur.plat',compact('resto'));
}

public function store(Request $request) {

    $request->validate([
        'nom' => 'required',
        'prix' => 'required',
        'photo' => 'required',
        'id_restaurateur' => 'required',
    ]);

    $plat = new Plat();
    $plat->nom = $request->get('nom');
    $plat->prix = $request->get('prix');

    $plat->id_restaurateur = $request->get('id_restaurateur');

    $photo = $request->file('photo');

    $plat->photo = $photo->store('uploads', 'public');
    $plat->save();

    return redirect()->route('home');

}

//public function plat_modif($idplat){
   
//}


}
