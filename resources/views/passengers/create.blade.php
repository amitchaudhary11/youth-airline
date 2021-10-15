@extends('layouts.app')

@section('title')
    Youth Airline
@endsection

@section('content')

    <div class="container py-5">


        <div class="row justify-content-center">
            @if (request('msg') == 'selectSeperateSeat')
        <div class="alert bg-danger">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>Select different seat for each passenger!!</strong>
        </div>
        @endif


            @if (request('msg') == 'successfull')
                <div class="alert bg-success">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong>Added Successfully</strong>
                </div>
            @endif
            <div class="col-md-8 bg-white py-4 rounded">
                <div class="text-center mb-4" style="font-size: 1.5em;">Add Passenger Details</div>
                @if (Session::has('msg'))
                <div class="alert bg-danger">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong>{{ Session::get('msg') }}</strong>
                </div>
                @endif
                <form method="post" action="/tickets">

                    @csrf

                    <?php
                            $data = request('data');
                            $a = 0;
                    ?>
                    @for ($i = 0; $i < session()->get('no_of_passenger'); $i++)
                        <div class="col-md-12 mb-4 px-5">
                            <div class="card">
                                <div class="card-header">Passenger {{ $i + 1 }}</div>
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label for="passengerName" class="col-md-4 col-form-label text-md-right">Passenger
                                            Name</label>

                                        <div class="col-md-6">
                                            <input id="passengerName" type="text"
                                                class="form-control @error('passengerName') is-invalid @enderror"
                                                name="passengerName[]" value="{{ $data['passengerName'][$a] }}" required
                                                autocomplete="passengerName" placeholder="eg. John Doe" autofocus>

                                            @error('passengerName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="passengerAge" class="col-md-4 col-form-label text-md-right">Passenger
                                            Age</label>

                                        <div class="col-md-6">
                                            <input id="passengerAge" type="number"
                                                class="form-control @error('passengerAge') is-invalid @enderror"
                                                name="passengerAge[]" value="{{ $data['passengerAge'][$a] }}" required
                                                autocomplete="passengerAge" placeholder="eg. 18">

                                            @error('passengerAge')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="passengerGender" class="col-md-4 col-form-label text-md-right">Passegner
                                            Gender</label>

                                        <div class="col-md-6">
                                            <select name="passengerGender[]"
                                                class="form-control @error('passengerGender') is-invalid @enderror" id=""
                                                value="{{ $data['passengerGender'][$a] }}" required
                                                autocomplete="passengerGender">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>

                                            @error('passengerGender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="text-center d-block mb-3 mt-1" style="font-size: 1.7em;">
                                            Select Seat

                                        </div>



                                        <div class="d-flex flex-wrap justify-content-center bg-light mb-3">
                                            <div class="mr-1 mt-3" style="background-color: #33d7ec; width: 20px; height: 20px; border: 1px solid #33d7ec;">
                                            </div>
                                            <p class="mr-3 mt-3">Available</p>

                                            <div class="mr-1 mt-3" style="background-color: #2e6da4; width: 20px; height: 20px; border: 1px solid #2e6da4;">
                                            </div>
                                            <p class="mr-3 mt-3">Selected</p>

                                            <div class="mr-1 mt-3" style="background-color: #7b8fe7; width: 20px; height: 20px; border: 1px solid #7b8fe7;">
                                            </div>
                                            <p class="mr-3 mt-3">Occupied</p>

                                        </div>

                                        <?php

                                        $radioBtn = $num;

                                        ?>
                                        <div class="wrapper1">
                                        @foreach ($seats as $seat)



                                            <div class="icheck-primary d-inline">
                                                <input type="radio" value="{{ $seat->id }}"
                                                    id="radioPrimary{{ $radioBtn }}" name="r{{ $i }}"
                                                    {{ in_array($seat->id, $reservedSeats) ? 'disabled' : '' }}
                                                    {{ $seat->id == $data["r$a"] ? 'Checked' : '' }}>
                                                <label for="radioPrimary{{ $radioBtn }}" class="{{ in_array($seat->id, $reservedSeats) ? 'disabled-warning' : 'notdisabled-warning' }}">
                                                </label>
                                            </div>


                                            @if ($radioBtn % 30 == 0)
                                                <div class="mt-4 mb-4"></div>
                                            @endif

                                            <?php

                                            $radioBtn = $radioBtn + 1;

                                            ?>
                                        @endforeach

                                    </div>
                                        <?php
                                        $a++;

                                        $num = $radioBtn;

                                        ?>
                                    </div>
                                </div>
                            </div>


                        </div>
                    @endfor

                    <input id="flight_no" type="hidden" class="form-control @error('flight_no') is-invalid @enderror"
                        name="flight_no" value="{{ null != request('data') ? request('data')['flight_no'] : $flight_no }}" required autocomplete="flight_no"
                        autofocus>


                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-5">
                            <button type="submit" class="btn btn-primary shadow">
                                Submit
                            </button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection
