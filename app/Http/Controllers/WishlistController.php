<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    private function getCurrentUserId()
        {
            // TEMPORARY: ganti ke Auth::id() kalau auth udah beres
            return 2; // sesuaikan dengan user_id yang ada di database kamu
        }
        public function index()
    {
        $wishlists = Wishlist::with('place.kategori')
            ->where('user_id', $this->getCurrentUserId())
            ->latest()
            ->get();
        return view('wishlist', compact('wishlists')); // 'wishlists' bukan 'wishlist'
    }

    public function toggle(Request $request)
    {
        $userId = $this->getCurrentUserId(); // ganti dari Auth::id()
        
        $existing = Wishlist::where('user_id', $userId)
            ->where('place_id', $request->place_id)
            ->first();

        if ($existing) {
            $existing->delete();
            return response()->json(['status' => 'removed']);
        }

        Wishlist::create([
            'user_id'  => $userId,
            'place_id' => $request->place_id,
        ]);

        return response()->json(['status' => 'added']);
    }
}