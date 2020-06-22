@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="modal-title">Accueil Client</div>

                <div style="display: flex; flex-direction: row; justify-content: space-between">
                    <div>
                        <a href="{{ route('client.profile') }}" title="Gestion Profil"><img style="height: 50px" src="{{asset('storage/' . 'uploads/person.png')}}" alt="Gestion profil"></a>

                        <h3>Bienvenue {{$client->prenom}} {{$client->nom}}</h3>
                     
                        <p>Vous disposez de {{$client->solde}}€</p>

                        <h2>Commandes</h2>
                       
                        <ul>
                        <p>Commande en cours :</p>
                       @foreach($commandes as $commande)
                            <li>
                            <p>Commande du {{$commande->heure_commande}}</p>
                                @foreach($commande->ligneCommandes as $ligne)
                                    <p>{{$ligne->quantite}} "{{$ligne->ligne_plat->nom}}" à {{$ligne->ligne_plat->prix}}€</p>
                                @endforeach
                            </li>
                          
                            @endforeach 

                            <p>Commandes passées: </p>
                            <li>
                            <p> </p>
                            </li>
                           
                    </ul>
                  

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('back')
    <a href="/coupfaim/public" title="Page Précédente"> <img style="height: 25px; margin-bottom: 2%" src="{{asset('storage/' . 'uploads/undo.png')}}" alt="Back"></a>
@endsection