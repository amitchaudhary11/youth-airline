@extends('layouts.app')

@section('title')
    Youth Airline
@endsection

@section('content')
<!-- <div style="background: url({{ asset('images/travel3.svg') }}) no-repeat"> -->
<div class="container">
    <div class="row pb-5">
        <div class="col-12 col-md-8 d-flex mb-3 d-flex flex-column justify-content-start">
            <h1 style="font-size: 3rem; color: #0f4473;" class="p-0"><br><br><span>Planning Trip To <br> AnyWhere in Nepal</span></h1>
            <div class="mt-3">
                <!-- <img src="{{ asset('images/travel2.svg') }}" alt="" style="max-width: 55%;">
                 -->
                 <a
                 style="font-size: 1.3em;"
                 class="text-decoration-none btn btn-primary btn-lg mt-4 py-3 px-5 rounded-pill shadow"
                 href="#about">
                 Learn More
                 </a>
            </div>
        </div>

        <div class="col-12 col-md-4 pt-4 pb-4 mt-4">
        <form action="/searchflights/show" method="post">
            @csrf
               <div class="form py-3 bg-white shadow">
               <div class="form-group col-11 m-auto">
                    <h4 style="color: #006699;">Search Flights</h4>
                </div>

                    <div class="form-group col-11 m-auto py-2">
                        <label for="from_city" class="text-secondary" style="font-size: 1rem;">Origin</label>
                        <input list="origin" id="from_city" placeholder="eg. Kathmandu" type="text" class="form-control @error('from_city') is-invalid @enderror" name="from_city" value="{{ old('from_city') }}" required autocomplete="from_city" autofocus>

                        <datalist id="origin">
                            <option value="Nepalgunj"></option>
                            <option value="Kathmandu"></option>
                            <option value="Dhangadhi"></option>
                            <option value="Pokhara"></option>
                            <option value="Chitwan"></option>
                        </datalist>

                        @error('from_city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-11 m-auto py-2">
                        <label for="to_city" class="text-secondary" style="font-size: 1rem;">Destination</label>
                        <input list="destination" id="to_city" type="text" placeholder="eg. Dhangadhi" class="form-control @error('to_city') is-invalid @enderror" name="to_city" value="{{ old('to_city') }}" required autocomplete="to_city" autofocus>


                        <datalist id="destination">
                            <option value="Nepalgunj"></option>
                            <option value="Kathmandu"></option>
                            <option value="Dhangadhi"></option>
                            <option value="Pokhara"></option>
                            <option value="Chitwan"></option>
                        </datalist>

                        @error('to_city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group col-11 m-auto py-2">

                        <label for="departure_date" class="text-secondary" style="font-size: 1rem;">Departure Date</label>

                        <input id="departure_date" onclick="this.style.color = '#495057';" class="form-control @error('departure_date') is-invalid @enderror" type="date" name="departure_date" value="{{ old('departure_date') }}" required autocomplete="departure_date">

                        @error('departure_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group col-11 m-auto py-2">
                        <label for="no_of_passenger" class="text-secondary" style="font-size: 1rem;">Travellers</label>
                        <input id="no_of_passenger" placeholder="eg. 1" type="number" class="dropdown-toggle form-control @error('no_of_passenger') is-invalid @enderror" name="no_of_passenger" value="{{ old('no_of_passenger') }}" required autocomplete="no_of_passenger" autofocus>



                        @error('no_of_passenger')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>



                <div class="form-group col-11 m-auto py-2">
                    <button type="submit" class="btn btn-primary w-100">
                                        Submit
                    </button>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- </div> -->



<!-- SERVICE -->
<div style="background: white;" class="service">
    <div class="container mt-4" style="padding-top: 5rem; padding-bottom: 5rem;">
        <div class="mb-5">
        <h2 class="text-center d-block" style="font-size: 2.3rem; color: #60635e;">Services</h2>
        </div>
        <div class="row text-center">
            <div class="col-12 col-md-4">
                    <div class="card py-3 border-white mb-3">
                        <a href="/searchflights" class="text-decoration-none">
                            <img src="{{ asset('images/ticket.svg') }}" class="card-img-top" width="200" height="200" alt="...">
                            <div class="card-body">
                                <p class="card-text font-weight-bold" style="font-size: 1.0456em;">Book Flight Tickets</p>
                            </div>
                        </a>
                    </div>
            </div>

            <div class="col-12 col-md-4">
                    <div class="card py-3 border-white mb-3">
                        <a href="/customer/tickets" class="text-decoration-none">
                            <img src="{{ asset('images/1930589.svg') }}" class="card-img-top" width="200" height="200" alt="...">
                            <div class="card-body">
                                <p class="card-text font-weight-bold" style="font-size: 1.0456em;">View Booked Flight Tickets</p>
                            </div>
                        </a>
                    </div>
            </div>

            <div class="col-12 col-md-4">
                    <div class="card py-3 border-white mb-3">
                        <a href="/tickets/cancel" class="text-decoration-none">
                            <img src="{{ asset('images/cancel.svg') }}" class="card-img-top" width="200" height="200" alt="...">
                            <div class="card-body">
                                <p class="card-text font-weight-bold" style="font-size: 1.0456em;">Cancel Booked Flight Tickets</p>
                            </div>
                        </a>
                    </div>
            </div>
        </div>
    </div>
    </div>

    <!-- PAYMENT METHOD -->
    <!-- style="background: #273a4e;" -->
    <div style="background: #e1e5e8;">
        <div class="container" style="padding-top: 5rem; padding-bottom: 5rem;">
            <div class="mb-5">
                <h2 class="text-center d-block" style="font-size: 2.3rem; color: #002d5b;">We Accept Payment Through</h2>
            </div>
            <div class="row text-white py-3">
                <div class="col-12 col-md-12">
                    <div class="d-flex justify-content-center align-items-center" style="font-size: 2rem; color: #080827;">
                        <!-- <img class="shadow rounded" style="max-width: 40%;" src="{{ asset('images/esewa.png') }}" alt="">
                         -->
                         E-sewa

                         <div class="ml-4">
                            <img src="/images/esewalogo.jpg" width="100" height="50" alt="">
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
