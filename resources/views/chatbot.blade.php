@extends('layouts.app')

@section('title', 'Chatbot Assistant')

@section('content')

<div class="min-h-screen bg-gradient-to-r from-[#FBDAB2] via-[#F6E8D8] to-[#F9F7F4]">
    <div class="max-w-2xl mx-auto px-4 py-10">

        <!-- TOMBOL KEMBALI (selalu muncul) -->
        <div class="flex justify-end mb-4">
            <a href="{{ url()->previous() }}" class="fixed top-23 left-7 z-50 flex items-center gap-2 bg-white border border-slate-200 shadow-sm text-sm text-[#363B58] font-semibold px-4 py-2 rounded-full hover:bg-[#FBB45E] hover:text-white hover:border-[#FBB45E] transition">
                <span class="material-symbols-outlined text-base" style="font-variation-settings:'FILL' 1;">arrow_back</span>
                Kembali
            </a>
        </div>

        <!-- GREETING -->
        <div id="greeting" class="text-center text-[#363B58] mb-8">
            <div class="bg-[#FBB45E] w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <span class="material-symbols-outlined text-white text-3xl" style="font-variation-settings:'FILL' 1;">smart_toy</span>
            </div>
            <h1 class="text-2xl font-bold">Halo, <span class="text-[#FBB45E]">Nanami Kento</span>! 👋</h1>
            <p class="text-gray-500 mt-1">Ada yang bisa aku bantu?</p>
        </div>

        <!-- CHAT OUTPUT -->
        <div id="chatOutput" class="flex flex-col gap-4 mb-6">
            <div class="text-center text-xs text-[#FBB45E] font-semibold tracking-widest mb-2">HARI INI</div>
            <div class="flex items-start gap-3">
                <div class="bg-[#FBB45E] w-9 h-9 rounded-xl flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-white text-xl" style="font-variation-settings:'FILL' 1;">smart_toy</span>
                </div>
                <div>
                    <div class="text-sm font-semibold text-[#363B58] mb-1">Locana Assistant</div>
                    <div class="bg-white px-4 py-3 rounded-2xl rounded-tl-none text-sm text-[#363B58] shadow-sm">
                        Halo, Nanami! 👋 Aku asisten digital Locana.<br>Ada yang bisa aku bantu?
                    </div>
                </div>
            </div>
        </div>

        <!-- DIVIDER -->
        <div id="divider" class="flex items-center gap-3 mb-5">
            <div class="flex-1 h-px bg-slate-300"></div>
            <span class="text-xs text-slate-400 font-semibold tracking-widest">PILIH JAWABAN</span>
            <div class="flex-1 h-px bg-slate-300"></div>
        </div>

        <!-- OPTIONS CONTAINER -->
        <div id="optionsContainer" class="flex flex-col gap-3 mb-10" style="font-variation-settings:'FILL' 1;">

            <!-- MENU UTAMA -->
            <div id="mainMenu" class="grid grid-cols-3 gap-4 max-sm:grid-cols-2 max-[420px]:grid-cols-1">
                @foreach ($menu as $item)
                <div class="chat-option flex flex-col gap-3 bg-white p-4 rounded-xl border border-slate-200 shadow-sm cursor-pointer hover:-translate-y-1 hover:shadow-lg transition"
                     data-next="{{ $item['key'] }}">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-[#FBB45E] bg-[#FEF4E7] p-1.5 rounded-full text-base">{{ $item['icon'] }}</span>
                        <span class="text-sm font-bold text-[#363B58]">{{ $item['label'] }}</span>
                    </div>
                    <div class="text-xs text-slate-500">{{ $item['desc'] }}</div>
                </div>
                @endforeach
            </div>

            <!-- FOLLOW-UP OPTIONS -->
            <div id="followUpMenu" class="hidden flex flex-wrap gap-2"></div>

        </div>

        <!-- RATING CARD (hidden sampai chat selesai) -->
        <div id="ratingCard" class="hidden mb-10">
            <div class="border-2 border-dashed border-[#FBB45E] rounded-2xl bg-white/60 px-6 py-5 text-center">
                <div class="text-sm font-bold text-[#363B58] mb-3">Nilai layanan assistant kami</div>
                <div id="starContainer" class="flex justify-center gap-2">
                    @for ($i = 1; $i <= 5; $i++)
                    <button class="star-btn text-3xl transition-transform hover:scale-110"
                            data-value="{{ $i }}">
                        <span class="material-symbols-outlined text-slate-300 text-4xl"
                              style="font-variation-settings:'FILL' 1;"
                              id="star-{{ $i }}">star</span>
                    </button>
                    @endfor
                </div>
                <div id="ratingThanks" class="hidden text-sm text-[#FBB45E] font-semibold mt-3">
                    Terima kasih atas penilaianmu! ⭐
                </div>
            </div>
        </div>

    </div>
</div>

@endsection