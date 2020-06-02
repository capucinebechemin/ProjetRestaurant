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


}
