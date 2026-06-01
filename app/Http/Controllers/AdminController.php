<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        return view('admin/dashboard', compact('user'));
    }
    public function lokasi()
    {
        $user = Auth::user();
        return view('admin/lokasi/lokasi', compact('user'));
    }

    public function tambahLokasi()
    {
        $user = Auth::user();
        $kategoriList = [
            ['value' => 'cafe',       'label' => 'Cafe',       'icon' => 'coffee'],
            ['value' => 'restaurant', 'label' => 'Restaurant', 'icon' => 'restaurant'],
            ['value' => 'bakery',     'label' => 'Bakery',     'icon' => 'cake'],
            ['value' => 'park',       'label' => 'Park',       'icon' => 'park'],
            ['value' => 'mall',       'label' => 'Mall',       'icon' => 'local_mall'],
        ];

        return view('admin/lokasi/tambahLokasi', compact('user', 'kategoriList'));
    }

    public function ulasan()
    {
        $user = Auth::user();
        return view('admin/ulasan', compact('user'));
    }
    public function pengguna()
    {
        $user = Auth::user();
        return view('admin/pengguna/pengguna', compact('user'));
    }
    public function tambahPengguna()
    {
        $user = Auth::user();
        return view('admin/pengguna/tambahPengguna', compact('user'));
    }
    public function viewPengguna()
    {
        $user = Auth::user();
        return view('admin/pengguna/viewPengguna', compact('user'));
    }
    public function profileAdmin()
    {
        $user = Auth::user();
        return view('admin/profileAdmin', compact('user'));
    }
    public function editProfileAdmin()
    {
        $user = Auth::user();
        return view('admin/editProfileAdmin', compact('user'));
    }
    public function updateProfileAdmin(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        $user->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
        ]);

        if($request->password){
            $user->update([
                'password' => bcrypt($request->password)
            ]);
        }
        if ($request->hasFile('foto_profil')) {
            $path = $request->file('foto_profil')->store('foto-profile', 'public');
            $user->update(['fotoProfile' => $path]);
        }

        return redirect('/profile-admin');
    }
}
