@extends('layouts.adminlayout')

@section('content')
<div class="container-fluid">
    <div class="row">
    <div class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="col-12 col-md-6 pl-0 pr-0">
            <form action="/aircraftdetails" method="post">
            @csrf
                <h3>Enter Aircraft Details</h3>
                @if(request('msg') == 'successfull')
                <div class="alert bg-success">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            <strong>Added Successfully</strong>
                        </div>
                @endif

                @if(request('msg') == 'alreadytaken')
                <div class="alert">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            <strong>Aircraft ID Already Taken !!</strong>
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

                <div class="form-group">
                    <label for="aircraft_type" class="text-secondary" style="font-size: 1.1rem;">Enter a Aircraft Type/Model</label>
                    <input id="aircraft_type" type="text" class="form-control @error('aircraft_type') is-invalid @enderror" name="aircraft_type" value="{{ old('jet_type') }}" required autocomplete="jet_type" autofocus>

                    @error('aircraft_type')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                         </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="total_capacity" class="text-secondary" style="font-size: 1.1rem;">Enter the Total Capacity of the Jet</label>
                    {{-- <input id="total_capacity" type="number" class="form-control @error('total_capacity') is-invalid @enderror" name="total_capacity" value="{{ old('total_capacity') }}" required autocomplete="total_capacity" autofocus> --}}
                    <select class="form-control" name="total_capacity" id="total_capacity">
                        <option value="60">60</option>
                    </select>
                    @error('total_capacity')
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
