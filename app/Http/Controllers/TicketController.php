<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ticket;

use App\Flight;
use App\Passenger;
use PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

// use App\Passenger;

class TicketController extends Controller
{

    public function showAvailableTicketsForm()
    {
        return view('tickets.showAvailableTicketsForm');
    }

    public function showAvailableTickets()
    {
        $flightNo = request('flight_no');

        $tickets = Ticket::where([
            ['flight_no', '=', $flightNo],
            ['booking_status', '=', 'CONFIRMED'],
        ])->get();

        if($tickets->count() != 0) {
            $confirmedPassenger = 0;
           foreach ($tickets as $value) {
               // dd($value->no_of_passenger);
                   $confirmedPassenger = $confirmedPassenger + $value->no_of_passenger;
           }

           // dd($totalPassenger);

         $flights = Flight::where('flight_no', $flightNo)->get();

         foreach ($flights as $flight) {
            $totalSeats = $flight->aircraftdetail->total_capacity;
         }

         return view('tickets.showAvailableTickets', ['confirmedPassenger' => $confirmedPassenger, 'totalSeats' => $totalSeats]);

        } else {
            return redirect('tickets/showavailableticketsform?msg=noticketsbooked')->withInput();
        }
    }

    public function getTickets()
    {
        //dd(request()->all());



        $seatsArray = [];
        for ($i=0; $i < session()->get('no_of_passenger'); $i++) {
            if(empty(request("r$i")))
            {
                return redirect()->back()->with('msg', 'Seat is not selected!!');
            }
            $seatsArray[] = request("r$i");
        }
        //dd($seatsArray);

        if(count($seatsArray) != count(array_unique($seatsArray))) {
            return redirect()->route('passengers.create', ['msg' => 'selectSeperateSeat', 'data' => request()->all()]);
        } else {
            // no duplicate values
            $flight_no = request('flight_no');
            //dd($flight_no);
            $flights = Flight::where('flight_no', request('flight_no'))->get();
            // $no_of_passenger = Passenger::find(session()->get('pnr'));
            // dd($no_of_passenger);
            foreach ($flights as $flight) {
                $journey_date = $flight->departure_date;
            }
                session()->put('journey_date1', $journey_date);
                $data = request()->all();
                $result = Ticket::find(session()->get('pnr'));
            if($result == null) {
                $pnr = rand(10000, 99999);
                session()->put('pnr', $pnr);
                Ticket::create([
                    'id' => $pnr,
                    'date_of_reservation' => date("Y-m-d"),
                    'booking_status' => "PENDING",
                    'no_of_passenger' => session()->get('no_of_passenger'),
                    'payment_id' => "NULL",
                    'flight_no' => request('flight_no'),
                    'journey_date' => $journey_date,
                    'customer_id' => auth()->user()->id,
                ]);
                    return redirect()->route('passengers.store', ['data' => $data, 'flight_no' => $flight_no, 'total' => 'yes']);
            } else {
                $no_of_passenger = $result->passenger->count();
                // dd($no_of_passenger);
                $numPass = session()->get('no_of_passenger');

                if ($no_of_passenger != $numPass) {
                    return redirect()->route('passengers.store', ['data' => $data, 'flight_no' => $flight_no]);
                }
                session()->forget('pnr');
                return redirect('/passengers/create?msg=youcannotaddmorepassenger&flight_no=' . request('flight_no'))->withInput();
            }
        }


            $flight_no = request('flight_no');
            $flights = Flight::where('flight_no', request('flight_no'))->get();
            // $no_of_passenger = Passenger::find(session()->get('pnr'));
            // dd($no_of_passenger);
                $journey_date = $flights[0]->departure_date;
                session()->put('journey_date1', $journey_date);
                $data = request()->all();
                $result = Ticket::find(session()->get('pnr'));
            if($result == null) {
                $pnr = rand(10000, 99999);
                session()->put('pnr', $pnr);
                Ticket::create([
                    'id' => $pnr,
                    'date_of_reservation' => date("Y-m-d"),
                    'booking_status' => "PENDING",
                    'no_of_passenger' => session()->get('no_of_passenger'),
                    'payment_id' => "NULL",
                    'flight_no' => request('flight_no'),
                    'journey_date' => $journey_date,
                    'customer_id' => auth()->user()->id,
                ]);
                    return redirect()->route('passengers.store', ['data' => $data, 'flight_no' => $flight_no, 'total' => 'yes']);
            } else {
                $no_of_passenger = $result->passenger->count();
                // dd($no_of_passenger);
                $numPass = session()->get('no_of_passenger');

                if ($no_of_passenger != $numPass) {
                    return redirect()->route('passengers.store', ['data' => $data, 'flight_no' => $flight_no]);
                }
                session()->forget('pnr');
                return redirect('/passengers/create?msg=youcannotaddmorepassenger&flight_no=' . request('flight_no'))->withInput();
            }

        }

        public function update()
        {
            $updateTicket = Ticket::find(request('pnr'));
            $updateTicket->booking_status = "CONFIRMED";
            $updateTicket->payment_id = request('payment_id');
            $updateTicket->save();
            // dd('updated successfully');
            return redirect()->route('tickets.success', ['pnr' => request('pnr')])->with('msg-success', 'Ticket Booking Successfull');
        }

        public function success()
        {
            $ticket = Ticket::find(request('pnr'));

            // dd($ticket->payment);

            // dd($ticket->payment->payment_amount);

            // $payments = $ticket->payment->payment_amount;

            return view('tickets.success', ['payments' => $ticket->payment->payment_amount, 'pnr' => $ticket->payment->pnr]);
        }

        public function cancel()
        {
            return view('tickets.cancel');
        }

        public function getCancel()
        {
            $cancelTicket = Ticket::find(request('pnr'));
            if($cancelTicket == null) {
                return redirect('/tickets/cancel?msg=invalidPNR')->withInput();
            } else {
                if($cancelTicket->count() > 0)
                {
                    $cancelTicket->booking_status = "CANCELED";
                    $cancelTicket->save();

                    if($cancelTicket->payment !== null) {
                        $payment_amount = $cancelTicket->payment->payment_amount;
                        // dd($payment_amount);

                        return redirect()->route('tickets.cancelsuccess', ['payment_amount' => $payment_amount]);
                    } else {
                    return redirect('/tickets/cancel?msg=paynotfound')->withInput();
                    }
                } else {
                    return redirect('/tickets/cancel?msg=invalidPNR')->withInput();
                }
            }
        }

        public function cancelsuccess()
        {
            $refundAmount = 0.85 * request('payment_amount');
            return redirect()->route('tickets.cancel')->with('msg3', "Your amount of Rs. $refundAmount will be refunded to your bank account (Cancellation charge on 15% of your ticket amount has been deducted).");
        }


        public function eTicket()
        {
            $pnr = request('pnr');

            $flightDetails = Ticket::find($pnr);

            $flights = Flight::where('flight_no', $flightDetails->flight_no)->first();


            $passengerDetails = Passenger::where('pnr', $pnr)->get();

            return view('eticket', ['flightDetails' => $flightDetails, 'passengerDetails' => $passengerDetails, 'flights' => $flights]);
        }

        public function downloadEticket()
        {
            $pnr = request('pnr');

            $flightDetails = Ticket::find($pnr);

            $flights = Flight::where('flight_no', $flightDetails->flight_no)->first();


            $passengerDetails = Passenger::where('pnr', $pnr)->get();


            $pdf = PDF::loadView('eticket', compact('flightDetails', 'passengerDetails', 'flights'));

            Storage::put('public/pdf/eticket.pdf', $pdf->output());
            return $pdf->download('eticket.pdf');



        }

        public function emailEticket()
        {
            $pnr = request('pnr');

            $flightDetails = Ticket::find($pnr);

            $flights = Flight::where('flight_no', $flightDetails->flight_no)->first();


            $passengerDetails = Passenger::where('pnr', $pnr)->get();


            $pdf = PDF::loadView('eticket', compact('flightDetails', 'passengerDetails', 'flights'));

            Storage::put('public/pdf/eticket.pdf', $pdf->output());


            $data = array('name'=>"Youth Airline");
            Mail::send('emails.Test', $data, function($message) {
               $message->to('ac8996275@gmail.com', 'Customer')->subject
                  ('E-ticket');
               $message->attach(storage_path('app\public\pdf\eticket.pdf'));
               $message->from('ac8996275@gmail.com','Youth Airline');
            });
            Storage::delete('public/pdf/eticket.pdf');
            return redirect()->back()->with('msg2', 'Email sent with Attachement');
        }
}
