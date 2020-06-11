@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="modal-title">Gestion du profil</div>

                        <form method="POST" action="{{ route('client.update') }}" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')
                            <div class="form-group row">

                            
                            <label class="col-md-4 col-form-label text-md-right" for="prenom">Prénom</label><br>
                                <div class="col-md-6">
                                    <input id="prenom" class="form-control @error('prenom') is-invalid @enderror" type="text" name="prenom" value="{{$client->prenom}}">

                                    @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Veuillez remplir ce champ</strong>
                                    </span>
                                    @enderror
                                </div>

                                <label class="col-md-4 col-form-label text-md-right" for="nom">Nom </label><br>
                                <div class="col-md-6">
                                    <input id="nom" class="form-control @error('nom') is-invalid @enderror" type="text" name="nom" value="{{$client->nom}}">

                                    @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Veuillez remplir ce champ</strong>
                                    </span>
                                    @enderror
                                </div>

                                <label class="col-md-4 col-form-label text-md-right" for="adresse">Adresse postale </label><br>
                                <div class="col-md-6">
                                    <input id="adresse" class="form-control @error('adresse') is-invalid @enderror" type="text" name="adresse" value="{{$client->adresse}}">

                                    @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Veuillez remplir ce champ</strong>
                                    </span>
                                    @enderror
                                </div>
                               

                                <label class="col-md-4 col-form-label text-md-right" for="solde">Solde</label><br>
                                <div class="col-md-6">
                                    <input id="solde" class="form-control @error('solde') is-invalid @enderror" type="number" name="solde" value="{{$client->solde}}">
                                    @error('solde')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Veuillez remplir ce champ</strong>
                                    </span>
                                    @enderror
                                </div>

        
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __("Valider") }}
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
