@extends('layouts.app')

@section('title', 'Profile')

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
                    <a href="/wishlist"><div class="flex items-center gap-3 px-4 py-3 rounded-xl text-[#363B58] hover:text-[#E2A255] cursor-pointer">
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
                            <a href="/edit-profile" class="absolute bottom-0 right-0 bg-[#FBB45E] w-8 h-8 flex items-center justify-center rounded-full">
                                <span class="material-symbols-outlined text-[#363B58] text-sm">edit</span>
                            </a>
                        </div>
                        <div class="flex-1 text-center sm:text-left">
                            <h1 class="text-2xl font-bold text-gray-800">{{ $user->nama }}</h1>
                            <p class="text-gray-500">{{ $user->username }}</p>
                            <p class="text-[#363B58] italic mt-1">{{ $user->deskripsi }}</p>
                            <div class="flex justify-center sm:justify-start gap-6 mt-3">
                                <div class="flex flex-col justify-center items-center"><span class="font-bold text-[#FBB45E] text-lg">{{ $reviewCount }}</span> <span class="text-gray-500">Ulasan</span></div>
                                <div class="flex flex-col justify-center items-center"><span class="font-bold text-[#FBB45E] text-lg">{{ $wishlistCount }}</span> <span class="text-gray-500">Wishlist</span></div>
                            </div>
                        </div>
                        <a href="/edit-profile">
                            <button class="bg-[#FBB45E] text-[#363B58] px-5 py-2 rounded-lg text-sm font-bold cursor-pointer">Edit Profil</button>
                        </a>
                    </div>

                    <div>
                        <h2 class="text-2xl font-bold text-gray-800"><span class="text-[#FBB45E]">Aktivitas</span> Terakhir</h2>
                        <div class="flex flex-row gap-4 overflow-x-auto no-scrollbar max-md:flex-col max-md:overflow-visible">
                            @forelse ($activities as $activity)
                            <div class="bg-white rounded-xl border border-gray-100 p-4 shadow-sm flex flex-col gap-4 w-[500px] shrink-0">
                                
                                {{-- Badge tipe aktivitas --}}
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-2">
                                        @if($activity['type'] === 'review')
                                            <span class="material-symbols-outlined text-[#363B58] bg-[#FBB45E] p-1 rounded-full text-[12px]">star</span>
                                            <span class="font-semibold text-sm">Memberi Ulasan</span>
                                        @else
                                            <span class="material-symbols-outlined text-[#FBB45E] bg-[#363B58] p-1 rounded-full text-[12px]">bookmark</span>
                                            <span class="font-semibold text-sm">Menambahkan ke Wishlist</span>
                                        @endif
                                    </div>
                                    <span class="text-xs text-gray-400">{{ $activity['created_at']->diffForHumans() }}</span>
                                </div>
    
                                {{-- Konten --}}
                                <div class="flex gap-4 items-center">
                                    <img src="{{ $activity['place']->gambar ? asset('storage/' . $activity['place']->gambar) : asset('assets/img/180 Cafe - Bandung 1.png') }}"
                                        class="w-20 h-20 rounded-xl object-cover shrink-0">
                                    <div class="flex flex-col">
                                        <h3 class="font-bold text-base">{{ $activity['place']->nama_tempat }}</h3>
                                        @if($activity['type'] === 'review')
                                            <div class="flex text-yellow-500 text-sm my-1">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <span class="material-symbols-outlined text-sm {{ $i <= $activity['rating'] ? 'text-yellow-500' : 'text-gray-300' }}">star</span>
                                                @endfor
                                            </div>
                                            <p class="text-[#363B58] text-sm italic line-clamp-2">{{ $activity['comment'] }}</p>
                                        @else
                                            <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                                <span class="material-symbols-outlined text-sm">location_on</span>
                                                <span class="line-clamp-1">{{ $activity['place']->alamat_lengkap }}</span>
                                            </div>
                                            <div class="flex items-center gap-1 text-gray-500 text-xs mt-1">
                                                <span class="material-symbols-outlined text-sm">payments</span>
                                                <span>Rp{{ number_format($activity['place']->harga_min, 0, ',', '.') }} - Rp{{ number_format($activity['place']->harga_max, 0, ',', '.') }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
    
                            </div>
                            @empty
                            <p class="text-gray-400 text-sm italic">Belum ada aktivitas.</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- WISHLIST SAYA dengan Gambar, Bookmark, Share -->
                    <div>
                        <div class="flex justify-between items-center mb-5">
                            <h2 class="text-2xl font-bold text-gray-800"><span class="text-[#FBB45E]">Wishlist</span> Saya</h2>
                            <a href="/wishlist" class="text-[#FBB45E] text-sm font-semibold">Lihat Semua →</a>
                        </div>
                        <div class="flex flex-row gap-6 overflow-x-auto no-scrollbar">

                            @forelse ($wishlists as $item)
                            <div class="flex gap-4 bg-white rounded-xl border border-gray-100 p-4 h-fit w-[500px] shrink-0 shadow-sm">
                                <div class="relative w-40 h-40 shrink-0">
                                    <img src="{{ $item->place->gambar ? asset('storage/' . $item->place->gambar) : asset('assets/img/180 Cafe - Bandung 1.png') }}"
                                        class="w-full h-full object-cover rounded-xl">
                                    <button
                                        data-id="{{ $item->place->id }}"
                                        onclick="toggleWishlist(this)"
                                        class="wishlist-btn absolute top-2 right-2 bg-[#FBB45E] text-[#363B58] rounded-full w-8 h-8 flex items-center justify-center shadow-md cursor-pointer"
                                        style="font-variation-settings: 'FILL' 1;">
                                        <span class="material-symbols-outlined">bookmark</span>
                                    </button>
                                </div>
                                <div class="flex flex-col gap-2 flex-1">
                                    <div class="flex flex-col gap-1">
                                        <span class="text-[#FBB45E] font-bold text-xs">{{ strtoupper($item->place->kategori->nama ?? '-') }}</span>
                                        <h3 class="font-bold text-base">{{ $item->place->nama_tempat }}</h3>
                                        <div class="flex items-center gap-1 text-gray-500 text-xs">
                                            <span class="material-symbols-outlined text-sm">location_on</span>
                                            <span class="line-clamp-1">{{ $item->place->alamat_lengkap }}</span>
                                        </div>
                                        <div class="flex items-center gap-1 text-gray-500 text-xs">
                                            <span class="material-symbols-outlined text-sm">payments</span>
                                            <span>Rp{{ number_format($item->place->harga_min, 0, ',', '.') }} - Rp{{ number_format($item->place->harga_max, 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                    <div class="flex gap-2 mt-2">
                                        <a href="{{ route('places.show', $item->place->id) }}"
                                            class="flex-1 bg-gray-800 text-[#FBB45E] py-2 rounded-xl text-sm font-semibold flex items-center justify-center gap-1">
                                            <span class="material-symbols-outlined text-sm">location_on</span> Lihat Lokasi
                                        </a>
                                        <button class="bg-[#FBB45E] text-white w-10 h-10 rounded-xl flex items-center justify-center">
                                            <span class="material-symbols-outlined text-sm">share</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <p class="text-gray-400 text-sm italic">Belum ada wishlist tersimpan.</p>
                            @endforelse

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