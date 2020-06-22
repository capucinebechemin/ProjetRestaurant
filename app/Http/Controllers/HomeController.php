<?php

namespace App\Http\Controllers;

use App\Client;
use App\Plat;
use App\Restaurateur;
use App\Commande;
use App\LigneCommande;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = \Auth::user();

        if ($user->role == '1'){
            $client = Client::where('id_user', $user->id)->first();
            $commandes = Commande::where('id_client',$client->id)->get();//->with('ligneCommandes')->get();
            //$lignes = LigneCommande::has()->get();


            //$ligne_commande = LigneCommande::where('id_commande',$commandes->id)->get();




           // $commandeSame = Commande::where()distinct(heure) (prendre les commandes qui ont le meme heure(en fonction du client))
           //$commandeSame = Commande::groupby('heure_commande')->where('id_client',$client->id)->get();
          //->orderby('heure_commande','desc')
         // dd($commandeSame);
           // $commandeheure = $commandeSame->heure_commande->get();
           //dd($commandeheure);
           //$commandeDetail = Commande::select('id_plat','quantite')->where('heure_commande',$commandeSame->heure_commande)->first();


            return view('clienthome', compact('client','user','commandes'));
        }
        elseif ($user->role == '2'){
            $resto = Restaurateur::where('id_user', $user->id)->first();
            $plats = Plat::where('restaurateur_id',$resto->id)->get();
            return view('restaurateurhome', compact('resto','plats'));
        }
        elseif ($user->role == '3') {
            $nbr_resto = Restaurateur::all()->count();
            $nbr_commande = Commande::where('reception', 0)->count();
            $nbr_commande_fini = Commande::where('reception', 1)->count();
            $revenu = Commande::all()->count();
            $revenu = $revenu *2.5;
            $resto = Restaurateur::all();
           
            return view('home', compact('user','resto','nbr_resto','revenu','nbr_commande','nbr_commande_fini'));
        }
    }
}
