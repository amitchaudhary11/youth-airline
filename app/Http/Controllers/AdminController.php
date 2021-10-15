<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Admin;
use App\AircraftDetail;
use App\Flight;
use App\Post as AppPost;
use App\Ticket;

use App\User;
use FontLib\Table\Type\post;

class AdminController extends Controller
{
    public function index()
    {
        $totalCustomers = User::count();
        $totalFlights = Flight::count();
        $totalAircrafts = AircraftDetail::count();
        $totalPosts = AppPost::count();
        return view('admin.show', compact('totalCustomers', 'totalFlights', 'totalAircrafts', 'totalPosts'));
    }

    public function complete()
    {
        return view('admin.complete');
    }

    public function completed()
    {
        $tickets = Ticket::where('flight_no', strtoupper(request('flight_no')))->latest()->get();

        foreach ($tickets as $ticket) {
            if($ticket->booking_status == 'CONFIRMED') {
                $ticket->booking_status = 'COMPLETED';
                $ticket->save();
            }
        }

        if ($tickets->count() == 0) {
            return redirect('/admin/complete?msg=noticketsforthisflight_no')->withInput();
        }
        return redirect('/admin/complete?msg=complete');
    }

    public function viewTicketForm()
    {
        return view('admin.viewTicketForm');
    }

    public function viewTicket()
    {
        $tickets = Ticket::where('flight_no', strtoupper(request('flight_no')))->latest()->get();

        $confirmedPassenger = 0;
        $pendingPassenger = 0;
        $canceledPassenger = 0;

        foreach ($tickets as $ticket) {
            if($ticket->booking_status == 'CONFIRMED') {
                $confirmedPassenger = $confirmedPassenger + $ticket->no_of_passenger;
            }

            if ($ticket->booking_status == 'PENDING') {
                $pendingPassenger = $pendingPassenger + $ticket->no_of_passenger;
            }

            if($ticket->booking_status == 'CANCELED') {
                $canceledPassenger = $canceledPassenger + $ticket->no_of_passenger;
            }
        }

        if ($tickets->count() == 0) {
            return redirect('/admin/viewbookedtickets?msg=noticketsforthisflight_no')->withInput();
        }
        return view('admin.viewTicket', compact('tickets'), ['confirmedPassenger' => $confirmedPassenger, 'pendingPassenger' => $pendingPassenger, 'canceledPassenger' => $canceledPassenger]);
    }

    public function getLogin()
    {
        return view('admin.getLogin');
    }

    public function postLogin()
    {
        $admin = Admin::find(1);

        $check = password_verify(request('password'), $admin->password);
        // dd($check);
        if($admin->email == request('email') && $check == true)
        {
            session()->put('adminID', $admin->id);
            return redirect('/admin');
        } else {
            return redirect('/admin/getLogin?msg=wrong')->withInput();
        }
    }

    public function logout()
    {
        session()->forget('adminID');
        return redirect('/admin');
    }

}
