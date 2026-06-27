<?php

namespace App\Http\Controllers;

use App\Mail\ContactReceived;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:160'],
            'subject' => ['nullable', 'string', 'max:160'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        $message = ContactMessage::create($data);

        // Send email notification (silently skip if mail isn't configured).
        try {
            $to = config('mail.from.address') ?: config('portfolio.contact_email');
            if ($to) {
                Mail::to($to)->send(new ContactReceived($message));
            }
        } catch (\Throwable $e) {
            report($e);
        }

        return back()->with('contact_success', 'Thanks for reaching out — your message has been sent!');
    }
}
