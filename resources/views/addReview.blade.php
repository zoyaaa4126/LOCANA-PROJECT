@extends('layouts.app')

@section('title', 'Kirim Review - ' . $place->nama_tempat)

@section('content')

<div class="min-h-screen bg-gray-50 pb-16">
    <div class="max-w-5xl mx-auto px-4 py-8">

        {{-- BREADCRUMB + HEADER --}}
        <div class="flex items-center gap-4 mb-8">
            <a href="{{ route('reviews.index', $place->id) }}"
               class="w-10 h-10 bg-[#FBB45E] rounded-xl flex items-center justify-center hover:bg-[#E2A255] transition">
                <span class="material-symbols-outlined text-[#363B58]">arrow_back</span>
            </a>
            <div>
                <p class="text-xs text-gray-400">
                    Detail Lokasi / <span class="text-[#FBB45E] font-semibold">Kirim Review</span>
                </p>
                <h1 class="text-2xl font-extrabold text-[#363B58]">Kirim Review</h1>
            </div>
        </div>

        {{-- ERROR MESSAGES --}}
        @if($errors->any())
        <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6">
            <ul class="text-red-500 text-sm space-y-1">
                @foreach($errors->all() as $error)
                <li class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">error</span> {{ $error }}
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="place_id" value="{{ $place->id }}">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- KOLOM KIRI --}}
                <div class="flex flex-col gap-4">

                    {{-- PLACE CARD --}}
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-4 flex gap-4 items-start">
                        <img src="{{ $place->gambar ? asset('storage/' . $place->gambar) : asset('assets/img/180 Cafe - Bandung 1.png') }}"
                             class="w-24 h-24 rounded-xl object-cover shrink-0" alt="{{ $place->nama_tempat }}">
                        <div>
                            <h2 class="font-bold text-lg text-[#363B58]">{{ $place->nama_tempat }}</h2>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="material-symbols-outlined text-[#FBB45E] text-sm" style="font-variation-settings:'FILL' 1;">star</span>
                                <span class="text-sm font-medium">{{ number_format($place->reviews->avg('rating') ?? 0, 1) }}</span>
                                <span class="text-gray-400 text-xs">({{ $place->reviews->count() }})</span>
                            </div>
                            <span class="inline-block bg-orange-100 text-[#FBB45E] text-xs font-semibold px-3 py-0.5 rounded-full mt-2">
                                {{ $place->kategori->nama ?? 'Kategori' }}
                            </span>
                            <p class="text-gray-400 text-xs mt-2 leading-relaxed">{{ $place->alamat_lengkap }}</p>
                        </div>
                    </div>

                    {{-- RATING --}}
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                        <p class="font-bold text-[#363B58] mb-4">
                            Rating Lokasi <span class="text-red-500">*</span>
                        </p>
                        <div class="flex gap-2 justify-center" id="starContainer">
                            @for ($i = 1; $i <= 5; $i++)
                            <button type="button"
                                    data-value="{{ $i }}"
                                    class="star-btn material-symbols-outlined text-4xl text-gray-300 hover:text-[#FBB45E] transition cursor-pointer"
                                    style="font-variation-settings:'FILL' 0;">
                                star
                            </button>
                            @endfor
                        </div>
                        <input type="hidden" name="rating" id="ratingInput" value="{{ old('rating') }}" required>
                        <p class="text-center text-xs text-gray-400 mt-3" id="ratingLabel">Pilih rating</p>
                    </div>

                </div>

                {{-- KOLOM KANAN --}}
                <div class="flex flex-col gap-4">

                    {{-- JUDUL --}}
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                        <label class="block font-bold text-[#363B58] mb-3">
                            Judul <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               name="title"
                               value="{{ old('title') }}"
                               placeholder="Masukkan Judul Ulasan"
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#FBB45E] placeholder-gray-300"
                               required>
                    </div>

                    {{-- ULASAN --}}
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                        <label class="block font-bold text-[#363B58] mb-3">Ulasan</label>
                        <textarea name="comment"
                                  rows="4"
                                  placeholder="Masukkan Ulasan"
                                  class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#FBB45E] placeholder-gray-300 resize-none">{{ old('comment') }}</textarea>
                    </div>

                    {{-- UPLOAD FOTO --}}
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                        <p class="font-bold text-[#363B58] mb-1">Tambahkan Foto atau Video</p>
                        <p class="text-gray-400 text-xs mb-1">Unggah hingga 6 foto atau video (maks. 5MB)</p>
                        <p class="text-gray-400 text-xs mb-4">Format: JPG, PNG, MP4, MOV</p>

                        <label for="fileUpload"
                               class="inline-flex items-center gap-2 border border-gray-200 rounded-xl px-5 py-2.5 text-sm font-medium text-[#363B58] hover:bg-gray-50 cursor-pointer transition">
                            <span class="material-symbols-outlined text-sm">upload</span>
                            Unggah File
                        </label>
                        <input type="file" id="fileUpload" name="file_url"
                               accept=".jpg,.jpeg,.png,.mp4,.mov"
                               class="hidden" onchange="previewFile(this)">

                        {{-- Preview --}}
                        <div id="filePreview" class="mt-3 hidden">
                            <img id="previewImg" src="" alt="Preview" class="w-24 h-24 rounded-xl object-cover">
                            <p id="previewName" class="text-xs text-gray-400 mt-1"></p>
                        </div>
                    </div>

                </div>
            </div>

            {{-- SUBMIT --}}
            <div class="flex justify-end mt-6">
                <button type="submit"
                        class="bg-[#FBB45E] hover:bg-[#E2A255] text-[#363B58] font-bold px-8 py-3 rounded-xl transition text-sm">
                    Kirim Review
                </button>
            </div>

        </form>
    </div>
</div>
@if($loginRequired)
<script>
    document.addEventListener('DOMContentLoaded', function() {
        bukaModalLoginRequired();
    });

    history.pushState(null, null, location.href);
    window.addEventListener('popstate', function() {
        window.location.href = '/';
    });
</script>
@endif
@endsection