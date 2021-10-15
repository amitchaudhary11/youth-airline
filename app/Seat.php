<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    public function passenger()
    {
        return $this->hasMany(Passenger::class);
    }
}
