<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Youth Airline</title>

        <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo.png') }}">


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

        <style>
            html, body {
                background-color: #f8fafc;
                color: #259292;
                font-family: 'Roboto', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }


            .full-height {
                height: 100vh;
            }

            .flex-center {
                display: flex;
                justify-content: center;
                align-items: center;
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
                font-size: 3rem;
                color: #675e5e;
            }

            .links > a {
                color: #5f5a5a;
                padding: 0 25px;
                font-size: 0.9rem;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .desc {
                color: #68686f;
                font-size: 1.5rem;
            }
            .card {
                border: none !important;
                
            }
        </style>
    </head>
    <body>
  
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/customer') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif



                        <div class="content">
                            <img src="{{ asset("images/logo.png") }}" height="70" alt="">
                            <div class="title m-b-md">
                                Welcome To Youth Airline
                            </div>
            
                            <div class="desc">
                                Book Your Flight Tickets From Here <br>
                                To Travel AnyWhere in Nepal
                            </div>
            
            
            
                           
                        </div>

        </div>
    </body>


</html>
