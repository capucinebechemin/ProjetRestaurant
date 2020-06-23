@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="modal-title">Gestion du profil</div>

                        <form method="POST" action="{{ route('client.insert_note') }}" enctype="multipart/form-data">

                            @csrf
                    
                            <div class="form-group row">

                            
                            <label class="col-md-4 col-form-label text-md-right" for="note">Note</label><br>
                                <div class="col-md-6">
                                    <input id="note" class="form-control @error('note') is-invalid @enderror" type="number" name="note" >

                                    @error('note')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Veuillez remplir ce champ</strong>
                                    </span>
                                    @enderror
                                </div>

                                <label class="col-md-4 col-form-label text-md-right" for="avis">Avis</label><br>
                                <div class="col-md-6">
                                    <input id="avis" class="form-control @error('avis') is-invalid @enderror" type="text" name="avis" >

                                    @error('avis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Veuillez remplir ce champ</strong>
                                    </span>
                                    @enderror
                                </div>

                               

                                
                                <input id="id_client" type="hidden" name="id_client" value="{{$client->id}}">
                                <input id="commande_id" type="hidden" name="commande_id" value="{{$commande_id}}">     

        
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

@section('back')
    <a href="/coupfaim/public/home" title="Page d'avant"> <img style="height: 25px; padding-right: 2%" src="{{asset('storage/' . 'uploads/undo.png')}}" alt="Back"></a>
@endsection
