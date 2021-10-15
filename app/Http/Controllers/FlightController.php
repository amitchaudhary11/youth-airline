<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Flight;

use App\AircraftDetail;

class FlightController extends Controller
{
    public function index()
    {
        $flights = Flight::latest()->get();

        return view('flights.index', compact('flights'));
    }

    public function create()
    {
        return view('flights.create');
    }

    public function store()
    {
        $data = request()->validate([
            'flight_no' => 'required',
            'from_city' => 'required',
            'to_city' => 'required',
            'flight_no' => 'required',
            'departure_date' => 'required|date',
            'arrival_date' => 'required|date',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'price' => 'required',
            'aircraft_id' => 'required',
        ]);
        
        $aircrafts = AircraftDetail::find($data['aircraft_id']);
  
        $alreadyFlight = Flight::where('flight_no' , $data['flight_no'])->first();

        if($aircrafts) {
            $flights = $aircrafts->flights->count();
            // dd($flights);
            if($alreadyFlight == null&& $flights == 0){
                if($aircrafts->active == 'yes'){
                    Flight::create([
                        'flight_no' => strtoupper($data['flight_no']),
                        'from_city' => strtoupper($data['from_city']),
                        'to_city' => strtoupper($data['to_city']),
                        'departure_date' => $data['departure_date'],
                        'arrival_date' => $data['arrival_date'],
                        'departure_time' => $data['departure_time'],
                        'arrival_time' => $data['arrival_time'],
                        'price' => $data['price'],
                        'aircraft_id' => $data['aircraft_id'],
                    ]);
                    return redirect('/flights/create?msg=successfull')->withInput();
                } else {
                    return redirect('/flights/create?msg=aircraftNotActivated')->withInput();
                }
            } else {
                return redirect('/flights/create?msg=alreadytaken')->withInput();
            }
        } else {
            return redirect('/flights/create?msg=aircraftIdDoesNotExit')->withInput();
        }
    }

    public function edit(Flight $flight)
    {
        return view('flights.edit', compact('flight'));
    }

    public function update($flight)
    {
        $data = request()->validate([
            'flight_no' => 'required',
            'from_city' => 'required',
            'to_city' => 'required',
            'flight_no' => 'required',
            'departure_date' => 'required|date',
            'arrival_date' => 'required|date',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'price' => 'required',
            'aircraft_id' => 'required',
        ]);


        $flight = Flight::find($flight);
        $flight->flight_no = strtoupper($data['flight_no']);
        $flight->from_city = strtoupper($data['from_city']);
        $flight->to_city = strtoupper($data['to_city']);
        $flight->departure_date = $data['departure_date'];
        $flight->arrival_date = $data['arrival_date'];
        $flight->departure_time = $data['departure_time'];
        $flight->arrival_time = $data['arrival_time'];
        $flight->price = $data['price'];
        $flight->aircraft_id = $data['aircraft_id'];
        $flight->save();
        return redirect("/flights?msg=successfull");

    }

    public function getDelete()
    {
        $flights = Flight::latest()->get();

        return view('flights.getDelete', compact('flights'));

    }

    public function delete(Flight $flight)
    {
        $flight->delete();
        return redirect('/flights/deleteflights?msg=successfull');
    }

}
