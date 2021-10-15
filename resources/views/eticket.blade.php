<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            width: 100%;
            text-align: center;

        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
        }
    </style>
</head>
<body>

       <div class="text-center">
            <p style="font-weight: bold; font-size: 1em; text-align: center;">E-Ticket</p>
       </div>

       <hr>
       <p style="margin-left: 10px; font-size: 16px; font-weight: bold;">PNR No. : {{ $flightDetails->id }}</p>

        <p style="margin-left: 10px; font-size: 16px; font-weight: bold;">Flight Details</p>
    <table>

            <tr>
              <th scope="col">From</th>
              <th scope="col">To</th>
              <th scope="col">Flight No.</th>
              <th scope="col">Departure Date</th>
              <th scope="col">Departure Time</th>
              <th scope="col">No of Passengers</th>
              <th scope="col">Amount</th>
            </tr>



                <tr>
                    <td>{{ $flights->from_city }}</td>
                    <td>{{ $flights->to_city }}</td>
                    <td>{{ $flightDetails->flight_no }}</td>
                    <td>{{ $flightDetails->date_of_reservation }}</td>
                    <td>{{ date('h:i A', strtotime($flights->departure_time)) }}</td>
                    <td>{{ $flightDetails->no_of_passenger }}</td>
                    <td>Rs. {{ $flightDetails->payment->payment_amount }}</td>
                </tr>


      </table>

      <p style="margin-left: 10px; font-size: 16px; font-weight: bold;">Passenger Details</p>
      <table>

              <tr>
                <th scope="col">#</th>
                <th scope="col">Passenger Name</th>
                <th scope="col">Passenger Age</th>
                <th scope="col">Seat Number</th>
              </tr>


                @foreach ($passengerDetails as $passengerDetail)
                    <tr>

                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $passengerDetail->name }}</td>
                        <td>{{ $passengerDetail->age }}</td>
                        <td>{{ $passengerDetail->seat->seat_name }}</td>
                    </tr>
                @endforeach



        </table>


</body>
</html>
