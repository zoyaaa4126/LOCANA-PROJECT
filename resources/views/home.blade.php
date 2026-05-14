@extends('layouts.app')

@section('title', 'Homepage')

@section('content')

<div class="flex flex-col sm:flex-row gap-8">

    <!-- SIDEBAR -->
    <aside id="desktopSidebar"
        class="w-80 shrink-0 bg-white shadow p-6 h-fit sticky top-5 border border-gray-200 max-sm:w-full max-sm:static max-sm:hidden transition-all duration-300 overflow-hidden">

        <div class="flex justify-between items-center mb-4">
            <h2 class="font-bold text-xl">Filters</h2>

            <button class="text-[#FBB45E] text-sm font-semibold">
                RESET
            </button>
        </div>

        <!-- KATEGORI -->
        <div class="mb-6">

            <p class="text-gray-400 font-semibold text-sm mb-3 uppercase tracking-wide">
                KATEGORI
            </p>

            <div class="space-y-3">

                @foreach($kategoris as $kategori)

                <div
                    class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 cursor-pointer">

                    <span class="material-symbols-outlined">
                        category
                    </span>

                    {{ $kategori->nama }}

                </div>

                @endforeach

            </div>

        </div>

        <!-- MOODS -->
        <div class="mb-6">

            <p class="text-gray-400 font-semibold text-sm mb-3 uppercase tracking-wide">
                MOODS
            </p>

            <div class="space-y-3">

                @foreach($moods as $mood)

                <div
                    class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 cursor-pointer">

                    <span class="material-symbols-outlined">
                        mood
                    </span>

                    {{ $mood->nama }}

                </div>

                @endforeach

            </div>

        </div>

        <!-- BUDGET -->
        <div class="mb-6">

            <p class="text-gray-400 font-semibold text-sm mb-3 uppercase tracking-wide">
                BUDGET
            </p>

            <div class="space-y-2">

                <label class="flex items-center gap-2">
                    <input type="checkbox">
                    <span class="text-sm">
                        < Rp50.000
                    </span>
                </label>

                <label class="flex items-center gap-2">
                    <input type="checkbox">
                    <span class="text-sm">
                        Rp50.000 - Rp100.000
                    </span>
                </label>

                <label class="flex items-center gap-2">
                    <input type="checkbox">
                    <span class="text-sm">
                        Rp100.000 - Rp200.000
                    </span>
                </label>

            </div>

        </div>

    </aside>

    <!-- CONTENT -->
    <div class="flex-1 my-5 overflow-hidden max-sm:px-5">

        <!-- FILTER TAG -->
        <div class="w-full overflow-x-auto no-scrollbar">

            <div class="flex gap-4 mb-6 whitespace-nowrap">

                <span
                    class="inline-flex items-center gap-2 px-5 py-2 bg-[#FBB45E] text-[#363B58] rounded-full text-base cursor-pointer">

                    <span class="material-symbols-outlined">
                        tune
                    </span>

                    Filter

                </span>

                <span
                    class="inline-flex items-center gap-2 px-5 py-2 bg-gray-100 rounded-full text-base cursor-pointer">

                    Dekat Saya

                </span>

            </div>

        </div>

        <!-- HERO -->
        <div class="relative rounded-xl overflow-hidden mb-8">

            <img src="{{ asset('assets/img/180 Cafe - Bandung 1.png') }}"
                class="w-full h-64 object-cover">

            <div
                class="absolute bottom-0 left-0 right-0 bg-linear-to-t from-gray-900 to-transparent p-6 text-white">

                <span
                    class="bg-[#FBB45E] text-[#363B58] text-xs font-bold px-3 py-1 rounded-full inline-block mb-2">

                    MOOD TERSIMPAN

                </span>

                <h2 class="text-2xl font-bold">
                    Senang melihat anda kembali!
                </h2>

                <p class="text-gray-200 text-sm">
                    Temukan tempat terbaik untuk nongkrong hari ini.
                </p>

            </div>

        </div>

        <!-- TITLE -->
        <div class="mb-6">

            <h1 class="text-2xl font-bold text-[#363B58]">

                Spot Hangout
                <span class="text-yellow-400">
                    Terpopuler di Bandung
                </span>

            </h1>

            <p class="text-gray-500 text-sm">
                Temukan tempat hangout yang sedang ramai dan paling banyak dikunjungi di Bandung.
            </p>

        </div>

        <!-- CARDS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">

            @foreach ($places as $place)

            <div
                class="bg-white rounded-xl shadow-md border border-gray-100 p-4 hover:shadow-lg transition">

                <!-- IMAGE -->
                <div class="relative mb-3">

                    <img src="{{ asset('storage/' . $place->gambar) }}"
                        class="w-full h-40 object-cover rounded-xl">

                    <button
                        class="absolute top-2 right-2 bg-[#FFF8EF] text-[#FBB45E] rounded-full w-8 h-8 flex items-center justify-center shadow-md">

                        <span class="material-symbols-outlined">
                            bookmark
                        </span>

                    </button>

                </div>

                <!-- CATEGORY & RATING -->
                <div class="flex justify-between items-center">

                    <span class="text-[#FBB45E] font-bold text-xs">

                        {{ $place->kategori->nama ?? 'Kategori' }}

                    </span>

                    <div class="flex items-center gap-1 text-sm">

                        <span class="material-symbols-outlined text-yellow-400 text-sm">
                            kid_star
                        </span>

                        <span>

                            {{ $place->rating }}

                        </span>

                    </div>

                </div>

                <!-- NAME -->
                <h4 class="font-bold text-lg mt-1">

                    {{ $place->nama }}

                </h4>

                <!-- LOCATION -->
                <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">

                    <span class="material-symbols-outlined text-sm">
                        location_on
                    </span>

                    <span>

                        {{ $place->alamat }}

                    </span>

                </div>

                <!-- PRICE -->
                <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">

                    <span class="material-symbols-outlined text-sm">
                        payments
                    </span>

                    <span>

                        Rp{{ number_format($place->harga_min) }}
                        -
                        Rp{{ number_format($place->harga_max) }}

                    </span>

                </div>

                <!-- BUTTON -->
                <div class="flex items-center gap-2 mt-4">

                    <button
                        class="flex-1 bg-gray-800 text-[#FBB45E] py-2 rounded-full text-sm font-medium flex items-center justify-center gap-1 hover:bg-gray-700 transition">

                        <span class="material-symbols-outlined text-sm">
                            location_on
                        </span>

                        Lihat Lokasi

                    </button>

                    <button
                        class="bg-[#FBB45E] hover:bg-[#E2A255] text-[#363B58] w-10 h-10 flex items-center justify-center rounded-full transition">

                        <span class="material-symbols-outlined text-sm">
                            share
                        </span>

                    </button>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</div>

@endsection