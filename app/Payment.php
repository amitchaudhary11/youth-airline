<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];

    public $autoincrement = false;

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
