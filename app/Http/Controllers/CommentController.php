<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
        $query = Comment::query();

        if ($request->has('search') && !empty($request->search)) {
            $query->whereHas('event', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }

        $comments = $query->orderBy('publish_date', 'desc')->paginate(10);
        return view('view_components.comment.list', ['comments' => $comments]);
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
