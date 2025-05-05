<?php

namespace App\Http\Controllers;

use App\Models\Space;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpaceController extends Controller
{
    private $pag = 9;

    public function index(Request $request)
{
    $query = Space::with('type')->orderBy('type_id', 'asc')->orderBy('name', 'asc');

    if ($request->filled('name')) {
        $query->where('name', 'like', '%' . $request->name . '%');
    }

    if ($request->filled('type_id')) {
        $query->where('type_id', $request->type_id);
    }

    $spaces = $query->paginate($this->pag)->appends($request->query());

    $types = Type::all();

    return view('view_components.space.all', compact('spaces', 'types'));
}

    public function create()
    {
        $types = Type::all();
        $adminUsers = User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['admin', 'admin_space']);
        })->get();


        return view('view_components.space.form', compact('types', 'adminUsers'));
    }

    public function store(Request $request)
    {
        $space = new Space();
        $this->saveSpaceData($request, $space);
        return redirect()->route('space.list', $space->id);
    }

    public function show(string $id)
    {
        $space = Space::findOrFail($id);
        return view('view_components.space.show', ['space' => $space]);
    }

    public function edit(string $id)
    {
        $space = Space::findOrFail($id);
        $types = Type::all();
        $adminUsers = User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['admin', 'admin_space']);
        })->get();


        return view('view_components.space.form', compact('space', 'types', 'adminUsers'));
    }

    public function update(Request $request, string $id)
    {
        $space = Space::findOrFail($id);
        $this->saveSpaceData($request, $space);
        return redirect()->route('space.list');
    }

    public function destroy(Request $request, string $id)
    {
        $space = Space::findOrFail($id);
        $space->delete();

        return redirect()->route('space.list');
    }

    public function list(Request $request)
    {
        $user = Auth::user();
        $query = Space::query();

        if ($user->hasRole('admin_space')) {
            $query->where('user_id', $user->id);
        } elseif (!$user->hasRole('admin')) {
            abort(403, __('labels.403-title'));
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $spaces = $query->paginate(10);

        return view('view_components.space.list', ['spaces' => $spaces]);
    }


    private function saveSpaceData(Request $request, Space $space)
    {
        $space->name = $request->name;
        $space->description = $request->description;
        $space->address = $request->address;
        $space->web_url = $request->web_url;
        $space->type_id = $request->type_id;
        if ($request->has('user_id')) {
            $space->user_id = $request->user_id;
        } else {
            $space->user_id = Auth::id();
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('spaces/images', 'public');
            $space->image_path = 'storage/' . $path;
        }

        $space->save();
    }
}
