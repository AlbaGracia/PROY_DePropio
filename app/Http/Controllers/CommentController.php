<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('comment.all');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comment.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->user_id = $request->user_id;
        $comment->text = $request->text;
        $comment->event_id = $request->event_id;
        $comment->publish_date = $request->publish_date;
        $comment->save();
        return redirect()->route('comment.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comment = Comment::find($id);
        return view('comment.form', ['comment', $comment]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comment = Comment::find($id);
        $comment->user_id = $request->user_id;
        $comment->text = $request->text;
        $comment->event_id = $request->event_id;
        $comment->publish_date = $request->publish_date;
        $comment->save();
        return redirect()->route('comment.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('comment.index');
    }
}
