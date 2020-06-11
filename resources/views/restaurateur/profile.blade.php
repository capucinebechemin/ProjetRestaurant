@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="modal-title">Gestion du profil</div>

                        <form method="POST" action="{{ route('restaurateur.update') }}" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="nom">Nom du restaurant</label><br>
                                <div class="col-md-6">
                                    <input id="nom" class="form-control @error('nom') is-invalid @enderror" type="text" name="nom" value="{{$resto->nom_restaurant}}">

                                    @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Veuillez remplir ce champ</strong>
                                    </span>
                                    @enderror
                                </div>

                                <label class="col-md-4 col-form-label text-md-right" for="logo">Logo</label><br>
                                <div class="col-md-6">
                                    <input id="logo" class="form-control @error('logo') is-invalid @enderror" type="file" name="logo" accept="image/png, image/jpeg" value="{{$resto->logo}}">
                                    @error('logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Veuillez remplir ce champ</strong>
                                    </span>
                                    @enderror
                                </div>

                                <label class="col-md-4 col-form-label text-md-right" for="mail">Adresse mail de contact</label><br>
                                <div class="col-md-6">
                                    <input id="mail" class="form-control @error('mail') is-invalid @enderror" type="text" name="mail" value="{{$resto->adresse_mail_contact}}">
                                    @error('mail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Veuillez remplir ce champ</strong>
                                    </span>
                                    @enderror
                                </div>

                                <label class="col-md-4 col-form-label text-md-right" for="adresse">Adresse</label><br>
                                <div class="col-md-6">
                                    <input id="adresse" class="form-control @error('adresse') is-invalid @enderror" type="text" name="adresse" value="{{$resto->adresse}}">
                                    @error('adresse')
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
