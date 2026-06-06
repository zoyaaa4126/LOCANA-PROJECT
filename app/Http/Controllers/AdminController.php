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
        $lokasi = places::paginate(5);
        return view('admin/lokasi/lokasi', compact('lokasi'));
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
        $kategoriMap = [
            '1' => 1,
            '2' => 2,
            '3' => 3,
            '4' => 4,
            '5' => 5,
        ];

        $kategoriId = $kategoriMap[$request->kategori_tempat] ?? null;

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
            'harga_min'       => $request->harga_min,
            'harga_max'       => $request->harga_max,
            'status_aktif'    => $request->boolean('status_aktif'),
            'tempat_unggulan' => $request->boolean('unggulan'),
            'created_by'      => auth()->id() ?? 1,
            'gambar_tempat'   => $gambarTempat,
        ], $dataFasilitas));

        $places->moods()->sync($request->moods ?? []);

        $days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];
        foreach ($days as $day) {
            if ($request->has('hari') && in_array($day, $request->hari)) {
                $places->hour()->create([
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

        return redirect('/lokasi');
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
            'tipe_tempat'     => $request->tipe,
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
