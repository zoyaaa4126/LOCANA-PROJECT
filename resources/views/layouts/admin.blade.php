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
<body class="bg-[#FAFAFA] text-[#333]">

    <header class="bg-white border-b border-gray-300 sticky top-0 z-50 shadow-sm">
    
        <div class="container mx-auto px-4 py-3 
                    flex justify-between items-center 
                    max-sm:grid max-sm:grid-cols-[1fr_auto] max-sm:gap-3">

            <!-- Logo -->
            <div class="flex items-center gap-2">
                <img src="assets/img/Locana_Logo 1.png" class="h-10 max-sm:h-6" alt="Logo">
                <span class="font-bold text-xl text-gray-800 max-sm:text-base">LOCANA Admin</span>
            </div>

            <!-- Right -->
            <div class="flex gap-4 flex-row-reverse max-sm:contents">
                <!-- PROFILE DROPDOWN -->
                <div class="relative" id="profileDropdown">
                    <div class="flex items-center gap-2 hover:bg-gray-100 px-2 py-1 rounded-lg transition">

                        <img src="assets/img/higuu.jpg"
                            class="w-10 h-10 max-sm:w-9 max-sm:h-9 rounded-full object-cover">

                        <div class="flex flex-col items-end max-sm:hidden leading-tight">
                            <span class="text-sm font-semibold">Higuruma Hiromi</span>
                            <span class="text-xs text-gray-500">Admin</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </header>

    <div class="flex flex-row gap-10 md:gap-0">

        <aside id="desktopSidebar" class="w-80 shrink-0 bg-white shadow p-6 h-fill sticky border border-gray-200 max-sm:w-full max-sm:static max-sm:hidden transition-all duration-300 overflow-hidden">
            <div class="flex justify-between items-center mb-4">
                <h1 class="font-bold text-xl text-[#363B58]">Admin Panel</h1>
            </div>
            <div class="mb-6" style="font-variation-settings:'FILL' 1;">
                <div class="space-y-3">
                    <a href="/dashboard">
                        <div class="flex items-center gap-3 px-2 py-4 rounded-lg font-bold text-[#363B58] cursor-pointer
                        {{ request()->is('dashboard') ? 'bg-[#FEF4E7] text-[#FBB45E]' : 'text-[#363B58] hover:bg-gray-50' }}">
                            <span class="material-symbols-outlined">grid_view</span> 
                            Dashboard
                        </div>
                    </a>
                    <a href="/lokasi">
                        <div class="flex items-center gap-3 px-2 py-4 rounded-lg font-bold text-[#363B58] cursor-pointer
                        {{ request()->is('lokasi') ? 'bg-[#FEF4E7] text-[#FBB45E]' : 'text-[#363B58] hover:bg-gray-50' }}">
                            <span class="material-symbols-outlined">location_on</span> 
                            Lokasi
                        </div>
                    </a>
                    <a href="/ulasan">
                        <div class="flex items-center gap-3 px-2 py-4 rounded-lg font-bold text-[#363B58] cursor-pointer
                        {{ request()->is('ulasan') ? 'bg-[#FEF4E7] text-[#FBB45E]' : 'text-[#363B58] hover:bg-gray-50' }}">
                            <span class="material-symbols-outlined">rate_review</span> 
                            Ulasan
                        </div>
                    </a>
                    <a href="/pengguna">
                        <div class="flex items-center gap-3 px-2 py-4 rounded-lg font-bold text-[#363B58] cursor-pointer
                        {{ request()->is('pengguna') ? 'bg-[#FEF4E7] text-[#FBB45E]' : 'text-[#363B58] hover:bg-gray-50' }}">
                            <span class="material-symbols-outlined">person</span> 
                            Pengguna
                        </div>
                    </a>
                </div>
                <hr class="border-t border-slate-300 my-4">
                <div class="space-y-3">
                    <div class="flex items-center gap-3 p-2 rounded-lg font-bold text-red-500 hover:bg-gray-50 cursor-pointer"><span class="material-symbols-outlined">logout</span> Logout</div>
                </div>
            </div>
        </aside>

        <main>
            @yield('content')
        </main>

    </div>
    @stack('scripts')
</body>
</html>