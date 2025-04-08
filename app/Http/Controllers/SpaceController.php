<?php

namespace App\Http\Controllers;

use App\Models\Space;
use Illuminate\Http\Request;

class SpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('space.all');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('space.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $space = new Space();
        $space->name = $request->name;
        $space->adress = $request->adress;
        $space->web_url = $request->web_url;
        $space->type_id = $request->type_id;
        $space->save();
        return redirect()->route('space.index');
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
        $space = Space::find($id);
        return view('space.form', ['space', $space]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $space = Space::find($id);
        $space->name = $request->name;
        $space->adress = $request->adress;
        $space->web_url = $request->web_url;
        $space->type_id = $request->type_id;
        $space->save();
        return redirect()->route('space.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $space = Space::find($id);
        $space->delete();
        return redirect()->route('space.index');
    }
}
