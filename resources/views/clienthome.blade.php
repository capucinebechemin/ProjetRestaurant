@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="modal-title">Accueil Client</div>

                <div style="display: flex; flex-direction: row; justify-content: space-between">
                <a href="{{ route('client.profile') }}" title="gestion profile">Gestion profil</a>
                </div>

                <div style="display: flex; flex-direction: row; justify-content: space-between">
                    <div>
                        <h3>Bienvenue {{$client->prenom}} {{$client->nom}}</h3>
                        <p>Vous disposez de {{$client->solde}}€</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection