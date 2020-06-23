@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12" style="display: flex; flex-direction: column;">

                <div class="modal-title">Note de la commande</div>

                        <form method="POST" action="{{ route('client.insert_note') }}" enctype="multipart/form-data">

                            @csrf
                    
                            <div class="form-group row" style="margin-top: 2%; float: left;">

                                <label class="col-md-4 col-form-label text-md-right" for="note">Note /5</label><br>
                                <div class="col-md-6" style="margin-bottom: 2%;">
                                    <input id="note" class="form-control" style="width: 70px" type="number" max="5" min="0" name="note" required>
                                </div>

                                <label class="col-md-4 col-form-label text-md-right" for="avis">Avis</label><br>
                                <div class="col-md-6">
                                    <input id="avis" class="form-control" type="text" name="avis" >
                                </div>

                                <input id="id_client" type="hidden" name="id_client" value="{{$client->id}}">
                                <input id="commande_id" type="hidden" name="commande_id" value="{{$commande->id}}">
        
                                <div class="form-group row mb-0" style="margin: 2%">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __("Valider") }}
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </form>

                <div style="display: flex; flex-direction: column; margin-top: 2%;">
                    <b>Commande du {{$commande->heure_commande}}</b>

                    @foreach($commande->ligneCommandes as $ligne)
                        <div style="display: flex; flex-direction: row; margin: 2%;">
                            <div style="width: 33%;">
                                <img src="{{asset('storage/' . $ligne->ligne_plat->photo)}}" alt="{{$ligne->ligne_plat->nom}}"
                                     style= "
                                          width: 50%;">
                            </div>
                            <div style="align-self: center;">
                                <p>{{$ligne->ligne_plat->nom}}</p>
                                <p>{{$ligne->ligne_plat->prix}}€  x{{$ligne->quantite}}<br></p>
                            </div>
                        </div>

                    @endforeach
                </div>

            </div>
        </div>
    </div>

@endsection

@section('back')
    <a href="/coupfaim/public/home" title="Page d'avant"> <img style="height: 25px; padding-right: 2%" src="{{asset('storage/' . 'uploads/undo.png')}}" alt="Back"></a>
@endsection
