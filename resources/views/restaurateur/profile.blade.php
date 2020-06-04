@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __("Gestion du profil") }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('restaurateur.update') }}" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="nom">Nom du restaurant</label><br>
                                <div class="col-md-6">
                                    <input id="nom" class="form-control" type="text" name="nom" value="{{$resto->nom_restaurant}}">

                                </div>

                                <label class="col-md-4 col-form-label text-md-right" for="logo">Logo</label><br>
                                <div class="col-md-6">
                                    <input id="logo" class="form-control" type="file" name="logo" accept="image/png, image/jpeg" value="{{$resto->logo}}">

                                </div>

                                <label class="col-md-4 col-form-label text-md-right" for="mail">Adresse mail de contact</label><br>
                                <div class="col-md-6">
                                    <input id="mail" class="form-control" type="text" name="mail" value="{{$resto->adresse_mail_contact}}">

                                </div>

                                <label class="col-md-4 col-form-label text-md-right" for="adresse">Adresse</label><br>
                                <div class="col-md-6">
                                    <input id="adresse" class="form-control" type="text" name="adresse" value="{{$resto->adresse}}">

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
