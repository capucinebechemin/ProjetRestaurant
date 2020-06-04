<?php

namespace App\Http\Controllers;

use App\Client;
use App\Plat;
use App\Restaurateur;
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
            return view('clienthome', compact('client'));
        }
        elseif ($user->role == '2'){
            $resto = Restaurateur::where('id_user', $user->id)->first();
            $plat = Plat::where('id_restaurateur',$resto->id)->get();
            return view('restaurateurhome', compact('resto','plat'));
        }
        elseif ($user->role == '3') {
            return view('home', compact('user'));
        }
    }
}
