<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $guarded = [];

    public $autoincrement = false;

    public function customer()
    {
        return $this->belongsTo(User::class);
    }

    public function passenger()
    {
        return $this->hasMany(Passenger::class, 'pnr');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'pnr');
    }
}
