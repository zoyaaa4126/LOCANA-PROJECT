<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

    //CONTROLLER REGISTER
    public function registerStep1(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email'    => 'required|email',
            'password' => 'required|min:6|confirmed',
            'check'    => 'required',
        ], [
            'username.required' => 'username tidak boleh kosong',
            'email.required'    => 'email tidak boleh kosong',
            'email.email'       => 'format email tidak valid',
            'password.required' => 'password tidak boleh kosong',
            'password.min'      => 'password minimal 6 karakter',
            'check.required'    => 'harap centang persetujuan',
        ]);

        session([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect('/register-nextStep');
    }

    public function store(Request $request)
    {

        $path = null;

        if ($request->hasFile('foto_profil')) {
            $path = $request->file('foto_profil')->store('foto-profile', 'public');
        }

        User::create([
            'nama' => $request->nama,
            'username' => session('username'),
            'email' => session('email'),
            'role' => 'user',
            'password' => bcrypt(session('password')),
            'fotoProfile' => $path,
        ]);
        return redirect('/home');
    }

    //CONTROLLER LOGIN
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->remember)) { //di cek apakah ada atau engga
            $request->session()->regenerate();
            return redirect('/home');
        }

        return back()->withErrors([
            'login' => 'Email atau password salah!'
        ]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit-user', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'nama' => $request->nama,
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