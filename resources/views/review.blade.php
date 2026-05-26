@extends('layouts.app')

@section('title', 'Review - ' . $place->nama_tempat)

@section('content')

<div class="min-h-screen bg-gray-50 pb-16">
    <div class="max-w-3xl mx-auto px-4 py-8">

        {{-- BREADCRUMB + HEADER --}}
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-4">
                <a href="{{ route('places.show', $place->id) }}"
                   class="w-10 h-10 bg-[#FBB45E] rounded-xl flex items-center justify-center hover:bg-[#E2A255] transition">
                    <span class="material-symbols-outlined text-[#363B58]">arrow_back</span>
                </a>
                <div>
                    <p class="text-xs text-gray-400">
                        Detail Lokasi / <span class="text-[#FBB45E] font-semibold">Review</span>
                    </p>
                    <h1 class="text-2xl font-extrabold text-[#363B58]">Review</h1>
                </div>
            </div>
            <a href="{{ route('reviews.create', $place->id) }}"
               class="flex items-center gap-2 bg-[#FBB45E] hover:bg-[#E2A255] text-[#363B58] font-bold px-5 py-2.5 rounded-xl transition">
                <span class="material-symbols-outlined text-sm">add</span>
                Tambah Review
            </a>
        </div>

        {{-- PLACE CARD --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-4 mb-6 flex items-center gap-4">
            <img src="{{ $place->gambar ? asset('storage/' . $place->gambar) : asset('assets/img/180 Cafe - Bandung 1.png') }}"
                 class="w-20 h-20 rounded-xl object-cover shrink-0" alt="{{ $place->nama_tempat }}">
            <div class="flex-1">
                <h2 class="font-bold text-lg text-[#363B58]">{{ $place->nama_tempat }}</h2>
                <span class="inline-block bg-orange-100 text-[#FBB45E] text-xs font-semibold px-3 py-0.5 rounded-full mt-1">
                    {{ $place->kategori->nama ?? 'Kategori' }}
                </span>
                <p class="text-gray-400 text-xs mt-1 line-clamp-1">{{ $place->alamat_lengkap }}</p>
            </div>
            <div class="text-right shrink-0">
                <div class="flex items-center gap-1 justify-end">
                    <span class="material-symbols-outlined text-[#FBB45E] text-lg" style="font-variation-settings:'FILL' 1;">star</span>
                    <span class="font-extrabold text-xl text-[#363B58]">{{ number_format($place->reviews->avg('rating') ?? 0, 1) }}</span>
                </div>
                <p class="text-gray-400 text-xs">dari {{ $place->reviews->count() }}</p>
            </div>
        </div>

        {{-- SORT DROPDOWN --}}
        <div class="flex items-center gap-3 mb-5">
            <span class="text-sm text-gray-500 font-medium whitespace-nowrap">Urutkan dari</span>
            <div class="relative">
                <select id="sortSelect"
                    class="appearance-none bg-white border border-gray-200 rounded-xl px-4 py-2 pr-10 text-sm font-medium text-[#363B58] shadow-sm cursor-pointer focus:outline-none focus:ring-2 focus:ring-[#FBB45E]">
                    <option value="highest">Rating Tertinggi ke Terendah</option>
                    <option value="lowest">Rating Terendah ke Tertinggi</option>
                    <option value="newest">Terbaru</option>
                    <option value="oldest">Terlama</option>
                </select>
                <span class="material-symbols-outlined absolute right-3 top-2 text-gray-400 pointer-events-none text-sm">expand_more</span>
            </div>
        </div>

        {{-- REVIEW LIST --}}
        <div class="flex flex-col gap-4" id="reviewList">

            @forelse ($reviews as $review)
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                {{-- USER + RATING --}}
                <div class="flex items-start justify-between mb-3">
                    <div class="flex items-center gap-3">
                        <img src="{{ $review->user->fotoProfile ? asset('storage/' . $review->user->fotoProfile) : asset('assets/img/default-avatar.png') }}"
                             class="w-10 h-10 rounded-full object-cover" alt="{{ $review->user->username }}">
                        <div>
                            <p class="font-semibold text-sm text-[#363B58]">{{ $review->user->username }}</p>
                            <p class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($review->created_at)->translatedFormat('d F Y') }}</p>
                        </div>
                    </div>
                    {{-- STARS --}}
                    <div class="flex gap-0.5">
                        @for ($i = 1; $i <= 5; $i++)
                        <span class="material-symbols-outlined text-lg {{ $i <= $review->rating ? 'text-[#FBB45E]' : 'text-gray-200' }}"
                              style="font-variation-settings:'FILL' 1;">star</span>
                        @endfor
                    </div>
                </div>

                {{-- JUDUL + KOMENTAR --}}
                @if($review->title)
                <p class="font-bold text-[#363B58] mb-1">{{ $review->title }}</p>
                @endif
                @if($review->comment)
                <p class="text-gray-600 text-sm italic mb-3">"{{ $review->comment }}"</p>
                @endif

                {{-- FOTO --}}
                @if($review->file_url)
                <div class="flex gap-2 flex-wrap mb-4">
                    <img src="{{ asset('storage/' . $review->file_url) }}"
                         class="w-24 h-24 rounded-xl object-cover cursor-pointer hover:opacity-90 transition" alt="Foto review">
                </div>
                @endif

                {{-- ACTIONS --}}
                <div class="flex items-center gap-4 pt-3 border-t border-gray-100">
                    <button class="flex items-center gap-1.5 text-gray-500 text-xs hover:text-[#FBB45E] transition">
                        <span class="material-symbols-outlined text-sm">thumb_up</span>
                        Membantu ({{ $review->helpful_count ?? 0 }})
                    </button>
                    <span class="text-gray-200">|</span>
                    <button class="flex items-center gap-1.5 text-red-400 text-xs hover:text-red-600 transition">
                        <span class="material-symbols-outlined text-sm">flag</span>
                        Laporkan Penyalahgunaan
                    </button>
                </div>
            </div>
            @empty
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-10 text-center">
                <span class="material-symbols-outlined text-5xl text-gray-200 mb-3 block">rate_review</span>
                <p class="text-gray-400 text-sm">Belum ada review. Jadilah yang pertama!</p>
            </div>
            @endforelse

        </div>
    </div>
</div>

@endsection