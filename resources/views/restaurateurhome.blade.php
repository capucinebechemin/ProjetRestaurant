@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <p>Bienvenue cher restaurateur</p>
                        <a href="{{ route('restaurateur.profile') }}" title="gestion profile">Gestion profile</a>
                        <a href="{{ route('restaurateur.plat') }}" title="plat">Création plat</a>
                       
                        
                    </div>
                    <div class="row">
                        <div class="col-12"><img src="{{ asset('storage/' . $resto->logo) }}" class="img-thumbnail" alt=""></div>
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
                        <a href="{{ route('restaurateur.plat_modif', $plat->id) }}" title="{{ $plat->nom }}">{{ $plat->nom }}</a>
                        <img src="{{asset('storage/' . $plat->photo)}}" alt="{{$plat->nom}}" style= "width: 50%">
                    </div>
                    @endforeach
                   
            </div>
                   
            </div>

           
        </div>
    </div>
@endsection