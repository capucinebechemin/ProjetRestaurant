<?php

namespace App\Http\Controllers;

use App\Client;
use App\Commande;
use App\LigneCommande;
use App\Note;
use App\Restaurateur;
use App\Plat;
use App\User;
use Illuminate\Http\Request;
use Mockery\Matcher\Not;

class controllerAdministrateur extends Controller
{




    public function client(){
        $client = Client::all();
        return view('admin.client',compact('client'));
    }

    public function detail($clientid_user){
        $user= User::where('id',$clientid_user)->first();
        $client = Client::where('id_user', $clientid_user)->first();
        $commandes = Commande::where('id_client',$client->id)->where('reception', 0)->get();
        $commandes_fin = Commande::where('id_client',$client->id)->where('reception', 1)->get();

        return view('clienthome', compact('client','user','commandes', 'commandes_fin'));
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

    $commandes = Commande::where('id_client', $client->id)->get();

    foreach ($commandes as $commande){
        $note = Note::whereHas('note_plat')->where('commande_id', '=', $commande->id)->get()->each->delete();
        $lignesCommande = LigneCommande::whereHas('commande')->where('commande_id', '=', $commande->id)->get()->each->delete();
        $commande->delete();
    }

    $client->delete();
    $user->delete();
    return redirect()->route('admin.client');

}

//.....................................................................

    public function restaurateur(){
        $resto = Restaurateur::where('id', '!=', 0)->get();
        return view('admin.restaurateur',compact('resto'));
    }

    public function resto($restoid_user){
        $user= User::where('id',$restoid_user)->first();
        $resto = Restaurateur::where('id_user', $restoid_user)->first();
        $commandes = Commande::where('restaurateur_id',$resto->id)->where('reception', 0)->get();
        $commandes_fin = Commande::where('restaurateur_id',$resto->id)->where('reception', 1)->get();
        $note = Note::all();
        $plats = Plat::where('restaurateur_id',$resto->id)->get();
        return view('restaurateurhome', compact('resto','user','plats','commandes','commandes_fin','note'));
}


    public function modif_vue_resto($restoid_user){
        $user= User::where('id',$restoid_user)->first();
        $resto = Restaurateur::where('id_user', $restoid_user)->first();
    return view('admin.modif_vue_resto', compact('resto','user'));
}


public function modif_resto(Request $request, $restoid_user){

    $request->validate([
        'nom' => 'required',
        'mail' => 'required|email',
        'adresse' => 'required',
    ]);

    $user= User::where('id',$restoid_user)->first();
    $resto = Restaurateur::where('id_user', $restoid_user)->first();

    $resto->nom_restaurant = $request->get('nom');

    $resto->adresse_mail_contact = $request->get('mail');
    $resto->adresse = $request->get('adresse');
    $resto->id_user = $user->id;

    if(!is_null($request->file('logo'))) {
        $newlogo = $request->file('logo');
    
        $resto->logo = $newlogo->store('uploads', 'public');
        }

    $resto->save();


    return redirect()->route('admin.restaurateur');

}


public function suppr_resto ($restoid_user){
    $resto = Restaurateur::where('id_user', $restoid_user)->first();
    $user= User::where('id',$restoid_user)->first();


    $plats = Plat::where('restaurateur_id',$resto->id)->get();

    foreach ($plats as $plat){
        $plat->visible = 0;
        $plat->restaurateur_id = 0;
        $plat->save();
    }

    $resto->delete();
    $user->delete();
    return redirect()->route('admin.restaurateur');

}









}
