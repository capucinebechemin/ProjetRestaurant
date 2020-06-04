<?php

namespace App\Http\Controllers;

use App\Restaurateur;
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


}
