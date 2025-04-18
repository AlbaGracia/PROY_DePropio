<?php

namespace App\Http\Controllers;

use App\Models\Space;
use App\Models\Type;
use Illuminate\Http\Request;

class SpaceController extends Controller
{
    private $pag = 9;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spaces = Space::with('type')
            ->orderBy('type_id', 'asc')
            ->orderBy('name', 'asc')
            ->paginate($this->pag);

        return view('view_components.space.all', ['spaces' => $spaces]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('view_components.space.form', ['types' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $space = new Space();
        $space->name = $request->name;
        $space->description = $request->description;
        $space->address = $request->address;
        $space->web_url = $request->web_url;
        $space->type_id = $request->type_id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('spaces/images', 'public');
            $space->image_path =  'storage/' . $path;
        }
        $space->save();
        return redirect()->route('space.show', $space->id);
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
        $space->address = $request->address;
        $space->web_url = $request->web_url;
        $space->type_id = $request->type_id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('spaces/images', 'public');
            $space->image_path =  'storage/' . $path;
        }
        $space->save();
        return redirect()->route('space.show', $space->id);
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
