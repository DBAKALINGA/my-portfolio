<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'   => 'required|min:3',
            'email'  => 'required|email',
            'stars'  => 'required|integer|min:1|max:5',
            'review' => 'required|min:5',
        ]);

        Rating::create($validated);

        return back()->with('success_rating', 'Asante kwa kutoa Rating! Imetumwa na inasubiri uhakiki wa Admin.');
    }
}