<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::with('place.kategori')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();
        return view('wishlist', compact('wishlists'));
    }

    public function toggle(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $request->validate([
            'place_id' => 'required|exists:places,id'
        ]);

        $userId = Auth::id();

        $existing = Wishlist::where('user_id', $userId)
            ->where('place_id', $request->place_id)
            ->first();

        if ($existing) {

            $existing->delete();

            return response()->json([
                'status' => 'removed'
            ]);
        }

        Wishlist::create([
            'user_id' => $userId,
            'place_id' => $request->place_id,
        ]);

        return response()->json([
            'status' => 'added'
        ]);
    }
}