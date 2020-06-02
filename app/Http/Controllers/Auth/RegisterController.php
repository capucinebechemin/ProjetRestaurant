<?php

namespace App\Http\Controllers\Auth;

use App\Client;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Restaurateur;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Return_;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required'],
            'restoLogo' => ['require', 'image'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    protected function create(array $data)
    {

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role']
        ]);

        $this->createPerson($data, $user);

        return $user;
    }


    protected function createPerson(array $data, $user)
    {
        if ($data['role'] == '1'){
            $client = new Client();
            $client->prenom = $data['prenomC'];
            $client->nom = $data['nomC'];
            $client->solde = $data['soldeC'];
            $client->adresse = $data['adressePostaleC'];
            $client->id_user=$user->id;

            return $client->save();

        }elseif ($data['role'] == '2') {
            $restaurateur = Restaurateur::create([
                'nom_restaurant' => $data['nomR'],
                'logo' => $data['logoR'],
                'adresse_mail_contact' => $data['adresseContactR'],
                'adresse' => $data['adressePostaleR'],
                'id_user' => $user->id
            ]);

            $restaurateur->update([
                'logo'=>$data['logoR']->store('uploads', 'public'),
            ]);
            return $restaurateur;
        }

        else{return $this;}
    }
}
