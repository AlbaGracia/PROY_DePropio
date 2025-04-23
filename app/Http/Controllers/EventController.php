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

    public function index()
    {
        $events = Event::orderBy('start_date', 'asc')->paginate($this->pag);
        return view('view_components.event.all', ['events' => $events]);
    }

    public function create()
    {
        return view('view_components.event.form', $this->loadFormDependencies());
    }

    public function store(Request $request)
    {
        $event = new Event();
        $this->saveEventData($request, $event);
        return redirect()->route('event.show', $event->id);
    }

    public function show(string $id)
    {
        $event = Event::findOrFail($id);
        $comments = $event->comments()->with('user')->orderBy('publish_date', 'desc')->paginate(4);
        return view('view_components.event.show', ['event' => $event, 'comments' => $comments]);
    }

    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        return view('view_components.event.form', array_merge(['event' => $event], $this->loadFormDependencies()));
    }

    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);
        $this->saveEventData($request, $event);
        return redirect()->route('event.show', $event->id);
    }

    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
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
        $space = Space::findOrFail($id);
        $events = Event::where('space_id', $id)->paginate($this->pag);
        return view('view_components.event.all', ['events' => $events, 'eventsInSpace' => true, 'space' => $space]);
    }

    private function saveEventData(Request $request, Event $event)
    {
        $event->name = $request->name;
        $event->description = $request->description;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->price = $request->price;
        $event->web_url = $request->web_url;
        $event->space_id = $request->space_id;
        $event->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('events/images', 'public');
            $event->image_path = 'storage/' . $path;
        }

        $event->save();
    }

    private function loadFormDependencies()
    {
        return [
            'categories' => Category::all(),
            'spaces' => Space::all(),
        ];
    }
}