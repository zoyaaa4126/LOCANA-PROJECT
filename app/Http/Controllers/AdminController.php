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
        $users = User::paginate(5);
        return view('admin/pengguna/pengguna', compact('user', 'users'));
    }
    public function editPengguna($id)
    {
        $authUser = Auth::user();
        $user = User::findOrFail($id);
        return view('admin/pengguna/editPengguna', compact('user', 'authUser'));
    }
    public function updatePengguna(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'nama'        => 'required|string|max:255',
            'username'    => 'required|string|max:255|unique:users,username,' . $id,
            'email'       => 'required|email|unique:users,email,' . $id,
            'password'    => 'nullable|min:6',
            'role'        => 'required|in:user,admin',  
            'deskripsi'   => 'nullable|string',
            'foto_profil' => 'nullable|image|max:5120',
        ], ['email.unique'      => 'Email sudah terdaftar.',
            'password.min'      => 'Password minimal 6 karakter.',
            'username.unique'   => 'Username sudah digunakan'
        ]);

        $user->update([
            'nama'     => $request->nama,
            'username' => $request->username,
            'email'    => $request->email,
            'role'      => $request->role,       
            'deskripsi' => $request->deskripsi,
        ]);

        if ($request->filled('password')) {
            $user->update(['password' => bcrypt($request->password)]);
        }

        if ($request->hasFile('foto_profil')) {
            $path = $request->file('foto_profil')->store('foto-profile', 'public');
            $user->update(['fotoProfile' => $path]);
        }

        return redirect('/pengguna')->with('success', 'Pengguna berhasil diupdate.');
    }
    public function hapusPengguna($id)
    {
        User::findOrFail($id)->delete();
        return redirect('/pengguna')->with('success', 'Pengguna berhasil dihapus.');
    }
    public function tambahPengguna()
    {
        $user = Auth::user();
        return view('admin/pengguna/tambahPengguna', compact('user'));
    }
    public function storePengguna(Request $request)
    {
        $request->validate([
            'nama'       => 'required|string|max:255',
            'username'   => 'required|string|max:255|unique:users,username',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:6',
            'role'       => 'required|in:user,admin',
            'deskripsi'  => 'nullable|string',
            'foto_profil'=> 'nullable|image|max:5120',
        ], ['email.unique'      => 'Email sudah terdaftar.',
            'password.min'      => 'Password minimal 6 karakter.',
            'username.unique'   => 'Username sudah digunakan'
        ]);

        $data = [
            'nama'     => $request->nama,
            'username' => $request->username,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'role'     => $request->role,
            'deskripsi'=> $request->deskripsi,
        ];

        if ($request->hasFile('foto_profil')) {
            $data['fotoProfile'] = $request->file('foto_profil')->store('foto-profile', 'public');
        }

        User::create($data);

        return redirect('/pengguna')->with('success', 'Pengguna berhasil ditambahkan.');
    }
    public function viewPengguna($id)
    {
        $user = User::findOrFail($id);
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

        $request->validate([
            'nama'     => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
            'email'    => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'nullable|min:6',
            'foto_profil' => 'nullable|image|max:2048',
        ], ['email.unique'      => 'Email sudah terdaftar.',
            'password.min'      => 'Password minimal 6 karakter.',
            'username.unique'   => 'Username sudah digunakan'
        ]);

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
