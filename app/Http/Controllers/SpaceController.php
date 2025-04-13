<?php

namespace App\Http\Controllers;

use App\Models\Space;
use App\Models\Type;
use Illuminate\Http\Request;

class SpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spaces = Space::all();
        return view('view_components.space.all', ['spaces' => $spaces]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('view_components.space.form', ['type' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $space = new Space();
        $space->name = $request->name;
        $space->description = $request->description;
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
        $space = Space::find($id);
        return view('view_components.space.show', ['space' => $space]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $space = Space::find($id);
        $types = Type::all();
        return view('view_components.space.form', ['space' => $space, 'types' => $types]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $space = Space::find($id);
        $space->name = $request->name;
        $space->description = $request->description;
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
