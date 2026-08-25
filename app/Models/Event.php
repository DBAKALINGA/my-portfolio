<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Inaruhusu data zote zilizojazwa kwenye fomu kuhifadhiwa kwenye Database
    protected $guarded = [];
}