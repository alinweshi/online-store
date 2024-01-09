<?php

namespace App\Http\Controllers;

use App\Jobs\SendingMailsJob;
use App\Mail\SendingMails;
use App\Models\Mails;
use Illuminate\Support\Facades\Mail;

class SendMailsController extends Controller
{

    public function sendEmail()
    {
        $mails = Mails::all();
        foreach ($mails as $mail) {
            Mail::to($mail->email)->send(new SendingMails());
        }
        SendingMailsJob::dispatch();
        return 'Email sent successfully!';
    }
}
