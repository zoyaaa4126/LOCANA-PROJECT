@extends('layouts.admin')

@section('title', 'Tambah Lokasi')

@section('content')

<div class="m-5 pb-10">

    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
        <div>
            <p class="text-slate-400 text-sm font-semibold">
                Dashboard / Lokasi / <span class="text-[#FBB45E] font-bold">Tambah Lokasi</span>
            </p>
            <h1 class="text-2xl font-bold text-[#363B58]">Tambah Lokasi</h1>
        </div>
        <div class="flex gap-3">
            <a href="/admin/lokasi"
               class="flex items-center gap-2 bg-white border border-[#E2E8F0] text-[#363B58] font-bold text-sm px-5 py-2.5 rounded-[10px] cursor-pointer hover:bg-[#F1F5F9] transition-colors duration-200">
                <span class="material-symbols-outlined" style="font-size:18px;">arrow_back</span>
                Kembali
            </a>
            <button type="submit" form="form-lokasi"
                    class="flex items-center gap-2 bg-[#FBB45E] text-[#363B58] font-bold text-sm px-5 py-2.5 rounded-[10px] border-none cursor-pointer whitespace-nowrap hover:bg-[#E2A255] active:bg-[#FEE8CD] transition-colors duration-200 shadow-sm">
                <span class="material-symbols-outlined" style="font-size:18px;">save</span>
                Simpan Lokasi
            </button>
        </div>
    </div>

    <form id="form-lokasi" class="grid grid-cols-1 lg:grid-cols-[1fr_380px] gap-5 items-start" action="{{ route('admin.simpanTempat') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="flex flex-col gap-5">

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-[#F1F5F9]">
                <h2 class="flex items-center gap-2 font-bold text-[#363B58] text-lg mb-5">
                    <span class="material-symbols-outlined text-[#FBB45E]" style="font-size:22px; font-variation-settings:'FILL' 1;">info</span>
                    Informasi Dasar
                </h2>

                <div class="flex flex-col gap-1.5 mb-4">
                    <label class="text-sm font-semibold text-[#363B58]">Nama Tempat</label>
                    <input type="text" name="nama" placeholder="Masukkan Nama Tempat Disini"
                           class="border border-[#E2E8F0] rounded-xl px-4 py-3 text-sm outline-none focus:border-[#FBB45E] focus:ring-2 focus:ring-[#FBB45E]/20 transition-all bg-[#FAFAFA] placeholder-gray-300">
                </div>

                <div class="flex flex-col gap-1.5 mb-4">
                    <label class="text-sm font-semibold text-[#363B58]">Deskripsi Tempat</label>
                    <textarea name="deskripsi" rows="5" placeholder="Masukkan Deskripsi Tempat Disini&#10;(maks. 300 kata)"
                              class="border border-[#E2E8F0] rounded-xl px-4 py-3 text-sm outline-none focus:border-[#FBB45E] focus:ring-2 focus:ring-[#FBB45E]/20 transition-all bg-[#FAFAFA] placeholder-gray-300 resize-none"></textarea>
                </div>

                <div class="flex flex-col gap-1.5 mb-4">
                    <label class="text-sm font-semibold text-[#363B58]">Kategori</label>
                    <div class="relative" id="kategori-wrapper">
                        <button type="button" id="kategori-btn" onclick="toggleKategori()" class="w-full flex justify-between items-center border border-[#E2E8F0] rounded-xl px-4 py-3 text-sm bg-[#FAFAFA] text-gray-400 focus:outline-none focus:border-[#FBB45E] transition-all">
                            <span id="kategori-label">Pilih Kategori</span>
                            <span class="material-symbols-outlined text-gray-400 transition-transform duration-200" id="kategori-chevron" style="font-size:20px;">expand_more</span>
                        </button>

                        <div id="kategori-dropdown"
                             class="hidden absolute top-full left-0 right-0 mt-1 bg-white border border-[#E2E8F0] rounded-xl shadow-lg z-50 overflow-hidden">
                            @foreach($kategoriList as $kat)
                            @php
                                $katValue = $kat['value'];
                                $katLabel = $kat['label'];
                                $katIcon  = $kat['icon'];
                            @endphp
                            <button type="button"
                                    onclick="selectKategori('{{ $katValue }}', '{{ $katLabel }}', '{{ $katIcon }}')"
                                    class="w-full flex items-center gap-3 px-4 py-3 text-sm text-[#363B58] font-medium hover:bg-[#FEF4E7] hover:text-[#FBB45E] transition-colors border-b border-[#F1F5F9] last:border-0">
                                <span class="material-symbols-outlined text-gray-400" style="font-size:20px; font-variation-settings:'FILL' 1;">{{ $katIcon }}</span>
                                {{ $katLabel }}
                            </button>
                             @endforeach
                        </div>
                    </div>
                    <input type="hidden" name="kategori_tempat" id="kategori-value">

                    <div class="flex flex-col gap-1.5 mb-1 mt-2">
                        <label class="text-sm font-semibold text-[#363B58]">Mood</label>
                        <div class="grid grid-cols-2 gap-x-8 gap-y-3">
                            @foreach($moods as $m)
                            <label class="flex items-center gap-2.5 cursor-pointer group">
                                <div class="relative">
                                    <input type="checkbox" name="moods[]" value="{{ $m->id }}"
                                        class="peer w-[18px] h-[18px] rounded-md border border-[#DDD] appearance-none cursor-pointer
                                                checked:bg-[#FBB45E] checked:border-transparent transition-all">
                                    <span class="absolute inset-0 flex items-center justify-center text-white pointer-events-none opacity-0 peer-checked:opacity-100">
                                        <svg width="11" height="9" viewBox="0 0 11 9" fill="none"><path d="M1 4L4 7.5L10 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    </span>
                                </div>
                                <span class="text-sm text-[#363B58] font-medium group-hover:text-[#FBB45E] transition-colors">{{ $m->nama }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-1.5 mb-4">
                    <label class="text-sm font-semibold text-[#363B58]">Tipe Tempat</label>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="tipe" value="indoor"
                                   class="w-4 h-4 accent-[#FBB45E] cursor-pointer">
                            <span class="text-sm text-[#363B58] font-medium">Indoor</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="tipe" value="outdoor"
                                   class="w-4 h-4 accent-[#FBB45E] cursor-pointer">
                            <span class="text-sm text-[#363B58] font-medium">Outdoor</span>
                        </label>
                    </div>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-sm font-semibold text-[#363B58]">Alamat Lengkap</label>
                    <input type="text" name="alamat" id="alamat-input" placeholder="Masukkan Alamat Lengkap Disini"
                           class="border border-[#E2E8F0] rounded-xl px-4 py-3 text-sm outline-none focus:border-[#FBB45E] focus:ring-2 focus:ring-[#FBB45E]/20 transition-all bg-[#FAFAFA] placeholder-gray-300">
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-[#F1F5F9]">
                <h2 class="flex items-center gap-2 font-bold text-[#363B58] text-lg mb-5">
                    <span class="material-symbols-outlined text-[#FBB45E]" style="font-size:22px; font-variation-settings:'FILL' 1;">list_alt</span>
                    Harga & Fasilitas
                </h2>

                <div class="flex flex-col gap-2 mb-6">
                    <label class="text-sm font-semibold text-[#363B58]">Fasilitas</label>
                    <div class="grid grid-cols-2 gap-x-8 gap-y-3">
                        @php
                        $fasilitas = ['WiFi', 'Ruang AC', 'Stopkontan', 'Parkir Luas', 'Area Merokok', 'Toilet', 'Photobooth', 'Musholla', 'Ruang Meeting', 'Board Game'];
                        @endphp
                        @foreach($fasilitas as $f)
                        <label class="flex items-center gap-2.5 cursor-pointer group">
                            <div class="relative">
                                <input type="checkbox" name="fasilitas[]" value="{{ strtolower(str_replace(' ', '_', $f)) }}"
                                       class="peer w-[18px] h-[18px] rounded-md border border-[#DDD] appearance-none cursor-pointer
                                              checked:bg-[#FBB45E] checked:border-transparent transition-all">
                                <span class="absolute inset-0 flex items-center justify-center text-white pointer-events-none opacity-0 peer-checked:opacity-100">
                                    <svg width="11" height="9" viewBox="0 0 11 9" fill="none"><path d="M1 4L4 7.5L10 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </span>
                            </div>
                            <span class="text-sm text-[#363B58] font-medium group-hover:text-[#FBB45E] transition-colors">{{ $f }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <label class="text-sm font-semibold text-[#363B58]">Kisaran Harga</label>

                    <div id="harga-preview" class="hidden items-center gap-2 text-sm font-semibold text-[#363B58] bg-[#FEF4E7] border border-[#FBB45E]/30 rounded-xl px-4 py-2.5">
                        <span class="material-symbols-outlined text-[#FBB45E]" style="font-size:18px; font-variation-settings:'FILL' 1;">payments</span>
                        <span id="harga-preview-text">Rp 50.000 – Rp 150.000</span>
                    </div>

                    <button type="button" id="harga-toggle-btn"
                            onclick="toggleHarga()"
                            class="w-full flex justify-between items-center border border-[#E2E8F0] rounded-xl px-4 py-3 text-sm bg-[#FAFAFA] text-[#363B58] font-medium hover:border-[#FBB45E] transition-all">
                        <span class="flex items-center gap-2">
                            <span class="text-gray-400">Rp</span>
                            <span id="harga-toggle-label" class="text-gray-400">Klik untuk mengatur kisaran harga</span>
                        </span>
                        <span class="material-symbols-outlined text-gray-400 transition-transform duration-200" id="harga-chevron" style="font-size:20px;">expand_more</span>
                    </button>

                    <div id="harga-panel" class="hidden flex-col gap-3 mt-1 p-4 border border-[#E2E8F0] rounded-xl bg-[#FAFAFA]">
                        <div class="grid grid-cols-2 gap-3">
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-semibold text-gray-400 tracking-wide">Harga Terendah</label>
                                <div class="flex items-center border border-[#E2E8F0] rounded-xl overflow-hidden bg-white focus-within:border-[#FBB45E] transition-all">
                                    <span class="px-3 py-3 text-sm text-gray-400 bg-[#F1F5F9] border-r border-[#E2E8F0] font-medium">Rp</span>
                                    <input type="number" id="harga-min" name="harga_min"
                                           placeholder="0" min="0"
                                           oninput="updateHargaPreview()"
                                           class="flex-1 px-3 py-3 text-sm outline-none bg-transparent">
                                </div>
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-semibold text-gray-400 tracking-wide">Harga Tertinggi</label>
                                <div class="flex items-center border border-[#E2E8F0] rounded-xl overflow-hidden bg-white focus-within:border-[#FBB45E] transition-all">
                                    <span class="px-3 py-3 text-sm text-gray-400 bg-[#F1F5F9] border-r border-[#E2E8F0] font-medium">Rp</span>
                                    <input type="number" id="harga-max" name="harga_max"
                                           placeholder="0" min="0"
                                           oninput="updateHargaPreview()"
                                           class="flex-1 px-3 py-3 text-sm outline-none bg-transparent">
                                </div>
                            </div>
                        </div>
                        <button type="button" onclick="applyHarga()"
                                class="self-end flex items-center gap-1.5 bg-[#FBB45E] hover:bg-[#E2A255] text-[#363B58] font-bold text-xs px-4 py-2 rounded-lg transition-colors">
                            <span class="material-symbols-outlined" style="font-size:15px;">check</span>
                            Terapkan
                        </button>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-[#F1F5F9]">
                <h2 class="flex items-center gap-2 font-bold text-[#363B58] text-lg mb-5">
                    <span class="material-symbols-outlined text-[#FBB45E]" style="font-size:22px; font-variation-settings:'FILL' 1;">schedule</span>
                    Jam Operasional
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @php
                    $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                    @endphp
                    @foreach($days as $day)
                    @php $key = strtolower($day); @endphp
                    <div class="flex items-center gap-3">
                        <label class="flex items-center gap-2 cursor-pointer w-20 flex-shrink-0">
                            <input type="checkbox" name="hari[]" value="{{ $key }}"
                                   id="hari-{{ $key }}"
                                   onchange="toggleDay('{{ $key }}')"
                                   class="peer w-[18px] h-[18px] rounded-md border border-[#DDD] appearance-none cursor-pointer checked:bg-[#FBB45E] checked:border-transparent disabled:opacity-50 disabled:cursor-not-allowed transition-all">
                            <span class="text-sm font-semibold text-[#363B58]">{{ $day }}</span>
                        </label>
                        <div class="flex items-center gap-1.5 flex-1 min-w-0">
                            <input type="time" id="buka-{{ $key }}" name="jam_buka_{{ $key }}"
                                   class="flex-1 min-w-0 border border-[#E2E8F0] rounded-lg px-2 py-1.5 text-xs outline-none focus:border-[#FBB45E] bg-[#FAFAFA] disabled:bg-[#F1F5F9] disabled:text-gray-300 disabled:cursor-not-allowed transition-all"
                                   disabled>
                            <span class="text-gray-300 text-xs flex-shrink-0">–</span>
                            <input type="time" id="tutup-{{ $key }}" name="jam_tutup_{{ $key }}"
                                   class="flex-1 min-w-0 border border-[#E2E8F0] rounded-lg px-2 py-1.5 text-xs outline-none focus:border-[#FBB45E] bg-[#FAFAFA] disabled:bg-[#F1F5F9] disabled:text-gray-300 disabled:cursor-not-allowed transition-all"
                                   disabled>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="mt-4 pt-4 border-t border-[#F1F5F9]">
                    <button type="button" id="btn-247" onclick="toggle247()"
                            class="w-full flex items-center gap-3 px-4 py-3 rounded-xl border border-[#E2E8F0] bg-[#FAFAFA] hover:border-[#FBB45E] hover:bg-[#FEF4E7] transition-all">
                        <div id="dot-247"
                             class="w-[18px] h-[18px] rounded-md border border-[#DDD] bg-white flex items-center justify-center flex-shrink-0 transition-all">
                            <svg id="check-247" class="hidden" width="10" height="8" viewBox="0 0 10 8" fill="none">
                                <path d="M1 4L3.5 6.5L9 1" stroke="#363B58" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="flex flex-col items-start">
                            <span id="label-247" class="text-sm font-bold text-[#363B58] transition-colors">Buka 24/7</span>
                            <span class="text-xs text-gray-400">Semua hari, sepanjang waktu</span>
                        </div>
                        <span class="material-symbols-outlined text-[#FBB45E] ml-auto hidden" id="icon-247" style="font-size:20px; font-variation-settings:'FILL' 1;">clock_loader_40</span>
                    </button>
                </div>
            </div>

        </div>

        <div class="flex flex-col gap-5">

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-[#F1F5F9]">
                <h2 class="flex items-center gap-2 font-bold text-[#363B58] text-lg mb-4">
                    <span class="material-symbols-outlined text-[#FBB45E]" style="font-size:22px; font-variation-settings:'FILL' 1;">map</span>
                    Geodata
                </h2>

                <div id="map-container" class="w-full h-[220px] rounded-xl overflow-hidden border border-[#E2E8F0] mb-4 relative bg-[#E8F4F8]">
                    <iframe id="map-iframe" src="https://www.openstreetmap.org/export/embed.html?bbox=107.55,6.85,107.70,6.95&layer=mapnik&marker=6.9175,107.6191" class="w-full h-full border-0" loading="lazy" title="Peta Lokasi">
                    </iframe>
                    <div id="map-click-hint"
                         class="absolute bottom-2 left-1/2 -translate-x-1/2 bg-[#363B58]/80 text-white text-xs font-medium px-3 py-1.5 rounded-full pointer-events-none backdrop-blur-sm">
                        Isi alamat untuk memperbarui peta
                    </div>
                </div>
                <div class="flex gap-2 mb-4">
                    <input type="text" id="search-alamat" placeholder="Cari alamat di peta..." class="flex-1 border border-[#E2E8F0] rounded-xl px-3 py-2.5 text-sm outline-none focus:border-[#FBB45E] focus:ring-2 focus:ring-[#FBB45E]/20 transition-all bg-[#FAFAFA] placeholder-gray-300">
                    <button type="button" onclick="cariLokasi()" class="flex items-center gap-1 bg-[#363B58] hover:bg-[#FBB45E] text-white hover:text-[#363B58] font-bold text-xs px-4 py-2.5 rounded-xl transition-colors flex-shrink-0">
                        <span class="material-symbols-outlined" style="font-size:16px;">search</span>
                        Cari
                    </button>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-bold text-gray-400 tracking-wide">Latitude</label>
                        <input type="text" id="latitude" name="latitude" placeholder="Latitude" readonly class="border border-[#E2E8F0] rounded-xl px-3 py-2.5 text-sm outline-none bg-[#F8FAFC] text-[#363B58] font-medium cursor-not-allowed">
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-bold text-gray-400 tracking-wide">Longitude</label>
                        <input type="text" id="longitude" name="longitude" placeholder="Longitude" readonly class="border border-[#E2E8F0] rounded-xl px-3 py-2.5 text-sm outline-none bg-[#F8FAFC] text-[#363B58] font-medium cursor-not-allowed">
                    </div>
                </div>

                <div class="mt-3 p-3 bg-[#FEF4E7] rounded-xl border border-[#FBB45E]/20">
                    <p class="text-xs text-[#363B58] font-medium flex items-start gap-1.5">
                        <span class="material-symbols-outlined text-[#FBB45E] flex-shrink-0" style="font-size:15px; font-variation-settings:'FILL' 1;">lightbulb</span>
                        Ketik alamat di kolom pencarian lalu klik <b class="flex"><span class="material-symbols-outlined">search</span>Cari</b>.
                    </p>
                    <p class="text-xs text-[#363B58] font-medium flex items-start gap-1.5">
                        Latitude & Longitude akan terisi otomatis via Nominatim (OpenStreetMap).
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-[#F1F5F9]">
                <h2 class="flex items-center gap-2 font-bold text-[#363B58] text-lg mb-5">
                    <span class="material-symbols-outlined text-[#FBB45E]" style="font-size:22px; font-variation-settings:'FILL' 1;">photo_library</span>
                    Media & Visual
                </h2>

                <div class="flex flex-col gap-1.5 mb-5">
                    <label class="text-sm font-semibold text-[#363B58]">Foto Cover</label>
                    <div class="border-2 border-dashed border-[#E2E8F0] rounded-xl p-6 flex flex-col items-center justify-center gap-2 hover:border-[#FBB45E] hover:bg-[#FEF4E7]/30 transition-all cursor-pointer group"
                         onclick="document.getElementById('cover-input').click()">
                        <span class="material-symbols-outlined text-gray-300 group-hover:text-[#FBB45E] transition-colors" style="font-size:40px; font-variation-settings:'FILL' 1;">add_a_photo</span>
                        <p class="text-xs text-center text-gray-400 font-medium">Upload Foto<br><span class="text-gray-300">(maks. 5MB) Format: PNG, JPG</span></p>
                        <div id="cover-preview" class="hidden w-full mt-2">
                            <img id="cover-img" class="w-full h-32 object-cover rounded-lg" src="" alt="Preview">
                        </div>
                    </div>
                    <button type="button" onclick="document.getElementById('cover-input').click()"
                            class="flex items-center justify-center gap-1.5 border border-[#E2E8F0] rounded-xl py-2 text-xs font-semibold text-gray-500 hover:border-[#FBB45E] hover:text-[#FBB45E] transition-all">
                        <span class="material-symbols-outlined" style="font-size:16px;">upload</span> Unggah File
                    </button>
                    <input type="file" id="cover-input" name="foto_cover" accept="image/*" class="hidden" onchange="previewCover(this)">
                </div>

                <div class="flex flex-col gap-1.5 mb-5">
                    <label class="text-sm font-semibold text-[#363B58]">Galeri</label>
                    <div class="border-2 border-dashed border-[#E2E8F0] rounded-xl p-5 text-center hover:border-[#FBB45E] hover:bg-[#FEF4E7]/30 transition-all cursor-pointer"
                         onclick="document.getElementById('galeri-input').click()">
                        <p class="text-xs text-gray-400 font-medium">Unggah hingga 6 foto atau video<br><span class="text-gray-300">(maks. 5MB) Format: JPG, PNG, MP4, MOV</span></p>
                        <div id="galeri-preview" class="grid grid-cols-3 gap-2 mt-3 hidden"></div>
                    </div>
                    <button type="button" onclick="document.getElementById('galeri-input').click()"
                            class="flex items-center justify-center gap-1.5 border border-[#E2E8F0] rounded-xl py-2 text-xs font-semibold text-gray-500 hover:border-[#FBB45E] hover:text-[#FBB45E] transition-all">
                        <span class="material-symbols-outlined" style="font-size:16px;">upload</span> Unggah File
                    </button>
                    <input type="file" id="galeri-input" name="galeri[]" accept="image/*,video/*" multiple class="hidden" onchange="previewGaleri(this)">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-sm font-semibold text-[#363B58]">Foto Menu</label>
                    <div class="border-2 border-dashed border-[#E2E8F0] rounded-xl p-5 text-center hover:border-[#FBB45E] hover:bg-[#FEF4E7]/30 transition-all cursor-pointer"
                         onclick="document.getElementById('menu-input').click()">
                        <p class="text-xs text-gray-400 font-medium">Unggah hingga 6 foto atau video<br><span class="text-gray-300">(maks. 5MB) Format: JPG, PNG, MP4, MOV</span></p>
                        <div id="menu-preview" class="grid grid-cols-3 gap-2 mt-3 hidden"></div>
                    </div>
                    <button type="button" onclick="document.getElementById('menu-input').click()"
                            class="flex items-center justify-center gap-1.5 border border-[#E2E8F0] rounded-xl py-2 text-xs font-semibold text-gray-500 hover:border-[#FBB45E] hover:text-[#FBB45E] transition-all">
                        <span class="material-symbols-outlined" style="font-size:16px;">upload</span> Unggah File
                    </button>
                    <input type="file" id="menu-input" name="foto_menu[]" accept="image/*" multiple class="hidden" onchange="previewMenu(this)">
                </div>
            </div>

            <div class="bg-[#363B58] rounded-2xl p-6 shadow-sm">
                <h2 class="flex items-center gap-2 font-bold text-white text-lg mb-5">
                    <span class="material-symbols-outlined text-[#FBB45E]" style="font-size:22px; font-variation-settings:'FILL' 1;">toggle_on</span>
                    Status Publik
                </h2>
                <div class="flex flex-col gap-4">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-white font-semibold text-sm">Status Aktif</p>
                            <p class="text-white/50 text-xs mt-0.5">Apakah tempat ini masih beroperasi</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="status_aktif" value="1" checked class="sr-only peer">
                            <div class="w-11 h-6 bg-white/20 peer-focus:outline-none rounded-full peer
                                        peer-checked:after:translate-x-full peer-checked:after:border-white
                                        after:content-[''] after:absolute after:top-[2px] after:left-[2px]
                                        after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all
                                        peer-checked:bg-[#FBB45E]"></div>
                        </label>
                    </div>
                    <div class="w-full h-px bg-white/10"></div>
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-white font-semibold text-sm">Tempat Unggulan</p>
                            <p class="text-white/50 text-xs mt-0.5">Ditampilkan di halaman utama</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="unggulan" value="1" class="sr-only peer">
                            <div class="w-11 h-6 bg-white/20 peer-focus:outline-none rounded-full peer
                                        peer-checked:after:translate-x-full peer-checked:after:border-white
                                        after:content-[''] after:absolute after:top-[2px] after:left-[2px]
                                        after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all
                                        peer-checked:bg-[#FBB45E]"></div>
                        </label>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>

@endsection

@push('scripts')
<script>
/* ====== KATEGORI DROPDOWN ====== */
function toggleKategori() {
    const dd = document.getElementById('kategori-dropdown');
    const chevron = document.getElementById('kategori-chevron');
    dd.classList.toggle('hidden');
    chevron.style.transform = dd.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
}

function selectKategori(value, label, icon) {
    console.log('value:', value); // cek ini dulu

    document.getElementById('kategori-value').value = value;
    document.getElementById('kategori-label').textContent = label;
    document.getElementById('kategori-label').classList.remove('text-gray-400');
    document.getElementById('kategori-label').classList.add('text-[#363B58]');
    document.getElementById('kategori-dropdown').classList.add('hidden');
    document.getElementById('kategori-chevron').style.transform = 'rotate(0deg)';
}

document.addEventListener('click', function(e) {
    const wrapper = document.getElementById('kategori-wrapper');
    if (wrapper && !wrapper.contains(e.target)) {
        document.getElementById('kategori-dropdown').classList.add('hidden');
        document.getElementById('kategori-chevron').style.transform = 'rotate(0deg)';
    }
});

/* ====== KISARAN HARGA TOGGLE ====== */
function toggleHarga() {
    const panel = document.getElementById('harga-panel');
    const chevron = document.getElementById('harga-chevron');
    panel.classList.toggle('hidden');
    panel.classList.toggle('flex');
    chevron.style.transform = panel.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
}

function formatRupiah(angka) {
    if (!angka) return '';
    return 'Rp ' + parseInt(angka).toLocaleString('id-ID');
}

function updateHargaPreview() {
    const min = document.getElementById('harga-min').value;
    const max = document.getElementById('harga-max').value;
    const preview = document.getElementById('harga-preview');
    const previewText = document.getElementById('harga-preview-text');

    if (min || max) {
        previewText.textContent = (formatRupiah(min) || 'Rp 0') + ' – ' + (formatRupiah(max) || 'Rp 0');
        preview.classList.remove('hidden');
        preview.classList.add('flex');
    } else {
        preview.classList.add('hidden');
        preview.classList.remove('flex');
    }
}

function applyHarga() {
    updateHargaPreview();
    const panel = document.getElementById('harga-panel');
    panel.classList.add('hidden');
    panel.classList.remove('flex');
    document.getElementById('harga-chevron').style.transform = 'rotate(0deg)';

    const min = document.getElementById('harga-min').value;
    const max = document.getElementById('harga-max').value;
    if (min || max) {
        document.getElementById('harga-toggle-label').textContent =
            (formatRupiah(min) || '0') + ' – ' + (formatRupiah(max) || '0');
        document.getElementById('harga-toggle-label').classList.remove('text-gray-400');
        document.getElementById('harga-toggle-label').classList.add('text-[#363B58]', 'font-semibold');
    }
}

/* ====== JAM OPERASIONAL ====== */
const _days247 = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];
let _is247 = false;

function toggleDay(key) {
    const checked = document.getElementById('hari-' + key).checked;
    const buka    = document.getElementById('buka-' + key);
    const tutup   = document.getElementById('tutup-' + key);

    buka.disabled  = !checked;
    tutup.disabled = !checked;

    if (!checked) {
        buka.value  = '';
        tutup.value = '';
    }
}

function toggle247() {
    _is247 = !_is247;

    const btn   = document.getElementById('btn-247');
    const dot   = document.getElementById('dot-247');
    const check = document.getElementById('check-247');
    const label = document.getElementById('label-247');
    const icon  = document.getElementById('icon-247');

    if (_is247) {
        btn.classList.add('border-[#363B58]', 'bg-[#363B58]');
        btn.classList.remove('border-[#E2E8F0]', 'bg-[#FAFAFA]', 'hover:border-[#FBB45E]', 'hover:bg-[#FEF4E7]');
        dot.classList.add('bg-[#FBB45E]', 'border-[#FBB45E]');
        dot.classList.remove('bg-white', 'border-[#DDD]');
        check.classList.remove('hidden');
        label.classList.add('text-[#FBB45E]');
        label.classList.remove('text-[#363B58]');
        icon.classList.remove('hidden');
    } else {
        btn.classList.remove('border-[#363B58]', 'bg-[#363B58]');
        btn.classList.add('border-[#E2E8F0]', 'bg-[#FAFAFA]', 'hover:border-[#FBB45E]', 'hover:bg-[#FEF4E7]');
        dot.classList.remove('bg-[#FBB45E]', 'border-[#FBB45E]');
        dot.classList.add('bg-white', 'border-[#DDD]');
        check.classList.add('hidden');
        label.classList.remove('text-[#FBB45E]');
        label.classList.add('text-[#363B58]');
        icon.classList.add('hidden');
    }

    _days247.forEach(key => {
        const hariCb = document.getElementById('hari-' + key);
        const buka   = document.getElementById('buka-' + key);
        const tutup  = document.getElementById('tutup-' + key);

        if (_is247) {
            hariCb.checked  = true;
            hariCb.disabled = true;
            buka.value      = '00:00';
            tutup.value     = '23:59';
            buka.disabled   = true;
            tutup.disabled  = true;
        } else {
            hariCb.disabled = false;
            hariCb.checked  = false;
            buka.value      = '';
            tutup.value     = '';
            buka.disabled   = true;
            tutup.disabled  = true;
        }
    });
}

/* ====== GEODATA: CARI LOKASI via Nominatim (OpenStreetMap) ====== */
async function cariLokasi() {
    const query = document.getElementById('search-alamat').value.trim();
    if (!query) {
        alert('Masukkan alamat terlebih dahulu.');
        return;
    }

    const btn = document.querySelector('[onclick="cariLokasi()"]');
    btn.innerHTML = '<span class="material-symbols-outlined animate-spin" style="font-size:16px;">progress_activity</span> Mencari...';
    btn.disabled = true;

    try {
        const url = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}&limit=1&countrycodes=id`;
        const res = await fetch(url, {
            headers: { 'Accept-Language': 'id', 'User-Agent': 'LocanaAdmin/1.0' }
        });
        const data = await res.json();

        if (data.length === 0) {
            alert('Lokasi tidak ditemukan. Coba kata kunci lain.');
            return;
        }

        const { lat, lon, display_name } = data[0];

        document.getElementById('latitude').value  = parseFloat(lat).toFixed(6);
        document.getElementById('longitude').value = parseFloat(lon).toFixed(6);

        const delta  = 0.015;
        const bbox   = `${parseFloat(lon) - delta},${parseFloat(lat) - delta},${parseFloat(lon) + delta},${parseFloat(lat) + delta}`;
        const mapUrl = `https://www.openstreetmap.org/export/embed.html?bbox=${bbox}&layer=mapnik&marker=${lat},${lon}`;
        document.getElementById('map-iframe').src = mapUrl;

        document.getElementById('map-click-hint').style.display = 'none';

        if (!document.getElementById('alamat-input').value) {
            document.getElementById('alamat-input').value = display_name;
        }

    } catch (err) {
        alert('Gagal mengambil data lokasi. Periksa koneksi internet.');
        console.error(err);
    } finally {
        btn.innerHTML = '<span class="material-symbols-outlined" style="font-size:16px;">search</span> Cari';
        btn.disabled  = false;
    }
}

document.getElementById('search-alamat').addEventListener('keydown', function(e) {
    if (e.key === 'Enter') { e.preventDefault(); cariLokasi(); }
});

/* ====== PREVIEW FOTO ====== */
function previewCover(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('cover-img').src = e.target.result;
            document.getElementById('cover-preview').classList.remove('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function previewGaleri(input) {
    const container = document.getElementById('galeri-preview');
    container.innerHTML = '';
    if (input.files.length > 0) {
        container.classList.remove('hidden');
        Array.from(input.files).slice(0, 6).forEach(file => {
            const reader = new FileReader();
            reader.onload = e => {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'w-full h-16 object-cover rounded-lg';
                container.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    }
}

function previewMenu(input) {
    const container = document.getElementById('menu-preview');
    container.innerHTML = '';
    if (input.files.length > 0) {
        container.classList.remove('hidden');
        Array.from(input.files).slice(0, 6).forEach(file => {
            const reader = new FileReader();
            reader.onload = e => {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'w-full h-16 object-cover rounded-lg';
                container.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    }
}
</script>
@endpush