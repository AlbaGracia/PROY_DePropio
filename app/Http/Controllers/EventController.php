<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Event;
use App\Models\Space;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    private $pag = 9;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::orderBy('start_date', 'asc')->paginate($this->pag);
        return view('view_components.event.all', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $spaces = Space::all();
        return view('view_components.event.form', ['categories' => $categories, 'spaces' => $spaces]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $event = new Event();
        $event->name = $request->name;
        $event->description = $request->description;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->price = $request->price;
        $event->web_url = $request->web_url;
        $event->space_id = $request->space_id;
        $event->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('events/images', 'public');
            $event->image_path =  'storage/' . $path;
        }
        $event->save();
        return redirect()->route('event.show', $event->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::findOrFail($id);

        $comments = $event->comments()
            ->with('user')
            ->orderBy('publish_date', 'desc')
            ->paginate(4);

        return view('view_components.event.show', ['event' => $event, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::find($id);
        $categories = Category::all();
        $spaces = Space::all();
        return view('view_components.event.form', ['event' => $event, 'categories' => $categories, 'spaces' => $spaces]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::find($id);
        $event->name = $request->name;
        $event->description = $request->description;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->price = $request->price;
        $event->web_url = $request->web_url;
        $event->space_id = $request->space_id;
        $event->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('events/images', 'public');
            $event->image_path =  'storage/' . $path;
        }
        $event->save();
        return redirect()->route('event.show', $event->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect()->route('event.index');
    }

    public function showThisWeekEvents()
    {

        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $events = Event::where(function ($query) use ($startOfWeek, $endOfWeek) {
            $query->whereBetween('start_date', [$startOfWeek, $endOfWeek])
                ->orWhereBetween('end_date', [$startOfWeek, $endOfWeek])
                ->orWhere(function ($query) use ($startOfWeek, $endOfWeek) {
                    $query->where('start_date', '<', $startOfWeek)
                        ->where('end_date', '>', $endOfWeek);
                });
        })->paginate($this->pag);

        return view('view_components.event.all', ['events' => $events, 'thisWeek' => true, 'mon' => $startOfWeek, 'sun' => $endOfWeek]);
    }


    public function eventsInSpace($id)
    {
        $space = Space::find($id);
        $events = Event::where('space_id', '=', $id)->paginate($this->pag);
        return view('view_components.event.all', ['events' => $events, 'eventsInSpace' => true, 'space' => $space]);
    }
}
