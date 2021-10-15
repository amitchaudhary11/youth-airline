@extends('layouts.adminlayout')

@section('content')
<div class="container-fluid">
    <div class="row">
    <div class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="col-12 col-md-6 pl-0 pr-0">
            <form action="/payment/show" method="post">
            @csrf
                <h3>View Payments</h3>
                <div class="form-group mt-4">
                    @if(request('msg') == 'paynotfound')
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <strong>Payment Not Found !!</strong>
                    </div>
                    @endif
                    
                    <label for="pnr" class="text-secondary" style="font-size: 1.1rem;">Enter the PNR</label>
                    <input id="pnr" type="text" class="form-control @error('pnr') is-invalid @enderror" name="pnr" value="{{ old('pnr') }}" required autocomplete="pnr" autofocus>


                    @error('pnr')
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
