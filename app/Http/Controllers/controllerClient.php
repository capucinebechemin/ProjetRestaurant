<?php

namespace App\Http\Controllers;

use App\Client;
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
