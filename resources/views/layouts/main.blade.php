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
    <header class="bg-white sticky top-0 border-b border-[#D9D9D9] z-50">
        
        <!-- DESKTOP LAYOUT -->
        <div class="hidden md:flex items-center justify-between px-6 py-4">
            <!-- Logo -->
            <div class="flex items-center gap-2">
                <img src="assets/img/Locana_Logo 1.png" alt="logo" class="w-8 h-8 object-contain">
                <span class="font-semibold text-lg text-[#363B58]">LOCANA</span>
            </div>

            <!-- Navigation Desktop -->
            <nav class="flex gap-6">
                <a href="#" class="text-[#363B58] font-semibold hover:text-[#FBB45E] transition">Beranda</a>
                <a href="#populer" class="text-[#363B58] font-semibold hover:text-[#FBB45E] transition">Populer</a>
                <a href="#mood" class="text-[#363B58] font-semibold hover:text-[#FBB45E] transition">Mood</a>
                <a href="#Ulasan" class="text-[#363B58] font-semibold hover:text-[#FBB45E] transition">Ulasan</a>
            </nav>

            <!-- Auth Buttons Desktop -->
            <div class="flex items-center gap-4">
                <a href="/login" class="text-[#363B58] font-semibold hover:text-[#FBB45E] transition">Masuk</a>
                <a href="/register" class="flex items-center gap-1 bg-[#FBB45E] text-white px-4 py-2 rounded-lg hover:bg-orange-400 transition">
                    <span class="font-semibold text-[#363B58]">Daftar</span>
                    <span class="font-semibold text-[#363B58]">→</span>
                </a>
            </div>
        </div>

        <!-- MOBILE LAYOUT -->
        <div class="flex md:hidden px-5 py-3 items-center justify-between">
            <!-- Logo Mobile -->
            <div class="flex items-center gap-1">
                <img src="assets/img/Locana_Logo 1.png" alt="logo" class="h-5 w-5 object-contain">
                <span class="text-sm font-bold text-[#363B58]">LOCANA</span>
            </div>

            <!-- Hamburger Button -->
            <button id="hamburgerBtn" class="p-2 rounded-lg hover:bg-gray-100 transition z-50">
                <span class="material-symbols-outlined text-2xl text-[#363B58]">menu</span>
            </button>
        </div>
    </header>

    <!-- MOBILE SIDEBAR (dari kanan) -->
    <div id="mobileSidebar" class="fixed inset-0 z-50 hidden md:hidden">
        <div id="sidebarOverlay" class="absolute inset-0 bg-black/50 transition-opacity duration-300 opacity-0"></div>
        
        <div id="sidebarContent" class="absolute right-0 top-0 h-full w-80 bg-white shadow-2xl transform translate-x-full transition-transform duration-300 ease-out">
            <div class="flex flex-col h-full">
                <!-- Header Sidebar -->
                <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <img src="assets/img/Locana_Logo 1.png" alt="logo" class="h-8 w-8 object-contain">
                        <span class="font-bold text-lg text-[#363B58]">LOCANA</span>
                    </div>
                    <button id="closeSidebarBtn" class="p-2 hover:bg-gray-100 rounded-lg">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>

                <!-- Navigation Mobile -->
                <nav class="flex-1 py-4">
                    <a href="#" class="flex items-center gap-3 px-4 py-3 text-[#363B58] font-medium hover:bg-gray-50 transition border-l-4 border-transparent hover:border-[#FBB45E]">
                        <span class="material-symbols-outlined">home</span>
                        Beranda
                    </a>
                    <a href="#populer" class="flex items-center gap-3 px-4 py-3 text-[#363B58] font-medium hover:bg-gray-50 transition border-l-4 border-transparent hover:border-[#FBB45E]">
                        <span class="material-symbols-outlined">trending_up</span>
                        Populer
                    </a>
                    <a href="#mood" class="flex items-center gap-3 px-4 py-3 text-[#363B58] font-medium hover:bg-gray-50 transition border-l-4 border-transparent hover:border-[#FBB45E]">
                        <span class="material-symbols-outlined">sentiment_satisfied</span>
                        Mood
                    </a>
                    <a href="#Ulasan" class="flex items-center gap-3 px-4 py-3 text-[#363B58] font-medium hover:bg-gray-50 transition border-l-4 border-transparent hover:border-[#FBB45E]">
                        <span class="material-symbols-outlined">star</span>
                        Ulasan
                    </a>
                    
                    <div class="h-px bg-gray-200 my-3 mx-4"></div>
                    
                    <!-- Auth Mobile -->
                    <a href="/login" class="flex items-center gap-3 px-4 py-3 text-[#363B58] hover:bg-gray-50 transition">
                        <span class="material-symbols-outlined">login</span>
                        Masuk
                    </a>
                    <a href="/register" class="flex items-center justify-center gap-2 mx-4 mt-3 bg-[#FBB45E] py-3 rounded-lg hover:bg-orange-400 transition">
                        <span class="font-semibold text-[#363B58]">Daftar</span>
                        <span class="font-semibold text-[#363B58]">→</span>
                    </a>
                </nav>
            </div>
        </div>
    </div>

    <!-- ISI -->
    <main>
        @yield('content')
    </main>

    <a href="/chatbot" class="fixed bottom-5 right-5 z-50 bg-[#FBB45E] text-[#363B58] w-14 h-14 rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition" style="font-variation-settings: 'FILL' 1;" title="Chatbot">
        <span class="material-symbols-outlined text-2xl">smart_toy</span>
    </a>

    <script>
        // Sidebar Mobile
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const mobileSidebar = document.getElementById('mobileSidebar');
        const sidebarContent = document.getElementById('sidebarContent');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const closeSidebarBtn = document.getElementById('closeSidebarBtn');

        function openSidebar() {
            mobileSidebar.classList.remove('hidden');
            setTimeout(() => {
                sidebarOverlay.classList.add('opacity-100');
                sidebarContent.classList.remove('translate-x-full');
            }, 10);
            document.body.style.overflow = 'hidden';
        }

        function closeSidebar() {
            sidebarOverlay.classList.remove('opacity-100');
            sidebarContent.classList.add('translate-x-full');
            setTimeout(() => {
                mobileSidebar.classList.add('hidden');
                document.body.style.overflow = '';
            }, 300);
        }

        hamburgerBtn?.addEventListener('click', openSidebar);
        closeSidebarBtn?.addEventListener('click', closeSidebar);
        sidebarOverlay?.addEventListener('click', closeSidebar);

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && mobileSidebar && !mobileSidebar.classList.contains('hidden')) {
                closeSidebar();
            }
        });
    </script>

</body>
</html>