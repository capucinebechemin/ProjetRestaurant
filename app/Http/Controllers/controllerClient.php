<?php

namespace App\Http\Controllers;

use App\Client;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class controllerClient extends Controller
{
    public function indexResto(){

    }



    public function profile(){
        $user = \Auth::user();
        $client = Client::where('id_user', $user->id)->first(); 
        return view('client.profile',compact('client','user'));
    }


    
public function update(Request $request){

    $request->validate([
        'prenom' => 'required',
        'nom' => 'required',
        'adresse' => 'required',
        'solde' => 'required',
    ]);

    $user = \Auth::user();
    $client = Client::where('id_user', $user->id)->first();

    $client->prenom = $request->get('prenom');
    $client->nom = $request->get('nom');
    $client->adresse = $request->get('adresse');
    $client->solde = $request->get('solde');
    $client->id_user = $user->id;

    $client->save();

    return redirect()->route('home');

}


}
