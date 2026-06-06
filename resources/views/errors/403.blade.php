@extends('layouts.main')

@section('title', '403 Error')

@section('content')

<div class="min-h-screen bg-white flex flex-col items-center justify-center px-6 py-16 text-[#363B58]"
     style="font-family: 'Poppins', sans-serif;">

    {{-- Tagline --}}
    <p class="text-sm text-gray-400 tracking-wide mb-4 opacity-0"
       style="animation: fadeUp 0.6s ease forwards 0.2s;">
        Kamu sepertinya tersesat...
    </p>

    {{-- Headline --}}
    <h1 class="text-2xl font-extrabold text-center leading-tight flex flex-wrap items-center justify-center gap-3 mb-5 opacity-0"
        style="animation: fadeUp 0.6s ease forwards 0.35s;">
        <span style="animation: floatY 3s ease-in-out infinite;" class="inline-block">☁️</span>
            403 | Akses kamu ditolak!
        <span style="animation: floatY 3s ease-in-out infinite 1.5s;" class="inline-block">💛</span>
    </h1>

    {{-- UFO Illustration --}}
    <div class="relative w-60 h-48 mt-8 mb-2 opacity-0"
         style="animation: fadeUp 0.7s ease forwards 0.65s;">

        {{-- Radial rings --}}
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-80 h-80 pointer-events-none">
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-28 h-28 rounded-full border border-[#363B58]/[.07]"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-52 h-52 rounded-full border border-[#363B58]/[.07]"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-72 h-72 rounded-full border border-[#363B58]/[.07]"></div>
        </div>

        {{-- Glow blob --}}
        <div class="absolute bottom-2 left-1/2 -translate-x-1/2 w-44 h-14 rounded-full"
             style="background: radial-gradient(ellipse, rgba(251,180,94,0.3) 0%, transparent 70%)"></div>

        {{-- UFO SVG --}}
        <svg class="absolute w-40"
             style="top:50%; left:50%; transform:translate(-50%,-55%); animation: ufoHover 4s ease-in-out infinite;"
             viewBox="0 0 160 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <!-- Beam -->
            <path d="M65 75 L45 110 L115 110 L95 75Z" fill="url(#beamGrad)" opacity="0.4"/>
            <!-- Body bottom -->
            <ellipse cx="80" cy="72" rx="42" ry="10" fill="url(#bodyGrad)"/>
            <!-- Body top dome -->
            <ellipse cx="80" cy="58" rx="32" ry="18" fill="url(#topGrad)"/>
            <!-- Cockpit glass -->
            <ellipse cx="80" cy="50" rx="18" ry="13" fill="url(#glassGrad)" opacity="0.9"/>
            <!-- Cockpit shine -->
            <ellipse cx="74" cy="45" rx="6" ry="4" fill="white" opacity="0.4"/>
            <!-- Lights -->
            <circle cx="52"  cy="72" r="4"   fill="#FBB45E" opacity="0.9">  <animate attributeName="opacity" values="0.9;0.3;0.9" dur="1.4s" repeatCount="indefinite"/></circle>
            <circle cx="66"  cy="76" r="3.5" fill="#363B58" opacity="0.6">  <animate attributeName="opacity" values="0.7;0.2;0.7" dur="1.8s" repeatCount="indefinite" begin="0.4s"/></circle>
            <circle cx="80"  cy="78" r="4"   fill="#FBB45E" opacity="0.9">  <animate attributeName="opacity" values="0.9;0.3;0.9" dur="1.2s" repeatCount="indefinite" begin="0.8s"/></circle>
            <circle cx="94"  cy="76" r="3.5" fill="#363B58" opacity="0.6">  <animate attributeName="opacity" values="0.7;0.2;0.7" dur="1.6s" repeatCount="indefinite" begin="0.2s"/></circle>
            <circle cx="108" cy="72" r="4"   fill="#FBB45E" opacity="0.9">  <animate attributeName="opacity" values="0.9;0.3;0.9" dur="1.3s" repeatCount="indefinite" begin="0.6s"/></circle>
            <!-- Lightning -->
            <path d="M84 36 L78 50 L83 50 L77 65 L88 47 L82 47 Z" fill="#FBB45E" opacity="0.9"/>
            <defs>
                <linearGradient id="beamGrad" x1="80" y1="75" x2="80" y2="110" gradientUnits="userSpaceOnUse">
                    <stop offset="0%"   stop-color="#FBB45E" stop-opacity="0.7"/>
                    <stop offset="100%" stop-color="#FBB45E" stop-opacity="0"/>
                </linearGradient>
                <linearGradient id="bodyGrad" x1="40" y1="65" x2="120" y2="80" gradientUnits="userSpaceOnUse">
                    <stop offset="0%"   stop-color="#4A5080"/>
                    <stop offset="100%" stop-color="#363B58"/>
                </linearGradient>
                <linearGradient id="topGrad" x1="50" y1="40" x2="110" y2="76" gradientUnits="userSpaceOnUse">
                    <stop offset="0%"   stop-color="#5A6090"/>
                    <stop offset="100%" stop-color="#363B58"/>
                </linearGradient>
                <linearGradient id="glassGrad" x1="62" y1="37" x2="98" y2="63" gradientUnits="userSpaceOnUse">
                    <stop offset="0%"   stop-color="#FDD9A0"/>
                    <stop offset="100%" stop-color="#FBB45E"/>
                </linearGradient>
            </defs>
        </svg>
    </div>

    {{-- Quick Links --}}
    <div class="w-full max-w-sm flex flex-col gap-3 mt-10 opacity-0"
         style="animation: fadeUp 0.6s ease forwards 0.85s;">

        <a href="/"
           class="flex items-center gap-3.5 bg-white border border-gray-100 rounded-2xl px-5 py-4 no-underline text-[#363B58]
                  hover:border-[#FBB45E] hover:shadow-[0_4px_20px_rgba(251,180,94,0.2)] hover:-translate-y-0.5 transition-all group">
            <div class="w-9 h-9 bg-orange-50 rounded-xl flex items-center justify-center shrink-0 group-hover:bg-orange-100 transition-colors">
                <span class="material-symbols-outlined text-[#FBB45E] text-lg" style="font-variation-settings:'FILL' 1;">home</span>
            </div>
            <div class="flex-1">
                <div class="font-semibold text-sm">Halaman Utama</div>
                <div class="text-xs text-gray-400 mt-0.5">Tidak ada tempat seperti rumah...</div>
            </div>
            <span class="text-gray-300 group-hover:text-[#FBB45E] group-hover:translate-x-0.5 transition-all text-lg font-bold">›</span>
        </a>

        <a href="/login"
           class="flex items-center gap-3.5 bg-white border border-gray-100 rounded-2xl px-5 py-4 no-underline text-[#363B58]
                  hover:border-[#FBB45E] hover:shadow-[0_4px_20px_rgba(251,180,94,0.2)] hover:-translate-y-0.5 transition-all group">
            <div class="w-9 h-9 bg-orange-50 rounded-xl flex items-center justify-center shrink-0 group-hover:bg-orange-100 transition-colors">
                <span class="material-symbols-outlined text-[#FBB45E] text-lg" style="font-variation-settings:'FILL' 1;">login</span>
            </div>
            <div class="flex-1">
                <div class="font-semibold text-sm">Masuk</div>
                <div class="text-xs text-gray-400 mt-0.5">Kembali ke akun kamu</div>
            </div>
            <span class="text-gray-300 group-hover:text-[#FBB45E] group-hover:translate-x-0.5 transition-all text-lg font-bold">›</span>
        </a>

    </div>

</div>

{{-- Animations --}}
<style>
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    @keyframes floatY {
        0%, 100% { transform: translateY(0); }
        50%       { transform: translateY(-8px); }
    }
    @keyframes ufoHover {
        0%, 100% { transform: translate(-50%, -55%); }
        50%       { transform: translate(-50%, -65%); }
    }
</style>

@endsection