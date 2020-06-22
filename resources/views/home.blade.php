@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="./" title="Page Précédente"> <img style="height: 25px" src="{{asset('storage/' . 'uploads/undo.png')}}" alt="Back"></a>
                <div class="modal-title">Bienvenue dans l'administation</div>


                    <div style="display: flex; flex-direction: row; justify-content: space-between">
                        <div>
                        <h1>Tableau de bord </h1>

                     
                     <ul>
                            <li>
                            <p>Nombre de restaurant : {{$nbr_resto}}</p>
                            </li>
                            <li>
                            <p>Nombre de commandes passées: {{$nbr_commande_fini}}</p>
                            </li>
                            <li>
                            <p>Nombre de commandes en cours : {{$nbr_commande}}</p>
                            </li>
                            <li>
                            <p>Revenu totale : {{$revenu}} €</p>
                            </li>
                    </ul>
                      
                    <button type="button" class="btn btn-secondary btn-lg"><a href="{{ route('admin.client') }}" title="gestion client">Gestion client</a></button> 
                    <br>
                    <button type="button" class="btn btn-secondary btn-lg"><a href="{{ route('admin.restaurateur') }}" title="gestion restaurateur">Gestion restaurateur</a></button> 

                    <br>

                    
                        </div>
                      
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
