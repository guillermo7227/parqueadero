<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Parqueadero 4 Ruedas</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
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
                font-size: 64px;
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
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Inicio</a>
                    @else
                        <a href="{{ route('login') }}">Acceder</a>

                        <div style="margin-top: 10px; color: green">
                             <i class="fa fa-arrow-up"></i> <b>Empezar Aquí</b> <i class="fa fa-arrow-up"></i>
                        </div>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registrarse</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                {{-- <img src="{{asset('images/parking.jpg')}}" width="300"> --}}
                <div class="title m-b-md">
                    Parqueadero 4 Ruedas
                </div>
                <h2>Prueba hecha por Guillermo Agudelo</h2>
                <h3 style="margin-bottom: 70px">Para Gradiweb</h3>

                <div class="links">
                    <a href="https://guillermoagudeloga" target="_blank"><i class="fa fa-file"></i> Currículo</a>
                    <a href="mailto:guille.agudelo@gmail.com" target="_blank"><i class="fa fa-envelope"></i> Email</a>
                    <a href="https://github.com/guillermo7227/parqueadero" target="_blank"><i class="fa fa-code"></i> Repositorio</a>
                </div>
            </div>
        </div>
    </body>
</html>
