@extends('layouts.adminlayout')

@section('content')
<div class="container-fluid">
    <div class="row">
    <div class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="col-12 col-md-6 pl-0 pr-0">
            <form action="/aircraftdetails/aircraftid" method="post">
            @csrf
            @method('patch')
                <h3>Enter Aircraft To Be Deactivated</h3>
                @if(request('msg') == 'successfull')
                <div class="alert bg-success">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                            <strong>Deactivated Successfully</strong>
                        </div>
                @endif

                @if(request('msg') == 'invalidaircraftid')
                <div class="alert">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                            <strong>Invalid Aircraft ID !!</strong>
                        </div>
                @endif

                <div class="form-group mt-4">
                    <label for="aircraft_id" class="text-secondary" style="font-size: 1.1rem;">Enter a Valid Aircraft Id</label>
                    <input id="aircraft_id" type="text" class="form-control @error('aircraft_id') is-invalid @enderror" name="aircraft_id" value="{{ old('aircraft_id') }}" required autocomplete="jet_id" autofocus>

                    @error('aircraft_id')
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
