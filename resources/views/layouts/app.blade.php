<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />

    <!-- Tailwind -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="min-h-screen font-[Poppins]">

    <!-- NAVBAR -->
    <header class="bg-white border-b border-gray-300 sticky top-0 z-50 shadow-sm">
        
        <!-- DESKTOP LAYOUT -->
        <div class="hidden md:block container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <a href="/" class="flex items-center gap-2">
                    <img src="assets/img/Locana_Logo 1.png" class="h-10 object-contain" alt="Logo">
                    <span class="font-bold text-xl text-gray-800">LOCANA</span>
                </a>
                <div class="flex flex-row-reverse gap-4 items-center">
                    <div class="relative" id="profileDropdown">
                        <button id="dropdownButton" class="flex items-center gap-2 hover:bg-gray-100 px-2 py-1 rounded-lg transition">
                            <img src="{{ auth()->user()->fotoProfile ? asset(auth()->user()->fotoProfile) : asset('assets/img/nanamin.jpg') }}" class="w-10 h-10 rounded-full object-cover">
                            <div class="flex flex-col items-end leading-tight">
                                <span class="text-sm font-semibold">{{ auth()->user()->nama }}</span>
                                <span class="text-xs text-gray-500">{{ auth()->user()->username }}</span>
                            </div>
                            <span id="arrowIcon" class="material-symbols-outlined transition-transform duration-300">expand_more</span>
                        </button>
                        <div id="dropdownMenu" class="absolute right-0 mt-2 w-60 bg-white rounded-xl shadow-lg border z-50 opacity-0 scale-95 pointer-events-none transition-all duration-200 ease-out">
                            <ul class="py-2 text-sm text-gray-700">
                                <a href="/home"><li class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100"><span class="material-symbols-outlined text-gray-500">home</span>Beranda</li></a>
                                <a href="/profile"><li class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100"><span class="material-symbols-outlined text-gray-500">person</span>Profile</li></a>
                                <a href="/wishlist"><li class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100"><span class="material-symbols-outlined text-gray-500">favorite</span>Wishlist</li></a>
                                <a href="/security"><li class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100"><span class="material-symbols-outlined text-gray-500">security</span>Privasi & Keamanan</li></a>
                                <a href="/help"><li class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100"><span class="material-symbols-outlined text-gray-500">help</span>Bantuan</li></a>
                                <hr class="my-1">
                                <a onclick="bukaModalLogout()"><li class="flex items-center gap-3 px-4 py-2 hover:bg-red-50 text-red-500"><span class="material-symbols-outlined">logout</span>Keluar</li></a>
                            </ul>
                        </div>
                    </div>
                    <div class="relative bg-slate-100 border rounded-lg border-slate-200">
                        <span class="material-symbols-outlined absolute left-3 top-2.5 text-[#363B58]">search</span>
                        <input type="text" placeholder="Telusuri" class="pl-10 pr-4 py-2 w-64 placeholder-[#363B58]">
                    </div>
                </div>
            </div>
        </div>

        <!-- MOBILE LAYOUT -->
        <div class="md:hidden px-4 py-3">
            <div class="flex justify-between items-center">
                <a href="/" class="flex items-center gap-2">
                    <img src="assets/img/Locana_Logo 1.png" class="h-7 object-contain" alt="Logo">
                    <span class="font-bold text-base text-gray-800">LOCANA</span>
                </a>
                <div class="flex items-center gap-2">
                    <!-- FILTER BUTTON - cuma di home -->
                    @if(request()->is('/') || request()->is('home'))
                    <button id="filterBtn" class="p-2 rounded-lg hover:bg-gray-100 transition">
                        <span class="material-symbols-outlined text-2xl text-[#363B58]">tune</span>
                    </button>
                    @endif
                    <button id="hamburgerBtn" class="p-2 rounded-lg hover:bg-gray-100 transition">
                        <span class="material-symbols-outlined text-2xl text-[#363B58]">menu</span>
                    </button>
                </div>
            </div>
            <div class="mt-3">
                <div class="relative bg-slate-100 border rounded-lg border-slate-200 w-full">
                    <span class="material-symbols-outlined absolute left-3 top-2 text-[#363B58] text-base">search</span>
                    <input type="text" placeholder="Telusuri" class="pl-9 pr-4 py-2 w-full placeholder-[#363B58] text-sm rounded-lg bg-transparent">
                </div>
            </div>
        </div>
    </header>

    <!-- FILTER SIDEBAR - cuma di home -->
    @if(request()->is('/') || request()->is('home'))
    <div id="filterSidebar" class="fixed inset-0 z-50 hidden md:hidden">
        <div id="filterOverlay" class="absolute inset-0 bg-black/50 transition-opacity duration-300 opacity-0"></div>
        <div id="filterContent" class="absolute left-0 top-0 h-full w-80 bg-white shadow-2xl transform -translate-x-full transition-transform duration-300 ease-out overflow-y-auto">
            <div class="p-4 border-b border-gray-200 flex justify-between items-center sticky top-0 bg-white z-10">
                <h2 class="font-bold text-xl text-[#363B58]">Filters</h2>
                <div class="flex items-center gap-2">
                    <button id="resetFilters" class="text-[#FBB45E] text-sm font-semibold">RESET</button>
                    <button id="closeFilterBtn" class="p-2 hover:bg-gray-100 rounded-lg">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>
            </div>
            <div class="p-4">
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
                <button class="mt-3 bg-[#FBB45E] hover:bg-[#E2A255] w-full px-5 py-2 rounded-lg text-md font-bold flex gap-1 justify-center items-center transition">Terapkan Filter</button>
            </div>
        </div>
    </div>
    @endif

    <!-- MENU SIDEBAR (KANAN) - SEMUA HALAMAN -->
    <div id="menuSidebar" class="fixed inset-0 z-50 hidden md:hidden">
        <div id="menuOverlay" class="absolute inset-0 bg-black/50 transition-opacity duration-300 opacity-0"></div>
        <div id="menuContent" class="absolute right-0 top-0 h-full w-80 bg-white shadow-2xl transform translate-x-full transition-transform duration-300 ease-out">
            <div class="flex flex-col h-full">
                <div class="p-4 border-b border-gray-200 flex justify-between items-start">
                    <div class="flex items-center gap-3">
                        <img src="{{ auth()->user()->fotoProfile ? asset(auth()->user()->fotoProfile) : asset('assets/img/nanamin.jpg') }}" class="w-12 h-12 rounded-full object-cover">
                        <div>
                            <p class="font-semibold text-base">{{ auth()->user()->nama }}</p>
                            <p class="text-xs text-gray-500">{{ auth()->user()->username }}</p>
                        </div>
                    </div>
                    <button id="closeMenuBtn" class="p-2 hover:bg-gray-100 rounded-lg">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>
                <nav class="flex-1 py-2">
                    <a href="/home" class="flex items-center gap-3 px-4 py-3 text-[#363B58] hover:bg-gray-50 transition border-l-4 border-transparent hover:border-[#FBB45E]">
                        <span class="material-symbols-outlined text-gray-500">home</span> Home
                    </a>
                    <a href="/profile" class="flex items-center gap-3 px-4 py-3 text-[#363B58] hover:bg-gray-50 transition border-l-4 border-transparent hover:border-[#FBB45E]">
                        <span class="material-symbols-outlined text-gray-500">person</span> Profile
                    </a>
                    <a href="/wishlist" class="flex items-center gap-3 px-4 py-3 text-[#363B58] hover:bg-gray-50 transition border-l-4 border-transparent hover:border-[#FBB45E]">
                        <span class="material-symbols-outlined text-gray-500">favorite</span> Wishlist
                    </a>
                    <a href="/security" class="flex items-center gap-3 px-4 py-3 text-[#363B58] hover:bg-gray-50 transition border-l-4 border-transparent hover:border-[#FBB45E]">
                        <span class="material-symbols-outlined text-gray-500">security</span> Privasi & Keamanan
                    </a>
                    <a href="/help" class="flex items-center gap-3 px-4 py-3 text-[#363B58] hover:bg-gray-50 transition border-l-4 border-transparent hover:border-[#FBB45E]">
                        <span class="material-symbols-outlined text-gray-500">help</span> Bantuan
                    </a>
                    <div class="h-px bg-gray-200 my-2 mx-4"></div>
                    <a onclick="bukaModalLogout()" class="flex items-center gap-3 px-4 py-3 text-red-500 hover:bg-red-50 transition">
                        <span class="material-symbols-outlined">logout</span> Keluar
                    </a>
                </nav>
                <div class="p-4 border-t border-gray-200">
                    <div class="flex items-center gap-2 text-xs text-gray-400">
                        <span>© 2024 LOCANA</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main>
        @yield('content')
    </main>

    <a href="/chatbot" class="fixed bottom-5 right-5 z-50 bg-[#FBB45E] text-[#363B58] w-14 h-14 rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition" style="font-variation-settings: 'FILL' 1;" title="Chatbot">
        <span class="material-symbols-outlined text-2xl">smart_toy</span>
    </a>

    @include('components.modal-logout')
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>