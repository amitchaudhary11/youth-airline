<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AircraftDetail extends Model
{
    protected $guarded = [];

    public $autoincrement = false;

    public function flights()
    {
        return $this->hasMany(Flight::class, 'aircraft_id');
    }
}
