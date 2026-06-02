<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\places;
use App\Models\moods;

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

        $moods = moods::all();
        
        return view('admin/lokasi/tambahLokasi', compact('user', 'kategoriList', 'moods'));
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

    public function simpanTempat(Request $request)
    {
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
            'kategori_id'     => $request->kategori_tempat,
            'tipe_tempat'     => $request->tipe,
            'alamat_lengkap'  => $request->alamat,
            'latitude'        => $request->latitude,
            'longitude'       => $request->longitude,
            'harga_min'       => $request->harga_min,
            'harga_max'       => $request->harga_max,
            'status_aktif'    => $request->boolean('status_aktif'),
            'tempat_unggulan' => $request->boolean('unggulan'),
            'created_by'      => auth()->id(),
            'gambar_tempat'   => $gambarTempat,
        ], $dataFasilitas));

        $places->moods()->sync($request->moods ?? []);

        $days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];
        foreach ($days as $day) {
            if ($request->has('hari') && in_array($day, $request->hari)) {
                $places->hours()->create([
                    'hari' => $day,
                    'jam_buka'=> $request->input('jam_buka_' . $day),
                    'jam_tutup' => $request->input('jam_tutup_' . $day),
                ]);
            }
        }

        if ($request->hasFile('galeri')) {
            foreach ($request->file('galeri') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/img/places_gallery'), $filename);
                $places->galleries()->create([
                    'file_path' => 'assets/img/places_gallery/' . $filename,
                    'tipe'      => 'galeri',
                ]);
            }
        }

        if ($request->hasFile('foto_menu')) {
            foreach ($request->file('foto_menu') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/img/places_gallery'), $filename);
                $places->galleries()->create([
                    'file_path' => 'assets/img/places_gallery/' . $filename,
                    'tipe'      => 'menu',
                ]);
            }
        }

        return redirect('/lokasi');
    }
}
