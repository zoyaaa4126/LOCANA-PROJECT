<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reviews;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    // Tampilkan semua review milik user yang login
    public function index()
    {
        $reviews = Review::with('place')
            ->where('user_id', Auth::id())
            ->get();

        return view('review.index', compact('reviews'));
    }

    // Simpan review baru
    public function store(Request $request)
    {
        $request->validate([
            'place_id' => 'required|exists:places,id',
            'rating'   => 'required|integer|min:1|max:5',
            'comment'  => 'nullable|string|max:1000',
        ]);

        // Cek apakah user sudah pernah review tempat ini
        $existing = Review::where('user_id', Auth::id())
            ->where('place_id', $request->place_id)
            ->first();

        if ($existing) {
            return back()->with('error', 'Kamu sudah pernah mereview tempat ini.');
        }

        $path = null;
        if ($request->hasFile('file_url')) {
            $path = $request->file('file_url')->store('reviews', 'public');
        }

        Review::create([
            'user_id'  => Auth::id(),
            'place_id' => $request->place_id,
            'rating'   => $request->rating,
            'comment'  => $request->comment,
            'file_url' => $path,
        ]);

        return back()->with('success', 'Review berhasil ditambahkan!');
    }

    // Hapus review
    public function destroy(int $id)
    {
        $review = Review::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $review->delete();

        return back()->with('success', 'Review berhasil dihapus.');
    }
}