<?php

namespace App\Http\Controllers;

use App\Models\Space;
use App\Models\Type;
use Illuminate\Http\Request;

class SpaceController extends Controller
{
    private $pag = 9;

    public function index()
    {
        $spaces = Space::with('type')->orderBy('type_id', 'asc')->orderBy('name', 'asc')->paginate($this->pag);
        return view('view_components.space.all', ['spaces' => $spaces]);
    }

    public function create()
    {
        return view('view_components.space.form', $this->loadFormDependencies());
    }

    public function store(Request $request)
    {
        $space = new Space();
        $this->saveSpaceData($request, $space);
        return redirect()->route('space.show', $space->id);
    }

    public function show(string $id)
    {
        $space = Space::findOrFail($id);
        return view('view_components.space.show', ['space' => $space]);
    }

    public function edit(string $id)
    {
        $space = Space::findOrFail($id);
        return view('view_components.space.form', array_merge(['space' => $space], $this->loadFormDependencies()));
    }

    public function update(Request $request, string $id)
    {
        $space = Space::findOrFail($id);
        $this->saveSpaceData($request, $space);
        return redirect()->route('space.show', $space->id);
    }

    public function destroy(string $id)
    {
        $space = Space::findOrFail($id);
        $space->delete();
        return redirect()->route('space.index');
    }

    private function saveSpaceData(Request $request, Space $space)
    {
        $space->name = $request->name;
        $space->description = $request->description;
        $space->address = $request->address;
        $space->web_url = $request->web_url;
        $space->type_id = $request->type_id;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('spaces/images', 'public');
            $space->image_path = 'storage/' . $path;
        }

        $space->save();
    }

    private function loadFormDependencies()
    {
        return [
            'types' => Type::all(),
        ];
    }
}
