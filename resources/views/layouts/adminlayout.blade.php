<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Dashboard</title>


    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    <style>
      .pre-scrollable {
        max-height: 100% !important;
      }

      .alert {
        padding: 10px;
        width: 48.8%;
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

      .active {
        color: #10237b !important;
      }

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      .sidebar .nav-link:hover {
        font-weight: bold;
        color: #3490dc;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

</head>
<body>
    <div id="app">
    @if(session()->has('adminID'))
        <nav class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" style="background: #0f4473;">
            <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="/admin">Admin Dashboard</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                <a class="nav-link" href="/admin/logout">Sign out</a>
                </li>
            </ul>
        </nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="pt-3 pre-scrollable">
        <ul class="nav">
          <li class="nav-item w-100">
            <a class="nav-link font-weight-bold {{ Request::path() == 'admin' ? 'active text-primary shadow border-0' : '' }}" class="font-weight-bold" aria-current="page" href="/admin">
              <span data-feather="home" class="font-weight-bold"></span>
              Dashboard
            </a>
          </li>
          </ul>


          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span class="font-weight-bold">CUSTOMERS</span>
            <a class="link-secondary" href="#" aria-label="Add a new flight">
                <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item w-100">
              <a class="nav-link font-weight-bold {{ Request::path() == 'customer/getcustomer' ? 'active text-primary shadow border-0' : '' }}" href="/customer/getcustomer">
                <span></span>
                View Customers
              </a>
            </li>
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span class="font-weight-bold">Flights</span>
            <a class="link-secondary" href="#" aria-label="Add a new flight">
                <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column">
            <li class="nav-item w-100">
              <a class="nav-link font-weight-bold {{ Request::path() == 'flights/create' ? 'active text-primary shadow border-0' : '' }}" href="/flights/create">
                <span></span>
                Schedule Flight
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link font-weight-bold {{ Request::path() == 'flights' ? 'active text-primary shadow border-0' : '' }}" href="/flights">
                <span></span>
                Update Flight Schedule
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link font-weight-bold {{ Request::path() == 'flights/deleteflights' ? 'active text-primary shadow border-0' : '' }}" href="/flights/deleteflights">
                <span></span>
                Delete Flight
              </a>
            </li>
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span class="font-weight-bold">Aircrafts</span>
            <a class="link-secondary" class="font-weight-bold" href="#" aria-label="Add a new aircraft">
                <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column">
            <li class="nav-item w-100">
              <a class="nav-link font-weight-bold {{ Request::path() == 'aircraftdetails/create' ? 'active text-primary shadow border-0' : '' }}" href="/aircraftdetails/create">
                <span class="font-weight-bold"></span>
                Add Aircrafts
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link font-weight-bold {{ Request::path() == 'aircraftdetails' ? 'active text-primary shadow border-0' : '' }}" href="/aircraftdetails">
                <span class="font-weight-bold"></span>
                View Aircrafts
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link font-weight-bold {{ Request::path() == 'aircraftdetails/activateaircraftid/edit' ? 'active text-primary shadow border-0' : '' }}" href="/aircraftdetails/activateaircraftid/edit">
                <span></span>
                Activate Aircraft
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link font-weight-bold {{ Request::path() == 'aircraftdetails/aircraftid/edit' ? 'active text-primary shadow border-0' : '' }}" href="/aircraftdetails/aircraftid/edit">
                <span data-feather="layers"></span>
                Deactivate Aircraft
              </a>
            </li>
          </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span class="font-weight-bold">Tickets</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
            </a>
         </h6>

         <ul class="nav flex-column">
          <li class="nav-item w-100">
                  <a class="nav-link font-weight-bold {{ Request::path() == 'admin/viewbookedtickets' ? 'active text-primary shadow border-0' : '' }}" href="/admin/viewbookedtickets">
                    Booked Tickets
                  </a>
              </li>
              <li class="nav-item w-100">
                  <a class="nav-link font-weight-bold {{ Request::path() == 'admin/complete' ? 'active text-primary shadow border-0' : '' }}" href="/admin/complete">
                    Make Completed
                  </a>
              </li>
              <li class="nav-item w-100">
                  <a class="nav-link font-weight-bold {{ Request::path() == 'tickets/showavailableticketsform' ? 'active text-primary shadow border-0' : '' }}" href="/tickets/showavailableticketsform">
                    Available Seats
                  </a>
              </li>
         </ul>

         <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span class="font-weight-bold">Passengers</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
            </a>
         </h6>

         <ul class="nav flex-column">
          <li class="nav-item w-100">
                  <a class="nav-link font-weight-bold {{ Request::path() == 'passengers/pform' ? 'active text-primary shadow border-0' : '' }}" href="/passengers/pform">
                    View Passengers
                  </a>
              </li>
         </ul>

         <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span class="font-weight-bold">Payments</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
            </a>
         </h6>

         <ul class="nav flex-column mb-4">
          <li class="nav-item w-100">
                  <a class="nav-link font-weight-bold {{ Request::path() == 'payment' ? 'active text-primary shadow border-0' : '' }}" href="/payment">
                    View Payments
                  </a>
              </li>
         </ul>

         <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span class="font-weight-bold">Posts</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
            </a>
         </h6>
         <ul class="nav flex-column mb-4">
          <li class="nav-item w-100">
                  <a class="nav-link font-weight-bold {{ Request::path() == 'blog' ? 'active text-primary shadow border-0' : '' }}" href="/blogs">
                    View Posts
                  </a>
              </li>

              <li class="nav-item w-100">
                <a class="nav-link font-weight-bold {{ Request::path() == 'blog/create' ? 'active text-primary shadow border-0' : '' }}" href="/blog/create">
                  Create Post
                </a>
            </li>
         </ul>

      </div>
    </nav>
   </div>
   </div>
   @endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>
