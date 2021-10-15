@extends('layouts.app')

@section('title')
    Youth Airline
@endsection

@section('content')
<div class="container py-5">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="/tickets/cancel" method="post">
                    @csrf
                        <h2 style="color: #0f4473;" class="px-4 pt-3">Cancel Booked Tickets</h2>
                       <div class="form mt-4 px-4 pb-3">
                            <div class="form-group col-12 col-md-5 p-0">
                            @if(request('msg') == 'paynotfound')
                                <div class="alert">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                    <strong>Payment Amount Not Found !!</strong>
                                </div>
                                @endif

                            @if(request('msg') == 'invalidPNR')
                                <div class="alert">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                    <strong>Invalid PNR !!</strong>
                                </div>
                                @endif
                                <label for="pnr" class="text-secondary" style="font-size: 1.1rem;">Enter the PNR</label>
                                <input id="pnr" placeholder="eg. 40580" type="number" class="form-control @error('pnr') is-invalid @enderror" name="pnr" value="{{ old('pnr') }}" required autocomplete="pnr" autofocus>

                                @error('pnr')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-primary">
                                            Cancel Ticket
                        </button>
                    </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
