@extends('layouts.adminlayout')

@section('content')
<div class="container-fluid">
    <div class="row">
    <div class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <h3>Available Seats</h3>
        <hr>

        <div class="table-responsive">
        <table id="myTable" class="table table-sm table-striped">
            <thead class="text-white" style="background: #0f4473;">
                <tr>
                <th scope="col">Total Seats</th>
                <th scope="col">Booked Seats</th>
                <th scope="col">Available Seats</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>{{ $totalSeats }}</td>
                <td>{{ $confirmedPassenger }}</td>
                <td>{{ $totalSeats - $confirmedPassenger }}</td>
                </tr>
            </tbody>
            </table>
            </div>
    <div>
    </div>
</div>


@endsection
