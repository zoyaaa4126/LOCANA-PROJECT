@extends('layouts.main')

@section('title')

@section('content')

<!-- CONTENT -->
<section class="px-6 py-4 md:px-[30px] md:py-0 flex flex-col gap-5 md:gap-8">
    <!-- HERO SECTION -->
    <section class="flex flex-col gap-5 p-0 justify-between items-center md:flex-row md:gap-10 md:pt-16">
        <!-- HERO LEFT -->
        <div class="self-stretch gap-2 w-full flex flex-col md:justify-center">
            <p class="text-[#fbb45e] font-[Poppins] text-[0.8rem] font-semibold self-stretch md:text-[1.25rem]">
                JELAJAHI BANDUNG</p>
            <h1
                class="font-[Poppins] text-[#363B58] text-[1.25rem]/[1.5rem] font-bold w-full md:text-[2.5rem]/[3rem]">
                Temukan <span
                    class="font-[Poppins] text-[#fbb45e] text-[1.25rem]/[1.5rem] font-bold md:text-[2.5rem]/[3rem]">
                    Tempat
                    Nongkrong</span> Favoritmu
                di Bandung</h1>
            <p
                class="text-[#363B58] text-[0.7rem]/[0.85rem] mb-1.5 text-justify font-normal w-full md:text-[1.25rem]/[1.5rem]">
                Dari kafe yang cozy sampai tempat hangout yang lagi ramai, Locana membantu kamu
                menjelajahi
                spot terbaik
                di Bandung dengan mudah. </p>

            <!-- BUTTON TELUSURI -->
            <div class="flex px-[0.9rem] py-[0.6rem] w-full items-center bg-[#EBEBEE] rounded-[0.6rem] md:mt-5">
                <span class="material-symbols-outlined mr-2 text-[#363B58] text-[0.1px]">search</span>
                <!-- GANTI UKURAN LOGO -->
                <input
                    class="flex border-none font-normal rounded-lg grow p-0 placeholder-[#363B58] text-[0.8rem] text-[#363B58] cursor-pointer outline-[none] bg-transparent md:px-4 md:py-3 md:text-[1.2rem]"
                    type="text" placeholder="Mau Pergi Kemana">
                <button
                    class="bg-[#F2994A] border-none flex px-5 py-[0.4rem] rounded-[0.3rem] text-[0.75rem] text-[#363B58] justify-center items-center font-bold cursor-pointer w-fit hover:text-[#363B58] md:text-[1.25rem]/[1.5rem] md:py-[0.7rem] md:px-8">
                    <p>Telusuri</p>
                </button>
            </div>
        </div>

        <!-- HERO RIGHT -->
        <div class="flex align-stretch relative overflow-hidden w-full md:w-[50vw] md:h-full ">
            <img src="assets/img/180 Cafe - Bandung 1.png" alt="cafe"
                class="w-full object-cover block [box-shadow:0,10px,25px,rgba(0,0,0,0.1)] h-40 rounded-lg md:h-96">

            <div
                class="absolute flex justify-between items-center bottom-[0.8rem] left-0 right-0 p-[0.8rem] text-[white] mx-4 rounded-lg bg-[rgba(255,255,255,0.80)] backdrop-filter backdrop-blur-[5px] md:px-4 md:py-4">
                <div class="flex flex-col gap-[0.1rem] md:gap-[0.3rem]">
                    <p class="text-[0.6rem] font-[Poppins] text-[#fbb45e] font-bold md:text-[1rem]/[120%]">SEDANG
                        TRENDING</p>
                    <h3 class="text-[0.8rem] font-[Poppins] text-[#363B58] font-bold md:text-[1.5rem]/[120%]">Alam
                        Cafe</h3>
                    <p class="text-[0.6rem] font-[Poppins] text-[#363B58] font-bold md:text-[0.8rem]/[120%]">Ciwidey,
                        Bandung</small>
                </div>
                <div class="bg-[#ECFCCA] px-3 py-2 flex gap-3 items-center rounded-[0.8rem]">
                    <div class="w-[0.6rem] h-[0.6rem] bg-[#05DF72] rounded-full"></div>
                    <p class="text-[#00C951] text-[0.7rem] font-[Poppins] font-bold md:text-[0.8rem]">Buka</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION KONDISI -->
    <section
        class="flex justify-between flex-col items-center gap-2.5 p-4.5 bg-[#363b58] rounded-[15px] text-[#D9D9D9] md:flex-row md:px-5 md:py-[0.8rem] md:gap-[15px]">
        <h3 class="text-[#EBEBEE] font-[Poppins] font-semibold text-[0.8rem] md:text-[1.25rem]">Kondisi Tempat</h3>
        <!-- KONDISI TEMPAT -->
        <div
            class="max-w-40 flex flex-col gap-[0.6rem] mt-[0.4rem] md:flex-row md:max-w-400 md:gap-8">
            <div class="flex items-center gap-2.5 justify-items-center w-fit">
                <div class="flex rounded-[50%] bg-white w-8 h-8 items-center justify-center md:w-10 md:h-10">
                    <span class="material-symbols-outlined text-[#363B58]">
                        coffee
                    </span>
                </div>
                <div class="text">
                    <p
                        class="text-[#EBEBEE] font-[Poppins] font-bold text-[0.6rem] md:text-[1rem] md:font-semibold">
                        Toko Kopi Jawa</p>
                    <h2 class="text-[#EBEBEE] font-[Poppins] font-bold text-[1rem]">Masih Sepi</h2>
                </div>
            </div>
            <div class="flex items-center gap-2.5 justify-items-center w-fit">
                <div class="flex rounded-[50%] bg-white w-8 h-8 items-center justify-center md:w-10 md:h-10">
                    <span class="material-symbols-outlined text-[#363B58]">
                        bakery_dining
                    </span>
                </div>
                <div class="text">
                    <p
                        class="text-[#EBEBEE] font-[Poppins] font-bold text-[0.6rem] md:text-[1rem] md:font-semibold">
                        Toko Kopi Jawa</p>
                    <h2 class="text-[#EBEBEE] font-[Poppins] font-bold text-[1rem]">Ramai</h2>
                </div>
            </div>
            <div class="flex items-center gap-2.5 justify-items-center w-fit">
                <div class="flex rounded-[50%] bg-white w-8 h-8 items-center justify-center md:w-10 md:h-10">
                    <span class="material-symbols-outlined text-[#363B58]">
                        fork_spoon
                    </span>
                </div>
                <div class="text">
                    <p
                        class="text-[#EBEBEE] font-[Poppins] font-bold text-[0.6rem] md:text-[1rem] md:font-semibold">
                        Toko Kopi Jawa</p>
                    <h2 class="text-[#EBEBEE] font-[Poppins] font-bold text-[1rem]">Sangat Ramai</h2>
                </div>
            </div>
        </div>

        <button
            class="bg-[#fbb45e] px-[20-px] py-[0.4rem] rounded-[0.3rem] border-none outline-none cursor-pointer flex items-center content-center hover:text-[#E2A255] md:px-[15px] md:py-2.5">
            <p class="text-[0.8rem] text-[#363B58] font-bold font-[Poppins] md:text-[1rem]">Lihat Semua Lokasi
            </p>
        </button>
    </section>
</section>

<!-- KENAPA LOCANA DESKTOP -->
<section class="hidden px-6 py-4 md:px-[30px] md:py-0 md:flex md:flex-col md:gap-5 md:mb-15">
</section>
<!-- Header Kenapa -->
<div class="flex flex-col gap-1 items-center">
    <h1 class="font-[Poppins] text-[#363B58] text-[1rem]/[1.5rem] font-bold  md:text-2xl">
        Kenapa Harus <span
            class="font-[Poppins] text-[#fbb45e] text-[1rem]/[1.5rem] font-bold  md:text-2xl">
            Locana?</span>
    </h1>
    <p class="text-[0.6rem]/[120%] text-center md:text-[1rem]/[120%] md:max-w-xl">Locana membantu kamu
        menemukan tempat hangout terbaik di Bandung
        dengan cepat dan mudah. Jelajahi berbagai kafe dan spot nongkrong yang sesuai dengan mood dan
        aktivitasmu.</p>
</div>

<!-- Content Kenapa -->
<div class="flex flex-row flex-wrap justify-center">
    <div class="w-1/2 p-2 md:w-1/5">
        <div
            class="flex flex-col justify-between min-h-30 md:min-h-40 w-full border-2 p-[0.6rem] rounded-[0.6rem] border-[#E2E8F0] bg-white">
            <div class="p-2 bg-[#363B58] w-fit rounded-full flex items-center justify-center ">
                <span class="material-symbols-outlined text-[#FBB45E]"
                    style="font-size: 1.5rem;">wifi_tethering</span>
            </div>
            <div class="flex flex-col gap-1">
                <h1 class="text-[0.6rem]/[120%] md:text-[0.9rem] font-bold">Update Kondisi Tempat</h1>
                <p class="text-[0.5rem]/[120%] md:text-[0.8rem]">Lihat kondisi terkini seperti ramai, sepi, atau
                    penuh.</p>
            </div>
        </div>
    </div>
    <div class="w-1/2 p-2 md:w-1/5">
        <div
            class="flex flex-col justify-between min-h-30 md:min-h-40 w-full border-2 p-[0.6rem] rounded-[0.6rem] border-[#E2E8F0] bg-white">
            <div class="p-2 bg-[#363B58] w-fit rounded-full flex items-center justify-center ">
                <span class="material-symbols-outlined text-[#FBB45E]"
                    style="font-size: 1.5rem;">star</span>
            </div>
            <div class="flex flex-col gap-1">
                <h1 class="text-[0.6rem]/[120%] md:text-[0.9rem] font-bold ">Review Tempat</h1>
                <p class="text-[0.5rem]/[120%] md:text-[0.8rem]">Baca dan bagikan pengalamanmu tentang suatu
                    tempat.</p>
            </div>
        </div>
    </div>
    <div class="w-1/2 p-2 md:w-1/5">
        <div
            class="flex flex-col justify-between min-h-30 md:min-h-40 w-full border-2 p-[0.6rem] rounded-[0.6rem] border-[#E2E8F0] bg-white">
            <div class="p-2 bg-[#363B58] w-fit rounded-full flex items-center justify-center ">
                <span class="material-symbols-outlined text-[#FBB45E]"
                    style="font-size: 1.5rem;">filter_list</span>
            </div>
            <div class="flex flex-col gap-1">
                <h1 class="text-[0.6rem]/[120%] md:text-[0.9rem] font-bold ">Cari Tempat Sesuai Preferensimu
                </h1>
                <p class="text-[0.5rem]/[120%] md:text-[0.8rem]">Temukan tempat berdasarkan kebutuhan dan
                    preferensi kamu.</p>
            </div>
        </div>
    </div>
    <div class="w-1/2 p-2 md:w-1/5">
        <div
            class="flex flex-col justify-between min-h-30 md:min-h-40 w-full border-2 p-[0.6rem]  rounded-[0.6rem] border-[#E2E8F0] bg-white">
            <div class="p-2 bg-[#363B58] w-fit rounded-full flex items-center justify-center ">
                <span class="material-symbols-outlined text-[#FBB45E]"
                    style="font-size: 1.5rem;">mood</span>
            </div>
            <div class="flex flex-col gap-1">
                <h1 class="text-[0.6rem]/[120%] md:text-[0.9rem] font-bold ">Rekomendasi sesuai Mood</h1>
                <p class="text-[0.5rem]/[120%] md:text-[0.8rem]">Dapatkan rekomendasi tempat berdasarkan suasana
                    hatimu.</p>
            </div>
        </div>
    </div>
    <div class="w-1/2 p-2 md:w-1/5">
        <div
            class="flex flex-col justify-between min-h-30 md:min-h-40 w-full border-2 p-[0.6rem] rounded-[0.6rem] border-[#E2E8F0] bg-white">
            <div class="p-2 bg-[#363B58] w-fit rounded-full flex items-center justify-center ">
                <span class="material-symbols-outlined text-[#FBB45E]"
                    style="font-size: 1.5rem;">favorite</span>
            </div>
            <div class="flex flex-col gap-1">
                <h1 class="text-[0.6rem]/[120%] md:text-[0.9rem] font-bold ">Tambahkan ke Wishlist</h1>
                <p class="text-[0.5rem]/[120%] md:text-[0.8rem]">Simpan tempat favorit untuk dikunjungi nanti.
                </p>
            </div>
        </div>
    </div>
</div>
</section>

<!-- POPULER -->
<section class="px-6 py-4 md:px-[30px] md:py-0 flex flex-col gap-2 md:mb-15 md:mt-4">
    <div class="flex flex-row justify-between items-center">
        <h1 class="font-[Poppins] text-[#363B58] text-[1rem]/[1.5rem] font-bold md:text-2xl ">
            Populer di <span class="font-[Poppins] text-[#fbb45e] text-[1rem]/[1.5rem] font-bold md:text-2xl">Bandung</span>
        </h1>
        <button class="bg-[#fbb45e] px-5 rounded-[0.3rem] border-none outline-none cursor-pointer flex items-center content-center hover:text-[#E2A255] md:px-[15px] md:py-2.5 py-[7px]">
            <p class="text-[0.8rem] text-[#363B58] font-bold font-[Poppins] md:text-[1rem]">Lihat Semua</p>
        </button>
    </div>

    <div class="flex gap-[0.6rem] overflow-x-auto py-2">
        @forelse($tempatPopuler as $tempat)
            <div class="bg-white rounded-xl shadow-md w-[43vw] shrink-0 border border-gray-100 p-4 hover:shadow-lg transition md:w-[280px]">
                
                <div style="position: relative; margin-bottom: 12px;">
                    <img src="{{ $tempat->gambar ? asset('storage/' . $tempat->gambar) : asset('assets/img/180 Cafe - Bandung 1.png') }}" 
                         alt="{{ $tempat->nama_tempat }}"
                         style="width: 100%; height: 160px; object-fit: cover; border-radius: 12px;">
                    
                    <button onclick="this.classList.toggle('bg-[#FBB45E]'); this.classList.toggle('text-[#363B58]'); this.classList.toggle('bg-[#FFF8EF]'); this.classList.toggle('text-[#FBB45E]');"
                            class="wishlist-btn absolute top-2 right-2 bg-[#FFF8EF] text-[#FBB45E] rounded-full w-fit p-[0.3rem] flex items-center justify-center shadow-md cursor-pointer transition-all duration-200"
                            style="font-variation-settings: 'FILL' 1;">
                    </button>
                </div>

                <div class="flex justify-between items-center">
                    <span class="text-[#FBB45E] font-[Poppins] font-bold text-[0.6rem] uppercase">
                        {{ $tempat->kategori->nama_kategori ?? 'CAFE' }}
                    </span>
                    <div class="flex items-center gap-1 text-sm">
                        <span class="material-symbols-outlined text-yellow-400" style="font-variation-settings: 'FILL' 1; font-size: 0.8rem">kid_star</span>
                        <span class="text-[0.6rem] font-[Poppins]">{{ $tempat->rating ?? '4.5' }} ({{ $tempat->total_review ?? '20' }})</span>
                    </div>
                </div>
                
                <h4 class="font-bold text-[0.8rem] mt-1 line-clamp-1">{{ $tempat->nama_tempat }}</h4>
                
                <div class="flex items-center gap-1 text-gray-500 text-[0.6rem] mt-1">
                    <span class="material-symbols-outlined text-sm" style="font-size: 0.8rem">location_on</span>
                    <span class="line-clamp-1">{{ $tempat->alamat_lengkap ?? 'Bandung' }}</span>
                </div>
                
                <div class="flex items-center gap-1 text-gray-500 text-[0.6rem] mt-1">
                    <span class="material-symbols-outlined text-sm" style="font-size: 0.8rem">payments</span>
                    <span>Rp{{ number_format($tempat->harga_min, 0, ',', '.') }} - Rp{{ number_format($tempat->harga_max, 0, ',', '.') }}</span>
                </div>
                
                <div class="flex items-center gap-2 mt-4">
                    <button class="flex-1 bg-gray-800 text-[#FBB45E] py-2 font-[Poppins] rounded-full text-[0.6rem] font-medium flex items-center justify-center gap-1 hover:bg-gray-700 transition">
                        <span class="material-symbols-outlined text-sm" style="font-size: 1rem">location_on</span>
                        Lihat Lokasi
                    </button>
                    <button class="share-btn bg-[#FBB45E] hover:bg-[#E2A255] text-[#363B58] flex items-center justify-center p-2 rounded-full transition">
                        <span class="material-symbols-outlined" style="font-size: 1rem">share</span>
                    </button>
                </div>
            </div>
        @empty
            <div class="w-full text-center py-8 text-gray-400 text-sm">
                Belum ada tempat populer yang tersedia saat ini.
            </div>
        @endforelse
    </div>
</section>

<!-- REKOMENDASI -->
<section class="px-6 py-4 md:px-[30px] md:py-0 flex flex-col gap-4 md:mb-15 md:gap-5">
    <!-- Header Rekomendasi -->
    <h1 class="font-[Poppins] text-[#363B58] text-[1rem]/[1.5rem] font-bold  md:text-2xl">
        Rekomendasi Berdasarkan <span
            class="font-[Poppins] text-[#fbb45e] text-[1rem]/[1.5rem] font-bold  md:text-2xl">Mood</span>
    </h1>

    <!-- Content Rekomendasi -->
    <div class="flex gap-[0.4rem] overflow-x-auto">
        @foreach ($moods as $mood)
        <x-card-mood-landing :judul="$mood->nama"></x-card-mood-landing>
        @endforeach
        <!-- <div
            class="flex items-center w-28 h-fit gap-2.5 bg-white rounded-[0.6rem] p-2.5 border border-[#E2E8F0] shadow flex-col text-center content-center justify-center md:flex-row md:text-left md:justify-start md:w-fit">
            <img src="assets/img/Hot beverage.png" class="w-[4.3rem]" alt="hotbeverage">
            <div class="flex flex-col gap-2">
                <h4 class="font-bold font-[Poppins] text-[0.8rem]">Chill</h4>
                <p class="font-normal text-[0.6rem]/[120%] hidden md:block md:max-w-44">Tempat santai dengan
                    suasana tenang, cocok untuk melepas penat atau sekadar menikmati waktu sendiri.</p>
                <div
                    class="flex-1 bg-gray-800 text-[#FBB45E] px-[0.8rem] py-[0.4rem] font-[Poppins] rounded-lg text-[0.6rem] font-medium flex items-center justify-center gap-1 hover:bg-gray-700 transition md:hidden">
                    <p>Jelajahi</p>
                    <p>></p>
                </div>
            </div>
        </div>
        <div
            class="flex items-center w-28 h-fit gap-2.5 bg-white rounded-[0.6rem] p-2.5 border border-[#E2E8F0] shadow flex-col text-center content-center justify-center md:flex-row md:text-left md:justify-start md:w-fit">
            <img src="assets/img/Teacup without handle.png" class="w-[4.3rem]" alt="hotbeverage">
            <div class="flex flex-col gap-2">
                <h4 class="font-bold font-[Poppins] text-[0.8rem]">Hangout</h4>
                <p class="font-normal text-[0.6rem]/[120%] hidden md:block md:max-w-44">Tempat santai dengan
                    suasana tenang, cocok untuk melepas penat atau sekadar menikmati waktu sendiri.</p>
                <div
                    class="flex-1 bg-gray-800 text-[#FBB45E] px-[0.8rem] py-[0.4rem] font-[Poppins] rounded-lg text-[0.6rem] font-medium flex items-center justify-center gap-1 hover:bg-gray-700 transition md:hidden">
                    <p>Jelajahi</p>
                    <p>></p>
                </div>
            </div>
        </div>
        <div
            class="flex items-center w-28 h-fit gap-2.5 bg-white rounded-[0.6rem] p-2.5 border border-[#E2E8F0] shadow flex-col text-center content-center justify-center md:flex-row md:text-left md:justify-start md:w-fit">
            <img src="assets/img/Ferris wheel.png" class="w-[4.3rem]" alt="hotbeverage">
            <div class="flex flex-col gap-2">
                <h4 class="font-bold font-[Poppins] text-[0.8rem]">Keluarga</h4>
                <p class="font-normal text-[0.6rem]/[120%] hidden md:block md:max-w-44">Tempat santai dengan
                    suasana tenang, cocok untuk melepas penat atau sekadar menikmati waktu sendiri.</p>
                <div
                    class="flex-1 bg-gray-800 text-[#FBB45E] px-[0.8rem] py-[0.4rem] font-[Poppins] rounded-lg text-[0.6rem] font-medium flex items-center justify-center gap-1 hover:bg-gray-700 transition md:hidden">
                    <p>Jelajahi</p>
                    <p>></p>
                </div>
            </div>
        </div>
        <div
            class="flex items-center w-28 h-fit gap-2.5 bg-white rounded-[0.6rem] p-2.5 border border-[#E2E8F0] shadow flex-col text-center content-center justify-center md:flex-row md:text-left md:justify-start md:w-fit">
            <img src="assets/img/red heart.png" class="w-[4.3rem]" alt="hotbeverage">
            <div class="flex flex-col gap-2">
                <h4 class="font-bold font-[Poppins] text-[0.8rem]">Romantis</h4>
                <p class="font-normal text-[0.6rem]/[120%] hidden md:block md:max-w-44">Tempat santai dengan
                    suasana tenang, cocok untuk melepas penat atau sekadar menikmati waktu sendiri.</p>
                <div
                    class="flex-1 bg-gray-800 text-[#FBB45E] px-[0.8rem] py-[0.4rem] font-[Poppins] rounded-lg text-[0.6rem] font-medium flex items-center justify-center gap-1 hover:bg-gray-700 transition md:hidden">
                    <p>Jelajahi</p>
                    <p>></p>
                </div>
            </div>
        </div>
        <div
            class="flex items-center w-28 h-fit gap-2.5 bg-white rounded-[0.6rem] p-2.5 border border-[#E2E8F0] shadow flex-col text-center content-center justify-center md:flex-row md:text-left md:justify-start md:w-fit">
            <img src="assets/img/moon.png" class="w-[4.3rem]" alt="hotbeverage">
            <div class="flex flex-col gap-2">
                <h4 class="font-bold font-[Poppins] text-[0.8rem]">Petualangan</h4>
                <p class="font-normal text-[0.6rem]/[120%] hidden md:block md:max-w-44">Tempat santai dengan
                    suasana tenang, cocok untuk melepas penat atau sekadar menikmati waktu sendiri.</p>
                <div
                    class="flex-1 bg-gray-800 text-[#FBB45E] px-[0.8rem] py-[0.4rem] font-[Poppins] rounded-lg text-[0.6rem] font-medium flex items-center justify-center gap-1 hover:bg-gray-700 transition md:hidden">
                    <p>Jelajahi</p>
                    <p>></p>
                </div>
            </div>
        </div> -->
    </div>
</section>

<!-- REVIEW -->
<section class="px-6 py-4 md:px-[30px] md:py-0 flex flex-col gap-4 md:mb-15 md:gap-5">
    <!-- Header Review -->
    <h1 class="font-[Poppins] text-[#363B58] text-[1rem]/[1.5rem] font-bold  md:text-2xl">
        Dengar <span class="font-[Poppins] text-[#fbb45e] text-[1rem]/[1.5rem] font-bold  md:text-2xl">
            Cerita</span>
        dari <span class="font-[Poppins] text-[#fbb45e] text-[1rem]/[1.5rem] font-bold  md:text-2xl">
            Pengguna
            Lain</span>
    </h1>

    <!-- Content Review -->
    <div class="flex gap-[0.4rem] overflow-x-auto md:gap-4">
        <div
            class="flex flex-col items-start w-[70vw] min-w-[70vw] bg-white rounded-[20px] p-5 border border-[#E2E8F0] shadow gap-6 md:min-w-[25vw] md:max-w-[25vw]">
            <div class="flex justify-between items-center gap-5 w-fit">
                <div class="flex gap-2.5 w-fit">
                    <img src="assets/img/kenma.jpeg" class="rounded-full w-[1.8rem] md:w-10" alt="userpict">
                    <div>
                        <h4 class="text-[0.8rem] font-semibold leading-[120%] w-fit md:text-[1rem]">KenmaKozzz
                        </h4>
                        <p class="text-[0.6rem] font-normal leading-[120%] w-fit md:text-[0.8rem]">15 Januari 2026
                        </p>
                    </div>
                </div>
                <span class="text-[0.75rem]">⭐⭐⭐⭐⭐</span>
            </div>
            <p class="italic text-[0.7rem]/[120%]">"Tempat ini sangat bagus saya suka sekali
                tidak sabar untuk merekomendasikan kepada yang lainnya."
            </p>
            <div class="flex items-center gap-[5px] border-t w-full pt-2 border-gray-300">
                <span class="material-symbols-outlined text-[#FBB45E]" style="font-size: 0.8rem;">location_on</span>
                <p class="text-[0.6rem] md:text-[0.7rem]">Kopi Senja Cafe</p>
            </div>
        </div>
        <div
            class="flex flex-col items-start w-[70vw] min-w-[70vw] bg-white rounded-[20px] p-5 border border-[#E2E8F0] shadow gap-6 md:min-w-[25vw] md:max-w-[25vw]">
            <div class="flex justify-between items-center gap-5 w-fit">
                <div class="flex gap-2.5 w-fit">
                    <img src="assets/img/kenma.jpeg" class="rounded-full w-[1.8rem] md:w-10" alt="userpict">
                    <div>
                        <h4 class="text-[0.8rem] font-semibold leading-[120%] w-fit md:text-[1rem]">KenmaKozzz
                        </h4>
                        <p class="text-[0.6rem] font-normal leading-[120%] w-fit md:text-[0.8rem]">15 Januari 2026
                        </p>
                    </div>
                </div>
                <span class="text-[0.75rem]">⭐⭐⭐⭐⭐</span>
            </div>
            <p class="italic text-[0.7rem]/[120%]">"Tempat ini sangat bagus saya suka sekali
                tidak sabar untuk merekomendasikan kepada yang lainnya."
            </p>
            <div class="flex items-center gap-[5px] border-t w-full pt-2 border-gray-300">
                <span class="material-symbols-outlined text-[#FBB45E]" style="font-size: 0.8rem;">location_on</span>
                <p class="text-[0.6rem] md:text-[0.7rem]">Kopi Senja Cafe</p>
            </div>
        </div>
        <div
            class="flex flex-col items-start w-[70vw] min-w-[70vw] bg-white rounded-[20px] p-5 border border-[#E2E8F0] shadow gap-6 md:min-w-[25vw] md:max-w-[25vw]">
            <div class="flex justify-between items-center gap-5 w-fit">
                <div class="flex gap-2.5 w-fit">
                    <img src="assets/img/kenma.jpeg" class="rounded-full w-[1.8rem] md:w-10" alt="userpict">
                    <div>
                        <h4 class="text-[0.8rem] font-semibold leading-[120%] w-fit md:text-[1rem]">KenmaKozzz
                        </h4>
                        <p class="text-[0.6rem] font-normal leading-[120%] w-fit md:text-[0.8rem]">15 Januari 2026
                        </p>
                    </div>
                </div>
                <span class="text-[0.75rem]">⭐⭐⭐⭐⭐</span>
            </div>
            <p class="italic text-[0.7rem]/[120%]">"Tempat ini sangat bagus saya suka sekali
                tidak sabar untuk merekomendasikan kepada yang lainnya."
            </p>
            <div class="flex items-center gap-[5px] border-t w-full pt-2 border-gray-300">
                <span class="material-symbols-outlined text-[#FBB45E]" style="font-size: 0.8rem;">location_on</span>
                <p class="text-[0.6rem] md:text-[0.7rem]">Kopi Senja Cafe</p>
            </div>
        </div>
        <div
            class="flex flex-col items-start w-[70vw] min-w-[70vw] bg-white rounded-[20px] p-5 border border-[#E2E8F0] shadow gap-6 md:min-w-[25vw] md:max-w-[25vw]">
            <div class="flex justify-between items-center gap-5 w-fit">
                <div class="flex gap-2.5 w-fit">
                    <img src="assets/img/kenma.jpeg" class="rounded-full w-[1.8rem] md:w-10" alt="userpict">
                    <div>
                        <h4 class="text-[0.8rem] font-semibold leading-[120%] w-fit md:text-[1rem]">KenmaKozzz
                        </h4>
                        <p class="text-[0.6rem] font-normal leading-[120%] w-fit md:text-[0.8rem]">15 Januari 2026
                        </p>
                    </div>
                </div>
                <span class="text-[0.75rem]">⭐⭐⭐⭐⭐</span>
            </div>
            <p class="italic text-[0.7rem]/[120%]">"Tempat ini sangat bagus saya suka sekali
                tidak sabar untuk merekomendasikan kepada yang lainnya."
            </p>
            <div class="flex items-center gap-[5px] border-t w-full pt-2 border-gray-300">
                <span class="material-symbols-outlined text-[#FBB45E]" style="font-size: 0.8rem;">location_on</span>
                <p class="text-[0.6rem] md:text-[0.7rem]">Kopi Senja Cafe</p>
            </div>
        </div>
    </div>
</section>

<!-- KENAPA LOCANA MOBILE -->
<section class="px-6 py-4 md:px-[30px] md:py-0 flex flex-col gap-2 md:mb-15 md:gap-5 md:hidden">
    <!-- Header Kenapa -->
    <div class="flex flex-col gap-1 items-center">
        <h1 class="font-[Poppins] text-[#363B58] text-[1rem]/[1.5rem] font-bold  md:text-[2.5rem]/[3rem]">
            Kenapa Harus <span
                class="font-[Poppins] text-[#fbb45e] text-[1rem]/[1.5rem] font-bold  md:text-[2.5rem]/[3rem]">
                Locana?</span>
        </h1>
        <p class="text-[0.6rem]/[120%] text-center md:text-[1rem]/[120%] md:max-w-2xl">Locana membantu kamu
            menemukan tempat hangout terbaik di Bandung
            dengan cepat dan mudah. Jelajahi berbagai kafe dan spot nongkrong yang sesuai dengan mood dan
            aktivitasmu.</p>
    </div>

    <!-- Content Kenapa -->
    <div class="flex flex-row flex-wrap justify-center">
        <div class="w-1/2 p-2 md:w-1/5">
            <div
                class="flex flex-col justify-between min-h-30 md:min-h-40 w-full border-2 p-[0.6rem] rounded-[0.6rem] border-[#E2E8F0] bg-white">
                <div class="p-2 bg-[#363B58] w-fit rounded-full flex items-center justify-center ">
                    <span class="material-symbols-outlined text-[#FBB45E]"
                        style="font-size: 1.5rem;">wifi_tethering</span>
                </div>
                <div class="flex flex-col gap-1">
                    <h1 class="text-[0.6rem]/[120%] md:text-[0.9rem] font-bold">Update Kondisi Tempat</h1>
                    <p class="text-[0.5rem]/[120%] md:text-[0.8rem]">Lihat kondisi terkini seperti ramai, sepi, atau
                        penuh.</p>
                </div>
            </div>
        </div>
        <div class="w-1/2 p-2 md:w-1/5">
            <div
                class="flex flex-col justify-between min-h-30 md:min-h-40 w-full border-2 p-[0.6rem] rounded-[0.6rem] border-[#E2E8F0] bg-white">
                <div class="p-2 bg-[#363B58] w-fit rounded-full flex items-center justify-center ">
                    <span class="material-symbols-outlined text-[#FBB45E]"
                        style="font-size: 1.5rem;">star</span>
                </div>
                <div class="flex flex-col gap-1">
                    <h1 class="text-[0.6rem]/[120%] md:text-[0.9rem] font-bold ">Review Tempat</h1>
                    <p class="text-[0.5rem]/[120%] md:text-[0.8rem]">Baca dan bagikan pengalamanmu tentang suatu
                        tempat.</p>
                </div>
            </div>
        </div>
        <div class="w-1/2 p-2 md:w-1/5">
            <div
                class="flex flex-col justify-between min-h-30 md:min-h-40 w-full border-2 p-[0.6rem] rounded-[0.6rem] border-[#E2E8F0] bg-white">
                <div class="p-2 bg-[#363B58] w-fit rounded-full flex items-center justify-center ">
                    <span class="material-symbols-outlined text-[#FBB45E]"
                        style="font-size: 1.5rem;">filter_list</span>
                </div>
                <div class="flex flex-col gap-1">
                    <h1 class="text-[0.6rem]/[120%] md:text-[0.9rem] font-bold ">Cari Tempat Sesuai Preferensimu
                    </h1>
                    <p class="text-[0.5rem]/[120%] md:text-[0.8rem]">Temukan tempat berdasarkan kebutuhan dan
                        preferensi kamu.</p>
                </div>
            </div>
        </div>
        <div class="w-1/2 p-2 md:w-1/5">
            <div
                class="flex flex-col justify-between min-h-30 md:min-h-40 w-full border-2 p-[0.6rem]  rounded-[0.6rem] border-[#E2E8F0] bg-white">
                <div class="p-2 bg-[#363B58] w-fit rounded-full flex items-center justify-center ">
                    <span class="material-symbols-outlined text-[#FBB45E]"
                        style="font-size: 1.5rem;">mood</span>
                </div>
                <div class="flex flex-col gap-1">
                    <h1 class="text-[0.6rem]/[120%] md:text-[0.9rem] font-bold ">Rekomendasi sesuai Mood</h1>
                    <p class="text-[0.5rem]/[120%] md:text-[0.8rem]">Dapatkan rekomendasi tempat berdasarkan suasana
                        hatimu.</p>
                </div>
            </div>
        </div>
        <div class="w-1/2 p-2 md:w-1/5">
            <div
                class="flex flex-col justify-between min-h-30 md:min-h-40 w-full border-2 p-[0.6rem] rounded-[0.6rem] border-[#E2E8F0] bg-white">
                <div class="p-2 bg-[#363B58] w-fit rounded-full flex items-center justify-center ">
                    <span class="material-symbols-outlined text-[#FBB45E]"
                        style="font-size: 1.5rem;">favorite</span>
                </div>
                <div class="flex flex-col gap-1">
                    <h1 class="text-[0.6rem]/[120%] md:text-[0.9rem] font-bold ">Tambahkan ke Wishlist</h1>
                    <p class="text-[0.5rem]/[120%] md:text-[0.8rem]">Simpan tempat favorit untuk dikunjungi nanti.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER ATAS -->
<section class="relative px-6 py-4 md:px-[30px] md:py-0 flex flex-col gap-4">
    <div class="absolute inset-0">
        <svg class="absolute top-8 left-11 md:left-30" xmlns="http://www.w3.org/2000/svg" width="9" height="9"
            viewBox="0 0 9 9" fill="none">
            <path
                d="M3.62219 0.341383C3.72961 -0.113823 4.37746 -0.113823 4.48488 0.341383L5.04828 2.72899C5.08684 2.8924 5.21443 3.01998 5.37784 3.05854L7.76544 3.62195C8.22065 3.72936 8.22065 4.37722 7.76544 4.48463L5.37784 5.04803C5.21443 5.08659 5.08684 5.21418 5.04828 5.37759L4.48488 7.76519C4.37746 8.2204 3.72961 8.2204 3.62219 7.7652L3.05879 5.37759C3.02023 5.21418 2.89264 5.08659 2.72923 5.04803L0.341628 4.48463C-0.113579 4.37722 -0.113579 3.72936 0.341627 3.62195L2.72923 3.05854C2.89264 3.01998 3.02023 2.8924 3.05879 2.72899L3.62219 0.341383Z"
                fill="white" />
        </svg>
        <svg class="absolute top-18 left-14 md:left-54" xmlns="http://www.w3.org/2000/svg" width="9" height="9"
            viewBox="0 0 9 9" fil="none">
            <path
                d="M3.62219 0.341383C3.72961 -0.113823 4.37746 -0.113823 4.48488 0.341383L5.04828 2.72899C5.08684 2.8924 5.21443 3.01998 5.37784 3.05854L7.76544 3.62195C8.22065 3.72936 8.22065 4.37722 7.76544 4.48463L5.37784 5.04803C5.21443 5.08659 5.08684 5.21418 5.04828 5.37759L4.48488 7.76519C4.37746 8.2204 3.72961 8.2204 3.62219 7.7652L3.05879 5.37759C3.02023 5.21418 2.89264 5.08659 2.72923 5.04803L0.341628 4.48463C-0.113579 4.37722 -0.113579 3.72936 0.341627 3.62195L2.72923 3.05854C2.89264 3.01998 3.02023 2.8924 3.05879 2.72899L3.62219 0.341383Z"
                fill="white" />
        </svg>
        <svg class="absolute top-36 left-10 md:left-43" xmlns="http://www.w3.org/2000/svg" width="9" height="9"
            viewBox="0 0 9 9" fill="none">
            <path
                d="M3.62219 0.341383C3.72961 -0.113823 4.37746 -0.113823 4.48488 0.341383L5.04828 2.72899C5.08684 2.8924 5.21443 3.01998 5.37784 3.05854L7.76544 3.62195C8.22065 3.72936 8.22065 4.37722 7.76544 4.48463L5.37784 5.04803C5.21443 5.08659 5.08684 5.21418 5.04828 5.37759L4.48488 7.76519C4.37746 8.2204 3.72961 8.2204 3.62219 7.7652L3.05879 5.37759C3.02023 5.21418 2.89264 5.08659 2.72923 5.04803L0.341628 4.48463C-0.113579 4.37722 -0.113579 3.72936 0.341627 3.62195L2.72923 3.05854C2.89264 3.01998 3.02023 2.8924 3.05879 2.72899L3.62219 0.341383Z"
                fill="white" />
        </svg>
        <svg class="absolute top-8 right-11 md:right-32" xmlns="http://www.w3.org/2000/svg" width="9" height="9"
            viewBox="0 0 9 9" fill="none">
            <path
                d="M3.62219 0.341383C3.72961 -0.113823 4.37746 -0.113823 4.48488 0.341383L5.04828 2.72899C5.08684 2.8924 5.21443 3.01998 5.37784 3.05854L7.76544 3.62195C8.22065 3.72936 8.22065 4.37722 7.76544 4.48463L5.37784 5.04803C5.21443 5.08659 5.08684 5.21418 5.04828 5.37759L4.48488 7.76519C4.37746 8.2204 3.72961 8.2204 3.62219 7.7652L3.05879 5.37759C3.02023 5.21418 2.89264 5.08659 2.72923 5.04803L0.341628 4.48463C-0.113579 4.37722 -0.113579 3.72936 0.341627 3.62195L2.72923 3.05854C2.89264 3.01998 3.02023 2.8924 3.05879 2.72899L3.62219 0.341383Z"
                fill="white" />
        </svg>
        <svg class="absolute top-22 right-13 md:right-50" xmlns="http://www.w3.org/2000/svg" width="9" height="9"
            viewBox="0 0 9 9" fill="none">
            <path
                d="M3.62219 0.341383C3.72961 -0.113823 4.37746 -0.113823 4.48488 0.341383L5.04828 2.72899C5.08684 2.8924 5.21443 3.01998 5.37784 3.05854L7.76544 3.62195C8.22065 3.72936 8.22065 4.37722 7.76544 4.48463L5.37784 5.04803C5.21443 5.08659 5.08684 5.21418 5.04828 5.37759L4.48488 7.76519C4.37746 8.2204 3.72961 8.2204 3.62219 7.7652L3.05879 5.37759C3.02023 5.21418 2.89264 5.08659 2.72923 5.04803L0.341628 4.48463C-0.113579 4.37722 -0.113579 3.72936 0.341627 3.62195L2.72923 3.05854C2.89264 3.01998 3.02023 2.8924 3.05879 2.72899L3.62219 0.341383Z"
                fill="white" />
        </svg>
        <svg class="absolute top-34 right-10 md:right-40" xmlns="http://www.w3.org/2000/svg" width="9" height="9"
            viewBox="0 0 9 9" fill="none">
            <path
                d="M3.62219 0.341383C3.72961 -0.113823 4.37746 -0.113823 4.48488 0.341383L5.04828 2.72899C5.08684 2.8924 5.21443 3.01998 5.37784 3.05854L7.76544 3.62195C8.22065 3.72936 8.22065 4.37722 7.76544 4.48463L5.37784 5.04803C5.21443 5.08659 5.08684 5.21418 5.04828 5.37759L4.48488 7.76519C4.37746 8.2204 3.72961 8.2204 3.62219 7.7652L3.05879 5.37759C3.02023 5.21418 2.89264 5.08659 2.72923 5.04803L0.341628 4.48463C-0.113579 4.37722 -0.113579 3.72936 0.341627 3.62195L2.72923 3.05854C2.89264 3.01998 3.02023 2.8924 3.05879 2.72899L3.62219 0.341383Z"
                fill="white" />
        </svg>
    </div>
    <div
        class="bg-[#363B58] flex w-full flex-col justify-center items-center rounded-[20px] text-[#fefefe] py-4 gap-[0.3rem] md:py-4 md:px-5 md:gap-4">
        <h2 class="text-center text-[1rem] w-56 not-italic font-bold leading-[120%] md:text-[1.5rem] md:w-fit md:mt-4">
            Setiap
            Momen Punya Tempatnya</h2>
        <p class="text-center w-[16rem] text-[0.62rem]/[120%] font-normal md:text-[0.8rem] md:w-120">
            Temukan berbagai tempat hangout terbaik yang sesuai dengan mood, preferensi, dan momen kamu hari
            ini.
        </p>

        <div class="flex gap-[5px] mt-2 md:flex-row md:gap-2 md:mt-4">
            <button
                class="bg-[#fbb45e] px-[15px] py-[0.3rem] flex items-center content-center rounded-[0.3rem] border-none outline-[none] cursor-pointer">
                <span
                    class="text-[0.6rem] text-[#363B58] md:text-[0.9rem]#363B58] font-bold text-0.8rem md:text-[1rem]">Lanjut
                    Sebagai Tamu</span>
            </button>
            <button
                class="bg-[#fbb45e] px-[15px] flex items-center content-center rounded-[0.3rem] border-none outline-[none] cursor-pointer">
                <span class="text-[0.6rem] text-[#363B58] font-bold text-0.8rem md:text-[1rem]">Masuk</span>
            </button>
        </div>
    </div>
</section>

<!-- FOOTER BAWAH -->
<footer
    class="bg-[white] text-[#363b58] w-full py-6 h-fit mt-5 border-t-2 border-gray-300 content-center">
    <div class="px-6 md:px-[30px] md:py-0 flex flex-col gap-2 items-center md:gap-4">
        <!-- LOGO -->
        <div class="flex text-[#363b58] items-center gap-1">
            <img src="assets/img/Locana_Logo 1.png" alt="logloc"
                class="h-5 w-5 object-contain leading-[120%] md:w-8 md:h-8 md:object-contain">
            <span class="text-[0.75rem] font-bold md:font-semibold md:text-lg md:text-[#363B58]">LOCANA</span>
        </div>

        <p class="italic text-center max-w-[600px] text-[0.6rem]/[120%] md:text-base md:items-center text-gray-600">
            "Setiap
            momen punya tempatnya sendiri-kami bantu kamu menemukannya dengan lebih mudah dan personal."</p>

        <div class="flex justify-center mt-2 items-start gap-[5px] md:gap-[5px]">
            <button
                class="flex px-[0.6rem] py-2 justify-center w-[75px] items-center gap-[5px] rounded-[10px] bg-[#FEF4E7] border-none cursor-pointer md:w-fit hover:bg-[#e3e1df] hover:text-[white]">
                <span class="material-symbols-outlined" style="font-size: 0.8rem;">
                    call
                </span>
                <span class="text-[0.6rem] md:text-[0.8rem]">Telepon</span>
            </button>
            <button
                class="flex px-[0.6rem] py-2 justify-center w-[75px] items-center gap-[5px] rounded-[10px] bg-[#FEF4E7] border-none cursor-pointer md:w-fit hover:bg-[#e3e1df] hover:text-[white]">
                <span class="material-symbols-outlined" style="font-size: 0.8rem;">
                    mail
                </span>
                <span class="text-[0.6rem] md:text-[0.8rem]">Email</span>
            </button>
        </div>

    </div>
    <div class="w-full text-center text-[#363B58] bg-[white] mt-6">
        <h2 class="text-[0.6rem] font-bold leading-[120%] md:text-[0.8rem]">&copy; 2026 Locana. All right
            reserved.
        </h2>
    </div>
</footer>

@endsection