@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <p>Bienvenue cher restaurateur</p>
                    </div>
                    
                    <div class="row">
                        <div class="col-12"><img src="{{ asset('storage/' . $resto->logo) }}" class="img-thumbnail"></div>
                    </div>


                    <div class='info-resto'>
                    <ul>
                        <li>
                            <p>{{$resto->adresse}}</p>
                        </li>
                    </ul>
                    </div>



                </div>
            </div>
        </div>
    </div>
@endsection