<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; // Pastikan nama model sesuai (Category atau Kategori)
use App\Models\kategoris;
use App\Models\Moods;     // Pastikan nama model sesuai
use App\Models\Places;   // Sesuai diskusi kita tadi

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil data asli dari database
        $kategoris = kategoris::all();
        $moods = moods::all();
        $places = Places::all();

        // Mengirim data ke view 'home.blade.php'
        return view('home', compact('kategoris', 'moods', 'places'));
    }
}