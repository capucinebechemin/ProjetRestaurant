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

    return view('restaurateur.profile',compact('resto'));
}

public function update(Request $request){

    $validatedData = $request->validate([
        'nom' => 'required',
        'logo' => 'required',
        'mail' => 'required|email',
        'adresse' => 'required',
        
    ]);
    $user = \Auth::user();
    $resto = Restaurateur::where('id_user', $user->id)->first();
    $resto->nom_restaurant = $request->get('nom');
    $resto->logo = $request->get('logo');
    $resto->adresse_mail_contact = $request->get('mail');
    $resto->adresse = $request->get('adresse');
    $resto->id_user = \Auth::user()->id;
    $resto->save();
    
   // $resto->update([
   // $resto->logo = $request->store('uploads', 'public'),
  //  ]);


    return redirect()->route('home');

}


public function plat(){
    $user = \Auth::user();
    $resto = Restaurateur::where('id_user', $user->id)->first();
    return view('restaurateur.plat',compact('resto') );
}

public function store(Request $request) {

// Vérification du contenu
$validatedData = $request->validate([
    'nom' => 'required',
    'prix' => 'required',
    'photo' => 'required',
    'id_restaurateur' => 'required',
]);       

$plat = new Plat();
$plat->nom = $request->get('nom');
$plat->prix = $request->get('prix');
$plat->photo = $request->get('photo');
$plat->id_restaurateur = $request->get('id_restaurateur');
$plat->save();
return redirect()->route('home');

}


}
