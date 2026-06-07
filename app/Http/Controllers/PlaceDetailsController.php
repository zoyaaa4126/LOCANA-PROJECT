<?php

namespace App\Http\Controllers;

use App\Models\Places;
// use Brick\Math\BigInteger;

class PlaceDetailsController extends Controller
{
    public function show(int $id)
    {
<<<<<<< HEAD
        $places = Places::findOrFail($id);
        return view('placeDetails.places', compact('places'));
    }
    public function reviews(int $id)
    {
        $places = Places::findOrFail($id);
        return view('reviews', compact('places'));
=======
        $Places = Places::findOrFail($id);
        return view('placeDetails.Places', compact('Places'));
    }
    public function reviews(int $id)
    {
        $Places = Places::findOrFail($id);
        return view('reviews', compact('Places'));
>>>>>>> 18f03a848609226f01aa87696752110c71f17c0b
    }
}