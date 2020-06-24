<?php

namespace App\Http\Controllers;

use App\Client;
use App\Plat;
use App\Restaurateur;
use App\Commande;
use App\Note;
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


        //Redirect to the right home 1(Client) 2(Restaurateur) and 3(Admin) 
        //with some informations given to the view.
        if ($user->role == '1'){
            $client = Client::where('id_user', $user->id)->first();
            $commandes = Commande::where('id_client',$client->id)->where('reception', 0)->get();
            $commandes_fin = Commande::where('id_client',$client->id)->where('reception', 1)->get();

            return view('clienthome', compact('client','user','commandes','commandes_fin'));
        }
        elseif ($user->role == '2'){
            $resto = Restaurateur::where('id_user', $user->id)->first();
            $commandes = Commande::where('restaurateur_id',$resto->id)->where('reception', 0)->get();
            $commandes_fin = Commande::where('restaurateur_id',$resto->id)->where('reception', 1)->get();
            $note = Note::all();
            $plats = Plat::where('restaurateur_id',$resto->id)->where('visible',1)->get();
            return view('restaurateurhome', compact('resto','plats', 'user','commandes','commandes_fin','note'));
        }
        elseif ($user->role == '3') {
            $nbr_resto = Restaurateur::all()->count();
            $nbr_resto -= 1;
            $nbr_commande = Commande::where('reception', 0)->count();
            $nbr_commande_fini = Commande::where('reception', 1)->count();
            $revenu = Commande::all()->count();
            $revenu = $revenu *2.5;
            $resto = Restaurateur::all();
            return view('home', compact('user','resto','nbr_resto','revenu','nbr_commande','nbr_commande_fini'));
        }
    }
}
