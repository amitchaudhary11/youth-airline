<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = User::find(auth()->user()->id);
        return view('customers.index', compact('customer'));
    }

    public function show()
    {
        $customer = User::find(auth()->user()->id);

        return view('customers.show', compact('customer'));
    }

    public function contact()
    {
        return view('customers.contact');
    }

    public function getcustomer()
    {
        $customers = User::latest()->get();

        return view('customers.getcustomer', compact('customers'), ['i' => 0]);
    }

    public function delete(User $delete)
    {
        $delete->delete();
        return redirect('/customer/getcustomer?msg=successfull');
    }

}
