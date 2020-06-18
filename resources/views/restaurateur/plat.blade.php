@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                    <div class="modal-title">{{ __("Création plat") }}</div>

                        <form method="POST" action="{{ route('restaurateur.store') }}" enctype="multipart/form-data">

                            @csrf
                        
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="nom">Nom du plat</label><br>
                                <div class="col-md-6">
                                    <input id="nom" class="form-control @error('nom') is-invalid @enderror" type="text" name="nom" >
                                    @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>Veuillez remplir ce champ</strong>
                                    </span>
                                    @enderror
                                </div>

                                <label class="col-md-4 col-form-label text-md-right" for="prix">Prix du plat</label><br>
                                <div class="col-md-6">
                                    <input id="prix" class="form-control @error('prix') is-invalid @enderror" type="number" name="prix" >
                                    @error('prix')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>Veuillez remplir ce champ</strong>
                                    </span>
                                    @enderror
                                </div>

                                <label class="col-md-4 col-form-label text-md-right" for="photo">Photo</label><br>
                                <div class="col-md-6">
                                    <input id="photo" class="form-control @error('photo') is-invalid @enderror" type="file" name="photo" accept="image/png, image/jpeg">
                                    @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>Veuillez remplir ce champ</strong>
                                    </span>
                                    @enderror
                                </div>
                                <input id="id_restaurateur" type="hidden" name="id_restaurateur" value="{{$resto->id}}">
                               

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __("Valider") }}
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <a href="/coupfaim/public/home" title="Page d'avant"> <img style="height: 50px" src="{{asset('storage/' . 'uploads/back.png')}}" alt="Back"></a>
                </div>
            </div>
        </div>
    </div>

@endsection
