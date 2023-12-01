<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;


class MailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $senderEmail = $request->input('sender_email');
        $subject = $request->input('subject');
        $emailContent = $request->input('message');

        Mail::to('sacrifice7355608@gmail.com')
            ->send(new ContactFormMail($subject, $emailContent, $senderEmail));

        return redirect('/')->with('success', 'Form has been submitted');
    }
}
