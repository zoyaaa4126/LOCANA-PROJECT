@extends('layouts.admin')

@section('title', 'Ulasan')

@section('content')

<div class="m-5">
    <div class="mb-5">
        <p class="text-slate-300 text-sm font-semibold">Dashboard / <span class="text-[#FBB45E] font-bold">Lokasi</span></p>
        <h1 class="text-2xl font-bold text-[#363B58]">Halo Admin <span class="text-yellow-400">Higuruma Hiromi!</span></h1>
    </div>
    
    <div class="flex flex-row gap-5 flex-wrap mb-5">
    
        <div class="flex flex-col p-[15px_20px] bg-[#FFE2E2] rounded-[10px] justify-between w-[162px] h-[130px]">
            <p class="font-bold text-red-600 text-sm">PERLU DITINJAU</p>
            <h2 class="text-[2rem] font-bold text-red-600">2</h2>
        </div>
    
        <div class="flex flex-col p-[15px_20px] bg-[#E2E8F0] rounded-[10px] justify-between w-[162px] h-[130px]">
            <p class="font-bold text-[#363B58] text-sm">LOLOS MODERASI</p>
            <h2 class="text-[2rem] font-bold text-[#363B58]">24</h2>
        </div>
    
        <div class="flex flex-col p-[15px_20px] bg-[#E2E8F0] rounded-[10px] justify-between w-[162px] h-[130px]">
            <p class="font-bold text-[#363B58] text-sm">DIHAPUS</p>
            <h2 class="text-[2rem] font-bold text-[#363B58]">15</h2>
        </div>
    
        <div class="flex flex-col p-[15px_20px] bg-[#E2E8F0] rounded-[10px] justify-between w-[162px] h-[130px]">
            <p class="font-bold text-[#363B58] text-sm">TOTAL ULASAN</p>
            <h2 class="text-[2rem] font-bold text-[#363B58]">1.8rb</h2>
        </div>
    
    </div>
    
    <div class="flex flex-col gap-5 mb-10">
    
        <div class="flex flex-col gap-5 bg-white p-[20px_30px] border border-red-500 rounded-[20px] max-w-[1200px] w-full">
    
            <div class="flex justify-between items-center">
                <div class="flex gap-5 items-center min-w-0">
                    <img src="assets/img/nanamin.jpg" alt="userpict"
                         class="w-[60px] h-[60px] rounded-full object-cover flex-shrink-0">
                    <div class="flex flex-col gap-1 justify-center min-w-0">
                        <h3 class="font-bold text-xl">nnmkentoo</h3>
                        <div class="flex flex-col md:flex-row md:items-center gap-0 md:gap-2">
                            <p class="text-gray-500 text-sm">15 Januari 2026</p>
                            <div class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[#FBB45E]"
                                      style="font-variation-settings: 'FILL' 1; font-size:20px;">location_on</span>
                                <p class="text-sm font-medium">Kopi Senja Cafe</p>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="flex gap-0 flex-shrink-0">
                    <span class="material-symbols-outlined text-[#FBB45E]" style="font-variation-settings: 'FILL' 1; font-size:20px;">
                        kid_star
                    </span>
                    <span class="material-symbols-outlined text-[#FBB45E]" style="font-variation-settings: 'FILL' 1; font-size:20px;">
                        kid_star
                    </span>
                    <span class="material-symbols-outlined text-[#FBB45E]" style="font-variation-settings: 'FILL' 1; font-size:20px;">
                        kid_star
                    </span>
                    <span class="material-symbols-outlined text-[#FBB45E]" style="font-variation-settings: 'FILL' 1; font-size:20px;">
                        kid_star
                    </span>
                    <span class="material-symbols-outlined text-[#FBB45E]" style="font-variation-settings: 'FILL' 1; font-size:20px;">
                        kid_star
                    </span>
                </div>
            </div>
    
            <div class="flex flex-col gap-3 bg-[#FFE2E2] p-5 text-xl rounded-[10px]">
                <div class="flex items-center gap-2 text-red-600 font-bold text-sm">
                    <span class="material-symbols-outlined text-red-600"
                          style="font-variation-settings: 'FILL' 1; font-size:20px;">flag</span>
                    <p>Dilaporkan sebagai konten Spam</p>
                </div>
                <p class="text-base">
                    "Tempatnya bagus banget, nyaman juga, trus banyak promo. YANG MAU INFO PROMO CAFE CEK @NNMKENTOO DI TIKTOK YA!"
                </p>
            </div>
    
            <div class="flex justify-end gap-3">
                <button class="px-5 py-[10px] bg-[#F1F5F9] border border-[#D9D9D9] text-[#363B58] font-bold text-base rounded-[10px] cursor-pointer hover:bg-gray-200 transition-colors">
                    Simpan
                </button>
                <button class="px-5 py-[10px] bg-red-600 text-white font-bold text-base rounded-[10px] cursor-pointer hover:bg-red-700 transition-colors">
                    Hapus
                </button>
            </div>
    
        </div>
        <div class="flex flex-col gap-5 bg-white p-[20px_30px] border border-red-500 rounded-[20px] max-w-[1200px] w-full">
    
            <div class="flex justify-between items-center">
                <div class="flex gap-5 items-center min-w-0">
                    <img src="assets/img/nanamin.jpg" alt="userpict"
                         class="w-[60px] h-[60px] rounded-full object-cover flex-shrink-0">
                    <div class="flex flex-col gap-1 justify-center min-w-0">
                        <h3 class="font-bold text-xl">nnmkentoo</h3>
                        <div class="flex flex-col md:flex-row md:items-center gap-0 md:gap-2">
                            <p class="text-gray-500 text-sm">15 Januari 2026</p>
                            <div class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[#FBB45E]"
                                      style="font-variation-settings: 'FILL' 1; font-size:20px;">location_on</span>
                                <p class="text-sm font-medium">Kopi Senja Cafe</p>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="flex gap-0 flex-shrink-0">
                    <span class="material-symbols-outlined text-[#FBB45E]" style="font-variation-settings: 'FILL' 1; font-size:20px;">
                        kid_star
                    </span>
                    <span class="material-symbols-outlined text-[#FBB45E]" style="font-variation-settings: 'FILL' 1; font-size:20px;">
                        kid_star
                    </span>
                    <span class="material-symbols-outlined text-[#FBB45E]" style="font-variation-settings: 'FILL' 1; font-size:20px;">
                        kid_star
                    </span>
                    <span class="material-symbols-outlined text-[#FBB45E]" style="font-variation-settings: 'FILL' 1; font-size:20px;">
                        kid_star
                    </span>
                    <span class="material-symbols-outlined text-[#FBB45E]" style="font-variation-settings: 'FILL' 1; font-size:20px;">
                        kid_star
                    </span>
                </div>
            </div>
    
            <div class="flex flex-col gap-3 bg-[#FFE2E2] p-5 text-xl rounded-[10px]">
                <div class="flex items-center gap-2 text-red-600 font-bold text-sm">
                    <span class="material-symbols-outlined text-red-600"
                          style="font-variation-settings: 'FILL' 1; font-size:20px;">flag</span>
                    <p>Dilaporkan sebagai konten Spam</p>
                </div>
                <p class="text-base">
                    "Tempatnya bagus banget, nyaman juga, trus banyak promo. YANG MAU INFO PROMO CAFE CEK @NNMKENTOO DI TIKTOK YA!"
                </p>
            </div>
    
            <div class="flex justify-end gap-3">
                <button class="px-5 py-[10px] bg-[#F1F5F9] border border-[#D9D9D9] text-[#363B58] font-bold text-base rounded-[10px] cursor-pointer hover:bg-gray-200 transition-colors">
                    Simpan
                </button>
                <button class="px-5 py-[10px] bg-red-600 text-white font-bold text-base rounded-[10px] cursor-pointer hover:bg-red-700 transition-colors">
                    Hapus
                </button>
            </div>
    
        </div>
    
    </div>
</div>

@endsection