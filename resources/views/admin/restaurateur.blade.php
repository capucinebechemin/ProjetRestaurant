@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="modal-title">Gestion restaurateur</div>


                    <div style="display: flex; flex-direction: row; justify-content: space-between">
                        <div>
                        <h1>Tableau de bord </h1>

                   
                        @foreach($resto as $resto)
                        
                        <li class="list-group-item">
                            <a href="{{ route('admin.resto', $resto->id_user) }}" title="{{ $resto->nom_restaurant }}">{{ $resto->nom_restaurant }}</a>
        
                            <a href="{{ route('admin.modif_vue_resto', $resto->id_user) }}" title="Modification">/ Modification</a>
                        
                            <a href="{{ route('admin.suppr_resto', $resto->id_user) }}" title="Suppression">/ Suppression</a>
                        </li>
                       
                    @endforeach
                    <a href="/coupfaim/public/home" title="Page Précédente"> <img style="height: 25px" src="{{asset('storage/' . 'uploads/undo.png')}}" alt="Back"></a>
                        </div>
                        <div>
                       




                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
