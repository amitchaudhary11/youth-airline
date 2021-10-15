<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail()
    {
        $details = [
            'firstName' => request('firstname'),
            'emailAddress' => request('email'),
            'title' => request('subject'),
            'body' => request('message')
        ];

        Mail::to('ac8996275@gmail.com')->send(new TestMail($details));

        return redirect('/customer/contact?msg=successfull')->withInput();
    }
}
