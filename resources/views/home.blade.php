@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="modal-title">Bienvenue dans l'administation</div>


                    <div style="display: flex; flex-direction: row; justify-content: space-between">
                        <div>
                        <h1>Tableau de bord </h1>

                     
                     <ul>
                            <li>
                            <p>Nombre de restaurant : {{$nbr_resto}}</p>
                            </li>
                            <li>
                            <p>Nombre de commandes passées: {{$nbr_resto}}</p>
                            </li>
                            <li>
                            <p>Nombre de commandes en cours : {{$nbr_resto}}</p>
                            </li>
                            <li>
                            <p>Revenu totale : {{$nbr_resto}}</p>
                            </li>
                    </ul>
                      
                        </div>
                        <div>
                        
                        <a href="{{ route('admin.client') }}" title="gestion client">Gestion client</a>
                        <a href="{{ route('admin.restaurateur') }}" title="gestion restaurateur">Gestion restaurateur</a>






                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
