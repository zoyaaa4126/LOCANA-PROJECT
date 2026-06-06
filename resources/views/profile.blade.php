@extends('layouts.app')

@section('title', 'Profile')

@section('content')

    <div class="flex flex-col overflow-x-hidden">
        <div class="flex flex-col md:flex-row">
            <!-- SIDEBAR KIRI - MEPET KE KIRI -->
            <aside class="w-80 shrink-0 bg-white shadow p-6 h-fill sticky border border-gray-200 transition-all duration-300 overflow-hidden max-md:hidden">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Setelan Akun</h2>
                <nav class="space-y-1">
                    <a href="/profile"><div class="flex items-center gap-3 px-4 py-3 rounded-xl bg-orange-50 text-[#FBB45E] font-semibold hover:bg-[#FEE8CD]">
                        <span class="material-symbols-outlined">person</span>
                        <span>Profil</span>
                    </div></a>
                    <a href="/wishlist"><div class="flex items-center gap-3 px-4 py-3 rounded-xl text-[#363B58] hover:text-[#E2A255] cursor-pointer">
                        <span class="material-symbols-outlined">favorite</span>
                        <span>Wishlist</span>
                    </div></a>
                    <a href=""><div class="flex items-center gap-3 px-4 py-3 rounded-xl text-[#363B58] hover:text-[#E2A255] cursor-pointer">
                        <span class="material-symbols-outlined">security</span>
                        <span>Privasi & Keamanan</span>
                    </div></a>
                    <a href=""><div class="flex items-center gap-3 px-4 py-3 rounded-xl text-[#363B58] hover:text-[#E2A255] cursor-pointer">
                        <span class="material-symbols-outlined">help</span>
                        <span>Bantuan</span>
                    </div></a>
                </nav>
                <div class="mt-8 pt-6 border-t border-gray-100">
                    <button type="submit" onclick="bukaModalLogout()" class="flex items-center gap-3 px-4 py-3 rounded-xl text-red-500 hover:bg-red-50 w-full font-medium">
                        <span class="material-symbols-outlined">logout</span>
                        <span>Keluar</span>
                    </button>
                </div>
            </aside>

            <!-- KONTEN UTAMA -->
            <div class="flex-1 p-6 md:p-8 max-md:order-1">
                <div class="max-w-4xl mx-auto space-y-10">
                    <!-- HEADER PROFIL dengan Avatar -->
                    <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-sm flex flex-col sm:flex-row items-center gap-6">
                        <div class="relative">
                            <!-- FOTO PROFILE BERUBAH -->
                            @if(Auth::user()->fotoProfile)
                                <img src="{{ asset('storage/' . Auth::user()->fotoProfile) }}" 
                                    class="w-24 h-24 rounded-full object-cover" alt="Profile">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->nama) }}&background=FBB45E&color=363B58" 
                                    class="w-24 h-24 rounded-full object-cover" alt="Profile">
                            @endif
                            <a href="/edit-profile" class="absolute bottom-0 right-0 bg-[#FBB45E] w-8 h-8 flex items-center justify-center rounded-full">
                                <span class="material-symbols-outlined text-[#363B58] text-sm">edit</span>
                            </a>
                        </div>
                        <div class="flex-1 text-center sm:text-left">
                            <h1 class="text-2xl font-bold text-gray-800">{{ $user->nama }}</h1>
                            <p class="text-gray-500">{{ $user->username }}</p>
                            <p class="text-[#363B58] italic mt-1">{{ $user->deskripsi }}</p>
                            <div class="flex justify-center sm:justify-start gap-6 mt-3">
                                <div class="flex flex-col justify-center items-center"><span class="font-bold text-[#FBB45E] text-lg">{{ $reviewCount }}</span> <span class="text-gray-500">Ulasan</span></div>
                                <div class="flex flex-col justify-center items-center"><span class="font-bold text-[#FBB45E] text-lg">{{ $wishlistCount }}</span> <span class="text-gray-500">Wishlist</span></div>
                            </div>
                        </div>
                        <a href="/edit-profile">
                            <button class="bg-[#FBB45E] text-[#363B58] px-5 py-2 rounded-lg text-sm font-bold cursor-pointer">Edit Profil</button>
                        </a>
                    </div>

                    <div>
                        <h2 class="text-2xl font-bold text-gray-800"><span class="text-[#FBB45E]">Aktivitas</span> Terakhir</h2>
                        <div class="flex flex-row gap-4 overflow-x-auto no-scrollbar max-md:flex-col max-md:overflow-visible">
                            @forelse ($activities as $activity)
                            <a href="{{ $activity['type'] === 'review' ? route('places.show', $activity['place']->id) . '#reviews' : route('places.show', $activity['place']->id) }}"
                            class="bg-white rounded-xl border border-gray-100 p-4 shadow-sm flex flex-col gap-4 w-[500px] shrink-0 hover:shadow-md transition cursor-pointer">

                                {{-- Badge tipe aktivitas --}}
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-2">
                                        @if($activity['type'] === 'review')
                                            <span class="material-symbols-outlined text-[#363B58] bg-[#FBB45E] p-1 rounded-full text-[12px]">star</span>
                                            <span class="font-semibold text-sm">Memberi Ulasan</span>
                                        @else
                                            <span class="material-symbols-outlined text-[#FBB45E] bg-[#363B58] p-1 rounded-full text-[12px]">bookmark</span>
                                            <span class="font-semibold text-sm">Menambahkan ke Wishlist</span>
                                        @endif
                                    </div>
                                    <span class="text-xs text-gray-400">{{ $activity['created_at']->diffForHumans() }}</span>
                                </div>

                                {{-- Konten --}}
                                <div class="flex gap-4 items-center">
                                    <img src="{{ $activity['place']->gambar ? asset('storage/' . $activity['place']->gambar) : asset('assets/img/180 Cafe - Bandung 1.png') }}"
                                        class="w-20 h-20 rounded-xl object-cover shrink-0">
                                    <div class="flex flex-col">
                                        <h3 class="font-bold text-base">{{ $activity['place']->nama_tempat }}</h3>
                                        @if($activity['type'] === 'review')
                                            <div class="flex text-yellow-500 text-sm my-1">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <span class="material-symbols-outlined text-sm {{ $i <= $activity['rating'] ? 'text-yellow-500' : 'text-gray-300' }}">star</span>
                                                @endfor
                                            </div>
                                            <p class="text-[#363B58] text-sm italic line-clamp-2">{{ $activity['comment'] }}</p>
                                        @else
                                            <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                                <span class="material-symbols-outlined text-sm">location_on</span>
                                                <span class="line-clamp-1">{{ $activity['place']->alamat_lengkap }}</span>
                                            </div>
                                            <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                                <span class="material-symbols-outlined text-sm">payments</span>
                                                <span>Rp{{ number_format($activity['place']->harga_min, 0, ',', '.') }} - Rp{{ number_format($activity['place']->harga_max, 0, ',', '.') }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </a>
                            @empty
                            <p class="text-gray-400 text-sm italic">Belum ada aktivitas.</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- WISHLIST SAYA dengan Gambar, Bookmark, Share -->
                    <div>
                        <div class="flex justify-between items-center mb-5">
                            <h2 class="text-2xl font-bold text-gray-800"><span class="text-[#FBB45E]">Wishlist</span> Saya</h2>
                            <a href="/wishlist" class="text-[#FBB45E] text-sm font-semibold">Lihat Semua →</a>
                        </div>
                        <div class="flex flex-row gap-6 overflow-x-auto no-scrollbar">

                            @forelse ($wishlists as $item)
                            <div class="flex gap-4 bg-white rounded-xl border border-gray-100 p-4 h-fit w-[500px] shrink-0 shadow-sm">
                                <div class="relative w-40 h-40 shrink-0">
                                    <img src="{{ $item->place->gambar ? asset('storage/' . $item->place->gambar) : asset('assets/img/180 Cafe - Bandung 1.png') }}"
                                        class="w-full h-full object-cover rounded-xl">
                                    <button
                                        data-id="{{ $item->place->id }}"
                                        onclick="toggleWishlist(this)"
                                        class="wishlist-btn absolute top-2 right-2 bg-[#FBB45E] text-[#363B58] rounded-full w-8 h-8 flex items-center justify-center shadow-md cursor-pointer"
                                        style="font-variation-settings: 'FILL' 1;">
                                        <span class="material-symbols-outlined">bookmark</span>
                                    </button>
                                </div>
                                <div class="flex flex-col gap-2 flex-1">
                                    <div class="flex flex-col gap-1">
                                        <span class="text-[#FBB45E] font-bold text-xs">{{ strtoupper($item->place->kategori->nama ?? '-') }}</span>
                                        <h3 class="font-bold text-base">{{ $item->place->nama_tempat }}</h3>
                                        <div class="flex items-center gap-1 text-gray-500 text-xs">
                                            <span class="material-symbols-outlined text-sm">location_on</span>
                                            <span class="line-clamp-1">{{ $item->place->alamat_lengkap }}</span>
                                        </div>
                                        <div class="flex items-center gap-1 text-gray-500 text-xs">
                                            <span class="material-symbols-outlined text-sm">payments</span>
                                            <span>Rp{{ number_format($item->place->harga_min, 0, ',', '.') }} - Rp{{ number_format($item->place->harga_max, 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                    <div class="flex gap-2 mt-2">
                                        <a href="{{ route('places.show', $item->place->id) }}"
                                            class="flex-1 bg-gray-800 text-[#FBB45E] py-2 rounded-xl text-sm font-semibold flex items-center justify-center gap-1">
                                            <span class="material-symbols-outlined text-sm">location_on</span> Lihat Lokasi
                                        </a>
                                        <button class="bg-[#FBB45E] text-white w-10 h-10 rounded-xl flex items-center justify-center">
                                            <span class="material-symbols-outlined text-sm">share</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <p class="text-gray-400 text-sm italic">Belum ada wishlist tersimpan.</p>
                            @endforelse

                        </div>
                    </div>

                    {{-- ULASAN SAYA --}}
                    <div>
                        <div class="flex justify-between items-center mb-5">
                            <h2 class="text-2xl font-bold text-gray-800">
                                <span class="text-[#FBB45E]">Ulasan</span> Saya
                            </h2>
                        </div>

                        @if(session('success'))
                        <div class="bg-green-50 border border-green-200 rounded-xl p-3 mb-4 text-green-600 text-sm">
                            {{ session('success') }}
                        </div>
                        @endif
                        @if(session('error'))
                        <div class="bg-red-50 border border-red-200 rounded-xl p-3 mb-4 text-red-500 text-sm">
                            {{ session('error') }}
                        </div>
                        @endif

                        <div class="flex flex-col gap-4">
                            @forelse ($reviews as $review)
                            @php $canEdit = $review->created_at->diffInHours(now()) < 24; @endphp
                            <div class="bg-white rounded-2xl border border-gray-100 p-5 shadow-sm">
                                <div class="flex items-start justify-between mb-3">
                                    <div>
                                        <a href="{{ route('places.show', $review->place->id) }}"
                                        class="font-bold text-[#363B58] hover:text-[#FBB45E] transition">
                                            {{ $review->place->nama_tempat }}
                                        </a>
                                        <span class="inline-block bg-orange-100 text-[#FBB45E] text-xs font-semibold px-2 py-0.5 rounded-full ml-2">
                                            {{ $review->place->kategori->nama ?? '-' }}
                                        </span>
                                        <p class="text-xs text-gray-400 mt-1">{{ $review->created_at->translatedFormat('d F Y') }}</p>
                                    </div>
                                    <div class="flex gap-1">
                                        @for ($i = 1; $i <= 5; $i++)
                                        <span class="material-symbols-outlined text-base {{ $i <= $review->rating ? 'text-[#FBB45E]' : 'text-gray-200' }}"
                                            style="font-variation-settings:'FILL' 1;">star</span>
                                        @endfor
                                    </div>
                                </div>

                                @if($review->title)
                                <p class="font-semibold text-[#363B58] mb-1">{{ $review->title }}</p>
                                @endif
                                @if($review->comment)
                                <p class="text-gray-500 text-sm italic">"{{ $review->comment }}"</p>
                                @endif

                                {{-- Foto preview --}}
                                @if($review->file_url)
                                <div class="flex gap-2 flex-wrap mt-3">
                                    @foreach(json_decode($review->file_url) as $file)
                                    @php $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION)); @endphp
                                    @if(in_array($ext, ['mp4', 'webm', 'mov', 'ogg']))
                                    <div class="relative w-16 h-16 rounded-xl overflow-hidden cursor-pointer group"
                                        onclick="bukaLightboxVideo('{{ asset('storage/' . $file) }}')">
                                        <video src="{{ asset('storage/' . $file) }}#t=0.1"
                                            class="w-full h-full object-cover" preload="metadata" muted playsinline></video>
                                        <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                                            <span class="material-symbols-outlined text-white text-sm" style="font-variation-settings:'FILL' 1;">play_arrow</span>
                                        </div>
                                    </div>
                                    @else
                                    <img src="{{ asset('storage/' . $file) }}"
                                        class="w-16 h-16 rounded-xl object-cover cursor-pointer hover:opacity-90 transition"
                                        onclick="bukaLightbox('{{ asset('storage/' . $file) }}')"
                                        alt="Foto review">
                                    @endif
                                    @endforeach
                                </div>
                                @endif

                                {{-- Actions --}}
                                <div class="flex items-center gap-3 mt-4 pt-3 border-t border-gray-100">
                                    @if($canEdit)
                                    <a href="{{ route('reviews.edit', $review->id) }}"
                                    class="flex items-center gap-1.5 text-xs font-medium text-[#FBB45E] hover:text-[#E2A255] transition">
                                        <span class="material-symbols-outlined text-sm">edit</span>
                                        Edit Ulasan
                                    </a>
                                    <span class="text-gray-200">|</span>
                                    @else
                                    <span class="text-xs text-gray-300 flex items-center gap-1">
                                        <span class="material-symbols-outlined text-sm">lock</span>
                                        Tidak bisa diedit
                                    </span>
                                    <span class="text-gray-200">|</span>
                                    @endif
                                    <button type="button"
                                            onclick="bukaModalConfirm('Ulasan yang dihapus tidak dapat dikembalikan.', () => document.getElementById('form-hapus-{{ $review->id }}').submit())"
                                            class="flex items-center gap-1.5 text-xs text-red-400 hover:text-red-600 transition">
                                        <span class="material-symbols-outlined text-sm">delete</span>
                                        Hapus
                                    </button>

                                    <form id="form-hapus-{{ $review->id }}" action="{{ route('reviews.destroy', $review->id) }}" method="POST" class="hidden">
                                        @csrf @method('DELETE')
                                    </form>
                                </div>
                            </div>
                            @empty
                            <p class="text-gray-400 text-sm italic">Belum ada ulasan yang dikirim.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="/chatbot" class="fixed bottom-5 right-5 z-50 bg-[#FBB45E] text-[#363B58] w-14 h-14 rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition" style="font-variation-settings: 'FILL' 1;">
            <span class="material-symbols-outlined text-2xl">smart_toy</span>
        </a>
    </div>
{{-- LIGHTBOX MODAL --}}
<div id="lightboxModal"
     class="fixed inset-0 z-50 hidden items-center justify-center bg-black/80 backdrop-blur-sm"
     onclick="tutupLightbox()">
    <button class="absolute top-4 right-4 text-white bg-black/40 rounded-full p-2 hover:bg-black/70 transition z-10"
            onclick="event.stopPropagation(); tutupLightbox()">
        <span class="material-symbols-outlined text-2xl">close</span>
    </button>
    <img id="lightboxImg" src=""
         class="max-w-[90vw] max-h-[88vh] rounded-2xl shadow-2xl object-contain hidden"
         onclick="event.stopPropagation()" alt="Preview">
    <video id="lightboxVideo"
           class="max-w-[90vw] max-h-[88vh] rounded-2xl shadow-2xl hidden"
           controls playsinline onclick="event.stopPropagation()">
    </video>
</div>

<script>
function bukaLightbox(src) {
    document.getElementById('lightboxImg').src = src;
    document.getElementById('lightboxImg').classList.remove('hidden');
    document.getElementById('lightboxVideo').classList.add('hidden');
    document.getElementById('lightboxVideo').pause();
    document.getElementById('lightboxVideo').src = '';
    bukaModal();
}
function bukaLightboxVideo(src) {
    const vid = document.getElementById('lightboxVideo');
    vid.src = src;
    vid.classList.remove('hidden');
    document.getElementById('lightboxImg').classList.add('hidden');
    document.getElementById('lightboxImg').src = '';
    bukaModal();
    vid.play().catch(() => {});
}
function bukaModal() {
    const modal = document.getElementById('lightboxModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';
}
function tutupLightbox() {
    const modal = document.getElementById('lightboxModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.style.overflow = '';
    const vid = document.getElementById('lightboxVideo');
    vid.pause();
    vid.src = '';
}
document.addEventListener('keydown', e => {
    if (e.key === 'Escape') tutupLightbox();
});
function laporkanReview(reviewId) {
    if (!confirm('Yakin ingin melaporkan review ini?')) return;
    fetch(`/reviews/${reviewId}/report`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ review_id: reviewId, alasan: 'Konten tidak pantas' })
    })
    .then(res => res.json())
    .then(data => alert(data.message))
    .catch(() => alert('Gagal mengirim laporan.'));
}
function toggleLike(reviewId, btn) {
    fetch(`/reviews/${reviewId}/like`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(res => res.json())
    .then(data => {
        const icon = btn.querySelector('.material-symbols-outlined');
        const countEl = document.getElementById(`like-count-${reviewId}`);
        countEl.textContent = data.helpful_count;
        if (data.liked) {
            btn.classList.add('text-[#FBB45E]');
            btn.classList.remove('text-gray-500');
            icon.style.fontVariationSettings = "'FILL' 1";
        } else {
            btn.classList.remove('text-[#FBB45E]');
            btn.classList.add('text-gray-500');
            icon.style.fontVariationSettings = "'FILL' 0";
        }
    })
    .catch(() => alert('Gagal. Coba lagi.'));
}
</script>

@endsection