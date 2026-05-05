@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="m-5">
    <div class="mb-6">
        <p class="text-[#FBB45E] text-sm font-bold">Dashboard</p>
        <h1 class="text-2xl font-bold text-[#363B58]">Halo Admin <span class="text-yellow-400">Higuruma Hiromi!</span></h1>
    </div>
    <div class="flex flex-row gap-5 flex-wrap">
    
        <div class="relative flex flex-col gap-3 bg-white p-7 border border-[#D9D9D9] rounded-[20px] flex-1 min-w-[200px] overflow-hidden">
            <p class="font-bold text-[#FBB45E] z-10 text-sm tracking-wide">TOTAL LOKASI</p>
            <h2 class="text-[2.5rem] font-bold text-[#363B58] z-10">42</h2>
            <p class="text-gray-500 text-sm z-10">2 Lokasi baru Minggu Ini</p>
            <span class="material-symbols-outlined absolute bottom-[-40px] right-[-40px] text-[#F1F5F9] z-0"
                  style="font-size:200px;">explore</span>
        </div>
    
        <div class="relative flex flex-col gap-3 bg-white p-7 border border-[#D9D9D9] rounded-[20px] flex-1 min-w-[200px] overflow-hidden">
            <p class="font-bold text-[#FBB45E] z-10 text-sm tracking-wide">TOTAL ULASAN</p>
            <h2 class="text-[2.5rem] font-bold text-[#363B58] z-10">1.8rb</h2>
            <p class="text-gray-500 text-sm z-10">4.3/5 Rata-rata</p>
            <span class="material-symbols-outlined absolute bottom-[-40px] right-[-40px] text-[#F1F5F9] z-0"
                  style="font-size:200px;">contract_edit</span>
        </div>
    
        <div class="relative flex flex-col gap-3 bg-white p-7 border border-[#D9D9D9] rounded-[20px] flex-1 min-w-[200px] overflow-hidden">
            <p class="font-bold text-[#FBB45E] z-10 text-sm tracking-wide">TINJAU ULASAN</p>
            <h2 class="text-[2.5rem] font-bold text-[#363B58] z-10">2</h2>
            <p class="text-gray-500 text-sm z-10">Perlu ditinjau</p>
            <span class="material-symbols-outlined absolute bottom-[-40px] right-[-40px] text-[#F1F5F9] z-0"
                  style="font-size:200px;">rate_review</span>
        </div>
    
    </div>
    
    <div class="flex flex-col gap-3 mt-5 mb-10">
        <div class="flex items-center text-[#363B58]">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1; font-size:28px;">bolt</span>
            <p class="font-bold text-lg ml-1">Aksi Cepat</p>
        </div>
    
        <div class="flex flex-col md:flex-row gap-5">
            <a href="/lokasi"
               class="flex flex-row justify-between items-center bg-white px-5 py-3 w-full text-[#363B58] border border-[#D9D9D9] rounded-[10px] no-underline
                      hover:bg-[#FEF4E7] hover:border-[#E2A255] transition-all duration-200">
                <div class="flex items-center bg-[#FBB45E] text-[#363B58] p-[5px] rounded-full">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1; font-size:28px;">add_location</span>
                </div>
                <div class="flex flex-col flex-1 ml-4">
                    <p class="font-bold text-md">Tambah Lokasi Baru</p>
                    <p class="text-gray-500 text-sm">Input Lokasi Baru</p>
                </div>
                <span class="material-symbols-outlined" style="font-size:28px;">keyboard_arrow_right</span>
            </a>
    
            <a href="/ulasan"
               class="flex flex-row justify-between items-center bg-white px-5 py-3 w-full text-[#363B58] border border-[#D9D9D9] rounded-[10px] no-underline
                      hover:bg-[#FEF4E7] hover:border-[#E2A255] transition-all duration-200">
                <div class="flex items-center bg-[#FBB45E] text-[#363B58] p-[5px] rounded-full">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1; font-size:28px;">flag</span>
                </div>
                <div class="flex flex-col flex-1 ml-4">
                    <p class="font-bold text-md">Tinjau Ulasan</p>
                    <p class="text-gray-500 text-sm">Review yang Perlu Dicek</p>
                </div>
                <span class="material-symbols-outlined" style="font-size:28px;">keyboard_arrow_right</span>
            </a>
    
        </div>
    </div>
</div>


@endsection