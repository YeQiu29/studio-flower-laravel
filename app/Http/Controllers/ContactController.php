<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Setting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;

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

        // Get email settings from the database
        $settings = Setting::all()->keyBy('key');

        // Check if essential settings exist
        if (!isset($settings['mail_host'], $settings['mail_port'], $settings['mail_username'], $settings['mail_password'], $settings['mail_from_address'])) {
            return redirect()->back()->with('error', 'Email settings are not configured. Please contact the administrator.');
        }

        // Override mail configuration
        Config::set('mail.mailers.smtp.host', $settings['mail_host']->value);
        Config::set('mail.mailers.smtp.port', $settings['mail_port']->value);
        Config::set('mail.mailers.smtp.encryption', $settings['mail_encryption']->value ?? 'tls');
        Config::set('mail.mailers.smtp.username', $settings['mail_username']->value);
        Config::set('mail.mailers.smtp.password', Crypt::decryptString($settings['mail_password']->value));
        Config::set('mail.from.address', $settings['mail_from_address']->value);
        Config::set('mail.from.name', $settings['mail_from_name']->value ?? config('app.name'));

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message_content' => $request->message,
        ];

        try {
            Mail::send('emails.contact', $data, function($message) use ($data, $settings) {
                $message->to($settings['mail_from_address']->value, $settings['mail_from_name']->value)
                        ->subject($data['subject'])
                        ->replyTo($data['email'], $data['name']); // Set Reply-To to visitor's email
                $message->from($settings['mail_from_address']->value, $settings['mail_from_name']->value);
            });

            return redirect()->back()->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            // Log the error for debugging
            \Illuminate\Support\Facades\Log::error('Email sending failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Sorry, we could not send your message at this time. Please try again later.');
        }
    }
}