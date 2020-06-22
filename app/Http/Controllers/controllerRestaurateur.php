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

    $request->validate([
        'nom' => 'required',
        'mail' => 'required|email',
        'adresse' => 'required',
    ]);

    $user = \Auth::user();
    $resto = Restaurateur::where('id_user', $user->id)->first();

    $resto->nom_restaurant = $request->get('nom');

    $resto->adresse_mail_contact = $request->get('mail');
    $resto->adresse = $request->get('adresse');
    $resto->id_user = $user->id;

    if(!is_null($request->file('logo'))) {
    $newlogo = $request->file('logo');

    $resto->logo = $newlogo->store('uploads', 'public');
    }

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
        'restaurateur_id' => 'required',
    ]);

    $plat = new Plat();
    $plat->nom = $request->get('nom');
    $plat->prix = $request->get('prix');

    $plat->restaurateur_id = $request->get('restaurateur_id');

    $photo = $request->file('photo');

    $plat->photo = $photo->store('uploads', 'public');
    $plat->save();

    return redirect()->route('home');

}

public function delete ($platid){

    $plat = Plat::where('id',$platid)->first();
    $plat->delete();
    return redirect()->route('home');

}

public function modifier($platid){
    $plat = Plat::where('id',$platid)->first();
    return view('restaurateur.modif_plat',compact('plat'));

}

public function update_plat(Request $request, $platid){

    $request->validate([
        'nom' => 'required',
        'prix' => 'required',
        
    ]);

    $plat = Plat::where('id',$platid)->first();

    $plat->nom = $request->get('nom');
    $plat->prix = $request->get('prix');

    if(!is_null($request->file('photo'))) {
        
    $newlogo = $request->file('photo');
    $plat->photo = $newlogo->store('uploads', 'public');
    }


    $plat->save();


    return redirect()->route('home');

}



}
