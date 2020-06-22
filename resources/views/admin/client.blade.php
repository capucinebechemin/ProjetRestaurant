@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="modal-title">Gestion Clients</div>


                    <div style="display: flex; flex-direction: row; justify-content: space-between">
                        <div>
                        <h1>Tableau de bord </h1>

                        @foreach($client as $client)
                        
                        <li class="list-group-item">
                            <a href="{{ route('admin.detail', $client->id_user) }}" title="{{ $client->nom }}">{{ $client->prenom }}{{ $client->nom }}</a>
        
                            <a href="{{ route('admin.modif_vue', $client->id_user) }}" title="Modification">/ Modification</a>
                        
                            <a href="{{ route('admin.suppr', $client->id_user) }}" title="Suppression">/ Suppression</a>
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
