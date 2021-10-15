@extends('layouts.adminlayout')

@section('content')
<div class="container-fluid">
    <div class="row">
    <div class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="col-12 col-md-6 pl-0 pr-0">
            <form action="/passengers/plist" method="post">
            @csrf
                <h3>View Passengers</h3>
                @if(request('msg'))
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <strong>No Passengers for this Flight Number !!</strong>
                    </div>
                @endif
                
                <div class="form-group mt-4">
                    <label for="flight_no" class="text-secondary" style="font-size: 1.1rem;">Enter The Flight No.</label>
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
</div>
@endsection
