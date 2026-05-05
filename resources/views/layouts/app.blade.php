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
    
        <div class="container mx-auto px-4 py-3 
                    flex justify-between items-center 
                    max-sm:grid max-sm:grid-cols-[1fr_auto] max-sm:gap-3">

            <!-- Logo -->
            <div class="flex items-center gap-2">
                <img src="assets/img/Locana_Logo 1.png" class="h-10 max-sm:h-6" alt="Logo">
                <span class="font-bold text-xl text-gray-800 max-sm:text-base">LOCANA</span>
            </div>

            <!-- Right -->
            <div class="flex gap-4 flex-row-reverse max-sm:contents">

                <!-- PROFILE DROPDOWN -->
                <div class="relative" id="profileDropdown">

                    <button id="dropdownButton"
                        class="flex items-center gap-2 hover:bg-gray-100 px-2 py-1 rounded-lg transition">

                        <img src="assets/img/nanamin.jpg"
                            class="w-10 h-10 max-sm:w-9 max-sm:h-9 rounded-full object-cover">

                        <div class="flex flex-col items-end max-sm:hidden leading-tight">
                            <span class="text-sm font-semibold">Nanami Kento</span>
                            <span class="text-xs text-gray-500">nnmkentoo</span>
                        </div>

                        <span id="arrowIcon"
                            class="material-symbols-outlined transition-transform duration-300">
                            expand_more
                        </span>
                    </button>

                    <!-- Dropdown -->
                    <div id="dropdownMenu"
                        class="absolute right-0 mt-2 w-60 bg-white rounded-xl shadow-lg border z-50 
                               opacity-0 scale-95 pointer-events-none
                               transition-all duration-200 ease-out">

                        <ul class="py-2 text-sm text-gray-700">

                            <a href="/profile">
                                <li class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100">
                                    <span class="material-symbols-outlined text-gray-500">person</span>
                                    Profile
                                </li>
                            </a>

                            <a href="/wishlist">
                                <li class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100">
                                    <span class="material-symbols-outlined text-gray-500">favorite</span>
                                    Wishlist
                                </li>
                            </a>

                            <a href="/security">
                                <li class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100">
                                    <span class="material-symbols-outlined text-gray-500">security</span>
                                    Privasi & Keamanan
                                </li>
                            </a>

                            <a href="/help">
                                <li class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100">
                                    <span class="material-symbols-outlined text-gray-500">help</span>
                                    Bantuan
                                </li>
                            </a>

                            <hr class="my-1">

                            <a href="/logout">
                                <li class="flex items-center gap-3 px-4 py-2 hover:bg-red-50 text-red-500">
                                    <span class="material-symbols-outlined">logout</span>
                                    Keluar
                                </li>
                            </a>

                        </ul>
                    </div>
                </div>
        
                <!-- Search -->
                <div class="relative bg-slate-100 border rounded-lg border-slate-200
                            max-sm:col-span-2 max-sm:w-full">
        
                    <span class="material-symbols-outlined absolute left-3 top-2.5 text-[#363B58]">
                        search
                    </span>
        
                    <input type="text" placeholder="Telusuri"
                        class="pl-10 pr-4 py-2 w-64 max-sm:w-full placeholder-[#363B58]">
                </div>

            </div>

        </div>

    </header>

    <!-- ISI -->
    <main>
        @yield('content')
    </main>

    <!-- SCRIPT -->
    <script src="{{ asset('js/script.js') }}"></script>

</body>
</html>