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
                            <p>Nombre de restaurants : {{$nbr_resto}}</p>
                            </li>
                            <li>
                            <p>Nombre de commandes passées: {{$nbr_commande_fini}}</p>
                            </li>
                            <li>
                            <p>Nombre de commandes en cours : {{$nbr_commande}}</p>
                            </li>
                            <li>
                            <p>Revenu total : {{$revenu}} €</p>
                            </li>
                    </ul>
                      
                    <a href="{{ route('admin.client') }}" title="gestion client"><button style="margin: 2%" type="button" class="btn btn-primary">Gestion clients</button></a>
                    <br>
                    <a href="{{ route('admin.restaurateur') }}" title="gestion restaurateur"> <button style="margin: 2%" type="button" class="btn btn-primary">Gestion restaurateurs</button></a>
                    <br>

                    
                        </div>
                      
                    </div>


                </div>
            </div>
        </div>
@endsection

@section('back')
    <a href="./" title="Page précédente"> <img style="height: 25px" src="{{asset('storage/' . 'uploads/undo.png')}}" alt="Back"></a>
@endsection
