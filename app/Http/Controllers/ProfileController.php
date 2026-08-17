<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request; // hii inaruhusu laravel kupokea request kutoka kwa user na kuirudisha kwenye controller hii

class ProfileController extends Controller //tunatengeneza class ambayo inaridhi kutoka kwa controller ya base ya laravel
{
    // hapa ndipo tutaweka methods ambazo zinahandle request kutoka kwa user na kurudisha response
 public function show($name)
    {
        return view('profile', [
            'name' => $name
        ]);
    }
}
