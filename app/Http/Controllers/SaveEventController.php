<?php

namespace App\Http\Controllers;

use App\Models\SaveEvent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaveEventController extends Controller
{
    public function save($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        SaveEvent::firstOrCreate([
            'user_id' => Auth::id(),
            'event_id' => $id,
        ]);

        return back()->with('saved_event', true);
    }

    public function unsave($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        SaveEvent::where('user_id', Auth::id())
            ->where('event_id', $id)
            ->delete();

        return back();
    }


    public function index(Request $request)
    {
        $userId = Auth::id();

        // Cargar todos los eventos guardados del usuario
        $saveEvents = SaveEvent::where('user_id', $userId)
            ->with('event')
            ->get();

        // Filtrar eventos expirados y eliminarlos
        foreach ($saveEvents as $savedEvent) {
            $event = $savedEvent->event;
            $endDate = Carbon::parse($event->end_date);

            if ($endDate->isPast()) {
                $savedEvent->delete();
            }
        }

        $query = SaveEvent::where('user_id', $userId)
            ->whereHas('event', function ($q) {
                $q->whereDate('end_date', '>=', now()->format('Y-m-d'));
            })
            ->with('event')
            ->join('events', 'save_events.event_id', '=', 'events.id')
            ->select('save_events.*');

        if ($request->filled('date')) {
            $date = $request->input('date');
            $query->whereHas('event', function ($q) use ($date) {
                $q->whereDate('start_date', '<=', $date)
                    ->whereDate('end_date', '>=', $date);
            });
        }

        if ($request->input('sort') === 'date_asc') {
            $query->orderBy('events.start_date', 'asc');
        } elseif ($request->input('sort') === 'date_desc') {
            $query->orderBy('events.start_date', 'desc');
        } else {
            $query->orderBy('events.start_date', 'asc');
        }

        $saveEvents = $query->paginate(10)->withQueryString();

        return view('view_components.save-events.index', compact('saveEvents'));
    }
}
