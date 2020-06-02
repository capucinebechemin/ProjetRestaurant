<?php

namespace App\Http\Controllers;

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
            return view('clienthome', compact('user'));
        }
        elseif ($user->role == '2'){
            return view('restaurateurhome', compact('user','profile_resto'));
        }
        elseif ($user->role == '3') {
            return view('home', compact('user'));
        }
    }
}
