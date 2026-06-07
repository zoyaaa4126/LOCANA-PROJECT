<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />

        <!-- Tailwind -->
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>
    @stack('scripts')
    <body class="bg-[#FAFAFA] text-[#333]">

    <header class="bg-white border-b border-gray-300 sticky top-0 z-50 shadow-sm">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">

            <!-- Logo -->
            <div class="flex items-center gap-2">
                <img src="{{ asset('assets/img/Locana_Logo 1.png') }}" class="h-10 object-contain" alt="Logo">
                <span class="font-bold text-xl max-md:text-sm text-gray-800">LOCANA Admin</span>
            </div>

            <!-- Right -->
            <div class="flex items-center gap-3">

                <!-- PROFILE -->
                <div class="flex items-center gap-2">
                    <a href="/admin/profile-admin" class="flex items-center gap-2">
                    @if(Auth::user()->fotoProfile)
                        <img src="{{ asset('storage/' . Auth::user()->fotoProfile) }}" 
                            class=" w-10 h-10 max-md:w-9 max-md:h-9 rounded-full object-cover" alt="Profile">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->nama) }}&background=FBB45E&color=363B58" 
                            class=" w-10 h-10 max-md:w-9 max-md:h-9 rounded-full object-cover" alt="Profile">
                    @endif
                    <div class="hidden md:flex flex-col leading-tight">
                        <span class="text-sm font-semibold">{{ Auth::user()->nama }}</span>
                        <span class="text-xs text-gray-500">{{ Auth::user()->username }}</span>
                    </div>
                    </a>
                </div>

                <!-- HAMBURGER (MOBILE) -->
                <button id="menuBtn" class="md:hidden p-2 rounded-lg hover:bg-gray-100">
                    <span class="material-symbols-outlined">menu</span>
                </button>

            </div>
        </div>
    </header>

    <div class="flex">

        <!-- DESKTOP SIDEBAR -->
        <aside class="hidden md:block w-80 bg-white shadow p-6 border border-gray-200 min-h-screen">
            <h1 class="font-bold text-xl text-[#363B58] mb-4">Admin Panel</h1>

            <div class="space-y-3 text-[#363B58]" style="font-variation-settings:'FILL' 1;">
                <a href="/admin/dashboard" class="flex items-center gap-3 px-2 py-3 rounded-lg font-bold
                    {{ request()->is('admin/dashboard') ? 'bg-[#FEF4E7] text-[#FBB45E]' : 'hover:bg-gray-50' }}">
                    <span class="material-symbols-outlined">grid_view</span> Dashboard
                </a>

                <a href="/admin/lokasi" class="flex items-center gap-3 px-2 py-3 rounded-lg font-bold
                    {{ request()->is('admin/lokasi') ? 'bg-[#FEF4E7] text-[#FBB45E]' : 'hover:bg-gray-50' }}">
                    <span class="material-symbols-outlined">location_on</span> Lokasi
                </a>

                <a href="/admin/ulasan" class="flex items-center gap-3 px-2 py-3 rounded-lg font-bold
                    {{ request()->is('admin/ulasan') ? 'bg-[#FEF4E7] text-[#FBB45E]' : 'hover:bg-gray-50' }}">
                    <span class="material-symbols-outlined">rate_review</span> Ulasan
                </a>

                <a href="/admin/pengguna" class="flex items-center gap-3 px-2 py-3 rounded-lg font-bold
                    {{ request()->is('admin/pengguna') ? 'bg-[#FEF4E7] text-[#FBB45E]' : 'hover:bg-gray-50' }}">
                    <span class="material-symbols-outlined">person</span> Pengguna
                </a>
            </div>

            <hr class="my-4 border-slate-300">

            <div class="text-red-500 font-bold flex items-center gap-3 px-2 py-3 hover:bg-gray-50 rounded-lg cursor-pointer" onclick="bukaModalLogout()">
                <span class="material-symbols-outlined">logout</span> Logout
            </div>
        </aside>

        <!-- MOBILE SIDEBAR (SLIDE RIGHT) -->
        <div id="mobileSidebar"
            class="fixed top-0 right-0 w-72 h-full bg-white shadow-lg z-50 transform translate-x-full transition-transform duration-300 md:hidden">

            <div class="p-4 border-b flex justify-between items-center">
                <h1 class="font-bold text-lg">Menu</h1>
                <button id="closeBtn">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <div class="p-4 space-y-3">
                <a href="/admin/dashboard" class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50">
                    <span class="material-symbols-outlined">grid_view</span> Dashboard
                </a>

                <a href="/admin/lokasi" class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50">
                    <span class="material-symbols-outlined">location_on</span> Lokasi
                </a>

                <a href="/admin/ulasan" class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50">
                    <span class="material-symbols-outlined">rate_review</span> Ulasan
                </a>

                <a href="/admin/pengguna" class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50">
                    <span class="material-symbols-outlined">person</span> Pengguna
                </a>

                <div class="text-red-500 flex items-center gap-3 p-2 hover:bg-gray-50 rounded-lg cursor-pointer" onclick="bukaModalLogout()">
                    <span class="material-symbols-outlined">logout</span> Logout
                </div>
            </div>
        </div>

        <!-- OVERLAY -->
        <div id="overlay"
            class="fixed inset-0 bg-black/30 hidden z-40 md:hidden"></div>

        <!-- MAIN -->
        <main class="flex-1 p-4">
            @yield('content')
        </main>

    </div>

    @include('components.modal-logout')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('scripts')

    </body>
</html>