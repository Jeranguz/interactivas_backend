<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Tag;
use App\Models\Course;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //public function index()
    //{
        //
        //$events = Event::all();
        //return view('events.index', compact('events'));
        /*$events = Event::select(
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
        ->where('events.status', 1)
        ->orderBy('events.start', 'asc');
        //->get();

        $categories = Category::all();
        $events = Event::all();
        
        $total = count(Event::all()->where('events.status', 1));
        return view('events.index', compact('events', 'total', 'categories'));*/
    //}

    public function index(Request $request)
    {
        $query = Event::query();

        if ($request->has('status') && $request->status == 'finalizados') {
            $events = $query->where('end', '<', Carbon::now())->get();
        } else {
            $events = $query->where('end', '>=', Carbon::now())->get();
        }

        return view('events.index', compact('events'));
    }

    public function allEvents()
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
        $tags = Tag::all();
        $categories = Category::all();
        $courses = Course::all();
        return view('events.create', compact('tags', 'categories', 'courses'));
    }

    /*public function search(Request $request)
    {
        

        if($request->category == 0){
            $events = Event::select(
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
            ->whereAny(['events.title'], 'LIKE', '%' . $request->event . '%')
            ->whereBetween('events.start', [$request->from_datetime, $request->to_datetime])
            ->where('events.status', 1)
            ->orderBy('events.start', 'asc');
        }else{
            $events = Event::select(
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
            ->whereAny(['events.title'], 'LIKE', '%' . $request->event . '%')
            ->whereBetween('events.start', [$request->from_datetime, $request->to_datetime])
            ->where('events.status', 1)
            ->orderBy('events.start', 'asc');
        }
        
        $total = count($events);
        return view('events.search', compact('events', 'total'));
    }*/

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $start = $request->start_date . " " . $request->start_hour;
        $end = $request->end_date . " " . $request->end_hour;
        $file = $request->file('image');
        if ($file) {
            $file_name = 'event_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images', $file_name);
        } else {
            $file_name = 'placeholder-image.webp';
        }
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
        // return redirect('http://localhost:5173/PaginaCalendario');
        return redirect()->route('events.index');
    }
    public function storeApi(Request $request)
    {
        $start = $request->start_date . " " . $request->start_hour;
        $end = $request->end_date . " " . $request->end_hour;
        $file = $request->file('image');
        if ($file) {
            $file_name = 'event_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images', $file_name);
        } else {
            $file_name = 'placeholder-image.webp';
        }

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
        return redirect('http://localhost:5173/PaginaCalendario');
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
            //->get();
            ->firstOrFail(); // Aquí usamos firstOrFail() en lugar de get()

        $event->image = 'http://interactivas_backend.test/storage/images/' . $event->image;
        $event->start = Carbon::parse($event->start)->isoFormat('dddd, D [de] MMMM [de] YYYY, h:mm A');
        $event->end = Carbon::parse($event->end)->isoFormat('dddd, D [de] MMMM [de] YYYY, h:mm A');

        return view('events.show', compact('event'));
    }
    public function apiEvent(string $id)
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
        $event = Event::find($id);
        $tags = Tag::all();
        $categories = Category::all();
        $courses = Course::all();

        return view('events.edit', compact('event', 'tags', 'categories', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        //
        $events = Event::find($id);
        $start = $request->start_date . " " . $request->start_hour;
        $end = $request->end_date . " " . $request->end_hour;
        $file = $request->file('image');
        $file_name = 'event_' . time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public/images', $file_name);
        $events->update([
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
        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $events = Event::find($id);
        $events->delete();
        return redirect()->route('events.index');
    }

    public function userEvents($user_id)
    {

        Carbon::setlocale('es');
        //
        $event = Event::select(
            'events.id',
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
            ->join('user_courses', 'courses.id', '=', 'user_courses.courses_id')
            ->where('user_courses.users_id', $user_id)
            ->get();
        // $time = Carbon::parse($event->start)->format('h:i A');


        return $event;
    }
}
