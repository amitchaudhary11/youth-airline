<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $guarded = [];

    public function aircraftdetail()
    {
        return $this->belongsTo(AircraftDetail::class, 'aircraft_id');
    }

}
