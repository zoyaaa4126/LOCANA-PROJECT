@extends('layouts.app')
@section('title', 'Homepage')
@section('content')

<div class="flex flex-col sm:flex-row gap-8">

    {{-- ===== SIDEBAR FILTER (kiri) ===== --}}
    <form method="GET" action="/home" id="filterForm">
        <aside id="desktopSidebar"
            class="w-80 shrink-0 bg-white shadow p-6 sticky border border-gray-200
               max-sm:w-full max-sm:static max-sm:hidden transition-all duration-300 overflow-hidden">

            <div class="flex justify-between items-center mb-4">
                <h2 class="font-bold text-xl">Filters</h2>
                <button type="button"
                    onclick="window.location.href='/home'"
                    class="text-[#FBB45E] text-sm font-semibold hover:underline transition">RESET</button>
            </div>

            {{-- Kategori --}}
            <div class="mb-6">
                <p class="text-gray-400 font-semibold text-sm mb-3 uppercase tracking-wide">KATEGORI</p>
                <div class="space-y-1">
                    @foreach ($kategoris as $kategori)
                    <label class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 cursor-pointer
                              has-checked:bg-orange-50 has-checked:text-[#FBB45E]">
                        <input type="checkbox" name="kategori[]" value="{{ $kategori->id }}"
                            class="sr-only"
                            {{ in_array($kategori->id, request('kategori', [])) ? 'checked' : '' }}>
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
                        <span>{{ $kategori->nama }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            {{-- Moods --}}
            @if(isset($moods) && $moods->count())
            <div class="mb-6">
                <p class="text-gray-400 font-semibold text-sm mb-3 uppercase tracking-wide">MOODS</p>
                <div class="space-y-1">
                    @foreach ($moods as $mood)
                    <label class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 cursor-pointer
                              has-checked:bg-orange-50 has-checked:text-[#FBB45E]">
                        <input type="checkbox" name="mood[]" value="{{ $mood->id }}"
                            class="sr-only"
                            {{ in_array($mood->id, request('mood', [])) ? 'checked' : '' }}>
                        <span class="material-symbols-outlined">mood</span>
                        {{ $mood->nama }}
                    </label>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Budget --}}
            <div class="mb-6">
                <p class="text-gray-400 font-semibold text-sm mb-3 uppercase tracking-wide">BUDGET</p>
                <div class="space-y-2">
                    @foreach ([
                    '0-50000' => '< Rp50.000', '50000-100000'=> 'Rp50.000 – Rp100.000',
                        '100001-150000' => 'Rp100.001 – Rp150.000',
                        '150001-200000' => 'Rp150.001 – Rp200.000',
                        '200001-999999999' => '> Rp200.001',
                        ] as $value => $label)
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="budget[]" value="{{ $value }}"
                                class="rounded text-[#FBB45E]"
                                {{ in_array($value, request('budget', [])) ? 'checked' : '' }}>
                            <span class="text-sm">{{ $label }}</span>
                        </label>
                        @endforeach
                </div>
            </div>

            {{-- Rating --}}
            <div class="mb-6">
                <p class="text-gray-400 font-semibold text-sm mb-3 uppercase tracking-wide">RATING</p>
                <div class="space-y-2">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="rating" value="highest"
                            {{ request('rating') == 'highest' ? 'checked' : '' }}>
                        <span class="text-sm">Rating Tertinggi</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="rating" value="lowest"
                            {{ request('rating') == 'lowest' ? 'checked' : '' }}>
                        <span class="text-sm">Rating Terendah</span>
                    </label>
                </div>
            </div>

            <button type="button" onclick="terapkanFilter()"
                class="mt-3 bg-[#FBB45E] hover:bg-[#E2A255] w-full px-5 py-2 rounded-lg text-md font-bold flex gap-1 justify-center items-center">
                Terapkan Filter
            </button>

        </aside>
    </form>

    {{-- MAIN CONTENT --}}
    <div class="flex-1 my-5 overflow-hidden">
        <div class="sm:px-4 max-sm:px-5">

            {{-- Filter chips --}}
            <div class="w-full overflow-x-auto no-scrollbar">
                <div class="flex gap-4 mb-6 whitespace-nowrap">
                    {{-- chips --}}
                </div>
            </div>

            {{-- Default content (hero + sections) --}}
            <div id="defaultContent">

                {{-- HERO BANNER --}}
                <div class="relative rounded-xl overflow-hidden mb-8">
                    <img src="assets/img/180 Cafe - Bandung 1.png" class="w-full h-64 object-cover" alt="Hero">
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-gray-900 to-transparent p-6 text-white">
                        <span class="bg-[#FBB45E] text-[#363B58] text-xs font-bold px-3 py-1 rounded-full inline-block mb-2">MOOD TERSIMPAN: PRODUKTIF</span>
                        <h2 class="text-2xl font-bold">Senang melihat anda kembali!</h2>
                        <p class="text-gray-200 text-sm">Lagi cari tempat yang tenang untuk fokus?</p>
                    </div>
                </div>

                <div class="flex flex-col gap-5">

                    {{-- SECTION: Terpopuler --}}
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
                                    data-kategori-id="{{ $place->kategori_id }}"
                                    data-gambar="{{ $place->gambar ? asset('storage/' . $place->gambar) : asset('assets/img/180 Cafe - Bandung 1.png') }}"
                                    data-rating="{{ $place->reviews->avg('rating') ?? 0 }}"
                                    data-review="{{ $place->reviews->count() ?? 0 }}"
                                    data-alamat="{{ $place->alamat_lengkap ?? 'Bandung' }}"
                                    data-hargamin="{{ $place->harga_min ?? 0 }}"
                                    data-hargamax="{{ $place->harga_max ?? 0 }}"
                                    data-link="{{ route('places.show', $place->id) }}">
                                    <div class="relative mb-3">
                                        <img src="{{ $place->gambar ? asset('storage/' . $place->gambar) : asset('assets/img/180 Cafe - Bandung 1.png') }}"
                                            class="w-full h-40 object-cover rounded-xl" alt="{{ $place->nama_tempat }}">
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
                                            <span>{{ number_format($place->reviews->avg('rating') ?? 0, 1) }} ({{ $place->reviews->count() }})</span>
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

                    {{-- SECTION: Rekomendasi --}}
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
                                    data-nama="{{ strtolower($place->nama_tempat) }}"
                                    data-kategori="{{ strtolower($place->kategori->nama ?? '') }}"
                                    data-kategori-id="{{ $place->kategori_id }}"
                                    data-gambar="{{ $place->gambar ? asset('storage/' . $place->gambar) : asset('assets/img/180 Cafe - Bandung 1.png') }}"
                                    data-rating="{{ $place->reviews->avg('rating') ?? 0 }}"
                                    data-review="{{ $place->reviews->count() ?? 0 }}"
                                    data-alamat="{{ $place->alamat_lengkap ?? 'Bandung' }}"
                                    data-hargamin="{{ $place->harga_min ?? 0 }}"
                                    data-hargamax="{{ $place->harga_max ?? 0 }}"
                                    data-link="{{ route('places.show', $place->id) }}">
                                    <div class="relative mb-3">
                                        <img src="{{ $place->gambar ? asset('storage/' . $place->gambar) : asset('assets/img/180 Cafe - Bandung 1.png') }}"
                                            class="w-full h-40 object-cover rounded-xl" alt="{{ $place->nama_tempat }}">
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
                                            <span>{{ number_format($place->reviews->avg('rating') ?? 0, 1) }}</span>
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

                </div>
            </div>

            {{-- Hidden cards untuk search/filter --}}
            <div class="hidden">
                @foreach ($allPlaces as $place)
                <div class="place-card"
                    data-nama="{{ strtolower($place->nama_tempat) }}"
                    data-kategori="{{ strtolower($place->kategori->nama ?? '') }}"
                    data-kategori-id="{{ $place->kategori_id }}"
                    data-gambar="{{ $place->gambar ? asset('storage/' . $place->gambar) : asset('assets/img/180 Cafe - Bandung 1.png') }}"
                    data-rating="{{ $place->reviews->avg('rating') ?? 0 }}"
                    data-review="{{ $place->reviews->count() ?? 0 }}"
                    data-alamat="{{ $place->alamat_lengkap ?? 'Bandung' }}"
                    data-hargamin="{{ $place->harga_min ?? 0 }}"
                    data-hargamax="{{ $place->harga_max ?? 0 }}"
                    data-link="{{ route('places.show', $place->id) }}">
                </div>
                @endforeach
            </div>

            {{-- Search/Filter Result --}}
            <div id="searchResult" class="hidden">
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-[#363B58]">Hasil <span class="text-yellow-400">Pencarian</span></h1>
                    <p id="searchCount" class="text-gray-500 text-sm"></p>
                </div>
                <div id="searchCards" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4"></div>
            </div>

        </div>
    </div>

</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        //Kebutuhan Rekomendasi (Pengambilan Lokasi)
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const lat = position.coords.latitude;
                const lng = position.coords.longitude;
                const url = new URL(window.location.href);

                if (!url.searchParams.get('lat')) {
                    url.searchParams.set('lat', lat);
                    url.searchParams.set('lng', lng);
                    window.location.href = url.toString();
                }
            });
        }
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
            window.location.href = '/home';
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

        window.terapkanFilter = function() {
            // 1. Ambil semua value filter
            const checkedKategori = [...document.querySelectorAll('input[name="kategori[]"]:checked')].map(el => el.value);
            const checkedMood = [...document.querySelectorAll('input[name="mood[]"]:checked')].map(el => el.value);
            const checkedBudget = [...document.querySelectorAll('input[name="budget[]"]:checked')].map(el => el.value);
            const rating = document.querySelector('input[name="rating"]:checked')?.value;

            const defaultContent = document.getElementById('defaultContent');
            const searchResult = document.getElementById('searchResult');
            const searchCards = document.getElementById('searchCards');
            const searchCount = document.getElementById('searchCount');

            // Kembalikan ke default jika tidak ada filter/sorting yang dipilih
            if (!checkedKategori.length && !checkedMood.length && !checkedBudget.length && !rating) {
                defaultContent.classList.remove('hidden');
                searchResult.classList.add('hidden');
                return;
            }

            // Ambil semua elemen tempat dan jadikan Array agar bisa di-sort
            let allCards = Array.from(document.querySelectorAll('.place-card'));

            // Hapus duplikat card berdasarkan ID (karena ada data di terpopuler, rekomendasi, dan hidden)
            const uniqueCards = [];
            const seenIds = new Set();
            allCards.forEach(card => {
                // Kita pakai link atau nama sebagai identifier unik sementara
                const identifier = card.dataset.link || card.dataset.nama;
                if (identifier && !seenIds.has(identifier)) {
                    seenIds.has(identifier);
                    seenIds.add(identifier);
                    uniqueCards.push(card);
                }
            });

            // 2. JALANKAN PROSES FILTER DATA
            let filteredCards = uniqueCards.filter(card => {
                const cardKategoriId = card.dataset.kategoriId;
                const hargaMin = parseInt(card.dataset.hargamin) || 0;
                const hargaMax = parseInt(card.dataset.hargamax) || 0;

                // Cek filter Kategori
                if (checkedKategori.length && !checkedKategori.includes(cardKategoriId)) return false;

                // Cek filter Budget (Logika Beririsan)
                if (checkedBudget.length) {
                    const lolosBudget = checkedBudget.some(range => {
                        const [min, max] = range.split('-').map(Number);
                        return (hargaMin <= max && hargaMax >= min);
                    });
                    if (!lolosBudget) return false;
                }

                return true;
            });

            // 3. JALANKAN PROSES SORTING RATING (Ini dia kuncinya!)
            if (rating === 'highest') {
                filteredCards.sort((a, b) => parseFloat(b.dataset.rating || 0) - parseFloat(a.dataset.rating || 0));
            } else if (rating === 'lowest') {
                filteredCards.sort((a, b) => parseFloat(a.dataset.rating || 0) - parseFloat(b.dataset.rating || 0));
            }

            // 4. TAMPILKAN HASILNYA KE LAYAR
            searchCards.innerHTML = '';
            defaultContent.classList.add('hidden');
            searchResult.classList.remove('hidden');
            document.querySelector('#searchResult h1').innerHTML = 'Hasil <span class="text-yellow-400">Filter</span>';

            if (filteredCards.length === 0) {
                searchCount.textContent = `Tidak ada tempat yang cocok dengan filter.`;
                searchCards.innerHTML = `
            <div class="col-span-3 text-center py-12 text-gray-400">
                <span class="material-symbols-outlined text-5xl mb-2 block">filter_alt_off</span>
                <p>Tidak ada tempat yang cocok.</p>
            </div>`;
            } else {
                searchCount.textContent = `${filteredCards.length} tempat ditemukan berdasarkan filter.`;
                filteredCards.forEach(card => {
                    const hargaMinFmt = parseInt(card.dataset.hargamin).toLocaleString('id-ID');
                    const hargaMaxFmt = parseInt(card.dataset.hargamax).toLocaleString('id-ID');

                    searchCards.innerHTML += `
                <div class="bg-white rounded-xl shadow-md border border-gray-100 p-4 hover:shadow-lg transition">
                    <div class="relative mb-3">
                        <img src="${card.dataset.gambar}" class="w-full h-40 object-cover rounded-xl" alt="${card.dataset.nama}">
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-[#FBB45E] font-bold text-xs uppercase">${card.dataset.kategori}</span>
                        <div class="flex items-center gap-1 text-sm">
                            <span class="material-symbols-outlined text-yellow-400 text-sm" style="font-variation-settings: 'FILL' 1;">kid_star</span>
                            <span>${parseFloat(card.dataset.rating).toFixed(1)} (${card.dataset.review || 0})</span>
                        </div>
                    </div>
                    <h4 class="font-bold text-base mt-1 capitalize">${card.dataset.nama}</h4>
                    <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                        <span class="material-symbols-outlined text-sm">location_on</span>
                        <span>${card.dataset.alamat}</span>
                    </div>
                    <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                        <span class="material-symbols-outlined text-sm">payments</span>
                        <span>Rp${hargaMinFmt} - Rp${hargaMaxFmt}</span>
                    </div>
                    <div class="flex items-center gap-2 mt-4">
                        <a href="${card.dataset.link}" class="flex-1 bg-gray-800 text-[#FBB45E] py-2 rounded-full text-sm font-medium flex items-center justify-center gap-1 hover:bg-gray-700 transition">
                            <span class="material-symbols-outlined text-sm">location_on</span> Lihat Lokasi
                        </a>
                    </div>
                </div>`;
                });
            }
        };
    });
</script>
@endsection