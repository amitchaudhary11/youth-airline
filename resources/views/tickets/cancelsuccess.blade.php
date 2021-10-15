@extends('layouts.app')

@section('title')
    Youth Airline
@endsection

@section('content')
<div class="container py-5">

    <div class="bg-light">
        <h4 class="mt-4">Your ticket has been cancelled successfully.
            <br><br> Your amount of <strong>Rs. {{ $refundAmount }}</strong> will be refunded to your bank account (Cancellation charge on 15% of your ticket amount has been deducted).</h4>
    </div>
</div>

@endsection
