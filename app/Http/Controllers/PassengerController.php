<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Passenger;

use App\Ticket;

use App\Flight;
use App\Seat;
use Mockery\Generator\StringManipulation\Pass\Pass;

class PassengerController extends Controller
{
    public function index()
    {
        $flightNo = strtoupper(request('flight_no'));

        $tickets = Ticket::where('flight_no', $flightNo)->orderBy('created_at', 'desc')->get();
        if($tickets->count() == 0) {
            return redirect('/passengers/pform?msg=nopassengers')->withInput();
        } else{
            // foreach ($tickets as $value) {
            //     dd($value->passenger->count());
            // }
            return view('passengers.index', compact('tickets'), ['i' => 0]);
        }

    }

    public function pform()
    {
        return view('passengers.pform');
    }

    public function create()
    {
        $seats = Seat::all();

        $reservedSeats = [];

        foreach ($seats as $seat) {
            $passenger = Passenger::where('seat_id', $seat->id);
            if ($passenger->count() >= 1) {
                $reservedSeats[] = $seat->id;
            }
        }

        //dd($reservedSeats);

        $flightNo = request('flight_no');

        $tickets = Ticket::where([
            ['flight_no', '=', $flightNo],
            ['booking_status', '=', 'CONFIRMED'],
        ])->get();

         if($tickets->count() != 0) {
             $confirmedPassenger = 0;
            foreach ($tickets as $value) {
                // dd($value->no_of_passenger);
                    $confirmedPassenger = $confirmedPassenger + $value->no_of_passenger;
            }
            $totalPassenger = $confirmedPassenger + session()->get('no_of_passenger');

            // dd($totalPassenger);

          $flights = Flight::where('flight_no', $flightNo)->get();

          foreach ($flights as $flight) {
             $totalSeats = $flight->aircraftdetail->total_capacity;
          }

          if($totalPassenger <= $totalSeats) {
             return view('passengers.create', ['flight_no' => request('flight_no'), 'seats' => $seats, 'num' => 1, 'reservedSeats' => $reservedSeats]);
          } else {
              return redirect('/searchflights?msg=notavailableseats')->withInput();
          }
         } else {
            return view('passengers.create', ['flight_no' => request('flight_no'), 'seats' => $seats, 'num' => 1, 'reservedSeats' => $reservedSeats]);
         }
    }

    public function store()
    {
            //$a = 0;
            $data = request('data');

            //dd($data["r$a"]);
            $selectedSeatArray = [];

            for ($i=0; $i < session()->get('no_of_passenger'); $i++) {

                Passenger::create([
                    'name' => $data['passengerName'][$i],
                    'age' => $data['passengerAge'][$i],
                    'gender' => $data['passengerGender'][$i],
                    'seat_id' => $data["r$i"],
                    'pnr' => session()->get('pnr'),
                ]);
            }

            return redirect("/payment/create?flight_no=" . request('flight_no') ."&journey_date1=" . session()->get('journey_date1') . "&no_of_passenger=" . session()->get('no_of_passenger') . "&pnr=" . session()->get('pnr'));
            /*
           $passengers = Passenger::where('pnr', session()->get('pnr'))->get();
           $noOfPassenger = $passengers->count();
           $count = 0;

            /*
           if($noOfPassenger == session()->get('no_of_passenger')) {
                foreach ($passengers as $passenger) {
                    if($passenger->meal == 'yes') {
                        $count = $count + 1;
                    }
                }
                return redirect("/payment/create?count=$count&flight_no=" . request('flight_no') ."&journey_date1=" . session()->get('journey_date1') . "&no_of_passenger=" . session()->get('no_of_passenger') . "&pnr=" . session()->get('pnr'));
            }
            */
            // return redirect('/passengers/create?msg=successfull&i=0&flight_no=' . request('flight_no'));
    }

}
