<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //All events
        $events = Event::paginate(20);;
        return view('events.index', compact('events'));
    }

    //create
    public function create()
    {
        return view('events.new');
    }

    //store
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'location' => '',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'event_date' => '',
            'event_time' => '',
        ]);

        //store thumbnail
        //store image file in public/books/images
        $imagePath = request('thumbnail')->store('events/image', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        $event = new Event;
        $event->title = $request->title;
        $event->details = $request->details;
        $event->location = $request->location;
        $event->event_date = $request->event_date;
        $event->event_time = $request->event_time;
        $event->thumbnail = $imagePath;
        $event->save();
        return back()->with('success', 'Event created successfully');
    }

    //edit
    public function edit($id)
    {
        $event = Event::find($id);
        $eventId = $event->id;
        $eventTitle = $event->title;
        $eventDetails = $event->details;
        $eventLocation = $event->location;
        $eventTime = $event->event_time;
        $eventDate = $event->event_date;
        $eventThumbnail = $event->thumbnail;

        return view('events.edit', compact('eventId', 'eventTitle', 'eventDetails', 'eventLocation', 'eventTime', 'eventDate', 'eventThumbnail'));

    }

    //update
    public function update(Request $request, $id)
    {
        //validate
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'location' => '',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'event_date' => '',
            'event_time' => '',
        ]);

        //store thumbnail
        //store image file in public/books/images
        if ($request->has('thumbnail')) {
            $imagePath = request('thumbnail')->store('events/image', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();
        }

        $event = Event::find($id);
        $event->title = $request->title;
        $event->details = $request->details;
        $event->location = $request->location;
        $event->event_date = $request->event_date;
        $event->event_time = $request->event_time;
        if ($request->has('thumbnail')) {
        $event->thumbnail = $imagePath;
        }
        $event->save();
        return back()->with('success', 'Event updated successfully');
    }

    //destroy
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return back()->with('success', 'Event deleted successfully');
    }
}
