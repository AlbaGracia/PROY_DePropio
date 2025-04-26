<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        return view('user.all');
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('user.form');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $this->validateUser($request);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->type_user = $request->type_user;
        $user->save();

        $user->assignRole($request->type_user);

        return redirect()->route('user.index')->with('success', 'Usuario creado correctamente');
    }

    /**
     * Display the specified user.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('user.form', compact('user'));
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
        $user->save();

        $user->syncRoles([$request->type_user]);

        return redirect()->route('user.index')->with('success', 'Usuario actualizado correctamente');
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
            'password' => 'required|string|min:8|confirmed',
            'type_user' => 'required|in:user,admin,admin_space',
        ]);
    }

    private function validateUserUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'type_user' => 'required|in:user,admin,admin_space',
        ]);
    }
}