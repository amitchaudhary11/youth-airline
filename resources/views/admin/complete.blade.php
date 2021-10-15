@extends('layouts.adminlayout')

@section('content')
<div class="container-fluid">
<div class="row">

<div class="col-md-9 ml-sm-auto col-lg-10 px-md-4"> 
<form action="/admin/complete" method="post">
    @csrf
       <h3>Make The Flight Completed</h3>
                        @if(request('msg') == 'complete')
                        <div class="alert bg-success">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                            <strong>Completed Successfully</strong>
                        </div>
                        @endif

                        @if(request('msg') == 'noticketsforthisflight_no')
                        <div class="alert">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                            <strong>No Tickets Booked for this Flight Number !!</strong>
                        </div>
                        @endif
                    <div class="form-group col-md-6 pl-0 mt-4">
                        <label for="flight_no" class="text-secondary" style="font-size: 1.2rem;">Enter the Flight No.</label>
                        <input id="flight_no" type="text" class="form-control @error('flight_no') is-invalid @enderror" name="flight_no" value="{{ old('flight_no') }}" required autocomplete="flight_no" autofocus>

                        @error('flight_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                <button type="submit" class="btn btn-primary">
                                    Submit
                </button>   
</form>
</div>
</div>
</div>

@endsection
