<?php

namespace App\Http\Controllers;

use App\Client;
use App\Commande;
use App\Plat;
use App\Restaurateur;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class controllerClient extends Controller
{
    public function indexResto(){

    }

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
            $plats = Plat::where('id_restaurateur', $id)->get();

            return view('client.commande',compact('plats','client','resto'));
        }else{
            return view('auth.login');
        }
    }

    public function envoi_commande(Request $request){
        $user = \Auth::user();
        $client = Client::where('id_user', $user->id)->first();

        $tab_plat = $request->get('idplat');
        $tab_prix = $request->get('prix');
        $tab_quantite = $request->get('quantite');

        $prixCommande = 0;
        $i = 0;

        foreach ($tab_quantite as $quantite){
            //dd($tab_plat[$i]);
            if ($quantite != 0){
                $commande = new Commande();

                $commande->quantite = $quantite;
                $commande->reception = false;
                $commande->id_client = $client->id;
                $commande->heure_commande = now();

                $commande->id_plat = $tab_plat[$i];

                $prixCommande += $tab_prix[$i] * $quantite;

                $commande->save();
            }
            $i +=1;
        }

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

}
