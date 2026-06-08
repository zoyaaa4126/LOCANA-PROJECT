<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index(int $id)
    {
        $place = \App\Models\Places::with(['kategori', 'reviews.user'])->findOrFail($id);
        $reviews = $place->reviews()->with(['user', 'likes'])->latest()->get();
    
        return view('review', compact('place', 'reviews'));
    }
    
    // Tampilkan form tambah review
    public function create(int $id)
    {
        $place = \App\Models\Places::with(['kategori', 'reviews'])->findOrFail($id);

        $loginRequired = !Auth::check();

        return view('addReview', compact('place', 'loginRequired'));
    }
    
    // Simpan review baru
    public function store(Request $request)
    {
        $request->validate([
            'place_id' => 'required|exists:places,id',
            'rating'   => 'required|integer|min:1|max:5',
            'title'    => 'required|string|min:5|max:255',
            'comment'  => 'nullable|string|max:1000',
            'file_url'   => 'nullable|array|max:6',
            'file_url.*' => 'file|mimes:jpg,jpeg,png,mp4,mov|max:5120',
        ], [
            'rating.required'    => 'Rating wajib dipilih.',
            'rating.min'         => 'Rating minimal 1 bintang.',
            'rating.max'         => 'Rating maksimal 5 bintang.',
            'title.required'     => 'Judul wajib diisi.',
            'title.min'          => 'Judul minimal 5 karakter.',
            'title.max'          => 'Judul maksimal 255 karakter.',
            'comment.max'        => 'Ulasan maksimal 1000 karakter.',
            'file_url.max'       => 'Maksimal 6 file yang bisa diunggah.',
            'file_url.*.mimes'   => 'Format file harus JPG, PNG, MP4, atau MOV.',
            'file_url.*.max'     => 'Ukuran tiap file maksimal 5MB.',
        ]);
    
        $existing = \App\Models\Review::where('user_id', Auth::id()) 
            ->where('place_id', $request->place_id)
            ->first();
    
        if ($existing) {
            return back()->withErrors(['rating' => 'Kamu sudah pernah mereview tempat ini.']);
        }
    
        $paths = null;
        if ($request->hasFile('file_url')) {
            $paths = [];
            foreach ($request->file('file_url') as $file) {
                $paths[] = $file->store('reviews', 'public');
            }
            $paths = json_encode($paths);
        }
    
        $review = \App\Models\Review::create([
            'user_id'  => Auth::id(),
            'place_id' => $request->place_id,
            'rating'   => $request->rating,
            'title'    => $request->title,
            'comment'  => $request->comment,
            'file_url' => $paths,
        ]);

        if ($review->containsSpam()) {
            $review->update(['flagged' => true]);
        }
    
        return redirect()->route('reviews.index', $request->place_id)
            ->with('success', 'Review berhasil ditambahkan!');
    }
    
    // Hapus review
    public function destroy(int $id)
    {
        $review = \App\Models\Review::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
    
        $review->delete();
    
        return back()->with('success', 'Review berhasil dihapus.');
    }

    // Toggle like/helpful
    public function like(int $id)
    {
        $review = Review::findOrFail($id);
        $userId = Auth::id();

        $existing = \App\Models\ReviewLike::where('review_id', $id)
            ->where('user_id', $userId)
            ->first();

        if ($existing) {
            $existing->delete();
            $review->decrement('helpful_count');
            $liked = false;
        } else {
            \App\Models\ReviewLike::create([
                'review_id' => $id,
                'user_id'   => $userId,
            ]);
            $review->increment('helpful_count');
            $liked = true;
        }

        return response()->json([
            'liked'         => $liked,
            'helpful_count' => $review->fresh()->helpful_count,
        ]);
    }

    // Form edit review (max 24 jam)
    public function edit(int $id)
    {
        $review = Review::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // Cek apakah masih dalam 24 jam
        if ($review->created_at->diffInHours(now()) >= 24) {
            return back()->with('error', 'Review hanya bisa diedit dalam 24 jam setelah dikirim.');
        }

        $place = \App\Models\Places::findOrFail($review->place_id);
        return view('editReview', compact('review', 'place'));
    }

    // Simpan update review
    public function update(Request $request, int $id)
    {
        $review = Review::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        if ($review->created_at->diffInMinutes(now()) >= (24 * 60)) {
            return back()->with('error', 'Review sudah tidak bisa diedit.');
        }

        $request->validate([
            'rating'       => 'required|integer|min:1|max:5',
            'title'        => 'required|string|max:255',
            'comment'      => 'nullable|string|max:1000',
            'new_files'    => 'nullable|array|max:6',
            'new_files.*'  => 'file|mimes:jpg,jpeg,png,mp4,mov|max:5120',
            'deleted_files'   => 'nullable|array',
            'deleted_files.*' => 'nullable|string',
        ]);

        // Ambil file lama
        $existingFiles = $review->file_url ? json_decode($review->file_url, true) : [];

        // Hapus file yang di-delete user
        if ($request->deleted_files) {
            foreach ($request->deleted_files as $deletedFile) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($deletedFile);
                $existingFiles = array_filter($existingFiles, fn($f) => $f !== $deletedFile);
            }
        }

        // Tambah file baru
        if ($request->hasFile('new_files')) {
            foreach ($request->file('new_files') as $file) {
                $existingFiles[] = $file->store('reviews', 'public');
            }
        }

        $review->update([
            'rating'   => $request->rating,
            'title'    => $request->title,
            'comment'  => $request->comment,
            'file_url' => !empty($existingFiles) ? json_encode(array_values($existingFiles)) : null,
        ]);

        return redirect()->route('profile')->with('success', 'Review berhasil diperbarui.');
    }
}