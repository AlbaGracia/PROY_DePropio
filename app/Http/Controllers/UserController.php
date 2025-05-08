<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $users = $query->paginate(10);

        return view('view_components.user.list', [
            'users' => $users,
            'search' => $request->search,
        ]);
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('view_components.user.form');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $this->validateUser($request);

        // Generar una contraseña aleatoria
        $randomPassword = Str::random(10);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($randomPassword);
        $user->type_user = $request->type_user;
        $user->password_reset_required = true;

        $user->save();

        // Asignamos el rol del usuario
        $user->assignRole($request->type_user);

        Mail::to($user->email)->queue(new \App\Mail\UserCreated($user, $randomPassword));

        return redirect()->route('user.index')->with('success', 'Usuario creado correctamente');
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('view_components.user.form', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $this->validateUserUpdate($request, $id);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->type_user = $request->type_user;
        $user->password_reset_required = false;

        $user->save();

        $user->syncRoles([$request->type_user]);

        if ($user->wasChanged('type_user') && $user->type_user == 'user') {
            $user->spaces()->update(['user_id' => 1]);
        }

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Usuario eliminado correctamente');
    }

    private function validateUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'type_user' => 'required|in:user,admin,admin_space',
        ]);
    }

    private function validateUserUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'type_user' => 'required|in:user,admin,admin_space',
        ]);
    }
}
