@extends('layouts.app')

@section('title', 'Wishlist')

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
                </div>    

                <!-- CARD -->
        
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 px-[60px] py-5
                    max-md:px-[15px] max-md:grid-cols-2 max-md:gap-5">

            @forelse ($wishlists as $item)
            <div class="flex flex-col bg-white rounded-[30px] p-5 border border-[#E2E8F0] w-60 h-106
                        max-md:w-40 max-md:h-87">
                <div class="relative w-50 h-50 shrink-0 max-md:w-30 max-md:h-30">
                    <img src="{{ $item->place->gambar_tempat ? asset($item->place->gambar_tempat) : asset('assets/img/180 Cafe - Bandung 1.png') }}"
                        class="w-full h-full object-cover rounded-xl" alt="{{ $item->place->nama_tempat }}">
                    <button
                        data-id="{{ $item->place->id }}"
                        data-active="true"
                        onclick="toggleWishlist(this)"
                        class="wishlist-btn absolute top-2 right-2 rounded-full w-8 h-8 flex items-center justify-center shadow-md cursor-pointer transition-all duration-200"
                        style="background: #FBB45E; color: #363B58; font-variation-settings: 'FILL' 1;">
                        <span class="material-symbols-outlined">bookmark</span>
                    </button>
                </div>
                <div class="flex justify-between items-center mt-4">
                    <h5 class="text-[#fbb45e] text-xs font-bold max-md:text-[10px]">
                        {{ strtoupper($item->place->kategori->nama ?? 'KATEGORI') }}
                    </h5>
                </div>
                <h4 class="text-base font-bold text-[#000000] max-md:text-sm max-md:mt-[5px]">
                    {{ $item->place->nama_tempat }}
                </h4>
                <div class="flex items-center text-xs gap-1 mt-2 text-[#363B58] max-md:text-[10px]">
                    <span class="material-symbols-outlined text-sm">location_on</span>
                    <p class="line-clamp-1">{{ $item->place->alamat_lengkap }}</p>
                </div>
                <div class="flex items-center gap-1 text-xs mt-2 text-[#363B58] max-md:text-[10px]">
                    <span class="material-symbols-outlined text-sm">payments</span>
                    <p>Rp{{ number_format($item->place->harga_min, 0, ',', '.') }} - Rp{{ number_format($item->place->harga_max, 0, ',', '.') }}</p>
                </div>
                <div class="flex gap-3 mt-4 max-md:gap-1">
                    <a href="{{ route('places.show', $item->place->id) }}"
                        class="flex-1 bg-gray-800 text-[#FBB45E] py-2 rounded-xl text-sm font-semibold flex items-center justify-center gap-1
                                max-md:text-[7px] max-md:gap-0.5 max-md:py-1">
                        <span class="material-symbols-outlined" style="font-size:20px">location_on</span>
                        Lihat Lokasi
                    </a>
                    <button class="bg-[#FBB45E] text-white w-10 h-10 rounded-xl flex items-center justify-center">
                        <span class="material-symbols-outlined text-sm">share</span>
                    </button>
                </div>
            </div>
            @empty
            <p class="text-gray-400 text-sm italic col-span-3">Belum ada wishlist tersimpan.</p>
            @endforelse

        </div>
    </main>
        <a href="/chatbot" class="fixed bottom-5 right-5 z-50 bg-[#FBB45E] text-[#363B58] w-14 h-14 rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition" style="font-variation-settings: 'FILL' 1;">
            <span class="material-symbols-outlined text-2xl">smart_toy</span>
        </a>
    </div>

@endsection