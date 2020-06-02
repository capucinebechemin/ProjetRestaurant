<?php

namespace App\Http\Controllers;

use App\Client;
use App\Restaurateur;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use App\Restaurateur;

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
        //$profile_resto = Restaurateur::all();
       $profile_resto = Restaurateur::where('id_user',$user->id)->first();
    //dd($profile_resto);

        // Entreprise::where('id', $entrepriseId)->with('contact')->first()
        //Entreprise::where('id', $contact->entreprise_id);

        if ($user->role == '1'){
            $client = Client::where('id_user', $user->id)->first();
            return view('clienthome', compact('client'));
        }
        elseif ($user->role == '2'){
            $resto = Restaurateur::where('id_user', $user->id)->first();
            return view('restaurateurhome', compact('resto','profile_resto'));
        }
        elseif ($user->role == '3') {
            return view('home', compact('user'));
        }
    }
}
