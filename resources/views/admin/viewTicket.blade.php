@extends('layouts.adminlayout')

@section('content')
<div class="container-fluid">
    <div class="row">
    <div class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <h3>List of Booked Tickets</h3>
        <hr>

        <div class="d-flex flex-wrap">
        <div class="mr-2">
        <input type="number" class="form-control w-auto my-2 mr-2" id="myInput" onkeyup="filterPNR()" placeholder="Search for PNR.." title="Type in a PNR">
       </div>
       <div>
        <input type="text" class="form-control w-auto my-2" id="myBooking" onkeyup="filterBookingStatus()" placeholder="Search for Booking Status.." title="Type in a Booking status">
        </div>
        </div>

        <div class="table-responsive">
        <table id="myTable" class="table table-sm table-striped">
            <thead class="text-white" style="background: #0f4473;">
                <tr>
                <th scope="col">PNR</th>
                <th scope="col">Date of Reservation</th>
                <th scope="col">No of Passenger</th>
                <th scope="col">Booking Status</th>
                <th scope="col">Payment ID</th>
                <th scope="col">Customer Name</th>
                </tr>
            </thead>
            <tbody>
            @foreach($tickets as $ticket)
                <tr>
                <td class="font-weight-bold" scope="row">{{ $ticket->id }}</td>
                <td>{{ $ticket->date_of_reservation }}</td>
                <td>{{ $ticket->no_of_passenger }}</td>
                <td>{{ $ticket->booking_status }}</td>
                <td>{{ $ticket->payment_id }}</td>
                <td>{{ $ticket->customer->name }}</td>
                </tr>
            @endforeach
            </tbody>
            </table>
            </div>

            <div class="d-flex justify-content-between flex-wrap">
                <div class="alert bg-success font-weight-bold m-2" style="font-size: 1rem; width: auto;">No. of Confirmed Passengers = {{ $confirmedPassenger }}</div>
                <div class="alert bg-primary font-weight-bold m-2" style="font-size: 1rem; width: auto;">No. of Pending Passengers = {{ $pendingPassenger }}</div>
                <div class="alert bg-danger font-weight-bold m-2" style="font-size: 1rem; width: auto;">No. of Canceled Passengers = {{ $canceledPassenger }}</div>
            </div>
    <div>
    </div>
</div>


<script>

function filterPNR() {
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

function filterBookingStatus() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myBooking");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
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
