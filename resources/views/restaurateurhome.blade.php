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
                    </ul>
                </div>
                <div>
                    <h1>Vos Plats</h1>
                    <div style="display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center">
                        @foreach($plats as $plat)
                            <div style="
                                         margin: 20px;
                                         position: relative;
                                         width: 300px;
                                         height: 300px;
                                         overflow: hidden;
                                         text-align: center">

                                <span>{{$plat->nom}}<br><b>{{$plat->prix}}€</b></span>


                                <img src="{{asset('storage/' . $plat->photo)}}" alt="{{$plat->nom}}"
                                     style= "
                                             position: absolute;
                                             max-height: 70%;
                                             max-width: 70%;
                                             top: 50%;
                                             left: 50%;
                                             transform: translate( -50%, -50%);">
                                             <br>
                                    <a href="{{ route('restaurateur.delete', $plat->id) }}" title="delete">Supprimer plat</a>
                                    
                                    <a href="{{ route('restaurateur.modifier', $plat->id) }}" title="modifier">Modifier plat</a>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

           
        </div>
    </div>
@endsection