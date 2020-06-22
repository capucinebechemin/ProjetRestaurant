<?php

namespace App\Http\Controllers;

use App\Client;
use App\Restaurateur;
use Illuminate\Http\Request;

class controllerWelcome extends Controller
{
    public function index()
    {
        $restaurants = Restaurateur::whereHas('plat_id', function ($query) {
            $query->where('visible', '=', '1');
        })->get();
        return view('welcome', compact('restaurants'));
    }
}
