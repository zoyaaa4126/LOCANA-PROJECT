<?php

namespace App\Http\Controllers;

use App\Models\Places;
// use Brick\Math\BigInteger;

class PlaceDetailsController extends Controller
{
    public function show(int $id)
    {
        $places = Places::findOrFail($id);
        return view('placeDetails.places', compact('places'));
    }
    public function reviews(int $id)
    {
        $places = Places::findOrFail($id);
        return view('reviews', compact('places'));
    }
}