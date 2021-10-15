<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AircraftDetail;

class AircraftDetailController extends Controller
{
    public function index()
    {
        $aircraftdetails = AircraftDetail::latest()->get();
        return view('aircraftdetails.index', compact('aircraftdetails'));
    }

    public function create()
    {
        return view('aircraftdetails.create');
    }

    public function store()
    {
        $data = request()->validate([
            'aircraft_id' => 'required',
            'aircraft_type' => 'required',
            'total_capacity' => 'required',
            'active' => '',
        ]);

        // dd($data);
        $aircraft = AircraftDetail::find($data['aircraft_id']);

        if($aircraft == null) {
            AircraftDetail::create([
                'id' => $data['aircraft_id'],
                'aircraft_type' => $data['aircraft_type'],
                'total_capacity' => $data['total_capacity'],
            ]);
        } else {
            return redirect('/aircraftdetails/create?msg=alreadytaken')->withInput();
        }

        return redirect('/aircraftdetails/create?msg=successfull')->withInput();

    }

    public function edit()
    {
        return view('aircraftdetails.edit');
    }

    public function update()
    {
        $aircraftId = request('aircraft_id');
        $aircraft = AircraftDetail::find($aircraftId);

        if($aircraft == null) {
            return redirect('/aircraftdetails/aircraftid/edit?msg=invalidaircraftid')->withInput();
        }
        $aircraft->active = 'no';
        $aircraft->save();

        return redirect('/aircraftdetails/aircraftid/edit?msg=successfull')->withInput();
    }

    public function activateEdit()
    {
        return view('aircraftdetails.activateedit');
    }

    public function activateUpdate()
    {
        $aircraftId = request('aircraft_id');
        $aircraft = AircraftDetail::find($aircraftId);

        if($aircraft == null) {
            return redirect('/air$aircraftdetails/air$aircraftid/edit?msg=invalidair$aircraftid')->withInput();
        }
        $aircraft->active = 'yes';
        $aircraft->save();

        return redirect('/aircraftdetails/activateaircraftid/edit?msg=successfull')->withInput();
    }
}
