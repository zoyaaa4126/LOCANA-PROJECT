@extends('layouts.main')

@section('title', '404 Error')

@section('content')
<style>
    /* animasi delay via inline style tetap diperlukan untuk SVG animate */
    .opacity-0-init { opacity: 0; }
</style>
<body class="bg-white text-blue-brand font-dm min-h-screen overflow-x-hidden">

    {{-- ── NAVBAR ── --}}
    <nav class="flex items-center justify-between px-12 py-5 relative z-10 max-sm:px-5">

        <a href="/" class="font-syne font-extrabold text-xl text-blue-brand flex items-center gap-2 no-underline">
            <span class="w-2.5 h-2.5 bg-yellow-brand rounded-full inline-block"></span>
            {{ config('app.name', 'MyApp') }}.
        </a>

        <ul class="flex gap-8 list-none max-sm:hidden">
            <li><a href="/"         class="text-sm font-medium text-blue-brand opacity-70 hover:opacity-100 transition-opacity no-underline">Beranda</a></li>
            <li><a href="/about"    class="text-sm font-medium text-blue-brand opacity-70 hover:opacity-100 transition-opacity no-underline">Tentang</a></li>
            <li><a href="/projects" class="text-sm font-medium text-blue-brand opacity-70 hover:opacity-100 transition-opacity no-underline">Proyek</a></li>
            <li><a href="/blog"     class="text-sm font-medium text-blue-brand opacity-70 hover:opacity-100 transition-opacity no-underline">Blog</a></li>
        </ul>

        <a href="/contact"
           class="bg-blue-brand text-white rounded-full text-sm font-medium px-5 py-2.5 flex items-center gap-2 no-underline hover:bg-blue-mid hover:-translate-y-px transition-all">
            <span class="w-6 h-6 bg-yellow-brand rounded-full flex items-center justify-center text-xs font-bold text-blue-brand">›</span>
            Hubungi Kami
        </a>
    </nav>

    {{-- ── HERO ── --}}
    <section class="flex flex-col items-center text-center px-6 pt-12 relative">

        <p class="opacity-0-init animate-fade-up-1 text-sm text-gray-400 tracking-wide mb-4">
            Kamu sepertinya tersesat...
        </p>

        <h1 class="opacity-0-init animate-fade-up-2 font-syne font-extrabold text-6xl leading-tight text-blue-brand flex items-center gap-3 flex-wrap justify-center max-sm:text-4xl">
            <span class="animate-float-1 inline-block">☁️</span>
            Ooops! Halaman tidak ditemukan
            <span class="animate-float-2 inline-block">💛</span>
        </h1>

        <p class="opacity-0-init animate-fade-up-3 text-sm text-gray-400 max-w-sm leading-relaxed mt-5">
            Jadwalkan
            <span class="bg-yellow-pale text-blue-brand px-1.5 py-0.5 rounded font-medium">panggilan 30 menit</span>
            untuk mendiskusikan kebutuhan dan tujuanmu. Kami siap menyelaraskan dan
            <span class="bg-yellow-pale text-blue-brand px-1.5 py-0.5 rounded font-medium">membuatkan</span>
            rencana aksi.
        </p>

        {{-- ── UFO ILLUSTRATION ── --}}
        <div class="opacity-0-init animate-fade-up-4 relative w-60 h-48 mt-10 mb-2">

            {{-- Radial rings --}}
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-80 h-80 pointer-events-none">
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-28 h-28 rounded-full border border-blue-brand/[.07]"></div>
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-48 h-48 rounded-full border border-blue-brand/[.07]"></div>
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-72 h-72 rounded-full border border-blue-brand/[.07]"></div>
            </div>

            {{-- Glow blob --}}
            <div class="absolute bottom-2 left-1/2 -translate-x-1/2 w-44 h-14 rounded-full"
                 style="background: radial-gradient(ellipse, rgba(91,127,255,0.25) 0%, transparent 70%)"></div>

            {{-- UFO SVG --}}
            <svg class="absolute top-1/2 left-1/2 animate-ufo w-40"
                 style="transform: translate(-50%, -55%)"
                 viewBox="0 0 160 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- Beam -->
                <path d="M65 75 L45 110 L115 110 L95 75Z" fill="url(#beamGrad)" opacity="0.35"/>
                <!-- Body bottom -->
                <ellipse cx="80" cy="72" rx="42" ry="10" fill="url(#bodyGrad)"/>
                <!-- Body top dome -->
                <ellipse cx="80" cy="58" rx="32" ry="18" fill="url(#topGrad)"/>
                <!-- Cockpit glass -->
                <ellipse cx="80" cy="50" rx="18" ry="13" fill="url(#glassGrad)" opacity="0.9"/>
                <!-- Cockpit shine -->
                <ellipse cx="74" cy="45" rx="6" ry="4" fill="white" opacity="0.35"/>
                <!-- Lights -->
                <circle cx="52"  cy="72" r="4"   fill="#F5C518" opacity="0.9">  <animate attributeName="opacity" values="0.9;0.3;0.9" dur="1.4s" repeatCount="indefinite"/></circle>
                <circle cx="66"  cy="76" r="3.5" fill="#5B7FFF" opacity="0.85"> <animate attributeName="opacity" values="0.85;0.2;0.85" dur="1.8s" repeatCount="indefinite" begin="0.4s"/></circle>
                <circle cx="80"  cy="78" r="4"   fill="#F5C518" opacity="0.9">  <animate attributeName="opacity" values="0.9;0.3;0.9" dur="1.2s" repeatCount="indefinite" begin="0.8s"/></circle>
                <circle cx="94"  cy="76" r="3.5" fill="#5B7FFF" opacity="0.85"> <animate attributeName="opacity" values="0.85;0.2;0.85" dur="1.6s" repeatCount="indefinite" begin="0.2s"/></circle>
                <circle cx="108" cy="72" r="4"   fill="#F5C518" opacity="0.9">  <animate attributeName="opacity" values="0.9;0.3;0.9" dur="1.3s" repeatCount="indefinite" begin="0.6s"/></circle>
                <!-- Lightning bolt -->
                <path d="M84 36 L78 50 L83 50 L77 65 L88 47 L82 47 Z" fill="#F5C518" opacity="0.85"/>
                <defs>
                    <linearGradient id="beamGrad" x1="80" y1="75" x2="80" y2="110" gradientUnits="userSpaceOnUse">
                        <stop offset="0%"   stop-color="#F5C518" stop-opacity="0.6"/>
                        <stop offset="100%" stop-color="#F5C518" stop-opacity="0"/>
                    </linearGradient>
                    <linearGradient id="bodyGrad" x1="40" y1="65" x2="120" y2="80" gradientUnits="userSpaceOnUse">
                        <stop offset="0%"   stop-color="#2E4BC6"/>
                        <stop offset="100%" stop-color="#1A2B6D"/>
                    </linearGradient>
                    <linearGradient id="topGrad" x1="50" y1="40" x2="110" y2="76" gradientUnits="userSpaceOnUse">
                        <stop offset="0%"   stop-color="#3A5AD9"/>
                        <stop offset="100%" stop-color="#1A2B6D"/>
                    </linearGradient>
                    <linearGradient id="glassGrad" x1="62" y1="37" x2="98" y2="63" gradientUnits="userSpaceOnUse">
                        <stop offset="0%"   stop-color="#A8BFFF"/>
                        <stop offset="100%" stop-color="#5B7FFF"/>
                    </linearGradient>
                </defs>
            </svg>
        </div>
    </section>

    {{-- ── QUICK LINKS ── --}}
    <div class="opacity-0-init animate-fade-up-5 w-full max-w-sm mx-auto flex flex-col gap-3 mt-10 mb-16 px-6">

        <a href="/"
           class="flex items-center gap-3.5 bg-white border border-gray-100 rounded-2xl px-5 py-4 no-underline text-blue-brand
                  hover:border-yellow-brand hover:shadow-[0_4px_20px_rgba(245,197,24,0.15)] hover:-translate-y-0.5 transition-all group">
            <div class="w-9 h-9 bg-blue-pale rounded-xl flex items-center justify-center flex-shrink-0 text-base group-hover:bg-yellow-pale transition-colors">
                🏠
            </div>
            <div class="flex-1">
                <div class="font-syne font-bold text-sm">Halaman Utama</div>
                <div class="text-xs text-gray-400 mt-0.5">Tidak ada tempat seperti rumah...</div>
            </div>
            <span class="text-blue-soft opacity-50 group-hover:opacity-100 group-hover:translate-x-0.5 transition-all text-lg">›</span>
        </a>

        <a href="/projects"
           class="flex items-center gap-3.5 bg-white border border-gray-100 rounded-2xl px-5 py-4 no-underline text-blue-brand
                  hover:border-yellow-brand hover:shadow-[0_4px_20px_rgba(245,197,24,0.15)] hover:-translate-y-0.5 transition-all group">
            <div class="w-9 h-9 bg-blue-pale rounded-xl flex items-center justify-center flex-shrink-0 text-base group-hover:bg-yellow-pale transition-colors">
                💼
            </div>
            <div class="flex-1">
                <div class="font-syne font-bold text-sm">Proyek</div>
                <div class="text-xs text-gray-400 mt-0.5">Di sini kita bicara karya</div>
            </div>
            <span class="text-blue-soft opacity-50 group-hover:opacity-100 group-hover:translate-x-0.5 transition-all text-lg">›</span>
        </a>

    </div>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        yellow: {
                            brand: '#F5C518',
                            light: '#FFE066',
                            pale:  '#FFF8D6',
                        },
                        blue: {
                            brand: '#1A2B6D',
                            mid:   '#2E4BC6',
                            soft:  '#5B7FFF',
                            pale:  '#EEF2FF',
                        },
                    },
                    fontFamily: {
                        syne: ['Syne', 'sans-serif'],
                        dm:   ['DM Sans', 'sans-serif'],
                    },
                    keyframes: {
                        fadeUp: {
                            '0%':   { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        floatY: {
                            '0%,100%': { transform: 'translateY(0)' },
                            '50%':     { transform: 'translateY(-8px)' },
                        },
                        floatY2: {
                            '0%,100%': { transform: 'translateY(0)' },
                            '50%':     { transform: 'translateY(-8px)' },
                        },
                        ufoHover: {
                            '0%,100%': { transform: 'translate(-50%, -55%)' },
                            '50%':     { transform: 'translate(-50%, -65%)' },
                        },
                        blink1: {
                            '0%,100%': { opacity: '0.9' },
                            '50%':     { opacity: '0.3' },
                        },
                        blink2: {
                            '0%,100%': { opacity: '0.85' },
                            '50%':     { opacity: '0.2' },
                        },
                    },
                    animation: {
                        'fade-up-1': 'fadeUp 0.6s ease forwards 0.2s',
                        'fade-up-2': 'fadeUp 0.6s ease forwards 0.35s',
                        'fade-up-3': 'fadeUp 0.6s ease forwards 0.5s',
                        'fade-up-4': 'fadeUp 0.7s ease forwards 0.65s',
                        'fade-up-5': 'fadeUp 0.6s ease forwards 0.85s',
                        'float-1':   'floatY 3s ease-in-out infinite',
                        'float-2':   'floatY2 3s ease-in-out infinite 1.5s',
                        'ufo':       'ufoHover 4s ease-in-out infinite',
                    },
                }
            }
        }
    </script>

</body>

@endsection