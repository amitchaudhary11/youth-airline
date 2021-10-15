@extends('layouts.adminlayout')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-9 ml-sm-auto col-lg-10 px-md-4 pt-2">
        <div>
          <h1 class="h2">Dashboard</h1>
        </div>
        <hr>

    </div>

    <div class="col-md-9 ml-sm-auto col-lg-10 px-md-4 pt-2">
        <div class="row">
            <div class="col-sm-12 col-md-3 mb-2">
                <div class="card shadow h-100 py-2" style="border: none !important; cursor: pointer;" onclick="location.href = '{{ route('customers.getcustomer') }}'">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Customers
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalCustomers }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-user fa-3x text-secondary" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 mb-2">
                <div class="card shadow h-100 py-2" style="border: none !important; cursor: pointer;" onclick="location.href = '{{ route('flights.index') }}'">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Flights
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalFlights }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-plane fa-3x text-secondary" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 mb-2">
                <div class="card shadow h-100 py-2" style="border: none !important; cursor: pointer;" onclick="location.href = '{{ route('aircraftdetails.index') }}'">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Aircrafts
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalAircrafts }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-plane fa-3x text-secondary" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 mb-2">
                <div class="card shadow h-100 py-2" style="border: none !important; cursor: pointer;" onclick="location.href = '{{ route('posts.showBlog') }}'">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Posts
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPosts }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-file-text fa-3x text-secondary" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
