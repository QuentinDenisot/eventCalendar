<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Event;
use Calendar;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::get();
        $eventsList = [];

        foreach($events as $key => $event)
        {
            $eventsList[] = Calendar::event(
                $event->event_name,
                $event->full_day,
                new \DateTime($event->start_date),
                new \DateTime($event->end_date)
            );
        }

        $calendarEvents = Calendar::addEvents($eventsList);

        return view('events', compact('calendarEvents'));
    }

    public function addEvent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'event_name' => 'required',
            'full_day' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $event = new Event();
        $event->event_name = $request['event_name'];
        $event->full_day = $request['full_day'];
        $event->start_date = $request['start_date'];
        $event->end_date = $request['end_date'];

        $event->save();

        return Redirect::to('/events');
    }
}