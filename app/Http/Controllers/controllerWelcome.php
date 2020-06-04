<?php

namespace App\Http\Controllers;

use App\Client;
use App\Restaurateur;
use Illuminate\Http\Request;

class controllerWelcome extends Controller
{
    public function index()
    {
        $restaurants = Restaurateur::all();
        return view('welcome', compact('restaurants'));
    }
}
