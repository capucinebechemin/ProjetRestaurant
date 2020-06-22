<?php

namespace App\Http\Controllers;

use App\Client;
use App\Commande;
use App\LigneCommande;
use App\Plat;
use App\Note;
use App\Restaurateur;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class controllerClient extends Controller
{
    

    public function profile(){
        
        $user = \Auth::user();
        $client = Client::where('id_user', $user->id)->first(); 
        return view('client.profile',compact('client','user'));
    }

    public function commande($id){

        if (\Auth::user()){
            $user = \Auth::user();
            $client = Client::where('id_user', $user->id)->first();
            $resto = Restaurateur::where('id', $id)->first();
            $plats = Plat::where('restaurateur_id', $id)->where('visible',1)->get();

            return view('client.commande',compact('plats','client','resto'));
        }else{
            return view('auth.login');
        }
    }

    public function envoi_commande(Request $request){
        $user = \Auth::user();
        $client = Client::where('id_user', $user->id)->first();

        $heure = now();

        $commande = new Commande();
        $commande->reception = false;
        $commande->id_client = $client->id;
        $commande->heure_commande = $heure;

        $commande->save();

        $lacommande = Commande::where('heure_commande', $heure)->first();

        $tab_plat = $request->get('idplat');
        $tab_prix = $request->get('prix');
        $tab_quantite = $request->get('quantite');

        $prixCommande = 0;
        $i = 0;

        foreach ($tab_quantite as $quantite){
            if ($quantite != 0){

                $ligne_commande = new LigneCommande();

                $ligne_commande->quantite = $quantite;

                $ligne_commande->id_plat = $tab_plat[$i];

                $ligne_commande->commande_id = $lacommande->id;

                $prixCommande += $tab_prix[$i] * $quantite;

                $ligne_commande->save();
            }
            $i +=1;
        }

        $prixCommande += 2.5;
        $solde = $client->solde;
        $client->solde = $solde - $prixCommande;

        $client->save();

        return redirect()->route('home');
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
        
public function update_user(Request $request){

    $request->validate([
        'name' => 'required',
        //'password' => 'required',
        
        
    ]);

    $user = \Auth::user();
    $user->name = $request->get('name');
    //$user->password = $request->get('password');
    //$password=Hash::make($password);
    //dd($password);

    $user->save();


    return redirect()->route('home');

}


public function note($id){

    $commande_id = $id;
    $user = \Auth::user();
    $client = Client::where('id_user', $user->id)->first(); 
    return view('client.note',compact('client','user','commande_id'));
}
public function insert_note(Request $request){
    $request->validate([
        'note' => 'required',
        'avis' => 'required',
        'id_client' => 'required',
        'commande_id' => 'required',
    ]);

    $notation = new Note();
    $notation->note = $request->get('note');
    $notation->avis = $request->get('avis');
    $notation->id_client = $request->get('id_client');
    $notation->commande_id = $request->get('commande_id');

    $notation->save();

    return redirect()->route('home');
}

}
