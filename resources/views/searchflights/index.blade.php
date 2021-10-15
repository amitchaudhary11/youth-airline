@extends('layouts.app')

@section('title')
    Youth Airline
@endsection

@section('content')
<div class="container mb-5 mt-4">

    @if(request('msg') == 'notavailableseats')
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong>Seats are Not Available !!</strong>
    </div>
    @endif

    @if(request('msg') == 'No Results Found!')
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong> Sorry, No Flights are Available !!</strong>
    </div>
    @endif

    @if(request('msg') == 'noflightsavailable')
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong> Sorry, No Flights are Available !!</strong>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                    
                    <form action="/searchflights/show" method="post" class="py-5 px-5">
                        @csrf
                            <h2 class="pb-1" style="border-bottom: 3px solid #46887d; width: 11.5rem;">Search Flights</h2>
                            
                           <div class="form-row mt-4">
            
                                <div class="form-group col-md-6 autocomplete position-relative">
                                    <label for="from_city" style="font-size: 1.1rem;">Origin</label>
                               
                                    <input list="origin" placeholder="eg. Kathmandu" id="from_city" type="text" class="form-control @error('from_city') is-invalid @enderror" name="from_city" value="{{ old('from_city') }}" required autocomplete="from_city" autofocus>
                                    
                                    <datalist id="origin">
                                        <option value="Nepalgunj"></option>
                                        <option value="Kathmandu"></option>
                                        <option value="Dhangadhi"></option>
                                        <option value="Pokhara"></option>
                                        <option value="Chitwan"></option>
                                    </datalist>
            
                                    @error('from_city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
            
                                <div class="form-group col-md-6">
                                    <label for="to_city" style="font-size: 1.1rem;">Destination</label>
                                    <input list="destination" id="to_city" placeholder="eg. Dhangadhi" type="text" class="form-control @error('to_city') is-invalid @enderror" name="to_city" value="{{ old('to_city') }}" required autocomplete="to_city" autofocus>
            
            
                                    <datalist id="destination">
                                        <option value="Nepalgunj"></option>
                                        <option value="Kathmandu"></option>
                                        <option value="Dhangadhi"></option>
                                        <option value="Pokhara"></option>
                                        <option value="Chitwan"></option>
                                    </datalist>
            
                                    @error('to_city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
            
            
                                <div class="form-group col-md-6">
            
                                    <label for="departure_date" style="font-size: 1.1rem;">Departure Date</label>
            
                                    <input id="departure_date" onclick="this.style.color = '#495057';" class="form-control @error('departure_date') is-invalid @enderror" type="date" name="departure_date" value="{{ old('departure_date') }}" required autocomplete="departure_date" autofocus>
            
                                    @error('departure_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
            
                                </div>
            
                                <div class="form-group col-md-6">
                                    <label for="no_of_passenger" style="font-size: 1.1rem;">Travellers</label>
                                    <input id="no_of_passenger" placeholder="eg. 1" type="number" class="form-control @error('no_of_passenger') is-invalid @enderror" name="no_of_passenger" value="{{ old('no_of_passenger') }}" required autocomplete="no_of_passenger" autofocus>
            
                                    @error('no_of_passenger')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
            
            
                            <button type="submit" class="btn btn-primary ml-1">
                                                Submit
                            </button>
                        </form>   
                </div>

        </div>
    </div>

</div>
@endsection
