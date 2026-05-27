@extends('layouts.app')

@section('title', 'Homepage')

@section('content')

<div class="flex flex-col sm:flex-row gap-8">

    {{-- ===== SIDEBAR FILTER (kiri) ===== --}}
    <aside id="desktopSidebar"
        class="w-80 shrink-0 bg-white shadow p-6 h-fill sticky border border-gray-200
               max-sm:w-full max-sm:static max-sm:hidden transition-all duration-300 overflow-hidden">

        <div class="flex justify-between items-center mb-4">
            <h2 class="font-bold text-xl">Filters</h2>
            <button id="resetFilters" class="text-[#FBB45E] text-sm font-semibold">RESET</button>
        </div>

        {{-- Kategori --}}
        <div class="mb-6">
            <p class="text-gray-400 font-semibold text-sm mb-3 uppercase tracking-wide">KATEGORI</p>
            <div class="space-y-3">
                @foreach ($kategoris as $kategori)
                <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 cursor-pointer">
                    <span class="material-symbols-outlined">
                        @php
                        echo match(strtolower($kategori->nama)) {
                        'cafe' => 'coffee',
                        'restaurant' => 'restaurant',
                        'bakery' => 'bakery_dining',
                        'live music' => 'music_note',
                        'indoor' => 'home',
                        'outdoor' => 'landscape',
                        default => 'category',
                        };
                        @endphp
                    </span>
                    {{ $kategori->nama }}
                </div>
                @endforeach
            </div>
        </div>

        {{-- Moods --}}
        @if(isset($moods) && $moods->count())
        <div class="mb-6">
            <p class="text-gray-400 font-semibold text-sm mb-3 uppercase tracking-wide">MOODS</p>
            <div class="space-y-3">
                @foreach ($moods as $mood)
                <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 cursor-pointer">
                    <span class="material-symbols-outlined">mood</span>
                    {{ $mood->nama }}
                </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Budget --}}
        <div class="mb-6">
            <p class="text-gray-400 font-semibold text-sm mb-3 uppercase tracking-wide">BUDGET</p>
            <div class="space-y-2">
                <label class="flex items-center gap-2"><input type="checkbox" class="rounded text-[#FBB45E]"> <span class="text-sm">&lt; Rp50.000</span></label>
                <label class="flex items-center gap-2"><input type="checkbox" class="rounded text-[#FBB45E]"> <span class="text-sm">Rp50.000 – Rp100.000</span></label>
                <label class="flex items-center gap-2"><input type="checkbox" class="rounded text-[#FBB45E]"> <span class="text-sm">Rp100.001 – Rp150.000</span></label>
                <label class="flex items-center gap-2"><input type="checkbox" class="rounded text-[#FBB45E]"> <span class="text-sm">Rp150.001 – Rp200.000</span></label>
                <label class="flex items-center gap-2"><input type="checkbox" class="rounded text-[#FBB45E]"> <span class="text-sm">&gt; Rp200.001</span></label>
            </div>
        </div>

        {{-- Rating --}}
        <div class="mb-6">
            <p class="text-gray-400 font-semibold text-sm mb-3 uppercase tracking-wide">RATING</p>
            <div class="space-y-2">
                <label class="flex items-center gap-2"><input type="radio" name="rating" class="text-[#FBB45E]"> <span class="text-sm">Rating Tertinggi</span></label>
                <label class="flex items-center gap-2"><input type="radio" name="rating" class="text-[#FBB45E]"> <span class="text-sm">Rating Terendah</span></label>
            </div>
        </div>

        <button class="mt-3 bg-[#FBB45E] hover:bg-[#E2A255] w-full px-5 py-2 rounded-lg text-md font-bold flex gap-1 justify-center items-center">
            Terapkan Filter
        </button>
    </aside>

    {{-- ===== MAIN CONTENT (kanan) ===== --}}
    <div class="flex-1 my-5 overflow-hidden">
        <div class="sm:px-4 max-sm:px-5">

            {{-- Filter chips --}}
            <div class="w-full overflow-x-auto no-scrollbar">
                <div class="flex gap-4 mb-6 whitespace-nowrap">
                    <span id="desktopFilterToggle"
                        class="inline-flex items-center gap-2 px-5 py-2 bg-[#FBB45E] text-[#363B58]
                           rounded-full text-base cursor-pointer hover:bg-orange-100 transition shrink-0 max-sm:hidden">
                        <span class="material-symbols-outlined">tune</span> Filter
                    </span>

                    <a href="#rekomendasi"
                        class="inline-flex items-center gap-2 px-5 py-2 bg-gray-100 rounded-full text-base cursor-pointer hover:bg-orange-100 transition shrink-0">
                        Dekat Saya
                    </a>

                    @foreach ($moods as $mood)
                    <a href="{{ route('places.kategori', $mood->id) }}"
                        class="inline-flex items-center gap-2 px-5 py-2 bg-gray-100 rounded-full text-base cursor-pointer hover:bg-orange-100 transition shrink-0">
                        <span class="material-symbols-outlined">{{ $mood->icon }}</span>
                        {{ $mood->nama }}
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- Hero banner --}}
            <div id="defaultContent">
                <div class="relative rounded-xl overflow-hidden mb-8">
                    <img src="{{ asset('assets/img/180 Cafe - Bandung 1.png') }}" class="w-full h-64 object-cover" alt="Hero">
                    <div class="absolute bottom-0 left-0 right-0 bg-linear-to-t from-gray-900 to-transparent p-6 text-white">
                        <span class="bg-[#FBB45E] text-[#363B58] text-xs font-bold px-3 py-1 rounded-full inline-block mb-2">
                            MOOD TERSIMPAN: PRODUKTIF
                        </span>
                        <h2 class="text-2xl font-bold">Senang melihat anda kembali!</h2>
                        <p class="text-gray-200 text-sm">Temukan tempat terbaik untuk nongkrong hari ini.</p>
                    </div>
                </div>

                <div class="flex flex-col gap-5">

                    {{-- ===== SECTION 1: Terpopuler ===== --}}
                    <div>
                        <div class="mb-6">
                            <h1 class="text-2xl font-bold text-[#363B58]">Spot Hangout <span class="text-yellow-400">Terpopuler di Bandung</span></h1>
                            <p class="text-gray-500 text-sm">Temukan tempat hangout yang sedang ramai dan paling banyak dikunjungi di Bandung.</p>
                        </div>

                        <div class="main-cards relative overflow-hidden">
                            <button class="scrollLeft absolute left-2 top-1/2 -translate-y-1/2 w-10 h-10 flex items-center justify-center z-20 bg-[#FBB45E] text-[#363B58] rounded-full shadow-md hover:scale-110 transition">
                                <span class="material-symbols-outlined">chevron_left</span>
                            </button>
                            <div class="scrollContainer flex overflow-x-auto no-scrollbar gap-4 px-0 scroll-smooth">

                                @foreach ($popularPlaces as $place)
                                <div class="place-card bg-white rounded-xl shadow-md w-[250px] shrink-0 border border-gray-100 p-4 hover:shadow-lg transition"
                                    data-nama="{{ strtolower($place->nama_tempat) }}"
                                    data-kategori="{{ strtolower($place->kategori->nama ?? '') }}"
                                    data-gambar="{{ $place->gambar ? asset('storage/' . $place->gambar) : asset('assets/img/180 Cafe - Bandung 1.png') }}"
                                    data-rating="{{ $place->rating ?? '0' }}"
                                    data-review="{{ $place->total_review ?? '0' }}"
                                    data-alamat="{{ $place->alamat_lengkap ?? 'Bandung' }}"
                                    data-hargamin="{{ $place->harga_min ?? 0 }}"
                                    data-hargamax="{{ $place->harga_max ?? 0 }}"
                                    data-link="{{ route('places.show', $place->id) }}">
                                    <div style="position: relative; margin-bottom: 12px;">
                                        <img src="{{ $place->gambar ? asset('storage/' . $place->gambar) : asset('assets/img/180 Cafe - Bandung 1.png') }}"
                                            alt="{{ $place->nama_tempat }}"
                                            style="width: 100%; height: 160px; object-fit: cover; border-radius: 12px;">
                                        <button
                                            data-id="{{ $place->id }}"
                                            onclick="toggleWishlist(this)"
                                            class="wishlist-btn absolute top-2 right-2 rounded-full w-8 h-8 flex items-center justify-center shadow-md cursor-pointer transition-all duration-200"
                                            style="background: {{ in_array($place->id, $wishlistIds) ? '#FBB45E' : '#FFF8EF' }}; color: {{ in_array($place->id, $wishlistIds) ? '#363B58' : '#FBB45E' }}; font-variation-settings: 'FILL' 1;">
                                            
                                            <span class="material-symbols-outlined">bookmark</span>
                                        </button>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-[#FBB45E] font-bold text-xs uppercase">{{ $place->kategori->nama ?? 'KATEGORI' }}</span>
                                        <div class="flex items-center gap-1 text-sm">
                                            <span class="material-symbols-outlined text-yellow-400 text-sm" style="font-variation-settings: 'FILL' 1;">kid_star</span>
                                            <span>{{ $place->rating ?? '4.5' }} ({{ $place->total_review ?? '20' }})</span>
                                        </div>
                                    </div>
                                    <h4 class="font-bold text-base mt-1 line-clamp-1">{{ $place->nama_tempat }}</h4>
                                    <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                        <span class="material-symbols-outlined text-sm">location_on</span>
                                        <span class="line-clamp-1">{{ $place->alamat_lengkap ?? 'Bandung' }}</span>
                                    </div>
                                    <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                        <span class="material-symbols-outlined text-sm">payments</span>
                                        <span>Rp{{ number_format($place->harga_min, 0, ',', '.') }} - Rp{{ number_format($place->harga_max, 0, ',', '.') }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 mt-4">
                                        <a href="{{ route('places.show', $place->id) }}"
                                            class="flex-1 bg-gray-800 text-[#FBB45E] py-2 rounded-full text-sm font-medium flex items-center justify-center gap-1 hover:bg-gray-700 transition">
                                            <span class="material-symbols-outlined text-sm">location_on</span> Lihat Lokasi
                                        </a>
                                        <button class="share-btn bg-[#FBB45E] hover:bg-[#E2A255] text-[#363B58] w-10 h-10 flex items-center justify-center rounded-full transition">
                                            <span class="material-symbols-outlined text-sm">share</span>
                                        </button>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            <button class="scrollRight absolute right-2 top-1/2 -translate-y-1/2 w-10 h-10 flex items-center justify-center z-20 bg-[#FBB45E] text-[#363B58] rounded-full shadow-md hover:scale-110 transition">
                                <span class="material-symbols-outlined">chevron_right</span>
                            </button>
                        </div>
                    </div>

                    {{-- ===== SECTION 2: Rekomendasi ===== --}}
                    <div id="rekomendasi">
                        <div class="mb-6">
                            <h1 class="text-2xl font-bold text-[#363B58]">Rekomendasi <span class="text-yellow-400">Untuk Anda</span></h1>
                            <p class="text-gray-500 text-sm">Pilihan tempat yang mungkin cocok dengan selera kamu.</p>
                        </div>

                        <div class="main-cards relative overflow-hidden">
                            <button class="scrollLeft absolute left-2 top-1/2 -translate-y-1/2 w-10 h-10 flex items-center justify-center z-20 bg-[#FBB45E] text-[#363B58] rounded-full shadow-md hover:scale-110 transition">
                                <span class="material-symbols-outlined">chevron_left</span>
                            </button>
                            <div class="scrollContainer flex overflow-x-auto no-scrollbar gap-4 px-0 scroll-smooth">

                                @foreach ($recommendedPlaces as $place)
                                <div class="place-card bg-white rounded-xl shadow-md w-[250px] shrink-0 border border-gray-100 p-4 hover:shadow-lg transition"
                                    data-nama="{{ strtolower($place->nama) }}"
                                    data-kategori="{{ strtolower($place->kategori->nama ?? '') }}"
                                    data-gambar="{{ asset('storage/' . $place->gambar) }}"
                                    data-rating="{{ $place->rating ?? '0' }}"
                                    data-review="0"
                                    data-alamat="{{ $place->alamat ?? 'Bandung' }}"
                                    data-hargamin="{{ $place->harga_min ?? 0 }}"
                                    data-hargamax="{{ $place->harga_max ?? 0 }}"
                                    data-link="{{ route('places.show', $place->id) }}">
                                    <div style="position: relative; margin-bottom: 12px;">
                                        <img src="{{ asset('storage/' . $place->gambar) }}" style="width: 100%; height: 160px; object-fit: cover; border-radius: 12px;" alt="{{ $place->nama }}">
                                        <button
                                            data-id="{{ $place->id }}"
                                            onclick="toggleWishlist(this)"
                                            class="wishlist-btn absolute top-2 right-2 rounded-full w-8 h-8 flex items-center justify-center shadow-md cursor-pointer transition-all duration-200"
                                            style="background: {{ in_array($place->id, $wishlistIds) ? '#FBB45E' : '#FFF8EF' }}; color: {{ in_array($place->id, $wishlistIds) ? '#363B58' : '#FBB45E' }}; font-variation-settings: 'FILL' 1;">
                                            
                                            <span class="material-symbols-outlined">bookmark</span>
                                        </button>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-[#FBB45E] font-bold text-xs">{{ strtoupper($place->kategori->nama ?? 'KATEGORI') }}</span>
                                        <div class="flex items-center gap-1 text-sm">
                                            <span class="material-symbols-outlined text-yellow-400 text-sm" style="font-variation-settings: 'FILL' 1;">kid_star</span>
                                            <span>{{ number_format($place->rating, 1) }}</span>
                                        </div>
                                    </div>
                                    <h4 class="font-bold text-lg mt-1">{{ $place->nama }}</h4>
                                    <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                        <span class="material-symbols-outlined text-sm">location_on</span>
                                        <span>{{ $place->alamat }}</span>
                                    </div>
                                    <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                        <span class="material-symbols-outlined text-sm">payments</span>
                                        <span>Rp{{ number_format($place->harga_min) }} - Rp{{ number_format($place->harga_max) }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 mt-4">
                                        <a href="{{ route('places.show', $place->id) }}"
                                            class="flex-1 bg-gray-800 text-[#FBB45E] py-2 rounded-full text-sm font-medium flex items-center justify-center gap-1 hover:bg-gray-700 transition">
                                            <span class="material-symbols-outlined text-sm">location_on</span> Lihat Lokasi
                                        </a>
                                        <button class="share-btn bg-[#FBB45E] hover:bg-[#E2A255] text-[#363B58] w-10 h-10 flex items-center justify-center rounded-full transition">
                                            <span class="material-symbols-outlined text-sm">share</span>
                                        </button>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            <button class="scrollRight absolute right-2 top-1/2 -translate-y-1/2 w-10 h-10 flex items-center justify-center z-20 bg-[#FBB45E] text-[#363B58] rounded-full shadow-md hover:scale-110 transition">
                                <span class="material-symbols-outlined">chevron_right</span>
                            </button>
                        </div>
                    </div>

                    {{-- Hidden cards untuk search --}}
                    <div class="hidden">
                        @foreach ($allPlaces as $place)
                        <div class="place-card"
                            data-nama="{{ strtolower($place->nama_tempat) }}"
                            data-kategori="{{ strtolower($place->kategori->nama ?? '') }}"
                            data-gambar="{{ $place->gambar ? asset('storage/' . $place->gambar) : asset('assets/img/180 Cafe - Bandung 1.png') }}"
                            data-rating="{{ $place->rating ?? '0' }}"
                            data-review="{{ $place->total_review ?? '0' }}"
                            data-alamat="{{ $place->alamat_lengkap ?? 'Bandung' }}"
                            data-hargamin="{{ $place->harga_min ?? 0 }}"
                            data-hargamax="{{ $place->harga_max ?? 0 }}"
                            data-link="{{ route('places.show', $place->id) }}">
                        </div>
                        @endforeach
                    </div>

                </div>

            </div>
            <div id="searchResult" class="hidden">
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-[#363B58]">Hasil <span class="text-yellow-400">Pencarian</span></h1>
                    <p class="text-gray-500 text-sm" id="searchCount"></p>
                </div>
                <div id="searchCards" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4"></div>
            </div>
        </div>
    </div>


</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        // Toggle sidebar desktop
        const sidebar = document.getElementById('desktopSidebar');
        document.getElementById('desktopFilterToggle')?.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
        });

        // Scroll carousel
        document.querySelectorAll('.main-cards').forEach(section => {
            const container = section.querySelector('.scrollContainer');
            section.querySelector('.scrollLeft')?.addEventListener('click', () => {
                container.scrollBy({
                    left: -280,
                    behavior: 'smooth'
                });
            });
            section.querySelector('.scrollRight')?.addEventListener('click', () => {
                container.scrollBy({
                    left: 280,
                    behavior: 'smooth'
                });
            });
        });

        // Reset filters
        document.getElementById('resetFilters')?.addEventListener('click', () => {
            document.querySelectorAll('input[type=checkbox]').forEach(cb => cb.checked = false);
            document.querySelectorAll('input[name=rating]').forEach(r => r.checked = false);
        });

        // Search
        const searchInputs = document.querySelectorAll('input[placeholder="Telusuri"]');
        searchInputs.forEach(input => {
            input.addEventListener('keydown', function(e) {
                if (e.key !== 'Enter') return;

                const keyword = this.value.toLowerCase().trim();
                const defaultContent = document.getElementById('defaultContent');
                const searchResult = document.getElementById('searchResult');
                const searchCards = document.getElementById('searchCards');
                const searchCount = document.getElementById('searchCount');

                // Sync semua input search
                searchInputs.forEach(i => {
                    if (i !== this) i.value = this.value;
                });

                if (keyword === '') {
                    defaultContent.classList.remove('hidden');
                    searchResult.classList.add('hidden');
                    return;
                }

                defaultContent.classList.add('hidden');
                searchResult.classList.remove('hidden');
                searchCards.innerHTML = '';

                const allCards = document.querySelectorAll('.place-card');
                let found = 0;

                allCards.forEach(card => {
                    const nama = card.dataset.nama ?? '';
                    const kategori = card.dataset.kategori ?? '';

                    if (nama.includes(keyword) || kategori.includes(keyword)) {
                        found++;
                        const hargaMin = parseInt(card.dataset.hargamin).toLocaleString('id-ID');
                        const hargaMax = parseInt(card.dataset.hargamax).toLocaleString('id-ID');

                        searchCards.innerHTML += `
                    <div class="bg-white rounded-xl shadow-md border border-gray-100 p-4 hover:shadow-lg transition">
                        <div class="relative mb-3">
                            <img src="${card.dataset.gambar}" class="w-full h-40 object-cover rounded-xl" alt="${card.dataset.nama}">
                            <button
                                data-id="{{ $place->id }}"
                                onclick="toggleWishlist(this)"
                                class="wishlist-btn absolute top-2 right-2 rounded-full w-8 h-8 flex items-center justify-center shadow-md cursor-pointer transition-all duration-200"
                                style="background: {{ in_array($place->id, $wishlistIds) ? '#FBB45E' : '#FFF8EF' }}; color: {{ in_array($place->id, $wishlistIds) ? '#363B58' : '#FBB45E' }}; font-variation-settings: 'FILL' 1;">
                                
                                <span class="material-symbols-outlined">bookmark</span>
                            </button>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-[#FBB45E] font-bold text-xs uppercase">${card.dataset.kategori}</span>
                            <div class="flex items-center gap-1 text-sm">
                                <span class="material-symbols-outlined text-yellow-400 text-sm" style="font-variation-settings: 'FILL' 1;">kid_star</span>
                                <span>${parseFloat(card.dataset.rating).toFixed(1)} (${card.dataset.review})</span>
                            </div>
                        </div>
                        <h4 class="font-bold text-base mt-1 capitalize">${card.dataset.nama}</h4>
                        <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                            <span class="material-symbols-outlined text-sm">location_on</span>
                            <span>${card.dataset.alamat}</span>
                        </div>
                        <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                            <span class="material-symbols-outlined text-sm">payments</span>
                            <span>Rp${hargaMin} - Rp${hargaMax}</span>
                        </div>
                        <div class="flex items-center gap-2 mt-4">
                            <a href="${card.dataset.link}"
                                class="flex-1 bg-gray-800 text-[#FBB45E] py-2 rounded-full text-sm font-medium flex items-center justify-center gap-1 hover:bg-gray-700 transition">
                                <span class="material-symbols-outlined text-sm">location_on</span> Lihat Lokasi
                            </a>
                            <button class="share-btn bg-[#FBB45E] hover:bg-[#E2A255] text-[#363B58] w-10 h-10 flex items-center justify-center rounded-full transition">
                                <span class="material-symbols-outlined text-sm">share</span>
                            </button>
                        </div>
                    </div>
                `;
                    }
                });

                searchCount.textContent = found > 0 ?
                    `${found} tempat ditemukan untuk "${this.value}"` :
                    `Tidak ada tempat ditemukan untuk "${this.value}"`;

                if (found === 0) {
                    searchCards.innerHTML = `
                <div class="col-span-3 text-center py-12 text-gray-400">
                    <span class="material-symbols-outlined text-5xl mb-2 block">search_off</span>
                    <p>Tidak ada tempat yang cocok.</p>
                </div>
            `;
                }
            });
        });

        // Di dalam DOMContentLoaded di home
        const urlParams = new URLSearchParams(window.location.search);
        const searchQuery = urlParams.get('search');
        if (searchQuery) {
            const input = document.querySelector('input[placeholder="Telusuri"]');
            if (input) {
                input.value = searchQuery;
                input.dispatchEvent(new KeyboardEvent('keydown', {
                    key: 'Enter',
                    bubbles: true
                }));
            }
        }
    });
</script>

@endsection