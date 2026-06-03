<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\ReviewReport;
use Illuminate\Support\Facades\Auth;

class ReviewReportController extends Controller
{
    // User melaporkan review
    public function store(Request $request)
    {
        $request->validate([
            'review_id' => 'required|exists:reviews,id',
            'alasan'    => 'nullable|string|max:255',
        ]);

        // Cek apakah sudah pernah lapor
        $sudahLapor = ReviewReport::where('review_id', $request->review_id)
            ->where('user_id', Auth::id())
            ->exists();

        if ($sudahLapor) {
            return response()->json(['message' => 'Kamu sudah melaporkan review ini.'], 422);
        }

        ReviewReport::create([
            'review_id' => $request->review_id,
            'user_id'   => Auth::id(),
            'alasan'    => $request->alasan,
        ]);

        // Update report_count di review
        $review = Review::findOrFail($request->review_id);
        $review->increment('report_count');

        // Auto-flag kalau laporan >= 2
        if ($review->report_count >= 2) {
            $review->update(['flagged' => true]);
        }

        return response()->json(['message' => 'Laporan berhasil dikirim.']);
    }

    // Admin: hapus review yang dilaporkan
    public function destroy(int $id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return back()->with('success', 'Review berhasil dihapus.');
    }

    // Admin: abaikan laporan (unflag)
    public function unflag(int $id)
    {
        Review::findOrFail($id)->update(['flagged' => false, 'report_count' => 0]);
        ReviewReport::where('review_id', $id)->delete();

        return back()->with('success', 'Review telah dibersihkan dari laporan.');
    }
}