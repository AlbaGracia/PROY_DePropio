<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Event;
use App\Models\Space;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class EventController extends Controller
{
    private $pag = 9;

    public function index(Request $request)
    {
        $query = Event::query();

        if ($request->filled('space_id')) {
            $query->where('space_id', $request->space_id);
        }

        // Filtrar eventos actuales 
        $query->whereDate('end_date', '>=', now()->toDateString());

        // Aplicar filtros (keywords, categorías, precio, orden)
        $this->applyFilters($query, $request);

        $events = $query->paginate($this->pag)->withQueryString();
        $categories = Category::all();

        return view('view_components.event.all', compact('events', 'categories'));
    }


    public function create()
    {
        return view('view_components.event.form', $this->loadFormDependencies());
    }

    public function store(Request $request)
    {
        $event = new Event();
        $this->saveEventData($request, $event);
        return redirect()->route('event.list', $event->id);
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
        return redirect()->route('event.list', $event->id);
    }

    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);

        if ($event->image_path) {
            $storagePath = str_replace('storage/', '', $event->image_path);
            if (Storage::disk('public')->exists($storagePath)) {
                Storage::disk('public')->delete($storagePath);
            }
        }
        $event->delete();

        return redirect()->route('event.list');
    }


    public function list(Request $request)
    {
        $user = Auth::user();
        $query = Event::query();

        if ($user->hasRole('admin_space')) {
            $query->whereHas('space', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            });
        } elseif ($user->hasRole('user')) {
            abort(403, __('labels.403-title'));
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $today = now()->startOfDay();

        if ($request->filled('status')) {
            if ($request->status === 'current') {
                $query->whereDate('end_date', '>=', $today);
            } elseif ($request->status === 'past') {
                $query->whereDate('end_date', '<', $today);
            }
        }

        $events = $query->paginate(10)->withQueryString();

        return view('view_components.event.list', ['events' => $events]);
    }


    public function showThisWeekEvents(Request $request)
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $query = Event::query();
        $query->where(function ($q) use ($startOfWeek, $endOfWeek) {
            $q->whereBetween('start_date', [$startOfWeek, $endOfWeek])
                ->orWhereBetween('end_date', [$startOfWeek, $endOfWeek])
                ->orWhere(function ($q2) use ($startOfWeek, $endOfWeek) {
                    $q2->where('start_date', '<', $startOfWeek)
                        ->where('end_date', '>', $endOfWeek);
                });
        });


        $this->applyFilters($query, $request);

        $events = $query->paginate($this->pag)->withQueryString();;
        $categories = Category::all();

        return view('view_components.event.all', [
            'events' => $events,
            'thisWeek' => true,
            'mon' => $startOfWeek,
            'sun' => $endOfWeek,
            'categories' => $categories
        ]);
    }


    public function eventsInSpace(Request $request, $id)
    {
        $space = Space::findOrFail($id);
        $today = now()->toDateString();

        $query = Event::where('space_id', $id)
            ->whereDate('end_date', '>=', $today);

        $this->applyFilters($query, $request);

        $events = $query->paginate($this->pag)->withQueryString();;
        $categories = Category::all();

        return view('view_components.event.all', [
            'events' => $events,
            'eventsInSpace' => true,
            'space' => $space,
            'categories' => $categories
        ]);
    }



    public function calendar()
    {
        return view('calendar');
    }

    public function getEventsByDate($date)
    {
        $events = Event::whereDate('start_date', '<=', $date)
            ->whereDate('end_date', '>=', $date)
            ->with('category')
            ->orderBy('category_id', 'asc')
            ->get();
        return response()->json($events);
    }

    public function getEventsByMonth($year, $month)
    {
        $start = Carbon::create($year, $month, 1)->startOfMonth();
        $end = $start->copy()->endOfMonth();

        $events = Event::where(function ($q) use ($start, $end) {
            $q->whereBetween('start_date', [$start, $end])
                ->orWhereBetween('end_date', [$start, $end])
                ->orWhere(function ($query) use ($start, $end) {
                    $query->where('start_date', '<=', $start)
                        ->where('end_date', '>=', $end);
                });
        })->get();

        return response()->json($events);
    }

    public function deletePastEvents()
    {
        $today = now()->toDateString();
        $user = Auth::user();

        if ($user->hasRole('admin_space')) {
            $events = Event::whereHas('space', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->where('end_date', '<', $today);
        }

        if ($user->hasRole('admin')) {
            $events = Event::where('end_date', '<', $today);
        }

        $events->each(function ($event, $key) {
            $event->delete();
        });

        return redirect()->route('event.list');
    }


    private function saveEventData(Request $request, Event $event)
    {
        $event->name = $request->name;
        $event->description = $request->description;
        $event->start_date = $request->start_date;
        if ($request->end_date) $event->end_date = $request->end_date;
        else $event->end_date = $request->start_date;
        $event->price = $request->price;
        $event->web_url = $request->web_url;
        $event->space_id = $request->space_id;
        $event->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            if ($event->exists && $event->image_path) {
                $oldPath = str_replace('storage/', '', $event->image_path);
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }
            $image = $request->file('image');
            $filename = Str::slug($event->name) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('events/images', $filename, 'public');
            $event->image_path = 'storage/' . $path;
        }

        $event->save();
    }

    private function loadFormDependencies()
    {
        $user = Auth::user();

        if ($user->hasRole('admin_space')) {
            $spaces = Space::where('user_id', $user->id)->get();
        } else {
            $spaces = Space::all();
        }

        return [
            'categories' => Category::all(),
            'spaces' => $spaces,
        ];
    }

    private function applyFilters($query, Request $request)
    {
        if ($request->filled('keywords')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->keywords . '%');
            });
        }

        if ($request->filled('categories')) {
            $query->whereIn('category_id', $request->categories);
        }

        if ($request->filled('price_min') && $request->filled('price_max')) {
            $query->whereBetween('price', [$request->input('price_min'), $request->input('price_max')]);
        } else if ($request->filled('price_min') && !$request->filled('price_max')) {
            $query->where('price', '>=', $request->input('price_min'));
        } else if ($request->filled('price_max') && !$request->filled('price_min')) {
            $query->where('price', '<=', $request->input('price_max'));
        }

        // Ordenamiento
        switch ($request->sort) {
            case 'date_asc':
                $query->orderBy('end_date', 'asc');
                break;
            case 'date_desc':
                $query->orderBy('end_date', 'desc');
                break;
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            default:
                $query->orderBy('end_date', 'asc');
        }
    }
}
