@extends('layouts.app')

@section('title')
    Youth Airline
@endsection

@section('content')
<div class="container py-5">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body py-4">
                @if(!isset($msg))
    <form action="/passengers/create" method="get">
    <div class="table-responsive">
        <table class="table table-striped table-sm">
        <thead class="text-white" style="background: #0f4473;">
            <tr>
            <th scope="col">Flight No.</th>
            <th scope="col">Origin</th>
            <th scope="col">Destination</th>
            <th scope="col">Departure Date</th>
            <th scope="col">Departure Time</th>
            <th scope="col">Arrival Date</th>
            <th scope="col">Arrival Time</th>
            <th scope="col">Price</th>
            <th scope="col">Select</th>
            </tr>
        </thead>
        <tbody>
        @foreach($flights as $flight)
            <tr>
            <th scope="row">{{ $flight->flight_no }}</th>
            <td>{{ $flight->from_city }}</td>
            <td>{{ $flight->to_city }}</td>
            <td>{{ $flight->departure_date }}</td>
            <td>{{ date('h:i A', strtotime($flight->departure_time)) }}</td>
            <td>{{ $flight->arrival_date }}</td>
            <td>{{ date('h:i A', strtotime($flight->arrival_time)) }}</td>
            <td>Rs. {{ $flight->price }}</td>
            <td>
                <div class="icheck-success d-inline">
                    <input type="radio" value="{{ $flight->flight_no }}"
                        id="radioPrimary" name="flight_no" required>
                    <label for="radioPrimary">
                    </label>
                </div>
               {{-- <input type="radio" style="cursor:pointer;" name="flight_no" value="{{ $flight->flight_no }}" id="" required>  --}} 
            </td>
            </tr>
        @endforeach
        </tbody>
        </table>
        <div class="d-flex justify-content-center mt-5">
            <button type="submit" class="btn btn-primary">Select Flight</button>
        </div>
        </div>
    </form>
        @else
       <div class="d-flex justify-content-center">
       <div class="alert text-center">
    <!-- <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>  -->
        <strong>😥 {{ $msg }}</strong>
        </div> 
       </div>
        @endif

            </div>
        </div>
    </div>
</div>
</div>

@endsection
