@extends('layouts.adminlayout')

@section('content')
<div class="container-fluid">
    <div class="row">
    <div class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <h3>Update Flight Details</h3>
    <hr>
<input type="text" class="form-control w-auto my-2 mr-2" id="myInput" onkeyup="filterFlightNo()" placeholder="Search for Flight No.." title="Type in a flight no.">

    @if(request('msg') == 'successfull')
                <div class="alert bg-success">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            <strong>Edited Successfully</strong>
                </div>
    @endif
    <div class="table-responsive">
        <table id="myTable" class="table table-striped table-sm">
            <thead class="text-white" style="background: #0f4473;">
                <tr>
                <th scope="col">Flight No.</th>
                <th scope="col">aircraft ID</th>
                <th scope="col">Origin</th>
                <th scope="col">Destination</th>
                <th scope="col">Departure Date</th>
                <th scope="col">Departure Time</th>
                <th scope="col">Arrival Date</th>
                <th scope="col">Arrival Time</th>
                <th scope="col">Price</th>
                <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
            @foreach($flights as $flight)
                <tr>
                <td class="font-weight-bold" scope="row">{{ $flight->flight_no }}</td>
                <td class="font-weight-bold" scope="row">{{ $flight->aircraft_id }}</td>
                <td>{{ $flight->from_city }}</td>
                <td>{{ $flight->to_city }}</td>
                <td>{{ $flight->departure_date }}</td>
                <td>{{ date('h:i A', strtotime($flight->departure_time)) }}</td>
                <td>{{ $flight->arrival_date }}</td>
                <td>{{ date('h:i A', strtotime($flight->arrival_time)) }}</td>
                <td>Rs. {{ $flight->price }}</td>
                <td>
                    <a href="/flights/{{ $flight->id }}/edit">
                        <button type="submit" class="btn btn-success btn-sm">Edit</button>
                    </a>
                </td>
                </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
    </div>
</div>

<script>

function filterFlightNo() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

</script>

@endsection
