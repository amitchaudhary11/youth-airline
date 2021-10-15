@extends('layouts.adminlayout')

@section('content')
<div class="container-fluid">
<div class="row">

<div class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
<h3>View Payments</h3>
<hr>
    <div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead class="text-white" style="background: #0f4473;">
            <tr>
            <th scope="col">PNR</th>
            <th scope="col">Payment Date</th>
            <th scope="col">Payment Amount</th>
            </tr>

        </thead>
        <tbody>
        @foreach($payments as $payment)
            <tr>
            <th scope="row">{{ $payment->pnr }}</th>
            <td>{{ $payment->payment_date }}</td>
            <td>Rs. {{ $payment->payment_amount }}</td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </div>
</div>
</div>
</div>

@endsection
