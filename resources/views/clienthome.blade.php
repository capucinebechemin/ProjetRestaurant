@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="modal-title">Accueil Client</div>

                <div style="display: flex; flex-direction: row; justify-content: space-between">
                    <div>
                        @if($user->role == 3)
                        @else
                            <a href="{{ route('client.profile') }}" title="Gestion Profil"><img style="height: 50px" src="{{asset('storage/' . 'uploads/person.png')}}" alt="Gestion profil"></a>
                        @endif

                        <h3>Bienvenue {{$client->prenom}} {{$client->nom}}</h3>
                     
                        <p>Vous disposez de {{$client->solde}}€</p>

                        <h2>Commandes</h2>
                       
                        <h3>Commande en cours :</h3>
                        <div style="display: flex; flex-direction: column">
                            @if($commandes->isEmpty())
                                <p>Vous n avez pas de commandes en cours</p>
                            @else
                                @foreach($commandes as $commande)
                                <div>
                                    <b>Commande du {{$commande->heure_commande}}</b>
                                    @foreach($commande->ligneCommandes as $ligne)
                                        <p>{{$ligne->quantite}} "{{$ligne->ligne_plat->nom}}" à {{$ligne->ligne_plat->prix}}€</p>
                                    @endforeach

                                    <a href="{{ route('client.note',$commande->id) }}" title="Reception">
                                        <button style="margin-bottom: 20%" type="button"  class="btn btn-primary">{{ __("J'ai reçu la commande") }}</button>
                                    </a>
                                </div>
                                @endforeach
                            @endif
                        </div>


                            <h3>Commandes passées: </h3>
                            @if($commandes_fin->isEmpty())
                                <p>Vous n avez pas de commandes reçues</p>
                            @else
                                @foreach($commandes_fin as $commande)

                                <b>Commande du {{$commande->heure_commande}}</b>
                                    @foreach($commande->ligneCommandes as $ligne)
                                        <p>{{$ligne->quantite}} "{{$ligne->ligne_plat->nom}}" à {{$ligne->ligne_plat->prix}}€</p>
                                    @endforeach

                                @endforeach
                            @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('back')
    @if($user->role == 3)
        <a href="/coupfaim/public/admin/client" title="Page Précédente"> <img style="height: 25px; margin-bottom: 2%" src="{{asset('storage/' . 'uploads/undo.png')}}" alt="Back"></a>
    @else
        <a href="/coupfaim/public" title="Page Précédente"> <img style="height: 25px; margin-bottom: 2%" src="{{asset('storage/' . 'uploads/undo.png')}}" alt="Back"></a>
    @endif
@endsection