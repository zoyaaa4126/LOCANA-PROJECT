<?php

namespace App\Http\Controllers;

use App\Models\kategoris;
use App\Models\moods;
use App\Models\places;

class HomeController extends Controller
{
    public function index()
    {
        $kategoris = kategoris::all();
        $moods = moods::all();
        $places = places::with('kategori', 'moods')->get();

        return view('home', compact(
            'kategoris',
            'moods',
            'places'
        ));
    }
}