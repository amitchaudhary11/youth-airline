@extends('layouts.app')

@section('title')
    Youth Airline
@endsection

@section('content')
<div class="container py-5">
@if($customer->tickets->count() > 0)

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          
          <div class="card-body">
            <h2 style="color: #0f4473;" class="text-center pb-4">My Tickets</h2>
            <div class="search-box pull-left">
              <form action="#">
                  <input type="number" class="form-control my-2 mx-2" id="myInput" onkeyup="myfilter()" placeholder="Search for PNR.." title="Type in a name">

              </form>
          </div>
          <div class="search-box pull-left">
              <form action="#">
                  <input type="text" class="form-control my-2 mx-2" id="filterBookingStatus" onkeyup="myBookingStatus()" placeholder="Search for Booking Status.." title="Type in a Booking Status">

              </form>
          </div>
          {{-- 
            <div class="d-flex flex-wrap">
              <div class="mr-3">
              <input type="number" class="form-control my-2 mx-2" id="myInput" onkeyup="myfilter()" placeholder="Search for PNR.." title="Type in a name">
              </div>
    
              <div>
               <input type="text" class="form-control my-2 mx-2" id="filterBookingStatus" onkeyup="myBookingStatus()" placeholder="Search for Booking Status.." title="Type in a Booking Status">
              </div>
            </div>
            
            --}}
            
        
            <div class="table-responsive">
            <table id="myTable" class="table table-striped table-sm">
                <thead class="text-white" style="background: #0f4473;">
                    <tr>
                    <th scope="col">PNR</th>
                    <th scope="col">Date of Reservation</th>
                    <th scope="col">Flight No.</th>
                    <th scope="col">Journey Date</th>
                    <th scope="col">Booking Status</th>
                    <th scope="col">Travellers</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($customer->tickets as $ticket)
    
                <?php 
                if($ticket->booking_status == 'COMPLETED') {
                    $completed = 'text-success font-weight-bold';
                   
                }
    
                if($ticket->booking_status == 'CONFIRMED') {
                    $completed = 'text-primary font-weight-bold';
                   
                }
    
    
                if($ticket->booking_status == 'CANCELED') {
                    $completed = 'text-danger font-weight-bold';
                }
    
                if($ticket->booking_status == 'PENDING') {
                    $completed = 'text-secondary font-weight-bold';
                }
               
                ?>
    
                <tr>
                    <td class="font-weight-bold" scope="row">{{ $ticket->id }}</td>
                    <td>{{ $ticket->date_of_reservation }}</td>
                    <td>{{ $ticket->flight_no }}</td>
                    <td>{{ $ticket->journey_date }}</td>
                    <td class="<?php echo $completed; ?>">{{ $ticket->booking_status }}</td>
                    <td>{{ $ticket->no_of_passenger }}</td>
                    </tr>
                @endforeach
                </tbody>
                </table>
                </div>
          </div>
        </div>
      </div>
      
    </div>
@else
<div class="d-flex justify-content-center">
<div class="alert text-center">
    <!-- <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>  -->
        <strong>No Tickets Booked Yet !!</strong>
</div> 
</div>
@endif
</div>

<script>

function myfilter() {
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

function myBookingStatus() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("filterBookingStatus");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
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
