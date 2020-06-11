@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                    <div class="modal-title">Accueil Restaurateur</div>

                <div style="display: flex; flex-direction: row; justify-content: space-between">
                    <div>
                        <h2>Bienvenue cher restaurateur</h2>
                        <a href="{{ route('restaurateur.profile') }}" title="gestion profile">Gestion profil</a>
                        <a href="{{ route('restaurateur.plat') }}" title="plat">Création plat</a>
                       
                        
                    </div>

                    <div>
                        <img src="{{ asset('storage/' . $resto->logo) }}" class="img-thumbnail" alt="" style="height: 100px">
                    </div>
                </div>

                <div class='info-resto'>
                    <h1>Vos informations</h1>
                    <ul>
                            <li>
                            <p>Nom du restaurant: {{$resto->nom_restaurant}}</p>
                            </li>
                            <li>
                            <p>Adresse: {{$resto->adresse}}</p>
                            </li>
                            <li>
                            <p>Mail: {{$resto->adresse_mail_contact}}</p>
                            </li>
                            
                            <li>
                            <p>Plat:{{$plat[1]}} </p>
                            </li>
                    </ul>

                    @foreach($plat as $plat)
                    <div class="col-sm">
            
                        <img src="{{asset('storage/' . $plat->photo)}}" alt="{{$plat->nom}}" style= "width: 50%">
                    </div>
                    @endforeach
            </div>
                   
            </div>

           
        </div>
    </div>
@endsection