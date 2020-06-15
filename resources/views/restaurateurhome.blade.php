@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                    <div class="modal-title">Accueil Restaurateur</div>

                <div style="display: flex; flex-direction: row; justify-content: space-between">
                    <div>
                        <h2>Bienvenue cher restaurateur</h2>
                        <a href="{{ route('restaurateur.profile') }}" title="Gestion Profil"><img style="height: 50px" src="{{asset('storage/' . 'uploads/person.png')}}" alt="Gestion profil"></a>
                        <a href="{{ route('restaurateur.plat') }}" title="Ajouter un Plat"><img style="height: 50px" src="{{asset('storage/' . 'uploads/dinner.png')}}" alt="Création plat"></a>
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

                                <div style="display: flex; flex-direction: row; justify-content: space-around; width: 100%">
                                    <div style="display: flex; flex-direction: column; justify-content: space-around">
                                        <p>{{$plat->nom}}</p>
                                        <b>{{$plat->prix}}€</b>
                                    </div>

                                    <div style="display: flex; flex-direction: column; justify-content: space-around">
                                        <a href="{{ route('restaurateur.delete', $plat->id) }}" title="Supprimer"><img style="height: 20px" src="{{asset('storage/' . 'uploads/trash.png')}}" alt="Supprimer"></a>
                                        <a href="{{ route('restaurateur.modifier', $plat->id) }}" title="Modifier"><img style="height: 20px" src="{{asset('storage/' . 'uploads/pencil.png')}}" alt="Modifier"></a>
                                    </div>
                                </div>



                                <img src="{{asset('storage/' . $plat->photo)}}" alt="{{$plat->nom}}"
                                     style= "
                                             position: absolute;
                                             max-height: 50%;
                                             max-width: 50%;
                                             top: 50%;
                                             left: 50%;
                                             transform: translate( -50%, -50%);">
                                             <br>

                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

           
        </div>
    </div>
@endsection