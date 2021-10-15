@extends('layouts.adminlayout')

@section('content')
<div class="container-fluid">
    <div class="row">
    <div class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <h3>View Customers</h3>
    <hr>
    <input type="text" class="form-control w-auto my-2" id="myInput" onkeyup="filterCname()" placeholder="Search for names.." title="Type in a name">
    @if(request('msg') == 'successfull')
                        <div class="alert bg-success">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            <strong>Deleted Successfully</strong>
                        </div>
     @endif
    <div class="table-responsive">
        <table id="myTable" class="table table-striped table-sm">
            <thead class="text-white" style="background: #0f4473;">
                <tr>
                <th scope="col">SN</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th id="operation" scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>

            @foreach($customers as $customer)
                <tr>
                <td class="font-weight-bold">{{ $i = $i + 1 }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>
                    <a href="/customer/{{ $customer->id }}">
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
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

function filterCname() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
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
