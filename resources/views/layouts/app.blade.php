<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>


    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo.png') }}">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    {{-- icheck bootstrap --}}
    <link rel="stylesheet" href="{{ asset('css/icheck-bootstrap.min.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>

        .disabled-warning {
            background-color: rgb(51, 82, 218);
            width: 35px;
            height: 35px;
            border-radius: 20%;
            border-color: rgb(51, 82, 218);
            margin-top: 2px;
            margin-bottom: 2px;
        }

        .notdisabled-warning{
            background-color: rgb(51, 215, 236);
            width: 35px;
            height: 35px;
            border-radius: 20%;
            border-color: rgb(51, 215, 236);
            margin-top: 2px;
            margin-bottom: 2px;
        }

        input::placeholder {
            color: #c3c7ca !important;
            opacity: 1;
        }

        .col-form-label, .form-check-label {
            color: #67696b;
        }

        #departure_date {
            color: #c3c7ca;
        }

.table th, .table td{
    vertical-align: middle !important;
}
.search-box {
    display: inline-block;
}

    .search-box input {
            width: 350px;
    border-radius: 33px;
    border: none;
    height: 40px;
    padding-left: 20px;
    padding-right: 40px;
    letter-spacing: 0;
    background: #f3eeff;

}

.ti-search:before {
	content: "\e610";
}

    .alert {
        padding: 10px;
        width: 50%;
        background-color: #f44336;
        color: white;
    }

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }

    .navbar .nav-link:hover {
        color: #3490dc !important;
    }


    .service .card:hover {
        box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px !important;
    }

    .my-links li a:hover {
        color: #c5c5dd !important;
    }

       /* invoice */
       .invoice-date {
            margin-top: 20px;
        }

        .invoice-buttons a {
            padding: 12px 12px;
        }

        /*-------------------- 22. Invoice ------------------- */
        .invoice-area {}

        .invoice-head {
            margin-bottom: 30px;
            border-bottom: 1px solid #efebeb;
            padding-bottom: 20px;
        }

        .invoice-head .iv-left span {
            color: #444;
        }

        .invoice-head span {
            font-size: 21px;
            font-weight: 700;
            color: #777;
        }

        .invoice-address h3 {
            font-size: 24px;
            text-transform: uppercase;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
        }

        .invoice-address h5 {
            font-size: 17px;
            margin-bottom: 10px;
        }

        .invoice-address p {
            font-size: 15px;
            color: #555;
        }

        .invoice-date li {
            font-size: 15px;
            color: #555;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .invoice-table {}

        .invoice-table .table-bordered td,
        .invoice-table .table-bordered th {
            border: 1px solid rgba(120, 130, 140, 0.13) !important;
            border-left: none !important;
            border-right: none !important;
        }

        .invoice-table tr td {
            color: #666;
        }

        .invoice-table tfoot tr td {
            text-transform: uppercase;
            font-weight: 600;
            color: #444;
        }

        .invoice-buttons a {
            display: inline-block;
            font-size: 15px;
            color: #fff;
            background: #815ef6;
            padding: 12px 19px;
            border-radius: 3px;
            text-transform: capitalize;
            font-family: 'Lato', sans-serif;
            font-weight: 600;
            letter-spacing: 0.03em;
            margin-left: 6px;
        }

        .invoice-buttons a:hover {
            background: #574494;
        }

        /*-------------------- END Invoice ------------------- */
        .card {
            border: none !important;
            box-shadow: 0px 0.5em 1em rgb(248 250 252) !important;
        }


        [class*=icheck-primary]>input[type=radio]:first-child+input[type=hidden]+label::before, [class*=icheck-primary]>input[type=radio]:first-child+label::before {
            border-radius: 20% !important;
        }

        [class*=icheck-primary]>input:first-child+input[type=hidden]+label::before, [class*=icheck-primary]>input:first-child+label::before {
            position: initial !important;
            width: 35px;
            height: 35px;
        }

        [class*=icheck-success]>input[type=radio]:first-child+input[type=hidden]+label::before, [class*=icheck-success]>input[type=radio]:first-child+label::before {
            border-radius: 20% !important;
        }

        [class*=icheck-success]>input:first-child+input[type=hidden]+label::before, [class*=icheck-success]>input:first-child+label::before {
            position: initial !important;
            width: 23px;
            height: 23px;
        }

        .move-left {
            position: absolute;
            top: 40%;
            left: -60px;
        }

        .stl {
            font-size: 50px;
            left: -20px;
            transform: scale(1.5,5);
            color: antiquewhite;
        }





        }
    </style>

</head>
<body id="#loading">

    <div id="app">
        <nav id="myID" class="navbar sticky-top navbar-expand-md navbar-light bg-white" onscroll="myFunc()">
            <div class="container py-2">
                <a class="navbar-brand" href="/customer">
                    <div class="d-flex pr-3">
                        <span style="color: #259292; font-size: 1.5rem;">Youth Airline</span>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @if(Auth::check())
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto mr-3">

                        <li class="nav-item pr-3"><a class="nav-link {{ Request::path() == 'customer' ? 'active text-primary' : '' }}" style="font-size: 1rem; color: #3a414e;" href="/customer"> Home </a></li>
                        <li class="nav-item pr-3"><a class="nav-link {{ Request::path() == 'customer/tickets' ? 'active text-primary' : '' }}" style="font-size: 1rem; color: #3a414e;" href="/customer/tickets"> My Tickets </a></li>
                        <li class="nav-item pr-3"><a class="nav-link {{ Request::path() == 'searchflights' ? 'active text-primary' : '' }}" style="font-size: 1rem; color: #3a414e;" href="/searchflights"> Book Tickets </a></li>
                        <li class="nav-item pr-3"><a class="nav-link {{ Request::path() == 'tickets/cancel' ? 'active text-primary' : '' }}" style="font-size: 1rem; color: #3a414e;" href="/tickets/cancel"> Cancel Tickets </a></li>
                        <li class="nav-item pr-3"><a class="nav-link {{ Request::path() == 'blog' ? 'active text-primary' : '' }}" style="font-size: 1rem; color: #3a414e;" href="/blog"> Blogs </a></li>
                        <li class="nav-item"><a class="nav-link {{ Request::path() == 'customer/contact' ? 'active text-primary' : '' }}" style="font-size: 1rem; color: #3a414e;" href="/customer/contact"> Contact Us </a></li>

                    </ul>
                    @endif
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" style="font-size: 1rem; color: #145082;" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link font-weight-bold" style="font-size: 1rem; color: #3f9ae5;" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" style="font-size: 1rem;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>



        <main>
            @yield('content')
        </main>


@if(Auth::check())
<!-- Footer -->
<div style="background: #080827;" id="about">
<div class="container" style="padding-top: 7rem; padding-bottom: 10rem;">
            <div class="row pb-5">
                <div class="col-12 col-md-4 text-white">
                    <div>
                        <h4>About Us</h4>
                        <p style="font-size: 1.1rem; color: #c5c5dd;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, inventore autem facere sunt fugiat dolor reiciendis recusandae natus rerum suscipit explicabo ipsum unde, ab voluptates adipisci vel facilis officiis. Est!</p>
                    </div>
                </div>
                <div class="col-12 offset-lg-1 col-md-2 text-white">
                    <div>
                        <h4>Destination</h4>
                        <ul class="text-decoration-none list-unstyled my-links">
                            <li><a style="font-size: 1.1rem; color: #249494;" class="font-weight-normal text-decoration-none" href="#about">Kathmandu</a></li>
                            <li><a style="font-size: 1.1rem; color: #249494;" class="font-weight-normal text-decoration-none" href="#about">Nepalgunj</a></li>
                            <li><a style="font-size: 1.1rem; color: #249494;" class="font-weight-normal text-decoration-none" href="#about">Pokhara</a></li>
                            <li><a style="font-size: 1.1rem; color: #249494;" class="font-weight-normal text-decoration-none" href="#about">Dhangadhi</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-2 text-white">
                    <div>
                        <h4>Links</h4>
                        <ul class="text-decoration-none list-unstyled my-links">
                            <li><a style="font-size: 1.1rem; color: #249494;" class="font-weight-normal text-decoration-none" title="Blogs" href="/blog">Blogs</a></li>
                            <li><a style="font-size: 1.1rem; color: #249494;" class="font-weight-normal text-decoration-none" title="Contact Us" href="/customer/contact">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-3 text-white">
                    <div>
                        <h4>Get In Touch</h4>
                        <ul class="text-decoration-none list-unstyled my-links">
                            <li><a style="font-size: 1.1rem; color: #249494;" class="font-weight-normal text-decoration-none" href="#about"><i class="fa fa-phone fa-lg" aria-hidden="true"></i> &nbsp; +977 9804828376</a></li>
                            <li><a style="font-size: 1.1rem; color: #249494;" class="font-weight-normal text-decoration-none" href="#about"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp; example@gmail.com</a></li>
                            <li><a style="font-size: 1.1rem; color: #249494;" class="font-weight-normal text-decoration-none" href="#about"><i class="fa fa-map-marker fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp; Nepalgunj, Banke</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row pt-4 align-items-lg-baseline">
                <div class="col-md-8 col-8">
                    <p style="font-size: 1rem;" class="text-muted">&copy; 2020 Youth Airline. All Rights Reserved.</p>
                </div>
                <div class="col-md-4 col-4">
                    <ul class="list-unstyled">
                        <li class="d-inline p-2"><a href="https://www.facebook.com/chaudharyameet.kumarchaudhary"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a></li>
                        <li class="d-inline p-2"><a href="#"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
</div>
</div>
@endif


<script>

    window.onscroll = function() {myFunction()};
    function myFunction() {
        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
            document.getElementById("myID").style.boxShadow = "0 0.5rem 1rem rgba(0, 0, 0, 0.15)";
        } else {
            document.getElementById("myID").style.boxShadow = "";
        }
    }

</script>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if (Session::has('msg-success'))
    <script>
        swal("Great Job!","{!! Session::get('msg-success') !!}","success",{
            button:"OK",
        });
    </script>
@endif

@if (Session::has('msg2'))
    <script>
        swal("Hurray!","{!! Session::get('msg2') !!}","success",{
            button:"OK",
        });
    </script>
@endif

@if (Session::has('msg3'))
    <script>
        swal("Ticket Cancelled Successfully!","{!! Session::get('msg3') !!}","success",{
            button:"OK",
        });
    </script>
@endif
</body>
</html>
