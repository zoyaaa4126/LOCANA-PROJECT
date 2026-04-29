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

    <!-- NAVBAR (dipindahin dari HTML kamu) -->
    <header class="bg-white border-b border-gray-300 sticky top-0 z-50 shadow-sm">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">

            <div class="flex items-center gap-2">
                <img src="{{ asset('assets/img/Locana_Logo 1.png') }}" class="h-10">
                <span class="font-bold text-xl text-gray-800">LOCANA</span>
            </div>

            <div class="flex gap-4">
                <a href="/profile" class="flex items-center gap-2">
                    <img src="{{ asset('assets/img/nanamin.jpg') }}" class="w-10 h-10 rounded-full object-cover">
                    <span class="font-medium">Nanami Kento</span>
                </a>
            </div>

        </div>
    </header>

    <!-- ISI HALAMAN -->
    <main>
        @yield('content')
    </main>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>