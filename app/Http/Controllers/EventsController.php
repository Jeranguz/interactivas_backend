<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $events = Event::all();
        return $events;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $start = $request->start_date . " " . $request->start_hour;
        $end = $request->end_date . " " . $request->end_hour;
        $file = $request->file('image');
        $file_name = 'event_' . time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public/images', $file_name);
        //
        Event::create([
            'courses_id' => $request->course,
            'categories_id' => $request->category,
            'tags_id' => $request->tag,
            'users_id' => $request->user,
            'title' => $request->title,
            'start' => $start,
            'end' => $end,
            'status' => $request->status,
            'description' => $request->description,
            'image' => $file_name,
            'percentage' => 15,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Carbon::setlocale('es');
        //
        $event = Event::select(
            'courses.name as course',
            'categories.name as category',
            'tags.name as tag',
            'events.title',
            'events.start',
            'events.end',
            'events.status',
            'events.description',
            'events.image',
            'events.percentage',
        )
            ->join('courses', 'events.courses_id', '=', 'courses.id')
            ->join('categories', 'events.categories_id', '=', 'categories.id')
            ->join('tags', 'events.tags_id', '=', 'tags.id')
            ->where('events.id', $id)
            ->get();
        $event[0]->image = 'http://interactivas_backend.test/storage/images/' . $event[0]->image;
        $date = Carbon::parse($event[0]->start)->isoFormat('dddd, D [de] MMMM [de] YYYY, h:mm A');
        // $time = Carbon::parse($event->start)->format('h:i A');
        $event[0]->start = $date;

        return $event;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
