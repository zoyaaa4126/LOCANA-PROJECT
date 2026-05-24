<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategoris;
use App\Models\Moods;
use App\Models\Places;

class LandingController extends Controller
{
    public function index()
    {
        // Ambil data yang dibutuhkan khusus untuk Landing Page (welcome.blade.php)
        $kategoris = kategoris::all();
        $moods = Moods::all();
        
        // Ambil data tempat populer/unggulan
        $tempatPopuler = Places::where('status_aktif', true)
                               ->where('tempat_unggulan', true)
                               ->limit(5)
                               ->get();

        // Kirim data ke view 'welcome.blade.php'
        return view('welcome', compact('kategoris', 'moods', 'tempatPopuler'));
    }
}