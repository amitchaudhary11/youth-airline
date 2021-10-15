@extends('layouts.app')

@section('title')
    Youth Airline
@endsection

@section('content')
<div class="container py-5">

   <div class="d-flex justify-content-center p-4">
    <div class="p-2">
        <form action="{{ route('tickets.send') }}" method="get">
            @csrf
            <input type="hidden" name="pnr" value="{{ $pnr }}">
            <button type="submit" class="btn btn-primary">Get E-ticket by email</button>
        </form>
    </div>

   <div class="p-2">
    <form action="{{ route('tickets.download') }}" method="get">
        @csrf
        <input type="hidden" name="pnr" value="{{ $pnr }}">
        <button type="submit" class="btn btn-success">Download E-ticket</button>
    </form>
   </div>
   </div>
</div>

@endsection
