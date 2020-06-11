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
                        <a href="{{ url('/home') }}">Accueil</a>
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

                <div class="links">
                    <p>Coup Faim fait le lien entre les restaurants et vous pour le bonheur de vos papilles !</p>
                </div>

                <div style="display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center">
                    @foreach($restaurants as $resto)
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
                    @endforeach
                </div>

            </div>
        </div>
    </body>
</html>
