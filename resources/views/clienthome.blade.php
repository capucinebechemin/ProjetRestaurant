@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <p>Bienvenue {{$client->prenom}} {{$client->nom}}</p>
                        <p>Vous disposez de {{$client->solde}}€</p>
                    </div>

                    <div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection