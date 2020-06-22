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
                        <h3>Commande en cours :</h3>
                       @foreach($commandes as $commande)
                            <li>
                            <p>Commande du {{$commande->heure_commande}}</p>
                                @foreach($commande->ligneCommandes as $ligne)
                                    <p>{{$ligne->quantite}} "{{$ligne->ligne_plat->nom}}" à {{$ligne->ligne_plat->prix}}€</p>
                                @endforeach
                            </li>
                           <a href="{{ route('client.note',$commande->id) }}" title="Page Précédente">  <button style="margin-bottom: 20%" type="button"  class="btn btn-primary">{{ __("Réception de la commande") }}</button></a>
                           
                        </button>
                            @endforeach 

                            <h3>Commandes passées: </h3>
                            @foreach($commandes_fin as $commande)
                            <li>
                            <p>Commande du {{$commande->heure_commande}}</p>
                                @foreach($commande->ligneCommandes as $ligne)
                                    <p>{{$ligne->quantite}} "{{$ligne->ligne_plat->nom}}" à {{$ligne->ligne_plat->prix}}€</p>
                                @endforeach
                            </li>
                          
                            @endforeach 
                           
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