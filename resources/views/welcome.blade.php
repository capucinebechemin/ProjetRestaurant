<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CoupFaim</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                margin: 0;
            }


            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
                margin-top: 60px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Mon Profil</a>
                    @else
                        <a href="{{ route('login') }}">Se connecter</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">S'inscire</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    CoupFaim
                </div>


                @if(\Auth::user())
                    @if(\Auth::user()->role == 2)
                        <div class="links">
                            <p>Merci de votre contribution chez Coup'faim, vous pouvez ajouter de nouveau plat dans votre profil pour nous régaler! <br> Vous y trouverez les commandes passée et en attentes de nos clients. N'oubliez pas de confirmer leur envoi. <br>Bonne journée pleine de saveurs!</p>
                        </div>
                        <div>
                            <img src="{{asset('storage/' . 'uploads/cart.png')}}" style="width: 40%;">
                        </div>

                    @elseif(\Auth::user()->role == 3)
                        <div class="links">
                            <p>Bienvenue, vous êtes dans l'administration de Coup'Faim</p>
                        </div>
                        <div>
                            <img src="{{asset('storage/' . 'uploads/cart.png')}}" style="width: 40%;">
                        </div>
                    @else
                        <div class="links">
                            <p>Coup'faim fait le lien entre les restaurants et vous pour le bonheur de vos papilles !</p>
                        </div>
                        <div style="display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center">
                            @foreach($restaurants as $resto)
                                <a style="text-decoration: none; color: #1b1e21" href="{{ route('client.commande', $resto->id)}}">
                                    <div style="
                                             margin: 50px;
                                             position: relative;
                                             width: 300px;
                                             height: 300px;
                                             overflow: hidden;">
                                        <p>{{$resto->nom_restaurant}}</p>
                                        <img src="{{asset('storage/' . $resto->logo)}}" alt="{{$resto->nom_restaurant}}"
                                                 style= "
                                                     position: absolute;
                                                     max-height: 70%;
                                                     max-width: 70%;
                                                     top: 50%;
                                                     left: 50%;
                                                     transform: translate( -50%, -50%);">
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endif
                @else
                    <div class="links">
                        <p>Coup'faim fait le lien entre les restaurants et vous pour le bonheur de vos papilles !</p>
                        <p>Connectez-vous pour commander</p>
                    </div>
                    <div style="display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center">
                        @foreach($restaurants as $resto)
                            <a style="text-decoration: none; color: #1b1e21" href="{{ route('client.commande', $resto->id)}}">
                                <div style="
                                             margin: 50px;
                                             position: relative;
                                             width: 300px;
                                             height: 300px;
                                             overflow: hidden;">
                                    <p>{{$resto->nom_restaurant}}</p>
                                    <img src="{{asset('storage/' . $resto->logo)}}" alt="{{$resto->nom_restaurant}}"
                                         style= "
                                                     position: absolute;
                                                     max-height: 70%;
                                                     max-width: 70%;
                                                     top: 50%;
                                                     left: 50%;
                                                     transform: translate( -50%, -50%);">
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif

            </div>
        </div>
    </body>
</html>
