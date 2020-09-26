<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Partner;

class VitoController extends Controller
{
    public function __invoke()
    {
        $events = Event::orderBy('event_date', 'DESC')->skip(0)->take(10)->get();
        $partners = Partner::all();
        return view('welcome', compact('events', 'partners'));
    }
}
