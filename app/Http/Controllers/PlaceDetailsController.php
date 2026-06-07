<?php

namespace App\Http\Controllers;

use App\Models\Places;
// use Brick\Math\BigInteger;

class PlaceDetailsController extends Controller
{
    public function show(int $id)
    {
        $Places = Places::findOrFail($id);
        return view('placeDetails.Places', compact('Places'));
    }
    public function reviews(int $id)
    {
        $Places = Places::findOrFail($id);
        return view('reviews', compact('Places'));
    }
}