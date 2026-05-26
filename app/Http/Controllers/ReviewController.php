<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index(int $id)
    {
        $place = \App\Models\places::with(['kategori', 'reviews.user'])->findOrFail($id);
        $reviews = $place->reviews()->with('user')->latest()->get();
    
        return view('review', compact('place', 'reviews'));
    }
    
    // Tampilkan form tambah review
    public function create(int $id)
    {
        $place = \App\Models\places::with(['kategori', 'reviews'])->findOrFail($id);
    
        return view('addReview', compact('place'));
    }
    
    // Simpan review baru
    public function store(Request $request)
    {
        $request->validate([
            'place_id' => 'required|exists:places,id',
            'rating'   => 'required|integer|min:1|max:5',
            'title'    => 'required|string|max:255',
            'comment'  => 'nullable|string|max:1000',
            'file_url' => 'nullable|file|mimes:jpg,jpeg,png,mp4,mov|max:5120',
        ]);
    
        // Cek duplikat review
        $existing = \App\Models\Review::where('user_id', 2) // ganti Auth::id() nanti
            ->where('place_id', $request->place_id)
            ->first();
    
        if ($existing) {
            return back()->withErrors(['rating' => 'Kamu sudah pernah mereview tempat ini.']);
        }
    
        $path = null;
        if ($request->hasFile('file_url')) {
            $path = $request->file('file_url')->store('reviews', 'public');
        }
    
        \App\Models\Review::create([
            'user_id'  => 2, // ganti Auth::id() nanti
            'place_id' => $request->place_id,
            'rating'   => $request->rating,
            'title'    => $request->title,
            'comment'  => $request->comment,
            'file_url' => $path,
        ]);
    
        return redirect()->route('review', $request->place_id)
            ->with('success', 'Review berhasil ditambahkan!');
    }
    
    // Hapus review
    public function destroy(int $id)
    {
        $review = \App\Models\Review::where('id', $id)
            ->where('user_id', 2) // ganti Auth::id() nanti
            ->firstOrFail();
    
        $review->delete();
    
        return back()->with('success', 'Review berhasil dihapus.');
    }
}