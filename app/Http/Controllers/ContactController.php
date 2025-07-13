<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showContactForm()
    {
        return view('contact');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message_content' => $request->message,
        ];

        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->to('alisaaulia491@gmail.com', 'Alisa')
                    ->subject($data['subject']);
            $message->from($data['email'], $data['name']);
        });

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}