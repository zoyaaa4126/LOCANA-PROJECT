@extends('layouts.app')

@section('title', 'Homepage')

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
                    <a href="wishlist.html"><div class="flex items-center gap-3 px-4 py-3 rounded-xl text-[#363B58] hover:text-[#E2A255] cursor-pointer">
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
                            <button class="absolute bottom-0 right-0 bg-[#FBB45E] w-8 h-8 flex items-center justify-center rounded-full">
                                <span class="material-symbols-outlined text-[#363B58] text-sm">edit</span>
                            </button>
                        </div>
                        <div class="flex-1 text-center sm:text-left">
                            <h1 class="text-2xl font-bold text-gray-800">{{ $user->nama }}</h1>
                            <p class="text-gray-500">{{ $user->username }}</p>
                            <p class="text-[#363B58] italic mt-1">"Exploring new spots, from cozy coffee corners to lively hangout places."</p>
                            <div class="flex justify-center sm:justify-start gap-6 mt-3">
                                <div class="flex flex-col justify-center items-center"><span class="font-bold text-[#FBB45E] text-lg">24</span> <span class="text-gray-500">Ulasan</span></div>
                                <div class="flex flex-col justify-center items-center"><span class="font-bold text-[#FBB45E] text-lg">112</span> <span class="text-gray-500">Wishlist</span></div>
                            </div>
                        </div>
                        <button class="bg-[#FBB45E] text-[#363B58] px-5 py-2 rounded-lg text-sm font-bold">Edit Profil</button>
                    </div>

                    <!-- AKTIVITAS TERAKHIR dengan Gambar -->
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800 mb-5">Aktivitas <span class="text-[#FBB45E]">Terakhir</span></h2>
                        <div class="flex flex-row gap-4 overflow-x-auto no-scrollbar max-md:flex-col max-md:overflow-visible" style="font-variation-settings: 'FILL' 1;">
                            <div class="bg-white rounded-xl border border-gray-100 p-4 shadow-sm flex flex-col gap-4 w-[500px] flex-shrink-0
                                        max-md:w-full max-md:grid max-md:grid-cols-[70px_1fr] max-md:grid-rows-[auto_auto_auto] max-md:gap-x-3 max-md:gap-y-1 max-md:items-center">
                                <div class="flex justify-between items-center max-md:col-start-2 max-md:row-start-1">
                                    <div class="flex items-center gap-2 max-md:col-start-2 max-md:row-start-1">
                                        <span class="material-symbols-outlined text-[#363B58] bg-[#FBB45E] p-1 rounded-full text-[12px]">star</span>
                                        <span class="font-semibold text-sm">Memberi Ulasan</span>
                                    </div>
                                </div>
                                <span class="text-xs text-gray-400 max-md:col-start-2 max-md:row-start-3 md:self-end md:-mt-10">10 Jam</span>
                                <div class="flex gap-4 items-center max-md:contents">
                                    <img src="assets/img/180 Cafe - Bandung 1.png" class="w-30 h-30 rounded-xl object-cover flex-shrink-0 max-md:row-span-3 max-md:w-[70px] max-md:h-[70px]" alt="Cafe">
                                    <div class="flex flex-col max-md:contents">
                                        <h3 class="font-bold text-lg mt-1 max-md:text-base max-md:col-start-2 max-md:row-start-2">Alam Cafe</h3>
                                        <div class="flex text-yellow-500 text-sm my-1 max-md:col-start-2 max-md:row-start-2 max-md:justify-self-end">
                                            <span class="material-symbols-outlined text-sm">star</span>
                                            <span class="material-symbols-outlined text-sm">star</span>
                                            <span class="material-symbols-outlined text-sm">star</span>
                                            <span class="material-symbols-outlined text-sm">star</span>
                                            <span class="material-symbols-outlined text-sm">star</span>
                                        </div>
                                        <p class="text-[#363B58] text-sm italic max-md:hidden">Pilihan tempat yang baik selalu memberi ruang untuk berbagi cerita. Di sini, momen sederhana terasa lebih berarti.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white rounded-xl border border-gray-100 p-4 shadow-sm flex flex-col gap-4 w-[500px] flex-shrink-0
                                        max-md:w-full max-md:grid max-md:grid-cols-[70px_1fr] max-md:grid-rows-[auto_auto_auto] max-md:gap-x-3 max-md:gap-y-1 max-md:items-center">
                                <div class="flex justify-between items-center max-md:col-start-2 max-md:row-start-1">
                                    <div class="flex items-center gap-2 max-md:col-start-2 max-md:row-start-1">
                                        <span class="material-symbols-outlined text-[#363B58] bg-[#FBB45E] p-1 rounded-full text-[12px]">star</span>
                                        <span class="font-semibold text-sm">Memberi Ulasan</span>
                                    </div>
                                </div>
                                <span class="text-xs text-gray-400 max-md:col-start-2 max-md:row-start-3 md:self-end md:-mt-10">10 Jam</span>
                                <div class="flex gap-4 items-center max-md:contents">
                                    <img src="assets/img/180 Cafe - Bandung 1.png" class="w-30 h-30 rounded-xl object-cover flex-shrink-0 max-md:row-span-3 max-md:w-[70px] max-md:h-[70px]" alt="Cafe">
                                    <div class="flex flex-col max-md:contents">
                                        <h3 class="font-bold text-lg mt-1 max-md:text-base max-md:col-start-2 max-md:row-start-2">Alam Cafe</h3>
                                        <div class="flex text-yellow-500 text-sm my-1 max-md:col-start-2 max-md:row-start-2 max-md:justify-self-end">
                                            <span class="material-symbols-outlined text-sm">star</span>
                                            <span class="material-symbols-outlined text-sm">star</span>
                                            <span class="material-symbols-outlined text-sm">star</span>
                                            <span class="material-symbols-outlined text-sm">star</span>
                                            <span class="material-symbols-outlined text-sm">star</span>
                                        </div>
                                        <p class="text-[#363B58] text-sm italic max-md:hidden">Pilihan tempat yang baik selalu memberi ruang untuk berbagi cerita. Di sini, momen sederhana terasa lebih berarti.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white rounded-xl border border-gray-100 p-4 shadow-sm flex flex-col gap-4 w-[500px] flex-shrink-0
                                        max-md:w-full max-md:grid max-md:grid-cols-[70px_1fr] max-md:grid-rows-[auto_auto_auto] max-md:gap-x-3 max-md:gap-y-1 max-md:items-center">
                                <div class="flex justify-between items-center max-md:col-start-2 max-md:row-start-1">
                                    <div class="flex items-center gap-2 max-md:col-start-2 max-md:row-start-1">
                                        <span class="material-symbols-outlined text-[#FBB45E] bg-[#363B58] p-1 rounded-full text-[12px]">bookmark</span>
                                        <span class="font-semibold text-sm">Menambahkan ke Wishlist</span>
                                    </div>
                                </div>
                                <span class="text-xs text-gray-400 max-md:col-start-2 max-md:row-start-3 md:self-end md:-mt-10">10 Jam</span>
                                <div class="flex gap-4 items-center max-md:contents">
                                    <img src="assets/img/180 Cafe - Bandung 1.png" class="w-30 h-30 rounded-xl object-cover flex-shrink-0 max-md:row-span-3 max-md:w-[70px] max-md:h-[70px]" alt="Cafe">
                                    <div class="flex flex-col max-md:contents">
                                        <h3 class="font-bold text-lg mt-1 max-md:text-base max-md:col-start-2 max-md:row-start-2">Alam Cafe</h3>
                                        <div class="flex text-sm my-1 max-md:col-start-2 max-md:row-start-2 max-md:justify-self-end">
                                            <span class="material-symbols-outlined text-sm text-yellow-500">star</span>
                                            <p>4.5 (120)</p>
                                        </div>
                                        <div class="flex items-center gap-1 text-gray-500 text-xs mt-1 max-md:hidden">
                                            <span class="material-symbols-outlined text-sm">location_on</span>
                                            <span>Ciwidey, Bandung</span>
                                        </div>
                                        <div class="flex items-center gap-1 text-gray-500 text-xs mt-1 max-md:hidden">
                                            <span class="material-symbols-outlined text-sm">payments</span>
                                            <span>Rp50.000 - Rp100.000</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white rounded-xl border border-gray-100 p-4 shadow-sm flex flex-col gap-4 w-[500px] flex-shrink-0
                                        max-md:w-full max-md:grid max-md:grid-cols-[70px_1fr] max-md:grid-rows-[auto_auto_auto] max-md:gap-x-3 max-md:gap-y-1 max-md:items-center">
                                <div class="flex justify-between items-center max-md:col-start-2 max-md:row-start-1">
                                    <div class="flex items-center gap-2 max-md:col-start-2 max-md:row-start-1">
                                        <span class="material-symbols-outlined text-[#363B58] bg-[#FBB45E] p-1 rounded-full text-[12px]">star</span>
                                        <span class="font-semibold text-sm">Memberi Ulasan</span>
                                    </div>
                                </div>
                                <span class="text-xs text-gray-400 max-md:col-start-2 max-md:row-start-3 md:self-end md:-mt-10">10 Jam</span>
                                <div class="flex gap-4 items-center max-md:contents">
                                    <img src="assets/img/180 Cafe - Bandung 1.png" class="w-30 h-30 rounded-xl object-cover flex-shrink-0 max-md:row-span-3 max-md:w-[70px] max-md:h-[70px]" alt="Cafe">
                                    <div class="flex flex-col max-md:contents">
                                        <h3 class="font-bold text-lg mt-1 max-md:text-base max-md:col-start-2 max-md:row-start-2">Alam Cafe</h3>
                                        <div class="flex text-yellow-500 text-sm my-1 max-md:col-start-2 max-md:row-start-2 max-md:justify-self-end">
                                            <span class="material-symbols-outlined text-sm">star</span>
                                            <span class="material-symbols-outlined text-sm">star</span>
                                            <span class="material-symbols-outlined text-sm">star</span>
                                            <span class="material-symbols-outlined text-sm">star</span>
                                            <span class="material-symbols-outlined text-sm">star</span>
                                        </div>
                                        <p class="text-[#363B58] text-sm italic max-md:hidden">Pilihan tempat yang baik selalu memberi ruang untuk berbagi cerita. Di sini, momen sederhana terasa lebih berarti.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- WISHLIST SAYA dengan Gambar, Bookmark, Share -->
                    <div>
                        <div class="flex justify-between items-center mb-5">
                            <h2 class="text-2xl font-bold text-gray-800"><span class="text-[#FBB45E]">Wishlist</span> Saya</h2>
                            <a href="#" class="text-[#FBB45E] text-sm font-semibold">Lihat Semua →</a>
                        </div>
                        <div class="flex flex-row gap-6 overflow-x-auto no-scrollbar">
                            <div class="flex gap-4 bg-white rounded-xl border border-gray-100 p-4 h-fit w-[500px] flex-shrink-0 shadow-sm">
                                <!-- IMAGE -->
                                <div class="relative w-40 h-40 flex-shrink-0">
                                    <img src="assets/img/180 Cafe - Bandung 1.png" class="w-full h-full object-cover rounded-xl" alt="Wishlist">

                                    <!-- BOOKMARK -->
                                    <button 
                                    onclick="this.classList.toggle('bg-[#FBB45E]'); this.classList.toggle('text-[#363B58]'); this.classList.toggle('bg-[#FFF8EF]'); this.classList.toggle('text-[#FBB45E]');"
                                    class="wishlist-btn absolute top-2 right-2 bg-[#FBB45E] text-[#363B58] rounded-full w-8 h-8 flex items-center justify-center shadow-md cursor-pointer transition-all duration-200"
                                    style="font-variation-settings: 'FILL' 1;">
                                        <span class="material-symbols-outlined">bookmark</span>
                                    </button>
                                </div>

                                <!-- CONTENT -->
                                <div class="flex flex-col gap-2 flex-1">
                                    <!-- TOP -->
                                    <div class="flex flex-col gap-1">
                                        <div class="flex justify-between items-center">
                                            <span class="text-[#FBB45E] font-bold text-xs">CAFE</span>
                                            <div class="flex items-center gap-1">
                                                <span class="material-symbols-outlined text-yellow-500 text-sm"
                                                    style="font-variation-settings: 'FILL' 1;">star</span>
                                                <span class="text-sm font-medium">4.8 (20)</span>
                                            </div>
                                        </div>

                                        <h3 class="font-bold text-base">Alam Cafe</h3>

                                        <div class="flex items-center gap-1 text-gray-500 text-xs">
                                            <span class="material-symbols-outlined text-sm">location_on</span>
                                            <span>4.5km | Ciwidey, Bandung</span>
                                        </div>

                                        <div class="flex items-center gap-1 text-gray-500 text-xs">
                                            <span class="material-symbols-outlined text-sm">payments</span>
                                            <span>Rp50.000 - Rp100.000</span>
                                        </div>
                                    </div>

                                    <!-- BUTTON -->
                                    <div class="flex gap-2 mt-2">
                                        <button class="flex-1 bg-gray-800 text-[#FBB45E] py-2 rounded-xl text-sm font-semibold flex items-center justify-center gap-1">
                                            <span class="material-symbols-outlined text-sm">location_on</span> 
                                            Lihat Lokasi
                                        </button>

                                        <button class="bg-[#FBB45E] text-white w-10 h-10 rounded-xl flex items-center justify-center">
                                            <span class="material-symbols-outlined text-sm">share</span>
                                        </button>
                                    </div>

                                </div>
                            </div>
                            <div class="flex gap-4 bg-white rounded-xl border border-gray-100 p-4 h-fit w-[500px] flex-shrink-0 shadow-sm">
                                <!-- IMAGE -->
                                <div class="relative w-40 h-40 flex-shrink-0">
                                    <img src="assets/img/180 Cafe - Bandung 1.png" class="w-full h-full object-cover rounded-xl" alt="Wishlist">

                                    <!-- BOOKMARK -->
                                    <button 
                                    onclick="this.classList.toggle('bg-[#FBB45E]'); this.classList.toggle('text-[#363B58]'); this.classList.toggle('bg-[#FFF8EF]'); this.classList.toggle('text-[#FBB45E]');"
                                    class="wishlist-btn absolute top-2 right-2 bg-[#FBB45E] text-[#363B58] rounded-full w-8 h-8 flex items-center justify-center shadow-md cursor-pointer transition-all duration-200"
                                    style="font-variation-settings: 'FILL' 1;">
                                        <span class="material-symbols-outlined">bookmark</span>
                                    </button>
                                </div>

                                <!-- CONTENT -->
                                <div class="flex flex-col gap-2 flex-1">
                                    <!-- TOP -->
                                    <div class="flex flex-col gap-1">
                                        <div class="flex justify-between items-center">
                                            <span class="text-[#FBB45E] font-bold text-xs">CAFE</span>
                                            <div class="flex items-center gap-1">
                                                <span class="material-symbols-outlined text-yellow-500 text-sm"
                                                    style="font-variation-settings: 'FILL' 1;">star</span>
                                                <span class="text-sm font-medium">4.8 (20)</span>
                                            </div>
                                        </div>

                                        <h3 class="font-bold text-base">Alam Cafe</h3>

                                        <div class="flex items-center gap-1 text-gray-500 text-xs">
                                            <span class="material-symbols-outlined text-sm">location_on</span>
                                            <span>4.5km | Ciwidey, Bandung</span>
                                        </div>

                                        <div class="flex items-center gap-1 text-gray-500 text-xs">
                                            <span class="material-symbols-outlined text-sm">payments</span>
                                            <span>Rp50.000 - Rp100.000</span>
                                        </div>
                                    </div>

                                    <!-- BUTTON -->
                                    <div class="flex gap-2 mt-2">
                                        <button class="flex-1 bg-gray-800 text-[#FBB45E] py-2 rounded-xl text-sm font-semibold flex items-center justify-center gap-1">
                                            <span class="material-symbols-outlined text-sm">location_on</span> 
                                            Lihat Lokasi
                                        </button>

                                        <button class="bg-[#FBB45E] text-white w-10 h-10 rounded-xl flex items-center justify-center">
                                            <span class="material-symbols-outlined text-sm">share</span>
                                        </button>
                                    </div>

                                </div>
                            </div>
                            <div class="flex gap-4 bg-white rounded-xl border border-gray-100 p-4 h-fit w-[500px] flex-shrink-0 shadow-sm">
                                <!-- IMAGE -->
                                <div class="relative w-40 h-40 flex-shrink-0">
                                    <img src="assets/img/180 Cafe - Bandung 1.png" class="w-full h-full object-cover rounded-xl" alt="Wishlist">

                                    <!-- BOOKMARK -->
                                    <button 
                                    onclick="this.classList.toggle('bg-[#FBB45E]'); this.classList.toggle('text-[#363B58]'); this.classList.toggle('bg-[#FFF8EF]'); this.classList.toggle('text-[#FBB45E]');"
                                    class="wishlist-btn absolute top-2 right-2 bg-[#FBB45E] text-[#363B58] rounded-full w-8 h-8 flex items-center justify-center shadow-md cursor-pointer transition-all duration-200"
                                    style="font-variation-settings: 'FILL' 1;">
                                        <span class="material-symbols-outlined">bookmark</span>
                                    </button>
                                </div>

                                <!-- CONTENT -->
                                <div class="flex flex-col gap-2 flex-1">
                                    <!-- TOP -->
                                    <div class="flex flex-col gap-1">
                                        <div class="flex justify-between items-center">
                                            <span class="text-[#FBB45E] font-bold text-xs">CAFE</span>
                                            <div class="flex items-center gap-1">
                                                <span class="material-symbols-outlined text-yellow-500 text-sm"
                                                    style="font-variation-settings: 'FILL' 1;">star</span>
                                                <span class="text-sm font-medium">4.8 (20)</span>
                                            </div>
                                        </div>

                                        <h3 class="font-bold text-base">Alam Cafe</h3>

                                        <div class="flex items-center gap-1 text-gray-500 text-xs">
                                            <span class="material-symbols-outlined text-sm">location_on</span>
                                            <span>4.5km | Ciwidey, Bandung</span>
                                        </div>

                                        <div class="flex items-center gap-1 text-gray-500 text-xs">
                                            <span class="material-symbols-outlined text-sm">payments</span>
                                            <span>Rp50.000 - Rp100.000</span>
                                        </div>
                                    </div>

                                    <!-- BUTTON -->
                                    <div class="flex gap-2 mt-2">
                                        <button class="flex-1 bg-gray-800 text-[#FBB45E] py-2 rounded-xl text-sm font-semibold flex items-center justify-center gap-1">
                                            <span class="material-symbols-outlined text-sm">location_on</span> 
                                            Lihat Lokasi
                                        </button>

                                        <button class="bg-[#FBB45E] text-white w-10 h-10 rounded-xl flex items-center justify-center">
                                            <span class="material-symbols-outlined text-sm">share</span>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="/chatbot" class="fixed bottom-5 right-5 z-50 bg-[#FBB45E] text-[#363B58] w-14 h-14 rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition" style="font-variation-settings: 'FILL' 1;">
            <span class="material-symbols-outlined text-2xl">smart_toy</span>
        </a>
    </div>

@endsection