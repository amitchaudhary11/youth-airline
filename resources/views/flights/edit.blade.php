@extends('layouts.adminlayout')

@section('content')
<div class="container-fluid">
    <div class="row">
    <div class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <h3>Edit Flight Details</h3>
        <hr>

            <form action="/flights/{{ $flight->id }}" method="post">
            @csrf
            @method('patch')
               <div class="form-row">
                    <div class="form-group col-md-6 mr-md-4">
                        <label for="flight_no" class="text-secondary" style="font-size: 1.2rem;">Flight Number</label>
                        <input id="flight_no" type="text" class="form-control @error('flight_no') is-invalid @enderror" name="flight_no" value="{{ old('flight_no') ?? $flight->flight_no }}" required autocomplete="flight_no" autofocus>

                        @error('flight_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="from_city" class="text-secondary" style="font-size: 1.2rem;">Origin</label>
                        <input id="from_city" type="text" class="form-control @error('from_city') is-invalid @enderror" name="from_city" value="{{ old('from_city') ?? $flight->from_city }}" required autocomplete="from_city" autofocus>

                        @error('from_city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="to_city" class="text-secondary" style="font-size: 1.2rem;">Destination</label>
                        <input id="to_city" type="text" class="form-control @error('to_city') is-invalid @enderror" name="to_city" value="{{ old('to_city') ?? $flight->to_city }}" required autocomplete="to_city" autofocus>

                        @error('to_city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group col-md-6">

                        <label for="departure_date" class="text-secondary" style="font-size: 1.2rem;">Departure Date</label>

                        <input id="departure_date" class="form-control @error('departure_date') is-invalid @enderror" type="date" name="departure_date" value="{{ old('departure_date') ?? $flight->departure_date }}" required autocomplete="departure_date" autofocus>

                        @error('departure_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group col-md-6">

                        <label for="arrival_date" class="text-secondary" style="font-size: 1.2rem;">Arrival Date</label>

                        <input id="arrival_date" class="form-control @error('arrival_date') is-invalid @enderror" type="date" name="arrival_date" value="{{ old('arrival_date') ?? $flight->arrival_date }}" required autocomplete="arrival_date" autofocus>

                        @error('arrival_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group col-md-6">

                        <label for="departure_time" class="text-secondary" style="font-size: 1.2rem;">Departure Time</label>

                        <input id="departure_time" class="form-control @error('departure_time') is-invalid @enderror" type="time" name="departure_time" value="{{ old('departure_time') ?? $flight->departure_time }}" required autocomplete="departure_time" autofocus>

                        @error('departure_time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group col-md-6">

                        <label for="arrival_time" class="text-secondary" style="font-size: 1.2rem;">Arrival Time</label>

                        <input id="arrival_time" class="form-control @error('arrival_time') is-invalid @enderror" type="time" name="arrival_time" value="{{ old('arrival_time') ?? $flight->arrival_time }}" required autocomplete="arrival_time" autofocus>

                        @error('arrival_time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="price" class="text-secondary" style="font-size: 1.1rem;">Ticket Price</label>
                        <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') ?? $flight->price }}" required autocomplete="price" autofocus>

                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    

                    <div class="form-group col-md-6 mr-md-4">
                        <label for="aircraft_id" class="text-secondary" style="font-size: 1.1rem;">aircraft ID</label>
                        <input id="aircraft_id" type="number" class="form-control @error('aircraft_id') is-invalid @enderror" name="aircraft_id" value="{{ old('aircraft_id') ?? $flight->aircraft_id }}" required autocomplete="aircraft_id" autofocus>

                        @error('aircraft_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

               </div> 

                <button type="submit" class="btn btn-primary">
                                    Update
                </button>
            </form>
    </div>
    </div>
</div>

@endsection
