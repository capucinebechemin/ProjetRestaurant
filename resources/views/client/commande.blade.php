@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="modal-title">Commande</div>
                <div style="display: flex; flex-direction: row; justify-content: space-between">
                    <div>
                        <h2>{{$resto->nom_restaurant}}</h2>
                    </div>
                    <div>
                        <img src="{{ asset('storage/' . $resto->logo) }}" class="img-thumbnail" alt="" style="height: 100px">
                    </div>
                </div>
                <div style="display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center">
                    @foreach($plats as $plat)
                        <div style="
                                         margin: 20px;
                                         position: relative;
                                         width: 300px;
                                         height: 300px;
                                         overflow: hidden;
                                         text-align: center">

                            <span>{{$plat->nom}}<br><b>{{$plat->prix}}€</b></span>


                            <img src="{{asset('storage/' . $plat->photo)}}" alt="{{$plat->nom}}"
                                 style= "
                                             position: absolute;
                                             max-height: 70%;
                                             max-width: 70%;
                                             top: 50%;
                                             left: 50%;
                                             transform: translate( -50%, -50%);">

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection