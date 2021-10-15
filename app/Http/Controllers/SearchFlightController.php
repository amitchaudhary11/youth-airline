<?php

namespace App\Http\Controllers;

use App\Flight;

use App\Ticket;
use Illuminate\Http\Request;

class SearchFlightController extends Controller
{
    public function index()
    {   
        session()->forget('pnr');
        return view('searchflights.index');
    }

    public function show()
    {
        session()->forget('pnr');


        // dd(request()->all());
        $from = strtoupper(request('from_city'));
        $to = strtoupper(request('to_city'));
        $departure_date = request('departure_date');

        session()->put('no_of_passenger', request('no_of_passenger'));

        $flights = Flight::where([
            ['from_city', '=', $from],
            ['to_city', '=', $to],
            ['departure_date', '>=', $departure_date],
        ])->orderBy('departure_time', 'desc')->get();

        if($flights->count() == 0) {
            return redirect('/searchflights?msg=noflightsavailable')->withInput();
        }


        foreach ($flights as $flight) {
            $tickets = Ticket::where([
                ['flight_no', '=', $flight->flight_no],
                ['booking_status', '=', 'CONFIRMED'],
            ])->get();

            $totalSeats = $flight->aircraftdetail->total_capacity;
        }

        if($tickets->count() != 0) {
            $confirmedPassenger = 0;
           foreach ($tickets as $value) {
               // dd($value->no_of_passenger);
                   $confirmedPassenger = $confirmedPassenger + $value->no_of_passenger;
           }
           $totalPassenger = $confirmedPassenger + session()->get('no_of_passenger');

           

           // dd($totalPassenger);

         if($totalPassenger <= $totalSeats) {
            return view('searchflights.show', compact('flights'));
         } else {
             return redirect('/searchflights?msg=notavailableseats')->withInput();
         }
        } elseif (session()->get('no_of_passenger') >= $totalSeats) {
            return redirect('/searchflights?msg=notavailableseats')->withInput();
        } else {
           return view('searchflights.show', compact('flights'));
        }
        

        
        if($flights->count() <= 0) {
            return redirect('/searchflights?msg=No Results Found!')->withInput();
        }
        
        return view('searchflights.show', compact('flights'));
    }
}
