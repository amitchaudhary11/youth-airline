@extends('layouts.adminlayout')

@section('content')
<div class="container-fluid">
<div class="row">

<div class="col-md-9 ml-sm-auto col-lg-10 px-md-4"> 
<h3>View Aircrafts</h3>
<hr>
    <div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead class="text-white" style="background: #0f4473;">
            <tr>
            <th scope="col">Aircraft ID</th>
            <th scope="col">Aircraft Type</th>
            <th scope="col">Total Capacity</th>
            <th scope="col">Active</th>
            </tr>
        </thead>
        <tbody>
        @foreach($aircraftdetails as $aircraftdetail)
            <tr>
            <th scope="row">{{ $aircraftdetail->id }}</th>
            <td>{{ $aircraftdetail->aircraft_type }}</td>
            <td>{{ $aircraftdetail->total_capacity }}</td>
            <td>{{ $aircraftdetail->active }}</td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </div>
</div>
</div>
</div>

@endsection
