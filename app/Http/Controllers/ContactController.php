<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail; // Import Mail
use App\Mail\ContactFormMail;        // Import ContactFormMail

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|min:3',
            'email'   => 'required|email',
            'message' => 'required|min:10',
        ]);

        // 1. Hifadhi kwenye Database
        Contact::create($validated);

        // 2. Tuma Email kwenda kwenye email yako
        Mail::to('fraigodrichard@gmail.com')->send(new ContactFormMail($validated));

        return back()->with('success', 'Asante kwa kutuma ujumbe! Umefika salama.');
    }
}