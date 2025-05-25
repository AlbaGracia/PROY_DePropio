<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {

        $user = Auth::user();
        $query = Comment::query();

        if ($user->hasRole('admin_space')) {
            $query->whereHas('event.space', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            });
        } elseif ($user->hasRole('user')) {
            abort(403, __('labels.403-title'));
        }


        if ($request->filled('search')) {
            // Si hay texto de búsqueda, filtra solo por comentario
            $query->where('text', 'like', '%' . $request->search . '%');
        } elseif ($request->filled('event_id')) {
            // Si hay un evento seleccionado, filtra solo por evento
            $query->where('event_id', $request->event_id);
        } elseif ($request->filled('date')) {
            // Si hay una fecha seleccionada, filtra solo por fecha
            $query->whereDate('publish_date', $request->date);
        }

        $comments = $query->orderBy('publish_date', 'desc')
            ->paginate(10)
            ->withQueryString();

        $eventsWithComments = Event::whereHas('comments')->get();

        return view('view_components.comment.list', [
            'comments' => $comments,
            'events' => $eventsWithComments,
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->text = $request->text;
        $comment->event_id = $request->event_id;
        $comment->publish_date = Carbon::now();
        $comment->save();
        return redirect()->route('event.show', $comment->event_id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comment = Comment::find($id);
        $comment->text = $request->text;
        $comment->save();
        return redirect()->route('event.show', $comment->event_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::find($id);
        $event = $comment->event_id;
        $comment->delete();

        if (url()->previous() === route('event.show', $event)) {
            return redirect()->route('event.show', $event);
        } else {
            return redirect()->route('comment.index');
        }
    }
}
