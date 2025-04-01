<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        // Εδώ μπορείς να στείλεις email ή να αποθηκεύσεις σε DB
        // Mail::to('your@email.com')->send(new ContactMail($request->all()));

        return back()->with('success', 'Το μήνυμά σας εστάλη με επιτυχία!');
    }
}
