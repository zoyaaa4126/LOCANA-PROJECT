@extends('layouts.admin')

@section('title', 'Ulasan')

@section('content')

<div class="m-5">
    <div class="mb-5">
        <p class="text-slate-300 text-sm font-semibold">Dashboard / <span class="text-[#FBB45E] font-bold">Ulasan</span></p>
        <h1 class="text-2xl font-bold text-[#363B58]">Halo Admin <span class="text-yellow-400">{{ $user->nama }}</span></h1>
    </div>
    
    {{-- Statistik --}}
    <div class="flex flex-row gap-5 flex-wrap mb-5">
        <div class="flex flex-col p-[15px_20px] bg-[#FFE2E2] rounded-[10px] justify-between w-[162px] h-[130px]">
            <p class="font-bold text-red-600 text-sm">PERLU DITINJAU</p>
            <h2 class="text-[2rem] font-bold text-red-600">{{ $flaggedReviews->count() }}</h2>
        </div>
        <div class="flex flex-col p-[15px_20px] bg-[#E2E8F0] rounded-[10px] justify-between w-[162px] h-[130px]">
            <p class="font-bold text-[#363B58] text-sm">TOTAL ULASAN</p>
            <h2 class="text-[2rem] font-bold text-[#363B58]">{{ $totalReviews }}</h2>
        </div>
    </div>

    {{-- Review yang perlu ditinjau --}}
    <div class="flex flex-col gap-5 mb-10">
        @forelse($flaggedReviews as $review)
        <div class="flex flex-col gap-5 bg-white p-[20px_30px] border border-red-500 rounded-[20px] max-w-[1200px] w-full">

            <div class="flex justify-between items-center">
                <div class="flex gap-5 items-center">
                    @if($review->user->fotoProfile)
                        <img src="{{ asset('storage/' . $review->user->fotoProfile) }}"
                            class="w-[60px] h-[60px] rounded-full object-cover">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($review->user->nama) }}&background=FBB45E&color=363B58"
                            class="w-[60px] h-[60px] rounded-full object-cover">
                    @endif
                    <div class="flex flex-col gap-1">
                        <h3 class="font-bold text-xl">{{ $review->user->username }}</h3>
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                            <span>{{ $review->created_at->format('d F Y') }}</span>
                            <span class="material-symbols-outlined text-[#FBB45E]" style="font-size:16px;">location_on</span>
                            <span class="font-medium text-[#363B58]">{{ $review->place->nama_tempat }}</span>
                        </div>
                    </div>
                </div>
                <div class="flex">
                    @for($i = 1; $i <= 5; $i++)
                        <span class="material-symbols-outlined text-[#FBB45E]"
                            style="font-variation-settings:'FILL' {{ $i <= $review->rating ? 1 : 0 }}; font-size:20px;">kid_star</span>
                    @endfor
                </div>
            </div>

            <div class="flex flex-col gap-3 bg-[#FFE2E2] p-5 rounded-[10px]">
                <div class="flex items-center gap-2 text-red-600 font-bold text-sm">
                    <span class="material-symbols-outlined text-red-600" style="font-size:20px;">flag</span>
                    <p>{{ $review->report_count >= 2 ? 'Dilaporkan oleh ' . $review->report_count . ' pengguna' : 'Terdeteksi mengandung keyword spam' }}</p>
                </div>
                @if($review->title)
                    <p class="font-bold text-[#363B58]">{{ $review->title }}</p>
                @endif
                <p class="text-base">"{{ $review->comment }}"</p>
            </div>

            <div class="flex justify-end gap-3">
                <form action="{{ route('admin.reviews.unflag', $review->id) }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="px-5 py-[10px] bg-[#F1F5F9] border border-[#D9D9D9] text-[#363B58] font-bold text-base rounded-[10px] hover:bg-gray-200 transition">
                        Abaikan
                    </button>
                </form>

                {{-- Tombol Hapus pakai modal --}}
                <button type="button"
                    onclick="bukaModalHapus({{ $review->id }})"
                    class="px-5 py-[10px] bg-red-600 text-white font-bold text-base rounded-[10px] hover:bg-red-700 transition">
                    Hapus
                </button>
            </div>

        </div>
        @empty
        <div class="text-center py-10 text-gray-400">
            <span class="material-symbols-outlined text-5xl block mb-2">check_circle</span>
            Tidak ada ulasan yang perlu ditinjau.
        </div>
        @endforelse
    </div>
</div>

{{-- MODAL KONFIRMASI HAPUS --}}
<div id="modal-hapus" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl p-8 w-full max-w-xs mx-4 relative text-center">
        <button onclick="tutupModalHapus()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
            <span class="material-symbols-outlined text-xl">close</span>
        </button>
        <div class="w-16 h-16 rounded-full bg-red-100 flex items-center justify-center mx-auto mb-4">
            <span class="material-symbols-outlined text-red-500 text-3xl" style="font-variation-settings:'FILL' 0;">delete</span>
        </div>
        <h3 class="text-lg font-bold text-[#363B58] mb-2">Apakah Anda Yakin?</h3>
        <p class="text-sm text-gray-400 mb-6 leading-relaxed">Anda akan menghapus data ini untuk semua orang</p>
        <div class="flex gap-3">
            <button onclick="tutupModalHapus()"
                class="flex-1 border border-[#E2E8F0] text-[#363B58] font-semibold text-sm py-2.5 rounded-xl hover:bg-[#F1F5F9] transition">
                Batalkan
            </button>
            <form id="form-hapus" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="flex-1 bg-red-500 hover:bg-red-600 text-white font-semibold text-sm py-2.5 px-6 rounded-xl transition">
                    Hapus
                </button>
            </form>
        </div>
    </div>
</div>

{{-- MODAL SUKSES --}}
<div id="modal-sukses" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl p-8 w-full max-w-xs mx-4 relative text-center">
        <button onclick="tutupModalSukses()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
            <span class="material-symbols-outlined text-xl">close</span>
        </button>
        <div class="w-16 h-16 rounded-full bg-green-100 flex items-center justify-center mx-auto mb-4">
            <span class="material-symbols-outlined text-green-500 text-3xl" style="font-variation-settings:'FILL' 1;">check_circle</span>
        </div>
        <h3 class="text-lg font-bold text-[#363B58] mb-2">Data berhasil diubah!</h3>
        <p class="text-sm text-gray-400 mb-6">Perubahan telah berhasil diterapkan.</p>
        <button onclick="tutupModalSukses()"
            class="w-full bg-[#363B58] hover:bg-[#2a2f45] text-white font-semibold text-sm py-2.5 rounded-xl transition">
            Lihat Data
        </button>
    </div>
</div>

@push('scripts')
<script>
function bukaModalHapus(reviewId) {
    document.getElementById('form-hapus').action = `/admin/reviews/${reviewId}`;
    const modal = document.getElementById('modal-hapus');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}
function tutupModalHapus() {
    const modal = document.getElementById('modal-hapus');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}
function tutupModalSukses() {
    const modal = document.getElementById('modal-sukses');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

@if(session('success'))
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('modal-sukses');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
});
@endif

document.getElementById('modal-hapus').addEventListener('click', function(e) {
    if (e.target === this) tutupModalHapus();
});
document.getElementById('modal-sukses').addEventListener('click', function(e) {
    if (e.target === this) tutupModalSukses();
});
</script>
@endpush

@endsection