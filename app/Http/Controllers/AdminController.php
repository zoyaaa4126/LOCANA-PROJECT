<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\places;
use App\Models\moods;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin/dashboard');
    }
    public function lokasi()
    {
        return view('admin/lokasi/lokasi');
    }
    public function tambahLokasi()
    {
        $moods = moods::all();
        return view('admin/lokasi/tambahLokasi', compact('moods'));
        // return view('admin/lokasi/tambahLokasi');
    }
    public function ulasan()
    {
        return view('admin/ulasan');
    }
    public function pengguna()
    {
        return view('admin/pengguna/pengguna');
    }
    public function tambahPengguna()
    {
        return view('admin/pengguna/tambahPengguna');
    }
    public function viewPengguna()
    {
        return view('admin/pengguna/viewPengguna');
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
