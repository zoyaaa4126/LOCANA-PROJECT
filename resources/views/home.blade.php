@extends('layouts.app')

@section('title', 'Homepage')

@section('content')

<div class="flex flex-col sm:flex-row gap-8">
    <!-- SIDEBAR FILTER (kiri) -->
        <aside id="desktopSidebar" class="w-80 shrink-0 bg-white shadow p-6 h-fill sticky border border-gray-200 max-sm:w-full max-sm:static max-sm:hidden transition-all duration-300 overflow-hidden">
            <div class="flex justify-between items-center mb-4">
                <h2 class="font-bold text-xl">Filters</h2>
                <button class="text-[#FBB45E] text-sm font-semibold" id="resetFilters">RESET</button>
            </div>
            <div class="mb-6">
                <p class="text-gray-400 font-semibold text-sm mb-3 uppercase tracking-wide">KATEGORI</p>
                <div class="space-y-3">
                    <div class="flex items-center gap-3 p-2 rounded-lg bg-orange-50 text-[#FBB45E] cursor-pointer"><span class="material-symbols-outlined">coffee</span> Cafe</div>
                    <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 cursor-pointer"><span class="material-symbols-outlined">restaurant</span> Restaurant</div>
                    <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 cursor-pointer"><span class="material-symbols-outlined">bakery_dining</span> Bakery</div>
                    <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 cursor-pointer"><span class="material-symbols-outlined">music_note</span> Live Music</div>
                    <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 cursor-pointer"><span class="material-symbols-outlined">home</span> Indoor</div>
                    <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 cursor-pointer"><span class="material-symbols-outlined">landscape</span> Outdoor</div>
                </div>
            </div>
            <div class="mb-6">
                <p class="text-gray-400 font-semibold text-sm mb-3 uppercase tracking-wide">BUDGET</p>
                <div class="space-y-2">
                    <label class="flex items-center gap-2"><input type="checkbox" class="rounded text-[#FBB45E]"> <span class="text-sm">&#60; Rp50.000</span></label>
                    <label class="flex items-center gap-2"><input type="checkbox" class="rounded text-[#FBB45E]"> <span class="text-sm">Rp50.000 – Rp100.000</span></label>
                    <label class="flex items-center gap-2"><input type="checkbox" class="rounded text-[#FBB45E]"> <span class="text-sm">Rp100.001 – Rp150.000</span></label>
                    <label class="flex items-center gap-2"><input type="checkbox" class="rounded text-[#FBB45E]"> <span class="text-sm">Rp150.001 – Rp200.000</span></label>
                    <label class="flex items-center gap-2"><input type="checkbox" class="rounded text-[#FBB45E]"> <span class="text-sm">&#62; Rp200.001</span></label>
                </div>
            </div>
            <div class="mb-6">
                <p class="text-gray-400 font-semibold text-sm mb-3 uppercase tracking-wide">RATING</p>
                <div class="space-y-2">
                    <label class="flex items-center gap-2"><input type="radio" name="rating" class="text-[#FBB45E]"> <span class="text-sm">Rating Tertinggi</span></label>
                    <label class="flex items-center gap-2"><input type="radio" name="rating" class="text-[#FBB45E]"> <span class="text-sm">Rating Terendah</span></label>
                </div>
            </div>
            <button class="mt-3 bg-[#FBB45E] hover:bg-[#E2A255] w-full px-5 py-2 rounded-lg text-md font-bold flex gap-1 justify-center items-center">Terapkan Filter</button>
        </aside>

        <div class="flex-1 my-5 overflow-hidden max-sm:px-5">
            <div class="w-full overflow-x-auto no-scrollbar">
                <div class="flex gap-4 mb-6 whitespace-nowrap">
                    <span id="desktopFilterToggle" class="inline-flex items-center gap-2 px-5 py-2 bg-[#FBB45E] text-[#363B58] rounded-full text-base cursor-pointer hover:bg-orange-100 transition flex-shrink-0 max-sm:hidden" ><span class="material-symbols-outlined">tune</span> Filter</span>
                    <span class="inline-flex items-center gap-2 px-5 py-2 bg-gray-100 rounded-full text-base cursor-pointer hover:bg-orange-100 transition flex-shrink-0">Dekat Saya</span>
                    <span class="inline-flex items-center gap-2 px-5 py-2 bg-gray-100 rounded-full text-base cursor-pointer hover:bg-orange-100 transition flex-shrink-0"><span class="material-symbols-outlined">local_cafe</span> Chill</span>
                    <span class="inline-flex items-center gap-2 px-5 py-2 bg-gray-100 rounded-full text-base cursor-pointer hover:bg-orange-100 transition flex-shrink-0"><span class="material-symbols-outlined">wine_bar</span> Fancy</span>
                    <span class="inline-flex items-center gap-2 px-5 py-2 bg-gray-100 rounded-full text-base cursor-pointer hover:bg-orange-100 transition flex-shrink-0"><span class="material-symbols-outlined">attractions</span> Keluarga</span>
                    <span class="inline-flex items-center gap-2 px-5 py-2 bg-gray-100 rounded-full text-base cursor-pointer hover:bg-orange-100 transition flex-shrink-0"><span class="material-symbols-outlined">dine_heart</span> Romantis</span>
                    <span class="inline-flex items-center gap-2 px-5 py-2 bg-gray-100 rounded-full text-base cursor-pointer hover:bg-orange-100 transition flex-shrink-0"><span class="material-symbols-outlined">hiking</span> Petualangan</span>
                    <span class="inline-flex items-center gap-2 px-5 py-2 bg-gray-100 rounded-full text-base cursor-pointer hover:bg-orange-100 transition flex-shrink-0"><span class="material-symbols-outlined">laptop_chromebook</span> Produk</span>
                </div>
            </div>

            <div class="relative rounded-xl overflow-hidden mb-8">
                <img src="assets/img/180 Cafe - Bandung 1.png" class="w-full h-64 object-cover" alt="Hero">
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-gray-900 to-transparent p-6 text-white">
                    <span class="bg-[#FBB45E] text-[#363B58] text-xs font-bold px-3 py-1 rounded-full inline-block mb-2">MOOD TERSIMPAN: PRODUKTIF</span>
                    <h2 class="text-2xl font-bold">Senang melihat anda kembali, Nanami Kento!</h2>
                    <p class="text-gray-200 text-sm">Lagi cari tempat yang tenang untuk fokus? Kopi Senja Cafe sedang tidak terlalu ramai sekarang.</p>
                </div>
            </div>

            <div class="flex flex-col gap-5">
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
                            <div class="bg-white rounded-xl shadow-md w-[250px] flex-shrink-0 border border-gray-100 p-4 hover:shadow-lg transition">
                                <div style="position: relative; margin-bottom: 12px;">
                                    <img src="assets/img/180 Cafe - Bandung 1.png" style="width: 100%; height: 160px; object-fit: cover; border-radius: 12px;">
                                    <button 
                                    onclick="this.classList.toggle('bg-[#FBB45E]'); this.classList.toggle('text-[#363B58]'); this.classList.toggle('bg-[#FFF8EF]'); this.classList.toggle('text-[#FBB45E]');"
                                    class="wishlist-btn absolute top-2 right-2 bg-[#FFF8EF] text-[#FBB45E] rounded-full w-8 h-8 flex items-center justify-center shadow-md cursor-pointer transition-all duration-200"
                                    style="font-variation-settings: 'FILL' 1;">
                                        <span class="material-symbols-outlined">bookmark</span>
                                    </button>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-[#FBB45E] font-bold text-xs">CAFE</span>
                                    <div class="flex items-center gap-1 text-sm">
                                        <span class="material-symbols-outlined text-yellow-400 text-sm" style="font-variation-settings: 'FILL' 1;">kid_star</span>
                                        <span>4.5</span>
                                    </div>
                                </div>
                                <h4 class="font-bold text-lg mt-1">Alam Cafe</h4>
                                <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                    <span class="material-symbols-outlined text-sm">location_on</span>
                                    <span>Ciwidey, Bandung</span>
                                </div>
                                <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                    <span class="material-symbols-outlined text-sm">payments</span>
                                    <span>Rp50.000 - Rp100.000</span>
                                </div>
                                <!-- Tombol Lihat Lokasi dan Share -->
                                <div class="flex items-center gap-2 mt-4">
                                    <button class="flex-1 bg-gray-800 text-[#FBB45E] py-2 rounded-full text-sm font-medium flex items-center justify-center gap-1 hover:bg-gray-700 transition">
                                        <span class="material-symbols-outlined text-sm">location_on</span> Lihat Lokasi
                                    </button>
                                    <button class="share-btn bg-[#FBB45E] hover:bg-[#E2A255] text-[#363B58] w-10 h-10 flex items-center justify-center rounded-full transition">
                                        <span class="material-symbols-outlined text-sm">share</span>
                                    </button>
                                </div>
                            </div>
                            <div class="bg-white rounded-xl shadow-md w-[250px] flex-shrink-0 border border-gray-100 p-4 hover:shadow-lg transition">
                                <div style="position: relative; margin-bottom: 12px;">
                                    <img src="assets/img/180 Cafe - Bandung 1.png" style="width: 100%; height: 160px; object-fit: cover; border-radius: 12px;">
                                    <button 
                                    onclick="this.classList.toggle('bg-[#FBB45E]'); this.classList.toggle('text-[#363B58]'); this.classList.toggle('bg-[#FFF8EF]'); this.classList.toggle('text-[#FBB45E]');"
                                    class="wishlist-btn absolute top-2 right-2 bg-[#FFF8EF] text-[#FBB45E] rounded-full w-8 h-8 flex items-center justify-center shadow-md cursor-pointer transition-all duration-200"
                                    style="font-variation-settings: 'FILL' 1;">
                                        <span class="material-symbols-outlined">bookmark</span>
                                    </button>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-[#FBB45E] font-bold text-xs">CAFE</span>
                                    <div class="flex items-center gap-1 text-sm">
                                        <span class="material-symbols-outlined text-yellow-400 text-sm" style="font-variation-settings: 'FILL' 1;">kid_star</span>
                                        <span>4.5</span>
                                    </div>
                                </div>
                                <h4 class="font-bold text-lg mt-1">Alam Cafe</h4>
                                <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                    <span class="material-symbols-outlined text-sm">location_on</span>
                                    <span>Ciwidey, Bandung</span>
                                </div>
                                <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                    <span class="material-symbols-outlined text-sm">payments</span>
                                    <span>Rp50.000 - Rp100.000</span>
                                </div>
                                <!-- Tombol Lihat Lokasi dan Share -->
                                <div class="flex items-center gap-2 mt-4">
                                    <button class="flex-1 bg-gray-800 text-[#FBB45E] py-2 rounded-full text-sm font-medium flex items-center justify-center gap-1 hover:bg-gray-700 transition">
                                        <span class="material-symbols-outlined text-sm">location_on</span> Lihat Lokasi
                                    </button>
                                    <button class="share-btn bg-[#FBB45E] hover:bg-[#E2A255] text-[#363B58] w-10 h-10 flex items-center justify-center rounded-full transition">
                                        <span class="material-symbols-outlined text-sm">share</span>
                                    </button>
                                </div>
                            </div>
                            <div class="bg-white rounded-xl shadow-md w-[250px] flex-shrink-0 border border-gray-100 p-4 hover:shadow-lg transition">
                                <div style="position: relative; margin-bottom: 12px;">
                                    <img src="assets/img/180 Cafe - Bandung 1.png" style="width: 100%; height: 160px; object-fit: cover; border-radius: 12px;">
                                    <button 
                                    onclick="this.classList.toggle('bg-[#FBB45E]'); this.classList.toggle('text-[#363B58]'); this.classList.toggle('bg-[#FFF8EF]'); this.classList.toggle('text-[#FBB45E]');"
                                    class="wishlist-btn absolute top-2 right-2 bg-[#FFF8EF] text-[#FBB45E] rounded-full w-8 h-8 flex items-center justify-center shadow-md cursor-pointer transition-all duration-200"
                                    style="font-variation-settings: 'FILL' 1;">
                                        <span class="material-symbols-outlined">bookmark</span>
                                    </button>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-[#FBB45E] font-bold text-xs">CAFE</span>
                                    <div class="flex items-center gap-1 text-sm">
                                        <span class="material-symbols-outlined text-yellow-400 text-sm" style="font-variation-settings: 'FILL' 1;">kid_star</span>
                                        <span>4.5</span>
                                    </div>
                                </div>
                                <h4 class="font-bold text-lg mt-1">Alam Cafe</h4>
                                <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                    <span class="material-symbols-outlined text-sm">location_on</span>
                                    <span>Ciwidey, Bandung</span>
                                </div>
                                <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                    <span class="material-symbols-outlined text-sm">payments</span>
                                    <span>Rp50.000 - Rp100.000</span>
                                </div>
                                <!-- Tombol Lihat Lokasi dan Share -->
                                <div class="flex items-center gap-2 mt-4">
                                    <button class="flex-1 bg-gray-800 text-[#FBB45E] py-2 rounded-full text-sm font-medium flex items-center justify-center gap-1 hover:bg-gray-700 transition">
                                        <span class="material-symbols-outlined text-sm">location_on</span> Lihat Lokasi
                                    </button>
                                    <button class="share-btn bg-[#FBB45E] hover:bg-[#E2A255] text-[#363B58] w-10 h-10 flex items-center justify-center rounded-full transition">
                                        <span class="material-symbols-outlined text-sm">share</span>
                                    </button>
                                </div>
                            </div>
                            <div class="bg-white rounded-xl shadow-md w-[250px] flex-shrink-0 border border-gray-100 p-4 hover:shadow-lg transition">
                                <div style="position: relative; margin-bottom: 12px;">
                                    <img src="assets/img/180 Cafe - Bandung 1.png" style="width: 100%; height: 160px; object-fit: cover; border-radius: 12px;">
                                    <button 
                                    onclick="this.classList.toggle('bg-[#FBB45E]'); this.classList.toggle('text-[#363B58]'); this.classList.toggle('bg-[#FFF8EF]'); this.classList.toggle('text-[#FBB45E]');"
                                    class="wishlist-btn absolute top-2 right-2 bg-[#FFF8EF] text-[#FBB45E] rounded-full w-8 h-8 flex items-center justify-center shadow-md cursor-pointer transition-all duration-200"
                                    style="font-variation-settings: 'FILL' 1;">
                                        <span class="material-symbols-outlined">bookmark</span>
                                    </button>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-[#FBB45E] font-bold text-xs">CAFE</span>
                                    <div class="flex items-center gap-1 text-sm">
                                        <span class="material-symbols-outlined text-yellow-400 text-sm" style="font-variation-settings: 'FILL' 1;">kid_star</span>
                                        <span>4.5</span>
                                    </div>
                                </div>
                                <h4 class="font-bold text-lg mt-1">Alam Cafe</h4>
                                <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                    <span class="material-symbols-outlined text-sm">location_on</span>
                                    <span>Ciwidey, Bandung</span>
                                </div>
                                <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                    <span class="material-symbols-outlined text-sm">payments</span>
                                    <span>Rp50.000 - Rp100.000</span>
                                </div>
                                <!-- Tombol Lihat Lokasi dan Share -->
                                <div class="flex items-center gap-2 mt-4">
                                    <button class="flex-1 bg-gray-800 text-[#FBB45E] py-2 rounded-full text-sm font-medium flex items-center justify-center gap-1 hover:bg-gray-700 transition">
                                        <span class="material-symbols-outlined text-sm">location_on</span> Lihat Lokasi
                                    </button>
                                    <button class="share-btn bg-[#FBB45E] hover:bg-[#E2A255] text-[#363B58] w-10 h-10 flex items-center justify-center rounded-full transition">
                                        <span class="material-symbols-outlined text-sm">share</span>
                                    </button>
                                </div>
                            </div>
                            <div class="bg-white rounded-xl shadow-md w-[250px] flex-shrink-0 border border-gray-100 p-4 hover:shadow-lg transition">
                                <div style="position: relative; margin-bottom: 12px;">
                                    <img src="assets/img/180 Cafe - Bandung 1.png" style="width: 100%; height: 160px; object-fit: cover; border-radius: 12px;">
                                    <button 
                                    onclick="this.classList.toggle('bg-[#FBB45E]'); this.classList.toggle('text-[#363B58]'); this.classList.toggle('bg-[#FFF8EF]'); this.classList.toggle('text-[#FBB45E]');"
                                    class="wishlist-btn absolute top-2 right-2 bg-[#FFF8EF] text-[#FBB45E] rounded-full w-8 h-8 flex items-center justify-center shadow-md cursor-pointer transition-all duration-200"
                                    style="font-variation-settings: 'FILL' 1;">
                                        <span class="material-symbols-outlined">bookmark</span>
                                    </button>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-[#FBB45E] font-bold text-xs">CAFE</span>
                                    <div class="flex items-center gap-1 text-sm">
                                        <span class="material-symbols-outlined text-yellow-400 text-sm" style="font-variation-settings: 'FILL' 1;">kid_star</span>
                                        <span>4.5</span>
                                    </div>
                                </div>
                                <h4 class="font-bold text-lg mt-1">Alam Cafe</h4>
                                <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                    <span class="material-symbols-outlined text-sm">location_on</span>
                                    <span>Ciwidey, Bandung</span>
                                </div>
                                <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                    <span class="material-symbols-outlined text-sm">payments</span>
                                    <span>Rp50.000 - Rp100.000</span>
                                </div>
                                <!-- Tombol Lihat Lokasi dan Share -->
                                <div class="flex items-center gap-2 mt-4">
                                    <button class="flex-1 bg-gray-800 text-[#FBB45E] py-2 rounded-full text-sm font-medium flex items-center justify-center gap-1 hover:bg-gray-700 transition">
                                        <span class="material-symbols-outlined text-sm">location_on</span> Lihat Lokasi
                                    </button>
                                    <button class="share-btn bg-[#FBB45E] hover:bg-[#E2A255] text-[#363B58] w-10 h-10 flex items-center justify-center rounded-full transition">
                                        <span class="material-symbols-outlined text-sm">share</span>
                                    </button>
                                </div>
                            </div>
                            <div class="bg-white rounded-xl shadow-md w-[250px] flex-shrink-0 border border-gray-100 p-4 hover:shadow-lg transition">
                                <div style="position: relative; margin-bottom: 12px;">
                                    <img src="assets/img/180 Cafe - Bandung 1.png" style="width: 100%; height: 160px; object-fit: cover; border-radius: 12px;">
                                    <button 
                                    onclick="this.classList.toggle('bg-[#FBB45E]'); this.classList.toggle('text-[#363B58]'); this.classList.toggle('bg-[#FFF8EF]'); this.classList.toggle('text-[#FBB45E]');"
                                    class="wishlist-btn absolute top-2 right-2 bg-[#FFF8EF] text-[#FBB45E] rounded-full w-8 h-8 flex items-center justify-center shadow-md cursor-pointer transition-all duration-200"
                                    style="font-variation-settings: 'FILL' 1;">
                                        <span class="material-symbols-outlined">bookmark</span>
                                    </button>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-[#FBB45E] font-bold text-xs">CAFE</span>
                                    <div class="flex items-center gap-1 text-sm">
                                        <span class="material-symbols-outlined text-yellow-400 text-sm" style="font-variation-settings: 'FILL' 1;">kid_star</span>
                                        <span>4.5</span>
                                    </div>
                                </div>
                                <h4 class="font-bold text-lg mt-1">Alam Cafe</h4>
                                <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                    <span class="material-symbols-outlined text-sm">location_on</span>
                                    <span>Ciwidey, Bandung</span>
                                </div>
                                <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                    <span class="material-symbols-outlined text-sm">payments</span>
                                    <span>Rp50.000 - Rp100.000</span>
                                </div>
                                <!-- Tombol Lihat Lokasi dan Share -->
                                <div class="flex items-center gap-2 mt-4">
                                    <button class="flex-1 bg-gray-800 text-[#FBB45E] py-2 rounded-full text-sm font-medium flex items-center justify-center gap-1 hover:bg-gray-700 transition">
                                        <span class="material-symbols-outlined text-sm">location_on</span> Lihat Lokasi
                                    </button>
                                    <button class="share-btn bg-[#FBB45E] hover:bg-[#E2A255] text-[#363B58] w-10 h-10 flex items-center justify-center rounded-full transition">
                                        <span class="material-symbols-outlined text-sm">share</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button class="scrollRight absolute right-2 top-1/2 -translate-y-1/2 w-10 h-10  flex items-center justify-center z-20 bg-[#FBB45E] text-[#363B58] rounded-full shadow-md hover:scale-110 transition">
                            <span class="material-symbols-outlined">chevron_right</span>
                        </button>
                    </div>
                </div>

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
                            <div class="bg-white rounded-xl shadow-md w-[250px] flex-shrink-0 border border-gray-100 p-4 hover:shadow-lg transition">
                                <div style="position: relative; margin-bottom: 12px;">
                                    <img src="assets/img/180 Cafe - Bandung 1.png" style="width: 100%; height: 160px; object-fit: cover; border-radius: 12px;">
                                    <button 
                                    onclick="this.classList.toggle('bg-[#FBB45E]'); this.classList.toggle('text-[#363B58]'); this.classList.toggle('bg-[#FFF8EF]'); this.classList.toggle('text-[#FBB45E]');"
                                    class="wishlist-btn absolute top-2 right-2 bg-[#FFF8EF] text-[#FBB45E] rounded-full w-8 h-8 flex items-center justify-center shadow-md cursor-pointer transition-all duration-200"
                                    style="font-variation-settings: 'FILL' 1;">
                                        <span class="material-symbols-outlined">bookmark</span>
                                    </button>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-[#FBB45E] font-bold text-xs">CAFE</span>
                                    <div class="flex items-center gap-1 text-sm">
                                        <span class="material-symbols-outlined text-yellow-400 text-sm" style="font-variation-settings: 'FILL' 1;">kid_star</span>
                                        <span>4.5</span>
                                    </div>
                                </div>
                                <h4 class="font-bold text-lg mt-1">Alam Cafe</h4>
                                <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                    <span class="material-symbols-outlined text-sm">location_on</span>
                                    <span>Ciwidey, Bandung</span>
                                </div>
                                <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                    <span class="material-symbols-outlined text-sm">payments</span>
                                    <span>Rp50.000 - Rp100.000</span>
                                </div>
                                <!-- Tombol Lihat Lokasi dan Share -->
                                <div class="flex items-center gap-2 mt-4">
                                    <button class="flex-1 bg-gray-800 text-[#FBB45E] py-2 rounded-full text-sm font-medium flex items-center justify-center gap-1 hover:bg-gray-700 transition">
                                        <span class="material-symbols-outlined text-sm">location_on</span> Lihat Lokasi
                                    </button>
                                    <button class="share-btn bg-[#FBB45E] hover:bg-[#E2A255] text-[#363B58] w-10 h-10 flex items-center justify-center rounded-full transition">
                                        <span class="material-symbols-outlined text-sm">share</span>
                                    </button>
                                </div>
                            </div>
                            <div class="bg-white rounded-xl shadow-md w-[250px] flex-shrink-0 border border-gray-100 p-4 hover:shadow-lg transition">
                                <div style="position: relative; margin-bottom: 12px;">
                                    <img src="assets/img/180 Cafe - Bandung 1.png" style="width: 100%; height: 160px; object-fit: cover; border-radius: 12px;">
                                    <button 
                                    onclick="this.classList.toggle('bg-[#FBB45E]'); this.classList.toggle('text-[#363B58]'); this.classList.toggle('bg-[#FFF8EF]'); this.classList.toggle('text-[#FBB45E]');"
                                    class="wishlist-btn absolute top-2 right-2 bg-[#FFF8EF] text-[#FBB45E] rounded-full w-8 h-8 flex items-center justify-center shadow-md cursor-pointer transition-all duration-200"
                                    style="font-variation-settings: 'FILL' 1;">
                                        <span class="material-symbols-outlined">bookmark</span>
                                    </button>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-[#FBB45E] font-bold text-xs">CAFE</span>
                                    <div class="flex items-center gap-1 text-sm">
                                        <span class="material-symbols-outlined text-yellow-400 text-sm" style="font-variation-settings: 'FILL' 1;">kid_star</span>
                                        <span>4.5</span>
                                    </div>
                                </div>
                                <h4 class="font-bold text-lg mt-1">Alam Cafe</h4>
                                <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                    <span class="material-symbols-outlined text-sm">location_on</span>
                                    <span>Ciwidey, Bandung</span>
                                </div>
                                <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                    <span class="material-symbols-outlined text-sm">payments</span>
                                    <span>Rp50.000 - Rp100.000</span>
                                </div>
                                <!-- Tombol Lihat Lokasi dan Share -->
                                <div class="flex items-center gap-2 mt-4">
                                    <button class="flex-1 bg-gray-800 text-[#FBB45E] py-2 rounded-full text-sm font-medium flex items-center justify-center gap-1 hover:bg-gray-700 transition">
                                        <span class="material-symbols-outlined text-sm">location_on</span> Lihat Lokasi
                                    </button>
                                    <button class="share-btn bg-[#FBB45E] hover:bg-[#E2A255] text-[#363B58] w-10 h-10 flex items-center justify-center rounded-full transition">
                                        <span class="material-symbols-outlined text-sm">share</span>
                                    </button>
                                </div>
                            </div>
                            <div class="bg-white rounded-xl shadow-md w-[250px] flex-shrink-0 border border-gray-100 p-4 hover:shadow-lg transition">
                                <div style="position: relative; margin-bottom: 12px;">
                                    <img src="assets/img/180 Cafe - Bandung 1.png" style="width: 100%; height: 160px; object-fit: cover; border-radius: 12px;">
                                    <button 
                                    onclick="this.classList.toggle('bg-[#FBB45E]'); this.classList.toggle('text-[#363B58]'); this.classList.toggle('bg-[#FFF8EF]'); this.classList.toggle('text-[#FBB45E]');"
                                    class="wishlist-btn absolute top-2 right-2 bg-[#FFF8EF] text-[#FBB45E] rounded-full w-8 h-8 flex items-center justify-center shadow-md cursor-pointer transition-all duration-200"
                                    style="font-variation-settings: 'FILL' 1;">
                                        <span class="material-symbols-outlined">bookmark</span>
                                    </button>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-[#FBB45E] font-bold text-xs">CAFE</span>
                                    <div class="flex items-center gap-1 text-sm">
                                        <span class="material-symbols-outlined text-yellow-400 text-sm" style="font-variation-settings: 'FILL' 1;">kid_star</span>
                                        <span>4.5</span>
                                    </div>
                                </div>
                                <h4 class="font-bold text-lg mt-1">Alam Cafe</h4>
                                <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                    <span class="material-symbols-outlined text-sm">location_on</span>
                                    <span>Ciwidey, Bandung</span>
                                </div>
                                <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                    <span class="material-symbols-outlined text-sm">payments</span>
                                    <span>Rp50.000 - Rp100.000</span>
                                </div>
                                <!-- Tombol Lihat Lokasi dan Share -->
                                <div class="flex items-center gap-2 mt-4">
                                    <button class="flex-1 bg-gray-800 text-[#FBB45E] py-2 rounded-full text-sm font-medium flex items-center justify-center gap-1 hover:bg-gray-700 transition">
                                        <span class="material-symbols-outlined text-sm">location_on</span> Lihat Lokasi
                                    </button>
                                    <button class="share-btn bg-[#FBB45E] hover:bg-[#E2A255] text-[#363B58] w-10 h-10 flex items-center justify-center rounded-full transition">
                                        <span class="material-symbols-outlined text-sm">share</span>
                                    </button>
                                </div>
                            </div>
                            <div class="bg-white rounded-xl shadow-md w-[250px] flex-shrink-0 border border-gray-100 p-4 hover:shadow-lg transition">
                                <div style="position: relative; margin-bottom: 12px;">
                                    <img src="assets/img/180 Cafe - Bandung 1.png" style="width: 100%; height: 160px; object-fit: cover; border-radius: 12px;">
                                    <button 
                                    onclick="this.classList.toggle('bg-[#FBB45E]'); this.classList.toggle('text-[#363B58]'); this.classList.toggle('bg-[#FFF8EF]'); this.classList.toggle('text-[#FBB45E]');"
                                    class="wishlist-btn absolute top-2 right-2 bg-[#FFF8EF] text-[#FBB45E] rounded-full w-8 h-8 flex items-center justify-center shadow-md cursor-pointer transition-all duration-200"
                                    style="font-variation-settings: 'FILL' 1;">
                                        <span class="material-symbols-outlined">bookmark</span>
                                    </button>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-[#FBB45E] font-bold text-xs">CAFE</span>
                                    <div class="flex items-center gap-1 text-sm">
                                        <span class="material-symbols-outlined text-yellow-400 text-sm" style="font-variation-settings: 'FILL' 1;">kid_star</span>
                                        <span>4.5</span>
                                    </div>
                                </div>
                                <h4 class="font-bold text-lg mt-1">Alam Cafe</h4>
                                <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                    <span class="material-symbols-outlined text-sm">location_on</span>
                                    <span>Ciwidey, Bandung</span>
                                </div>
                                <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                    <span class="material-symbols-outlined text-sm">payments</span>
                                    <span>Rp50.000 - Rp100.000</span>
                                </div>
                                <!-- Tombol Lihat Lokasi dan Share -->
                                <div class="flex items-center gap-2 mt-4">
                                    <button class="flex-1 bg-gray-800 text-[#FBB45E] py-2 rounded-full text-sm font-medium flex items-center justify-center gap-1 hover:bg-gray-700 transition">
                                        <span class="material-symbols-outlined text-sm">location_on</span> Lihat Lokasi
                                    </button>
                                    <button class="share-btn bg-[#FBB45E] hover:bg-[#E2A255] text-[#363B58] w-10 h-10 flex items-center justify-center rounded-full transition">
                                        <span class="material-symbols-outlined text-sm">share</span>
                                    </button>
                                </div>
                            </div>
                            <div class="bg-white rounded-xl shadow-md w-[250px] flex-shrink-0 border border-gray-100 p-4 hover:shadow-lg transition">
                                <div style="position: relative; margin-bottom: 12px;">
                                    <img src="assets/img/180 Cafe - Bandung 1.png" style="width: 100%; height: 160px; object-fit: cover; border-radius: 12px;">
                                    <button 
                                    onclick="this.classList.toggle('bg-[#FBB45E]'); this.classList.toggle('text-[#363B58]'); this.classList.toggle('bg-[#FFF8EF]'); this.classList.toggle('text-[#FBB45E]');"
                                    class="wishlist-btn absolute top-2 right-2 bg-[#FFF8EF] text-[#FBB45E] rounded-full w-8 h-8 flex items-center justify-center shadow-md cursor-pointer transition-all duration-200"
                                    style="font-variation-settings: 'FILL' 1;">
                                        <span class="material-symbols-outlined">bookmark</span>
                                    </button>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-[#FBB45E] font-bold text-xs">CAFE</span>
                                    <div class="flex items-center gap-1 text-sm">
                                        <span class="material-symbols-outlined text-yellow-400 text-sm" style="font-variation-settings: 'FILL' 1;">kid_star</span>
                                        <span>4.5</span>
                                    </div>
                                </div>
                                <h4 class="font-bold text-lg mt-1">Alam Cafe</h4>
                                <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                    <span class="material-symbols-outlined text-sm">location_on</span>
                                    <span>Ciwidey, Bandung</span>
                                </div>
                                <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                    <span class="material-symbols-outlined text-sm">payments</span>
                                    <span>Rp50.000 - Rp100.000</span>
                                </div>
                                <!-- Tombol Lihat Lokasi dan Share -->
                                <div class="flex items-center gap-2 mt-4">
                                    <button class="flex-1 bg-gray-800 text-[#FBB45E] py-2 rounded-full text-sm font-medium flex items-center justify-center gap-1 hover:bg-gray-700 transition">
                                        <span class="material-symbols-outlined text-sm">location_on</span> Lihat Lokasi
                                    </button>
                                    <button class="share-btn bg-[#FBB45E] hover:bg-[#E2A255] text-[#363B58] w-10 h-10 flex items-center justify-center rounded-full transition">
                                        <span class="material-symbols-outlined text-sm">share</span>
                                    </button>
                                </div>
                            </div>
                            <div class="bg-white rounded-xl shadow-md w-[250px] flex-shrink-0 border border-gray-100 p-4 hover:shadow-lg transition">
                                <div style="position: relative; margin-bottom: 12px;">
                                    <img src="assets/img/180 Cafe - Bandung 1.png" style="width: 100%; height: 160px; object-fit: cover; border-radius: 12px;">
                                    <button 
                                    onclick="this.classList.toggle('bg-[#FBB45E]'); this.classList.toggle('text-[#363B58]'); this.classList.toggle('bg-[#FFF8EF]'); this.classList.toggle('text-[#FBB45E]');"
                                    class="wishlist-btn absolute top-2 right-2 bg-[#FFF8EF] text-[#FBB45E] rounded-full w-8 h-8 flex items-center justify-center shadow-md cursor-pointer transition-all duration-200"
                                    style="font-variation-settings: 'FILL' 1;">
                                        <span class="material-symbols-outlined">bookmark</span>
                                    </button>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-[#FBB45E] font-bold text-xs">CAFE</span>
                                    <div class="flex items-center gap-1 text-sm">
                                        <span class="material-symbols-outlined text-yellow-400 text-sm" style="font-variation-settings: 'FILL' 1;">kid_star</span>
                                        <span>4.5</span>
                                    </div>
                                </div>
                                <h4 class="font-bold text-lg mt-1">Alam Cafe</h4>
                                <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                    <span class="material-symbols-outlined text-sm">location_on</span>
                                    <span>Ciwidey, Bandung</span>
                                </div>
                                <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                    <span class="material-symbols-outlined text-sm">payments</span>
                                    <span>Rp50.000 - Rp100.000</span>
                                </div>
                                <!-- Tombol Lihat Lokasi dan Share -->
                                <div class="flex items-center gap-2 mt-4">
                                    <button class="flex-1 bg-gray-800 text-[#FBB45E] py-2 rounded-full text-sm font-medium flex items-center justify-center gap-1 hover:bg-gray-700 transition">
                                        <span class="material-symbols-outlined text-sm">location_on</span> Lihat Lokasi
                                    </button>
                                    <button class="share-btn bg-[#FBB45E] hover:bg-[#E2A255] text-[#363B58] w-10 h-10 flex items-center justify-center rounded-full transition">
                                        <span class="material-symbols-outlined text-sm">share</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button class="scrollRight absolute right-2 top-1/2 -translate-y-1/2 w-10 h-10  flex items-center justify-center z-20 bg-[#FBB45E] text-[#363B58] rounded-full shadow-md hover:scale-110 transition">
                            <span class="material-symbols-outlined">chevron_right</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
</div>

@endsection