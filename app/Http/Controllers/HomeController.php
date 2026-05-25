<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; // Pastikan nama model sesuai (Category atau Kategori)
use App\Models\kategoris;
use App\Models\Moods;     // Pastikan nama model sesuai
use App\Models\Places;

class HomeController extends Controller
{
    public function index()
    {
        $kategoris = kategoris::all();
        $moods = moods::all();
        $places = Places::all(); // Tetap ambil semua data untuk bagian lain

        return view('home', compact('kategoris', 'moods', 'places'));
    }
}
