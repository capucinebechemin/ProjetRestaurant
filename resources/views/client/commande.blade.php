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
                <form name="myform" method="POST" action="{{ route('client.envoi_commande')}}" enctype="multipart/form-data">

                    @csrf
                    <div style="display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center">
                            @foreach($plats as $plat)
                                <div style="
                                             margin: 20px;
                                             position: relative;
                                             width: 300px;
                                             height: 300px;
                                             overflow: hidden;
                                             text-align: center">

                                    <div style="display: flex; flex-direction: row; justify-content: space-around; width: 100%">
                                        <div style="display: flex; flex-direction: column; justify-content: space-around">
                                            <p>{{$plat->nom}}</p>
                                            <b>{{$plat->prix}}€</b>
                                        </div>

                                        <div style="display: flex; flex-direction: column; justify-content: space-around">
                                            <label>{{__('Quantite')}}</label>
                                            <input id="quantite" name="quantite[]" class="form-control" type="number" max="50" min="0" value="0">
                                            <input id="plat" name="plat[]" class="form-control" type="text" value="{{$plat->nom}}" hidden>
                                            <input id="prix" name="prix[]" class="form-control" type="text" value="{{$plat->prix}}" hidden>
                                            <input id="idplat" name="idplat[]" class="form-control" type="text" value="{{$plat->id}}" hidden>
                                            <input id="restaurateur_id" type="hidden" name="restaurateur_id" value="{{$resto->id}}">
                                        </div>
                                    </div>

                                    <img src="{{asset('storage/' . $plat->photo)}}" alt="{{$plat->nom}}"
                                         style= "
                                                 position: absolute;
                                                 max-height: 50%;
                                                 max-width: 50%;
                                                 top: 50%;
                                                 left: 50%;
                                                 transform: translate( -50%, -50%);">

                                </div>
                            @endforeach
                    </div>
                        <button style="background-color: #88C057; border-color: #88C057" onclick="check(); return false" class="btn btn-primary">
                            {{ __("Confirmer la commande") }}
                        </button>
                        <p id="check"></p>
                        <p id="prixtotal"></p>
                        <p>* Les frais de livraison s'élève à 2.50€ par commande.</p>
                        <p id="soldeok"></p>
                        <button id="confirmer" onclick="payer()" style="margin-bottom: 20%; display: none;" type="submit" class="btn btn-primary">
                            {{ __("Payer la commande") }}
                        </button>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('back')
    <a href="/coupfaim/public" title="Page Précédente"> <img style="height: 25px; margin-bottom: 2%" src="{{asset('storage/' . 'uploads/undo.png')}}" alt="Back"></a>
@endsection

@section('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        function check() {
            var lesplats = document.querySelectorAll("[id='plat']");
            var laquantite = document.querySelectorAll("[id='quantite']");
            var leprix = document.querySelectorAll("[id='prix']");
            var prixtotal = 0;

            document.getElementById("check").innerHTML = "";
            document.getElementById("prixtotal").innerHTML = "";
            document.getElementById("confirmer").style.display = "none";
            document.getElementById("soldeok").innerHTML = "";

            for (let i=0; i<lesplats.length; i++){
                if (laquantite[i].value !== "0"){
                    var prix = parseInt(laquantite[i].value) * parseInt(leprix[i].value);
                    document.getElementById("check").innerHTML += '<br>' + leprix[i].value +'€'+ ' x' + laquantite[i].value + ' = ' + prix +'€ .......... '+ lesplats[i].value;
                    prixtotal += prix;
                }
            }

            if (prixtotal !== 0){
                document.getElementById("prixtotal").innerHTML = 'Sous Total : ' + prixtotal + '€';
                prixtotal += 2.5;
                if (prixtotal <= parseInt({{$client->solde}})){
                    document.getElementById("confirmer").style.display = "block";
                }else {
                    document.getElementById("soldeok").innerHTML = "Vous n'avez pas assez d'argent.";
                }
            }else{
                document.getElementById("soldeok").innerHTML = "Vous n'avez rien commandé.";
            }
        }
    </script>
@endsection