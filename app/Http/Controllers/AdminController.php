<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\places;
use App\Models\moods;
use \App\Models\ActivityLog;

class AdminController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $totalLokasi = \App\Models\Places::count();
        $lokasiBaruMingguIni = \App\Models\Places::where('created_at', '>=', now()->startOfWeek())->count();
        $totalUlasan = \App\Models\Review::count();
        $rataRating = \App\Models\Review::avg('rating');
        $totalFlagged = \App\Models\Review::where('flagged', true)->count();

        return view('admin/dashboard', compact('user', 'totalLokasi', 'lokasiBaruMingguIni', 'totalUlasan', 'rataRating', 'totalFlagged'));
    }

    public function lokasi()
    {
        $lokasi = places::paginate(5);
        $user = Auth::user();
        return view('admin/lokasi/lokasi', compact('lokasi', 'user'));
    }

    public function tambahLokasi()
    {
        $user = Auth::user();
        $kategoriList = [
            ['value' => 1, 'label' => 'Cafe',       'icon' => 'coffee'],
            ['value' => 2, 'label' => 'Restaurant', 'icon' => 'restaurant'],
            ['value' => 3, 'label' => 'Bakery',     'icon' => 'cake'],
            ['value' => 4, 'label' => 'Live Music', 'icon' => 'music_note'],
            ['value' => 5, 'label' => 'Indoor',     'icon' => 'home'],
            ['value' => 6, 'label' => 'Outdoor',    'icon' => 'landscape'],
            ['value' => 7, 'label' => 'Mall',       'icon' => 'local_mall'],
            ['value' => 8, 'label' => 'Park',       'icon' => 'park'],
        ];

        $moods = moods::all();

        return view('admin/lokasi/tambahLokasi', compact('user', 'kategoriList', 'moods'));
    }

    public function ulasan()
    {
        $user = Auth::user();
        $flaggedReviews = \App\Models\Review::with(['user', 'place'])
            ->where('flagged', true)
            ->orWhere(function ($q) {
                // Auto-flag keyword spam meski belum dilaporkan user
                foreach (\App\Models\Review::SPAM_KEYWORDS as $kw) {
                    $q->orWhere('comment', 'like', "%$kw%")
                        ->orWhere('title', 'like', "%$kw%");
                }
            })
            ->latest()
            ->get();

        $totalReviews = \App\Models\Review::count();

        return view('admin/ulasan', compact('user', 'flaggedReviews', 'totalReviews'));
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
        ], [
            'email.unique'      => 'Email sudah terdaftar.',
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

        ActivityLog::create([
            'user_id'   => Auth::id(),
            'aktivitas' => 'Mengupdate data pengguna ' . $user->username,
        ]);

        return redirect('/admin/pengguna')->with('success', 'Pengguna berhasil diupdate.');
    }
    public function hapusPengguna($id)
    {
        $targetUser = User::findOrFail($id);
        ActivityLog::create([
            'user_id'   => Auth::id(),
            'aktivitas' => 'Menghapus pengguna ' . $targetUser->username,
        ]);
        $targetUser->delete();
        return redirect('/admin/pengguna')->with('success', 'Pengguna berhasil dihapus.');
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
            'foto_profil' => 'nullable|image|max:5120',
        ], [
            'email.unique'      => 'Email sudah terdaftar.',
            'password.min'      => 'Password minimal 6 karakter.',
            'username.unique'   => 'Username sudah digunakan'
        ]);

        $data = [
            'nama'     => $request->nama,
            'username' => $request->username,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'role'     => $request->role,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('foto_profil')) {
            $data['fotoProfile'] = $request->file('foto_profil')->store('foto-profile', 'public');
        }

        User::create($data);

        ActivityLog::create([
            'user_id'   => Auth::id(),
            'aktivitas' => 'Menambahkan pengguna baru ' . $request->username,
        ]);

        return redirect('/admin/pengguna')->with('success', 'Pengguna berhasil ditambahkan.');
    }
    public function viewPengguna($id)
    {
        $user = User::findOrFail($id);
        return view('admin/pengguna/viewPengguna', compact('user'));
    }
    public function profileAdmin()
    {
        $user = Auth::user();
        $logs = \App\Models\ActivityLog::where('user_id', Auth::id())
            ->latest()
            ->paginate(5);
        return view('admin/profileAdmin', compact('user', 'logs'));
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
        ], [
            'email.unique'      => 'Email sudah terdaftar.',
            'password.min'      => 'Password minimal 6 karakter.',
            'username.unique'   => 'Username sudah digunakan'
        ]);

        $user->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
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

        return redirect('/admin/profile-admin');
    }
    public function simpanTempat(Request $request)
    {
        $kategoriMap = [
            '1' => 1,
            '2' => 2,
            '3' => 3,
            '4' => 4,
            '5' => 5,
            '6' => 6,
            '7' => 7,
            '8' => 8,
        ];

        $kategoriId = $request->kategori_tempat;

        $listFasilitas = ['wifi', 'ruang_ac', 'stopkontan', 'parkir_luas', 'area_merokok', 'toilet', 'photobooth', 'musholla', 'ruang_meeting', 'board_game'];

        $dataFasilitas = [];
        foreach ($listFasilitas as $f) {
            $dataFasilitas[$f] = in_array($f, $request->fasilitas ?? []);
        }

        $gambarTempat = null;
        if ($request->hasFile('foto_cover')) {
            $file = $request->file('foto_cover');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/places_img_hero'), $filename);
            $gambarTempat = 'assets/img/places_img_hero/' . $filename;
        }

        $places = places::create(array_merge([
            'nama_tempat'     => $request->nama,
            'deskripsi'       => $request->deskripsi,
            'kategori_id'     => $kategoriId,
            'tipe_tempat'     => $request->tipe,
            'alamat_lengkap'  => $request->alamat,
            'latitude'        => $request->latitude,
            'longitude'       => $request->longitude,
            'harga_min'        => $request->harga_min ?? 0,
            'harga_max'       => $request->harga_max ?? 0,
            'status_aktif'    => $request->boolean('status_aktif'),
            'tempat_unggulan' => $request->boolean('unggulan'),
            'created_by'      => auth()->id(),
            'gambar_tempat'   => $gambarTempat,
        ], $dataFasilitas));

        $places->moods()->sync($request->moods ?? []);

        $days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];
        foreach ($days as $day) {
            if ($request->has('hari') && in_array($day, $request->hari)) {
                $places->hour()->create([
                    'hari' => $day,
                    'jam_buka' => $request->input('jam_buka_' . $day),
                    'jam_tutup' => $request->input('jam_tutup_' . $day),
                ]);
            }
        }

        if ($request->hasFile('galeri')) {
            foreach ($request->file('galeri') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/img/places_gallery'), $filename);
                $places->galleries()->create([
                    'path_file' => 'assets/img/places_gallery/' . $filename,
                    'tipe'      => 'galeri',
                ]);
            }
        }

        if ($request->hasFile('foto_menu')) {
            foreach ($request->file('foto_menu') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/img/places_gallery'), $filename);
                $places->galleries()->create([
                    'path_file' => 'assets/img/places_gallery/' . $filename,
                    'tipe'      => 'menu',
                ]);
            }
        }

        ActivityLog::create([
            'user_id'   => Auth::id(),
            'aktivitas' => 'Menambahkan lokasi ' . $request->nama,
        ]);

        return redirect('/admin/lokasi');
    }

    public function viewLokasi($id)
    {
        $places = places::findOrFail($id);
        return view('admin.lokasi.viewLokasi', compact('places'));
    }

    public function editTempat($id)
    {
        $place = places::findOrFail($id);
        $moods = moods::all();
        return view('admin.lokasi.editLokasi', compact('place', 'moods'));
    }

    public function updateTempat(Request $request, $id)
    {
        $kategoriId = (int) $request->kategori_tempat ?: null;

        $place = places::findOrFail($id);

        $listFasilitas = ['wifi', 'ruang_ac', 'stopkontan', 'parkir_luas', 'area_merokok', 'toilet', 'photobooth', 'musholla', 'ruang_meeting', 'board_game'];
        $dataFasilitas = [];
        foreach ($listFasilitas as $f) {
            $dataFasilitas[$f] = in_array($f, $request->fasilitas ?? []);
        }

        if ($request->hasFile('foto_cover')) {
            $file = $request->file('foto_cover');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/places_img_hero'), $filename);
            $dataFasilitas['gambar_tempat'] = 'assets/img/places_img_hero/' . $filename;
        }

        $place->update(array_merge([
            'nama_tempat'     => $request->nama,
            'deskripsi'       => $request->deskripsi,
            'kategori_id'     => $kategoriId,
            'tipe_tempat'     => $request->tipe ?? $place->tipe_tempat,
            'alamat_lengkap'  => $request->alamat,
            'latitude'        => $request->latitude,
            'longitude'       => $request->longitude,
            'harga_min'       => $request->harga_min,
            'harga_max'       => $request->harga_max,
            'status_aktif'    => $request->boolean('status_aktif'),
            'tempat_unggulan' => $request->boolean('unggulan'),
        ], $dataFasilitas));

        $place->moods()->sync($request->moods ?? []);

        // Update jam operasional
        $place->hour()->delete();
        $days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];
        foreach ($days as $day) {
            if ($request->has('hari') && in_array($day, $request->hari)) {
                $jamBuka  = $request->input('jam_buka_' . $day);
                $jamTutup = $request->input('jam_tutup_' . $day);
                if ($jamBuka && $jamTutup) {
                    $place->hour()->create([
                        'hari'      => $day,
                        'jam_buka'  => $jamBuka,
                        'jam_tutup' => $jamTutup,
                    ]);
                }
            }
        }

        return redirect('/lokasi');
    }

    public function hapustempat($id)
    {
        places::findOrFail($id)->delete();
        return redirect('/lokasi');
    }
}
