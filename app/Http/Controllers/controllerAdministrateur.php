<?php

namespace App\Http\Controllers;

use App\Client;
use App\Restaurateur;
use App\Plat;
use App\User;
use Illuminate\Http\Request;

class controllerAdministrateur extends Controller
{




    public function client(){
        $client = Client::all();
        return view('admin.client',compact('client'));
    }

    public function detail($clientid_user){
            $user= User::where('id',$clientid_user)->first();
            $client = Client::where('id_user', $clientid_user)->first();
            return view('clienthome', compact('client','user'));
    }

    public function modif_vue($clientid_user){
        $user= User::where('id',$clientid_user)->first();
        $client = Client::where('id_user', $clientid_user)->first();
        return view('admin.modif_vue', compact('client','user'));
}


public function modif(Request $request, $clientid_user){

    $request->validate([
        'prenom' => 'required',
        'nom' => 'required',
        'adresse' => 'required',
        'solde' => 'required',
    ]);

    $user = User::where('id',$clientid_user)->first();
    $client = Client::where('id_user', $user->id)->first();

    $client->prenom = $request->get('prenom');
    $client->nom = $request->get('nom');
    $client->adresse = $request->get('adresse');
    $client->solde = $request->get('solde');
    $client->id_user = $user->id;

    $client->save();
    return redirect()->route('admin.client');

    }

   
public function suppr ($clientid_user){
    $client = Client::where('id_user',$clientid_user)->first();
    $user = User::where('id',$clientid_user)->first();
    $client->delete();
    $user->delete();
    return redirect()->route('admin.client');

}



    public function restaurateur(){
      $resto = Restaurateur::all();
        return view('admin.restaurateur',compact('resto'));
    }



}
