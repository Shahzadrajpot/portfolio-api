<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageMail;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactMessageController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
        ]);

        $contactMessage = ContactMessage::create($validated);

        Mail::to('shahzadrajput686@gmail.com')
            ->send(new ContactMessageMail($contactMessage));

        return response()->json([
            'message' => 'Your message has been sent successfully.',
            'data' => $contactMessage,
        ], 201);
    }
}
