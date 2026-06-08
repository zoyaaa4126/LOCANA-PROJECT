<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; // Pastikan nama model sesuai (Category atau Kategori)
use App\Models\kategoris;
use App\Models\Moods;     // Pastikan nama model sesuai
use App\Models\Places;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $kategoris = kategoris::all();
        $moods = Moods::all();
        $places = Places::all(); // Tetap ambil semua data untuk bagian lain

        return view('home', compact('users', 'kategoris', 'moods', 'places'));
    }

    
}