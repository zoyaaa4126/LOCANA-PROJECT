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
                            'mall' => 'local_mall',
                            'park' => 'park',
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
                    @php
                    $moodIcons = [
                    'Chill' => 'coffee',
                    'Romantis' => 'dine_heart',
                    'Fancy' => 'local_bar',
                    'Keluarga' => 'attractions',
                    'Petualangan' => 'hiking',
                    'Produktif' => 'laptop_windows',
                    ];
                    @endphp
                    @foreach ($moods as $mood)
                    <label class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 cursor-pointer
                              has-checked:bg-orange-50 has-checked:text-[#FBB45E]">
                        <input type="checkbox" name="mood[]" value="{{ $mood->id }}"
                            class="sr-only"
                            {{ in_array($mood->id, request('mood', [])) ? 'checked' : '' }}>
                        <span class="material-symbols-outlined">
                            {{ $moodIcons[$mood->nama] ?? 'mood' }}
                        </span>
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
                                    data-gambar="{{ $place->gambar_tempat ? asset($place->gambar_tempat) : asset('assets/img/180 Cafe - Bandung 1.png') }}"
                                    data-rating="{{ $place->reviews->avg('rating') ?? 0 }}"
                                    data-review="{{ $place->reviews->count() ?? 0 }}"
                                    data-alamat="{{ $place->alamat_lengkap ?? 'Bandung' }}"
                                    data-hargamin="{{ $place->harga_min ?? 0 }}"
                                    data-hargamax="{{ $place->harga_max ?? 0 }}"
                                    data-link="{{ route('places.show', $place->id) }}">
                                    <div class="relative mb-3">
                                        <img src="{{ $place->gambar_tempat ? asset($place->gambar_tempat) : asset('assets/img/180 Cafe - Bandung 1.png') }}"
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
                                        <button onclick="bukaShareModal()" class="share-btn bg-[#FBB45E] hover:bg-[#E2A255] text-[#363B58] w-10 h-10 flex items-center justify-center rounded-full transition">
                                            <span class="material-symbols-outlined text-sm">share</span>
                                        </button>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="shareModal hidden fixed inset-0 z-50 bg-black/50 flex items-center justify-center">
                                <div class="bg-white rounded-2xl p-6 w-[90%] max-w-md">
                                    <h5 class="font-bold text-[#363B58] text-lg mb-4">Berbagi dengan...</h5>
                                    <div class="grid grid-cols-3 gap-4 text-center">
                                        
                                        <a id="shareWa" href="#" target="_blank" class="flex flex-col items-center gap-1 text-sm text-[#363B58] hover:text-green-500">
                                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#25D366">
                                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                                                    <path d="M12 0C5.373 0 0 5.373 0 12c0 2.136.564 4.14 1.544 5.877L.057 23.447a.75.75 0 0 0 .922.922l5.57-1.487A11.945 11.945 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-1.907 0-3.7-.513-5.243-1.406l-.374-.22-3.868 1.034 1.034-3.868-.22-.374A9.955 9.955 0 0 1 2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/>
                                                </svg>
                                            </div>
                                            WhatsApp
                                        </a>

                                        <button onclick="copyLink()" class="flex flex-col items-center gap-1 text-sm text-[#363B58] hover:text-[#FBB45E]">
                                            <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FBB45E">
                                                    <path d="M440-280H280q-83 0-141.5-58.5T80-480q0-83 58.5-141.5T280-680h160v80H280q-50 0-85 35t-35 85q0 50 35 85t85 35h160v80ZM320-440v-80h320v80H320Zm200 160v-80h160q50 0 85-35t35-85q0-50-35-85t-85-35H520v-80h160q83 0 141.5 58.5T880-480q0 83-58.5 141.5T680-280H520Z"/>
                                                </svg>
                                            </div>
                                            Salin Link
                                        </button>

                                        <a id="shareX" href="#" target="_blank" class="flex flex-col items-center gap-1 text-sm text-[#363B58] hover:text-black">
                                            <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="#000000">
                                                    <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                                </svg>
                                            </div>
                                            X
                                        </a>

                                        <a id="shareFb" href="#" target="_blank" class="flex flex-col items-center gap-1 text-sm text-[#363B58] hover:text-black">
                                            <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center">
                                                <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#1877F2">
                                                    <path d="M9.101 23.691v-7.98H6.627v-3.667h2.474v-1.58c0-4.085 1.848-5.978 5.858-5.978.401 0 .955.042 1.468.103a8.68 8.68 0 0 1 1.141.195v3.325a8.623 8.623 0 0 0-.653-.036 26.805 26.805 0 0 0-.733-.009c-.707 0-1.259.096-1.675.309a1.686 1.686 0 0 0-.679.622c-.258.42-.374.995-.374 1.752v1.297h3.919l-.386 2.103-.287 1.564h-3.246v8.245C19.396 23.238 24 18.179 24 12.044c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.628 3.874 10.35 9.101 11.647Z"/>
                                                </svg>
                                            </div>
                                            Facebook
                                        </a>

                                    </div>

                                    <button onclick="tutupShareModal()" class="mt-5 w-full py-2 rounded-xl border border-gray-200 text-sm font-semibold text-[#363B58] hover:bg-gray-50">
                                        Batal
                                    </button>
                                </div>
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
                                    data-gambar="{{ $place->gambar_tempat ? asset($place->gambar_tempat) : asset('assets/img/180 Cafe - Bandung 1.png') }}"
                                    data-rating="{{ $place->reviews->avg('rating') ?? 0 }}"
                                    data-review="{{ $place->reviews->count() ?? 0 }}"
                                    data-alamat="{{ $place->alamat_lengkap ?? 'Bandung' }}"
                                    data-hargamin="{{ $place->harga_min ?? 0 }}"
                                    data-hargamax="{{ $place->harga_max ?? 0 }}"
                                    data-link="{{ route('places.show', $place->id) }}">
                                    <div class="relative mb-3">
                                        <img src="{{ $place->gambar_tempat ? asset($place->gambar_tempat) : asset('assets/img/180 Cafe - Bandung 1.png') }}"
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
                                        <button onclick="bukaShareModal()" class="share-btn bg-[#FBB45E] hover:bg-[#E2A255] text-[#363B58] w-10 h-10 flex items-center justify-center rounded-full transition">
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
                    data-gambar="{{ $place->gambar_tempat ? asset($place->gambar_tempat) : asset('assets/img/180 Cafe - Bandung 1.png') }}"
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
            // ambil value
            const checkedKategori = [...document.querySelectorAll('input[name="kategori[]"]:checked')].map(el => el.value);
            const checkedMood = [...document.querySelectorAll('input[name="mood[]"]:checked')].map(el => el.value);
            const checkedBudget = [...document.querySelectorAll('input[name="budget[]"]:checked')].map(el => el.value);
            const rating = document.querySelector('input[name="rating"]:checked')?.value;

            const defaultContent = document.getElementById('defaultContent');
            const searchResult = document.getElementById('searchResult');
            const searchCards = document.getElementById('searchCards');
            const searchCount = document.getElementById('searchCount');

            // kembali ke default
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
                // pakai link atau nama buat identifier unik sementara
                const identifier = card.dataset.link || card.dataset.nama;
                if (identifier && !seenIds.has(identifier)) {
                    seenIds.has(identifier);
                    seenIds.add(identifier);
                    uniqueCards.push(card);
                }
            });

            // 2. PROSES FILTER DATA
            let filteredCards = uniqueCards.filter(card => {
                const cardKategoriId = card.dataset.kategoriId;
                const hargaMin = parseInt(card.dataset.hargamin) || 0;
                const hargaMax = parseInt(card.dataset.hargamax) || 0;

                // Cek filter Kategori
                if (checkedKategori.length && !checkedKategori.includes(cardKategoriId)) return false;

                // Cek filter Budget 
                if (checkedBudget.length) {
                    const lolosBudget = checkedBudget.some(range => {
                        const [min, max] = range.split('-').map(Number);
                        return (hargaMin <= max && hargaMax >= min);
                    });
                    if (!lolosBudget) return false;
                }

                return true;
            });

            // 3. JALANKAN PROSES SORTING RATING 
            if (rating === 'highest') {
                filteredCards.sort((a, b) => parseFloat(b.dataset.rating || 0) - parseFloat(a.dataset.rating || 0));
            } else if (rating === 'lowest') {
                filteredCards.sort((a, b) => parseFloat(a.dataset.rating || 0) - parseFloat(b.dataset.rating || 0));
            }

            // 4. TAMPILKAN HASIL
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

    function bukaShareModal() {
        const url = window.location.href;
        document.querySelector('.shareModal').classList.remove('hidden');
        document.getElementById('shareWa').href = `https://wa.me/?text=${encodeURIComponent(url)}`;
        document.getElementById('shareX').href = `https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}`;
        document.getElementById('shareFb').href = 'https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}';
    }

    function tutupShareModal() {
        document.querySelector('.shareModal').classList.add('hidden');
    }

    function copyLink() {
        navigator.clipboard.writeText(window.location.href).then(() => {
            alert('Link berhasil disalin!');
        });
    }
</script>
@endsection