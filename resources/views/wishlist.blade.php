@extends('layouts.app')

@section('title', 'Homepage')

@section('content')

    <div class="flex flex-col overflow-x-hidden">
        <div class="flex flex-col md:flex-row">
            <!-- SIDEBAR KIRI - MEPET KE KIRI -->
            <aside class="w-80 shrink-0 bg-white shadow p-6 h-fill sticky border border-gray-200 transition-all duration-300 overflow-hidden max-md:hidden">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Setelan Akun</h2>
                <nav class="space-y-1">
                    <a href="/profile"><div class="flex items-center gap-3 px-4 py-3 rounded-xl text-[#363B58] hover:text-[#E2A255] cursor-pointer">
                        <span class="material-symbols-outlined">person</span>
                        <span>Profil</span>
                    </div></a>
                    <a href="wishlist.html"><div class="flex items-center gap-3 px-4 py-3 rounded-xl bg-orange-50 text-[#FBB45E] font-semibold hover:bg-[#FEE8CD]">
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

            <main class="flex-row gap-10 overflow-hidden">
        <div class="flex flex-col gap-5 mt-5">
            <div class="flex flex-col gap-5
                        max-md:flex-none">
                <div class="flex gap-[200px] ml-[60px] mr-[60px] justify-between items-center self-stretch
                            max-md:ml-[30px] max-md:mr-[30px] max-md:gap-[70px]">
                    <div class="flex flex-col gap-2.5">
                        <h1 class="text-[#31354F] font-extrabold text-3xl
                                    max-md:2xl">Wishlist</h1>
                        <p class="text-[#31354F] text-[1rem]
                                    max-md:text-[10px]">Tempat-Tempat Favorit yang Pengen Kamu Kunjungi</p>
                    </div>
                    <div class="flex items-center bg-[#fbb45e] px-5 text-[#363B58] rounded-[10px] w-32 gap-2.5 text-[15px] font-semibold
                                max-md:px-2 py-[5px] max-md:text-[10px] max-md:w-40">
                        <span class="material-symbols-outlined " 
                                    style="font-size:17px;">select_check_box</span>Select
                    </div>
                </div>    

                <!-- CARD -->
        
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 px-[60px] py-5
                        max-md:px-[15px] max-md:grid-cols-2 max-md:gap-5">

                <!-- CARD ITEM -->
                <div class="flex flex-col bg-white rounded-[30px] p-5 border border-[#E2E8F0] w-60 h-106
                            max-md:w-40 max-md:h-87">
                    <div class="relative w-50 h-50 shrink-0
                                max-md:w-30 max-md:h-30">
                        <img src="assets/img/180 Cafe - Bandung 1.png" class="w-full h-full object-cover rounded-xl" alt="Wishlist">
                        <!-- BOOKMARK -->
                       <button 
                            onclick="this.classList.toggle('bg-[#FBB45E]'); this.classList.toggle('text-[#363B58]'); this.classList.toggle('bg-white'); this.classList.toggle('text-[#FBB45E]');"
                            class="wishlist-btn absolute top-2 right-2 bg-white text-[#FBB45E] rounded-full w-8 h-8  flex items-center justify-center shadow-md cursor-pointer transition-all duration-200"
                            style="font-variation-settings: 'FILL' 1;"
                        >
                            <span class="material-symbols-outlined">bookmark</span>
                        </button>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <h5 class="text-[#fbb45e] text-xs font-bold
                                    max-md:text-[10px]">CAFE</h5>
                        <div class="flex items-center gap-1 text-sm font-medium
                                    max-md:text-[10px]">
                            <span class="material-symbols-outlined text-[#fbb45e] [font-variation-settings:'FILL'_1]"
                                    style="font-size:20px">
                                star
                            </span>
                            <p>4.8 (20)</p>
                        </div>
                    </div>
                    <h4 class="text-base font-bold text-[#000000]
                                max-md:text-sm max-md:mt-[5px]">Alam Cafe</h4>
                    <div class="flex items-center text-xs gap-1 mt-2 text-[#363B58]
                                max-md:text-[10px]">
                        <span class="material-symbols-outlined text-sm">
                            location_on
                        </span>
                        <p>4.5km | Ciwidey, Bandung</p>
                    </div>
                    <div class="flex items-center gap-1 text-xs mt-2 text-[#363B58]
                                max-md:text-[10px]">
                        <span class="material-symbols-outlined text-sm">
                            payments
                        </span>
                        <p>Rp50.000 - Rp100.000</p>
                    </div>
                    <div class="flex gap-3 mt-4 max-md:gap-1
                    ">
                        <button class="flex-1 bg-gray-800 text-[#FBB45E] py-2 rounded-xl text-sm font-semibold flex items-center justify-center gap-1
                                        max-md:text-[7px] max-md:gap-0.5 max-md:py-1">
                            <span class="material-symbols-outlined text-sm"
                                    style="font-size:20px">location_on</span> 
                                Lihat Lokasi
                        </button>

                        <button class="bg-[#FBB45E] text-white w-10 h-10 rounded-xl flex items-center justify-center">
                            <span class="material-symbols-outlined text-sm max-md:text-xs">share</span>
                        </button>
                    </div>
                </div>

                <!-- CARD ITEM -->
                <div class="flex flex-col bg-white rounded-[30px] p-5 border border-[#E2E8F0] w-60 h-106
                            max-md:w-40 max-md:h-87">
                    <div class="relative w-50 h-50 shrink-0
                                max-md:w-30 max-md:h-30">
                        <img src="assets/img/180 Cafe - Bandung 1.png" class="w-full h-full object-cover rounded-xl" alt="Wishlist">
                        <!-- BOOKMARK -->
                       <button 
                            onclick="this.classList.toggle('bg-[#FBB45E]'); this.classList.toggle('text-[#363B58]'); this.classList.toggle('bg-white'); this.classList.toggle('text-[#FBB45E]');"
                            class="wishlist-btn absolute top-2 right-2 bg-white text-[#FBB45E] rounded-full w-8 h-8  flex items-center justify-center shadow-md cursor-pointer transition-all duration-200"
                            style="font-variation-settings: 'FILL' 1;"
                        >
                            <span class="material-symbols-outlined">bookmark</span>
                        </button>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <h5 class="text-[#fbb45e] text-xs font-bold
                                    max-md:text-[10px]">CAFE</h5>
                        <div class="flex items-center gap-1 text-sm font-medium
                                    max-md:text-[10px]">
                            <span class="material-symbols-outlined text-[#fbb45e] [font-variation-settings:'FILL'_1]"
                                    style="font-size:20px">
                                star
                            </span>
                            <p>4.8 (20)</p>
                        </div>
                    </div>
                    <h4 class="text-base font-bold text-[#000000]
                                max-md:text-sm max-md:mt-[5px]">Alam Cafe</h4>
                    <div class="flex items-center text-xs gap-1 mt-2 text-[#363B58]
                                max-md:text-[10px]">
                        <span class="material-symbols-outlined text-sm">
                            location_on
                        </span>
                        <p>4.5km | Ciwidey, Bandung</p>
                    </div>
                    <div class="flex items-center gap-1 text-xs mt-2 text-[#363B58]
                                max-md:text-[10px]">
                        <span class="material-symbols-outlined text-sm">
                            payments
                        </span>
                        <p>Rp50.000 - Rp100.000</p>
                    </div>
                    <div class="flex gap-3 mt-4 max-md:gap-1
                    ">
                        <button class="flex-1 bg-gray-800 text-[#FBB45E] py-2 rounded-xl text-sm font-semibold flex items-center justify-center gap-1
                                        max-md:text-[7px] max-md:gap-0.5 max-md:py-1">
                            <span class="material-symbols-outlined text-sm"
                                    style="font-size:20px">location_on</span> 
                                Lihat Lokasi
                        </button>

                        <button class="bg-[#FBB45E] text-white w-10 h-10 rounded-xl flex items-center justify-center">
                            <span class="material-symbols-outlined text-sm max-md:text-xs">share</span>
                        </button>
                    </div>
                </div>


                <!-- CARD ITEM -->
                <div class="flex flex-col bg-white rounded-[30px] p-5 border border-[#E2E8F0] w-60 h-106
                            max-md:w-40 max-md:h-87">
                    <div class="relative w-50 h-50 shrink-0
                                max-md:w-30 max-md:h-30">
                        <img src="assets/img/180 Cafe - Bandung 1.png" class="w-full h-full object-cover rounded-xl" alt="Wishlist">
                        <!-- BOOKMARK -->
                       <button 
                            onclick="this.classList.toggle('bg-[#FBB45E]'); this.classList.toggle('text-[#363B58]'); this.classList.toggle('bg-white'); this.classList.toggle('text-[#FBB45E]');"
                            class="wishlist-btn absolute top-2 right-2 bg-white text-[#FBB45E] rounded-full w-8 h-8  flex items-center justify-center shadow-md cursor-pointer transition-all duration-200"
                            style="font-variation-settings: 'FILL' 1;"
                        >
                            <span class="material-symbols-outlined">bookmark</span>
                        </button>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <h5 class="text-[#fbb45e] text-xs font-bold
                                    max-md:text-[10px]">CAFE</h5>
                        <div class="flex items-center gap-1 text-sm font-medium
                                    max-md:text-[10px]">
                            <span class="material-symbols-outlined text-[#fbb45e] [font-variation-settings:'FILL'_1]"
                                    style="font-size:20px">
                                star
                            </span>
                            <p>4.8 (20)</p>
                        </div>
                    </div>
                    <h4 class="text-base font-bold text-[#000000]
                                max-md:text-sm max-md:mt-[5px]">Alam Cafe</h4>
                    <div class="flex items-center text-xs gap-1 mt-2 text-[#363B58]
                                max-md:text-[10px]">
                        <span class="material-symbols-outlined text-sm">
                            location_on
                        </span>
                        <p>4.5km | Ciwidey, Bandung</p>
                    </div>
                    <div class="flex items-center gap-1 text-xs mt-2 text-[#363B58]
                                max-md:text-[10px]">
                        <span class="material-symbols-outlined text-sm">
                            payments
                        </span>
                        <p>Rp50.000 - Rp100.000</p>
                    </div>
                    <div class="flex gap-3 mt-4 max-md:gap-1
                    ">
                        <button class="flex-1 bg-gray-800 text-[#FBB45E] py-2 rounded-xl text-sm font-semibold flex items-center justify-center gap-1
                                        max-md:text-[7px] max-md:gap-0.5 max-md:py-1">
                            <span class="material-symbols-outlined text-sm"
                                    style="font-size:20px">location_on</span> 
                                Lihat Lokasi
                        </button>

                        <button class="bg-[#FBB45E] text-white w-10 h-10 rounded-xl flex items-center justify-center">
                            <span class="material-symbols-outlined text-sm max-md:text-xs">share</span>
                        </button>
                    </div>
                </div>



            <!-- CARD ITEM -->
                <div class="flex flex-col bg-white rounded-[30px] p-5 border border-[#E2E8F0] w-60 h-106
                            max-md:w-40 max-md:h-87">
                    <div class="relative w-50 h-50 shrink-0
                                max-md:w-30 max-md:h-30">
                        <img src="assets/img/180 Cafe - Bandung 1.png" class="w-full h-full object-cover rounded-xl" alt="Wishlist">
                        <!-- BOOKMARK -->
                       <button 
                            onclick="this.classList.toggle('bg-[#FBB45E]'); this.classList.toggle('text-[#363B58]'); this.classList.toggle('bg-white'); this.classList.toggle('text-[#FBB45E]');"
                            class="wishlist-btn absolute top-2 right-2 bg-white text-[#FBB45E] rounded-full w-8 h-8  flex items-center justify-center shadow-md cursor-pointer transition-all duration-200"
                            style="font-variation-settings: 'FILL' 1;"
                        >
                            <span class="material-symbols-outlined">bookmark</span>
                        </button>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <h5 class="text-[#fbb45e] text-xs font-bold
                                    max-md:text-[10px]">CAFE</h5>
                        <div class="flex items-center gap-1 text-sm font-medium
                                    max-md:text-[10px]">
                            <span class="material-symbols-outlined text-[#fbb45e] [font-variation-settings:'FILL'_1]"
                                    style="font-size:20px">
                                star
                            </span>
                            <p>4.8 (20)</p>
                        </div>
                    </div>
                    <h4 class="text-base font-bold text-[#000000]
                                max-md:text-sm max-md:mt-[5px]">Alam Cafe</h4>
                    <div class="flex items-center text-xs gap-1 mt-2 text-[#363B58]
                                max-md:text-[10px]">
                        <span class="material-symbols-outlined text-sm">
                            location_on
                        </span>
                        <p>4.5km | Ciwidey, Bandung</p>
                    </div>
                    <div class="flex items-center gap-1 text-xs mt-2 text-[#363B58]
                                max-md:text-[10px]">
                        <span class="material-symbols-outlined text-sm">
                            payments
                        </span>
                        <p>Rp50.000 - Rp100.000</p>
                    </div>
                    <div class="flex gap-3 mt-4 max-md:gap-1
                    ">
                        <button class="flex-1 bg-gray-800 text-[#FBB45E] py-2 rounded-xl text-sm font-semibold flex items-center justify-center gap-1
                                        max-md:text-[7px] max-md:gap-0.5 max-md:py-1">
                            <span class="material-symbols-outlined text-sm"
                                    style="font-size:20px">location_on</span> 
                                Lihat Lokasi
                        </button>

                        <button class="bg-[#FBB45E] text-white w-10 h-10 rounded-xl flex items-center justify-center">
                            <span class="material-symbols-outlined text-sm max-md:text-xs">share</span>
                        </button>
                    </div>
                </div>

                <!-- CARD ITEM -->
                <div class="flex flex-col bg-white rounded-[30px] p-5 border border-[#E2E8F0] w-60 h-106
                            max-md:w-40 max-md:h-87">
                    <div class="relative w-50 h-50 shrink-0
                                max-md:w-30 max-md:h-30">
                        <img src="assets/img/180 Cafe - Bandung 1.png" class="w-full h-full object-cover rounded-xl" alt="Wishlist">
                        <!-- BOOKMARK -->
                       <button 
                            onclick="this.classList.toggle('bg-[#FBB45E]'); this.classList.toggle('text-[#363B58]'); this.classList.toggle('bg-white'); this.classList.toggle('text-[#FBB45E]');"
                            class="wishlist-btn absolute top-2 right-2 bg-white text-[#FBB45E] rounded-full w-8 h-8  flex items-center justify-center shadow-md cursor-pointer transition-all duration-200"
                            style="font-variation-settings: 'FILL' 1;"
                        >
                            <span class="material-symbols-outlined">bookmark</span>
                        </button>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <h5 class="text-[#fbb45e] text-xs font-bold
                                    max-md:text-[10px]">CAFE</h5>
                        <div class="flex items-center gap-1 text-sm font-medium
                                    max-md:text-[10px]">
                            <span class="material-symbols-outlined text-[#fbb45e] [font-variation-settings:'FILL'_1]"
                                    style="font-size:20px">
                                star
                            </span>
                            <p>4.8 (20)</p>
                        </div>
                    </div>
                    <h4 class="text-base font-bold text-[#000000]
                                max-md:text-sm max-md:mt-[5px]">Alam Cafe</h4>
                    <div class="flex items-center text-xs gap-1 mt-2 text-[#363B58]
                                max-md:text-[10px]">
                        <span class="material-symbols-outlined text-sm">
                            location_on
                        </span>
                        <p>4.5km | Ciwidey, Bandung</p>
                    </div>
                    <div class="flex items-center gap-1 text-xs mt-2 text-[#363B58]
                                max-md:text-[10px]">
                        <span class="material-symbols-outlined text-sm">
                            payments
                        </span>
                        <p>Rp50.000 - Rp100.000</p>
                    </div>
                    <div class="flex gap-3 mt-4 max-md:gap-1
                    ">
                        <button class="flex-1 bg-gray-800 text-[#FBB45E] py-2 rounded-xl text-sm font-semibold flex items-center justify-center gap-1
                                        max-md:text-[7px] max-md:gap-0.5 max-md:py-1">
                            <span class="material-symbols-outlined text-sm"
                                    style="font-size:20px">location_on</span> 
                                Lihat Lokasi
                        </button>

                        <button class="bg-[#FBB45E] text-white w-10 h-10 rounded-xl flex items-center justify-center">
                            <span class="material-symbols-outlined text-sm max-md:text-xs">share</span>
                        </button>
                    </div>
                </div>


                <!-- CARD ITEM -->
                <div class="flex flex-col bg-white rounded-[30px] p-5 border border-[#E2E8F0] w-60 h-106
                            max-md:w-40 max-md:h-87">
                    <div class="relative w-50 h-50 shrink-0
                                max-md:w-30 max-md:h-30">
                        <img src="assets/img/180 Cafe - Bandung 1.png" class="w-full h-full object-cover rounded-xl" alt="Wishlist">
                        <!-- BOOKMARK -->
                       <button 
                            onclick="this.classList.toggle('bg-[#FBB45E]'); this.classList.toggle('text-[#363B58]'); this.classList.toggle('bg-white'); this.classList.toggle('text-[#FBB45E]');"
                            class="wishlist-btn absolute top-2 right-2 bg-white text-[#FBB45E] rounded-full w-8 h-8  flex items-center justify-center shadow-md cursor-pointer transition-all duration-200"
                            style="font-variation-settings: 'FILL' 1;"
                        >
                            <span class="material-symbols-outlined">bookmark</span>
                        </button>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <h5 class="text-[#fbb45e] text-xs font-bold
                                    max-md:text-[10px]">CAFE</h5>
                        <div class="flex items-center gap-1 text-sm font-medium
                                    max-md:text-[10px]">
                            <span class="material-symbols-outlined text-[#fbb45e] [font-variation-settings:'FILL'_1]"
                                    style="font-size:20px">
                                star
                            </span>
                            <p>4.8 (20)</p>
                        </div>
                    </div>
                    <h4 class="text-base font-bold text-[#000000]
                                max-md:text-sm max-md:mt-[5px]">Alam Cafe</h4>
                    <div class="flex items-center text-xs gap-1 mt-2 text-[#363B58]
                                max-md:text-[10px]">
                        <span class="material-symbols-outlined text-sm">
                            location_on
                        </span>
                        <p>4.5km | Ciwidey, Bandung</p>
                    </div>
                    <div class="flex items-center gap-1 text-xs mt-2 text-[#363B58]
                                max-md:text-[10px]">
                        <span class="material-symbols-outlined text-sm">
                            payments
                        </span>
                        <p>Rp50.000 - Rp100.000</p>
                    </div>
                    <div class="flex gap-3 mt-4 max-md:gap-1
                    ">
                        <button class="flex-1 bg-gray-800 text-[#FBB45E] py-2 rounded-xl text-sm font-semibold flex items-center justify-center gap-1
                                        max-md:text-[7px] max-md:gap-0.5 max-md:py-1">
                            <span class="material-symbols-outlined text-sm"
                                    style="font-size:20px">location_on</span> 
                                Lihat Lokasi
                        </button>

                        <button class="bg-[#FBB45E] text-white w-10 h-10 rounded-xl flex items-center justify-center">
                            <span class="material-symbols-outlined text-sm max-md:text-xs">share</span>
                        </button>
                    </div>
                </div>

                </div>

            </div>
        </div>
    </main>
        <a href="/chatbot" class="fixed bottom-5 right-5 z-50 bg-[#FBB45E] text-[#363B58] w-14 h-14 rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition" style="font-variation-settings: 'FILL' 1;">
            <span class="material-symbols-outlined text-2xl">smart_toy</span>
        </a>
    </div>

@endsection