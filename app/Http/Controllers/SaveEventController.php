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

        return back()->with('saved_event', true);;
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
        $saveEvents = SaveEvent::where('user_id', Auth::id())->with('event')->paginate(10);
        return view('view_components.save-events.index', compact('saveEvents'));
    }
}
