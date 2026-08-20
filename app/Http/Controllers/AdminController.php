<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Rating;

class AdminController extends Controller
{
    // Ukurasa mkuu wa Admin Panel
    public function dashboard()
    {
        $messages = Contact::latest()->get();
        $ratings = Rating::latest()->get();

        return view('admin.dashboard', compact('messages', 'ratings'));
    }

    // Kubadilisha status ya rating kuwa Approved
    public function approveRating($id)
    {
        $rating = Rating::findOrFail($id);
        $rating->update(['is_approved' => true]);

        return back()->with('success', 'Rating imekuwa approved na sasa itaonekana public!');
    }

    // Kufuta Rating
    public function deleteRating($id)
    {
        $rating = Rating::findOrFail($id);
        $rating->delete();

        return back()->with('success', 'Rating imefutwa kikamilifu.');
    }

    // Kufuta Ujumbe wa Contact
    public function deleteMessage($id)
    {
        $message = Contact::findOrFail($id);
        $message->delete();

        return back()->with('success', 'Ujumbe umefutwa.');
    }
}