<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Kategoris;


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
        'check' => 'required'
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

        $request->validate([
            'check' => 'required'
        ]);


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

        return back()->with('error', 'Email atau password salah');
    }

    public function edit(int $id)
    {
        $user = User::findOrFail($id);
        return view('users.edit-user', compact('user'));
    }

    public function update(Request $request, int $id)
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

    public function destroy(int $id)
    {
        User::destroy($id);
        return redirect('/users');
    }

    public function home()
    {
        // Ambil semua data kategori dari database
        $kategoris = Kategoris::all();

        $moods = \App\Models\moods::all();

        $places = \App\Models\Places::all();

        // Kirim data ke view home.blade.php
        return view('home', compact('kategoris', 'moods', 'places'));
    }
}