@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __("S'inscrire") }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer Mdp') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div id="labelselectrole" class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Vous êtes') }}</label>

                                <select name="role" id="lerole" class="form-control col-md-6">
                                    <option value="">__</option>
                                    <option value="1">Client</option>
                                    <option value="2">Restaurateur</option>
                                </select>

                            </div>

                            <div id="divInfoClient" class="form-group" style="display: none;">
                                <label>{{__('Nom')}}</label>
                                <input name="nomC" class="form-control" type="text">

                                <label>{{__('Prenom')}}</label>
                                <input name="prenomC" class="form-control" type="text">

                                <label>{{__('Adresse Postale')}}</label>
                                <input name="adressePostaleC" class="form-control" type="text">

                                <label>{{__('Solde')}}</label>
                                <input name="soldeC" class="form-control" type="number">
                            </div>

                            <div id="divInfoResto" class="form-group" style="display: none;">
                                <label for="restoNom">{{__('Nom du Restaurant')}}</label>
                                <input name="nomR" class="form-control" type="text">

                                <label for="restoLogo">{{__('Logo')}}</label>
                                <input name="logoR" class="py-1 d-flex" type="file" accept="image/png, image/jpeg">

                                <label for="restoContact">{{__('Adresse e-mail de contact')}}</label>
                                <input name="adresseContactR" class="form-control" type="text">


                                <label for="restoAddresse">{{__('Adresse Postale')}}</label>
                                <input name="adressePostaleR" class="form-control" type="text">
                        </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __("S'inscrire") }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#lerole").on('change', function(){
                if ($(this).val() == "1") {
                    $("#divInfoClient").slideDown();
                    $("#divInfoClient input").attr("required", true);

                    $("#divInfoResto").slideUp();
                    $("#divInfoResto input").attr("required", false);

                } else if ($(this).val() == "2") {
                    $("#divInfoResto").slideDown();
                    $("#divInfoResto input").attr("required", true);

                    $("#divInfoClient").slideUp();
                    $("#divInfoClient input").attr("required", false);

                } else {
                    $("#divInfoResto").slideUp();
                    $("#divInfoClient").slideUp();
                }
            });
        });
    </script>
@endsection