<?php

namespace App\Http\Controllers;

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
            return view('clienthome', compact('user'));
        }
        elseif ($user->role == '2'){
            return view('restaurateurhome', compact('user'));
        }
        elseif ($user->role == '3') {
            return view('home', compact('user'));
        }
    }
}
