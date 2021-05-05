<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail()
    {
        $details = [
            'title' => 'Mail from surfside media',
            'body' => 'This is for testing mail using gmail'
        ];

        Mail::to("ndridi603@gmail.com")->send(new TestMail($details));
        return "Email Sent";
    }
}
