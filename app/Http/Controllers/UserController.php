<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\kategoris;
use App\Models\Places;
use App\Models\Moods;


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
            'username' => 'required|unique:users,username',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'check'    => 'required',
        ], [
            'email.unique'      => 'Email sudah terdaftar.',
            'password.min'      => 'Password minimal 6 karakter.',
            'username.unique'   => 'Username sudah digunakan'
        ]);

        session([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect('/register-nextStep');
    }

    public function registerNext()
    {
        return view('registerNext');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required',
            ],
            [
                'nama.required' => 'Nama wajib diisi.',
            ]
        );

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
        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    //CONTROLLER LOGIN
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

            $user = Auth::user();

            // Cek role, redirect ke tempat yang sesuai
            if ($user->role === 'admin') {
                return redirect('/admin/dashboard'); // atau route dashboard admin kamu
            }

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

    public function home(Request $request)
    {
        $lat = $request->query('lat');
        $lng = $request->query('lng');


        $kategoris = kategoris::all();

        $moods = \App\Models\Moods::all();
        $popularPlaces = \App\Models\Places::where('status_aktif', true)
            ->where('tempat_unggulan', true)
            ->limit(10)
            ->get();
        $allPlaces = \App\Models\Places::with('kategori')->get();
        $wishlistIds = Auth::check()
            ? \App\Models\Wishlist::where('user_id', Auth::id())->pluck('place_id')->toArray()
            : [];

        // Buat Rekomendasi
        if ($lat && $lng) {
            $recommendedPlaces = \App\Models\Places::selectRaw("
            *,
            (6371 * ACOS(
                COS(RADIANS(?)) * COS(RADIANS(latitude)) *
                COS(RADIANS(longitude) - RADIANS(?)) +
                SIN(RADIANS(?)) * SIN(RADIANS(latitude))
            )) AS distance
        ", [$lat, $lng, $lat])
                ->orderBy('distance')
                ->limit(10)
                ->get();
        } else {
            $recommendedPlaces = \App\Models\Places::limit(10)->get();
        }

        return view('home', compact('kategoris', 'moods', 'popularPlaces', 'recommendedPlaces', 'wishlistIds', 'allPlaces'));
    }

    public function showPlace(int $id)
    {
        $places = \App\Models\Places::findOrFail($id);
        $isWishlisted = auth()->check() 
            ? \App\Models\Wishlist::where('user_id', auth()->id())
                                ->where('place_id', $id)
                                ->exists() 
            : false;
        return view('placeDetails.places', compact('places', 'isWishlisted'));
    }

    public function rekomendasi()
    {
        return view('rekomendasi');
    }

    public function placesByKategori(int $id)
    {
        $places = \App\Models\Places::where('kategori_id', $id)->get();
        $kategori = kategoris::findOrFail($id);
        return view('places.kategori', compact('places', 'kategori'));
    }
    public function profile()
    {
        $user = User::findOrFail(Auth::id());
        $wishlists = \App\Models\Wishlist::with('place.kategori')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        $reviews = \App\Models\Review::with('place.kategori')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        $wishlistCount = $wishlists->count();
        $reviewCount = $reviews->count();

        $activities = collect();

        foreach ($wishlists as $item) {
            $activities->push([
                'type'       => 'wishlist',
                'created_at' => $item->created_at,
                'place'      => $item->place,
            ]);
        }

        foreach ($reviews as $item) {
            $activities->push([
                'type'       => 'review',
                'created_at' => $item->created_at,
                'place'      => $item->place,
                'rating'     => $item->rating,
                'comment'    => $item->comment,
            ]);
        }

        $activities = $activities->sortByDesc('created_at')->take(7)->values();

        return view('profile', compact('user', 'wishlists', 'reviews', 'activities', 'wishlistCount', 'reviewCount'));
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('editProfile', compact('user'));
    }
    public function updateProfile(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        $user->update([
            'nama'      => $request->nama,
            'username'  => $request->username,
            'email'     => $request->email,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($request->password) {
            $user->update([
                'password' => bcrypt($request->password)
            ]);
        }
        if ($request->hasFile('foto_profil')) {
            $path = $request->file('foto_profil')->store('foto-profile', 'public');
            $user->update(['fotoProfile' => $path]);
        }

        return redirect('/profile');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Berhasil keluar.');
    }

    public function showMap($id)
    {
        $places = Places::findOrFail($id);
        return view('placeDetails.placeMap', compact('places'));
    }
}
