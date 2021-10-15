@extends('layouts.adminlayout')

@section('content')
<div class="container-fluid">
<div class="row">

<div class="col-md-9 ml-sm-auto col-lg-10 px-md-4"> 
<h3>View Passengers</h3>
<hr>
<input type="number" class="form-control w-auto my-2 mr-2" id="myInput" onkeyup="filterPNR()" placeholder="Search for PNR.." title="Type in a PNR">
    <div class="table-responsive">
    <table id="myTable" class="table table-striped table-sm">
        <thead class="text-white" style="background: #0f4473;">
            <tr>
            <th scope="col">SN</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">Gender</th>
            <th scope="col">Meal</th>
            <th scope="col">PNR</th>
            <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tickets as $value)
            @foreach($value->passenger as $passenger)
                <tr>
                <td class="font-weight-bold">{{ $i = $i + 1 }}</td>
                <td>{{ $passenger->name }}</td>
                <td>{{ $passenger->age }}</td>
                <td>{{ $passenger->gender }}</td>
                <td>{{ $passenger->meal }}</td>
                <td>{{ $passenger->pnr }}</td>
                <td>{{ $passenger->created_at }}</td>
                </tr>
            @endforeach
        @endforeach
        </tbody>
        </table>
    </div>
</div>
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
    td = tr[i].getElementsByTagName("td")[5];
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
