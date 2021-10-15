<?php

namespace App\Http\Controllers;

use App\Flight;

use App\Payment;

use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Notifications\PaymentReceived;
use Illuminate\Support\Facades\Notification;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment.index');
    }

    public function show()
    {
        $pnr = request('pnr');

        $payments = Payment::where('pnr', $pnr)->get();

        if($payments->count() == 0) {
            return redirect('/payment?msg=paynotfound')->withInput();
        } else {
            return view('payment.show', compact('payments'));
        }
    }

    public function create()
    {
        $date = Carbon::now();
        $todayDate = $date->toDayDateTimeString();

        $flights = Flight::where('flight_no', request('flight_no'))->get();
            foreach ($flights as $flight) {
                $ticketPrice = $flight->price;
            }



        $no_of_passenger = request('no_of_passenger');



        $ticketAmount = $no_of_passenger * $ticketPrice;


        return view('payment.create', [
            'ticketPrice' => $ticketPrice,
            'ticketAmount' => $ticketAmount,
            'flight_no' => request('flight_no'),
            'journey_date1' => request('journey_date1'),
            'no_of_passenger' => request('no_of_passenger'),
            'pnr' => request('pnr'),
            'payment_id' => rand(100000000, 999999999),
            'payment_date' => date("Y-m-d"),
            'todayDate' => $todayDate
        ]);
    }

    public function store()
    {
        $data = request()->validate([
            'payment_id' => 'required',
            'pnr' => 'required',
            'payment_amount' => 'required',
            'payment_date' => 'required',
        ]);

        Payment::create([
            'id' => $data['payment_id'],
            'payment_date' => $data['payment_date'],
            'payment_amount' => $data['payment_amount'],
            'pnr' => $data['pnr'],
        ]);

        // Notification::send(request()->user(), new PaymentReceived());

        return redirect()->route('tickets.update', [
            'pnr' => $data['pnr'],
            'payment_id' => $data['payment_id'],
        ]);
    }
}
