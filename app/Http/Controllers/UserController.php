<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.list-user', compact('users'));
    }

    public function create()
    {
        return view('users.create-user');
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
        ]);

        return redirect('/users');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit-user', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = \App\Models\User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role
        ]);

        return redirect('/users');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/users');
    }
}
