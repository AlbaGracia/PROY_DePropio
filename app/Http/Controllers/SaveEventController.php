<?php

namespace App\Http\Controllers;

use App\Models\SaveEvent;
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


    public function index()
    {
        $userId = Auth::id();

        // Cargar todos los eventos guardados del usuario
        $saveEvents = SaveEvent::where('user_id', $userId)
            ->with('event')
            ->get();

        // Filtrar eventos expirados y eliminarlos
        foreach ($saveEvents as $savedEvent) {
            $event = $savedEvent->event;

            if (!$event) {
                // Si por alguna razón el evento no existe, lo eliminamos
                $savedEvent->delete();
                continue;
            }

            $now = now();

            $endDate = $event->end_date ? \Carbon\Carbon::parse($event->end_date) : null;
            $startDate = \Carbon\Carbon::parse($event->start_date);

            $isExpired = $endDate
                ? $endDate->isPast()
                : $startDate->isPast();

            if ($isExpired) {
                $savedEvent->delete();
            }
        }

        // Recargar solo los eventos válidos después de eliminar
        $saveEvents = SaveEvent::where('user_id', $userId)
            ->with('event')
            ->paginate(10);

        return view('view_components.save-events.index', compact('saveEvents'));
    }
}
