@extends('layouts.app')
@section('title', 'Homepage')
@section('content')

        <section>
            <div class="relative">
                <div class="relative w-full h-[33rem] max-md:h-[14rem] overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <img src="{{ asset($places->gambar_tempat) }}" class="w-full h-full object-cover object-center max-md:h-64" alt="{{ $places->nama_tempat }}c">
                </div>

                <div class="absolute top-[3rem] left-8 flex gap-3 max-md:top-[16px] max-md:left-[10px] max-md:gap-[6px] max-md:scale-75 max-md:origin-top-left">
                    <button onclick="window.location.href='{{ route('home') }}'" class="flex items-center gap-1 bg-[#FFFFFF] px-5 py-2 rounded-[1rem] text-[#FBB45E] font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" height="23px" viewBox="0 -960 960 960" width="23px" fill="#FBB45E">
                            <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/>
                        </svg>
                        <span class="text-sm max-md:hidden">Kembali</span>
                    </button>
                </div>

                <div class="absolute top-[3rem] right-8 flex gap-3 z-10 max-md:top-[16px] max-md:right-[10px] max-md:gap-[6px] max-md:scale-75 max-md:origin-top-right">
                    <button class="flex items-center gap-1 bg-[#FBB45E] px-5 py-2 rounded-[1rem] font-bold hover:bg-[#E2A255] transition-colors" id="btnWishlist" data-place-id="{{ $places->id }}" data-saved="{{ auth()->check() && \App\Models\Wishlist::where('user_id', auth()->id())->where('place_id', $places->id)->exists() ? 'true' : 'false' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="23px" viewBox="0 -960 960 960" width="23px" fill="#000000">
                            <path id="wishlistIcon" d="M200-120v-640q0-33 23.5-56.5T280-840h400q33 0 56.5 23.5T760-760v640L480-240 200-120Zm80-122 200-86 200 86v-518H280v518Zm0-518h400-400Z" />
                        </svg>
                        <span class="text-sm max-md:hidden">Simpan</span>
                    </button>

                    <button class="flex items-center gap-1 bg-[#FBB45E] px-5 py-2 rounded-[1rem] font-bold hover:bg-[#E2A255] transition-colors" id="btnMaps">
                        <svg xmlns="http://www.w3.org/2000/svg" height="23px" viewBox="0 -960 960 960" width="23" fill="#000000">
                            <path d="m600-120-240-84-186 72q-20 8-37-4.5T120-170v-560q0-13 7.5-23t20.5-15l212-72 240 84 186-72q20-8 37 4.5t17 33.5v560q0 13-7.5 23T812-192l-212 72Zm-40-98v-468l-160-56v468l160 56Zm80 0 120-40v-474l-120 46v468Zm-440-10 120-46v-468l-120 40v474Zm440-458v468-468Zm-320-56v468-468Z" />
                        </svg>
                        <span class="text-sm max-md:hidden">Lihat Map</span>
                    </button>
                </div>

                <div class="absolute inset-0 flex flex-col justify-end px-20 pb-10 text-white gap-3 pointer-events-none
                max-md:px-4 max-md:pb-6">
                    <div class="text-6xl font-bold max-md:text-2xl max-md:leading-none">{{ $places->nama_tempat }}</div>
                    <div class="text-3xl font-semibold max-md:text-[14px] max-md:leading-none">
                        ⭐⭐⭐⭐ • {{ $places->kategori->nama }} • Rp.{{ number_format($places->harga_min, 0, ',', '.') }}-{{ number_format($places->harga_max, 0, ',', '.') }} • 
                        <span id="jarak">Menghitung jarak...</span>
                    </div>
                </div>
            </div>

            <div class="mx-[5rem] my-[3rem] max-md:mx-[1rem] max-md:my-[1rem]">
                <div class="text-lg pb-2 max-md:text-[16px]">{{ $places->deskripsi }}</div>
                <div class="text-md font-bold py-2 max-md:text-[14px]">{{ $places->alamat_lengkap }}</div>
                <div class="text-md font-bold py-2 max-md:text-[14px]">
                    @php
                    $fasilitasList = [
                        'wifi'          => 'WiFi',
                        'ruang_ac'      => 'Ruang AC',
                        'stopkontan'    => 'Stopkontan',
                        'parkir_luas'   => 'Parkir Luas',
                        'area_merokok'  => 'Area Merokok',
                        'toilet'        => 'Toilet',
                        'photobooth'    => 'Photobooth',
                        'musholla'      => 'Musholla',
                        'ruang_meeting' => 'Ruang Meeting',
                        'board_game'    => 'Board Game',
                    ];
                    @endphp
                    @foreach($fasilitasList as $key => $label)
                        @if($places->$key)
                            <span class="bg-[#FBB45E] px-3 py-1 rounded-full text-sm">{{ $label }}</span>
                        @endif
                    @endforeach
                    • {{ $places->tipe_tempat }} • {{ $places->moods->pluck('nama')->implode(', ') }}
                </div>
                @php
                $weekday = ['senin','selasa','rabu','kamis','jumat'];
                $weekend = ['sabtu','minggu'];
                $jamByHari = $places->hour->keyBy('hari');

                $jamWeekday = collect($weekday)->map(fn($h) => $jamByHari[$h] ?? null)->filter();
                $jamWeekend = collect($weekend)->map(fn($h) => $jamByHari[$h] ?? null)->filter();

                $samaBuka = $jamWeekday->pluck('jam_buka')->unique()->count() === 1;
                $samaTutup = $jamWeekday->pluck('jam_tutup')->unique()->count() === 1;
                @endphp

                @if($jamWeekday->count() > 0)
                <div class="text-md font-bold py-2 max-md:text-[14px]">
                    Weekday 
                    @if($samaBuka && $samaTutup)
                        {{ $jamWeekday->first()->jam_buka }} - {{ $jamWeekday->first()->jam_tutup }}
                    @else
                        (jam bervariasi)
                    @endif
                </div>
                @endif

                @if($jamWeekend->count() > 0)
                <div class="text-md font-bold py-2 max-md:text-[14px]">
                    Weekend {{ $jamWeekend->first()->jam_buka }} - {{ $jamWeekend->first()->jam_tutup }}
                </div>
                @endif
        </section>

        <a href="/chatbot" class="fixed bottom-5 right-5 z-50 bg-[#FBB45E] text-[#363B58] w-14 h-14 rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition" style="font-variation-settings: 'FILL' 1;">
            <span class="material-symbols-outlined text-2xl">smart_toy</span>
        </a>

        <section class="my-4 mx-20 max-md:mx-5">
            <p class="text-4xl font-bold max-md:text-2xl">Galeri</p>
            <div class="my-3 font-semibold max-md:text-xs">
                <button onclick="gambarGaleri('galeri', this)" class="galeri-btn bg-[#FBB45E] gap-1 px-10 py-2 rounded-xl max-md:px-5 hover:bg-[#E2A255]">Tempat</button>
                <button onclick="gambarGaleri('menu', this)" class="galeri-btn bg-[#FBB45E] gap-1 px-10 py-2 rounded-xl max-md:px-5 hover:bg-[#E2A255]">Menu</button>
                <button onclick="gambarGaleri('all', this)" class="galeri-btn bg-[#FBB45E] gap-1 px-10 py-2 rounded-xl max-md:px-5 hover:bg-[#E2A255]">Semua</button>
            </div>
            <br>
            <div class="grid grid-cols-2 gap-8 max-md:gap-4" id="galeri-container">
                @foreach($places->galleries as $g)
                <div class="galeri-item rounded-3xl overflow-hidden max-md:rounded-xl" data-tipe="{{ $g->tipe }}">
                    <img src="{{ asset($g->path_file) }}" class="h-[21.5rem] w-full object-cover max-md:h-[7rem]">
                </div>
                @endforeach
            </div>
        </section>

        <br>

        <section class="p-[20px]">
            <div class="flex flex-row justify-start items-center w-full px-[50px] py-5 box-border max-md:px-4">
                <div class="font-bold">
                    <p class="text-4xl max-md:text-2xl">Review</p>
                    <p class="text-sm text-gray-500 mt-1">Cerita dan Penilaian Pengguna</p>
                </div>

                <a href="{{ route('reviews.create', $places->id) }}"
                class="flex justify-center items-center bg-[#F4A64C] text-[#363b58] border-none py-[12px] px-[24px] rounded-xl text-base font-semibold cursor-pointer whitespace-nowrap ml-auto gap-2 hover:bg-[#E2A255] transition max-md:py-2 max-md:px-4 max-md:text-sm">
                    + Tambah Review
                </a>
            </div>

            {{-- Review Cards Grid --}}
            <div class="grid grid-cols-3 gap-5 px-[50px] max-md:grid-cols-1 max-md:px-4" id="review-container">
                @forelse($places->reviews->take(3) as $review)
                    <div class="border border-gray-200 rounded-2xl p-5 shadow-sm bg-white flex flex-col gap-3">

                        {{-- Header: Avatar + Nama + Tanggal + Bintang --}}
                        <div class="flex items-center gap-3">
                            @if($review->user->fotoProfile)
                                <img
                                    src="{{ asset('storage/' . $review->user->fotoProfile) }}"
                                    class="w-12 h-12 rounded-full object-cover"
                                    alt="{{ $review->user->nama }}"
                                >
                            @else
                                <img
                                    src="https://ui-avatars.com/api/?name={{ urlencode($review->user->nama) }}&background=FBB45E&color=363B58"
                                    class="w-12 h-12 rounded-full object-cover"
                                    alt="{{ $review->user->nama }}"
                                >
                            @endif
                            <div class="flex-1 min-w-0">
                                <p class="font-bold text-[#363b58] truncate">{{ $review->user->nama }}</p>
                                <p class="text-sm text-gray-400">{{ $review->created_at->format('d F Y') }}</p>
                            </div>
                            {{-- Bintang --}}
                            <div class="flex gap-[2px] shrink-0">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                        fill="{{ $i <= $review->rating ? '#FBB45E' : '#D1D5DB' }}">
                                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                    </svg>
                                @endfor
                            </div>
                        </div>

                        {{-- Judul --}}
                        <p class="font-bold text-[#363b58] text-base leading-snug">{{ $review->title }}</p>

                        {{-- Komentar --}}
                        <p class="text-gray-600 text-sm leading-relaxed line-clamp-3">"{{ $review->comment }}"</p>

                        {{-- FOTO + VIDEO --}}
                        @if($review->file_url)
                        <div class="flex gap-2 flex-wrap mb-4">
                            @foreach(json_decode($review->file_url) as $file)
                                @php $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION)); @endphp
                                @if(in_array($ext, ['mp4', 'webm', 'mov', 'ogg']))
                                <div class="relative w-24 h-24 rounded-xl overflow-hidden cursor-pointer group"
                                    onclick="bukaLightboxVideo('{{ asset('storage/' . $file) }}')">
                                    <video src="{{ asset('storage/' . $file) }}#t=0.1"
                                        class="w-full h-full object-cover"
                                        preload="metadata"
                                        muted
                                        playsinline>
                                    </video>
                                    <div class="absolute inset-0 bg-black/40 flex items-center justify-center group-hover:bg-black/55 transition">
                                        <div class="w-9 h-9 bg-white/90 rounded-full flex items-center justify-center">
                                            <span class="material-symbols-outlined text-[#363B58] text-lg" style="font-variation-settings:'FILL' 1;">play_arrow</span>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <img src="{{ asset('storage/' . $file) }}"
                                    class="w-24 h-24 rounded-xl object-cover cursor-pointer hover:opacity-90 transition"
                                    onclick="bukaLightbox('{{ asset('storage/' . $file) }}')"
                                    alt="Foto review">
                                @endif
                            @endforeach
                        </div>
                        @endif

                        {{-- Lokasi --}}
                        <div class="flex items-center gap-1 text-[#F4A64C] text-sm font-medium mt-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="#F4A64C">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                            </svg>
                            {{ $places->nama_tempat }}
                        </div>

                    </div>
                @empty
                    <div class="col-span-3 text-center py-10 text-gray-400">
                        <p>Belum ada review untuk tempat ini.</p>
                    </div>
                @endforelse
            </div>

            {{-- Tombol Tampilkan Semua --}}
            @if($places->reviews->count() > 3)
            <div class="flex justify-center mt-8 px-[50px] max-md:px-4">
                <a href="{{ route('reviews.index', $places->id) }}"
                class="bg-[#F4A64C] text-[#363b58] font-semibold py-4 px-20 rounded-xl text-base hover:bg-[#E2A255] transition max-md:w-full max-md:text-center">
                    Tampilkan Semua Review
                </a>
            </div>
            @endif

            <div class="flex justify-center mt-4 px-[50px] max-md:px-4">
                <a href="{{ route('reviews.index', $places->id) }}"
                    class="bg-[#F4A64C] text-[#363b58] font-semibold py-[12px] px-[24px] rounded-xl text-base hover:bg-[#E2A255] transition max-md:py-2 max-md:px-4 max-md:text-sm">
                    Lihat Semua Review
                </a>
            </div>
        </section>

<script>
    const mapBtn = document.getElementById('btnMaps');

    mapBtn.addEventListener('click', () => {
        window.location.href = "/place/{{ $places->id }}/map";
    });

    function rangeCount(lat1, long1, lat2, long2) {
        const R = 6371;
        const dLat = (lat2 - lat1) * Math.PI / 180;
        const dLong = (long2 - long1) * Math.PI / 180;
        const a = Math.sin(dLat/2) * Math.sin(dLat/2) + Math.cos(lat1 * Math.PI / 180)  * Math.cos(lat2 * Math.PI / 180) * Math.sin(dLong / 2) * Math.sin(dLong / 2);

        return (R * 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a))).toFixed(1);
    }

    navigator.geolocation.getCurrentPosition(pos => {
        const range = rangeCount(
            pos.coords.latitude, pos.coords.longitude, {{ $places->latitude }}, {{ $places->longitude }}
        );
        document.getElementById('jarak').innerText = range + ' km';
    }, () => {
        document.getElementById('jarak').innerText = 'Lokasi tidak tersedia.';
    });


    function gambarGaleri(tipe, btn) {

        document.querySelectorAll('.galeri-btn').forEach(b => {
            b.classList.remove('bg-[#FBB45E]', 'text-[#363B58]');
            b.classList.add('bg-white', 'border', 'border-[#FBB45E]', 'text-[#FBB45E]');
        });
        
        btn.classList.add('bg-[#FBB45E]', 'text-[#363B58]');
        btn.classList.remove('bg-white', 'border', 'border-[#FBB45E]', 'text-[#FBB45E]');

        document.querySelectorAll('.galeri-item').forEach(item => {
            if (tipe === 'all' || item.dataset.tipe === tipe) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

</script>

@endsection