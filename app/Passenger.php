<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    protected $guarded = [];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'pnr', 'id');
    }

    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }
}
