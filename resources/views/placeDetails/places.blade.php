<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $places->nama_tempat }}</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body>
        <header class="bg-white border-b border-gray-300 sticky top-0 z-50 shadow-sm">
            <div class="container mx-auto px-4 py-3 flex justify-between items-center max-sm:grid max-sm:grid-cols-[1fr_auto] max-sm:gap-3">
                <div class="flex items-center gap-2">
                    <img src="/assets/img/Locana_Logo 1.png" class="h-10 max-sm:h-6" alt="Logo">
                    <span class="font-bold text-xl text-gray-800 max-sm:text-base">LOCANA</span>
                </div>
                <div class="flex flex-row-reverse gap-4 max-sm:contents">
                    <div class="flex flex-row-reverse items-center gap-3">
                        <a href="/profile" class="flex items-center gap-2">
                            <img src="/assets/img/nanamin.jpg" class="w-10 h-10 max-sm:w-9 max-sm:h-9 rounded-full object-cover">
                            <span class="font-medium max-sm:hidden">Nanami Kento</span>
                        </a>
                        <div class="hidden max-sm:flex gap-2">
                            <span class="material-symbols-outlined bg-[#FEF4E7] text-[#FBB45E] p-2 rounded-full">smart_toy</span>
                            <span class="material-symbols-outlined text-[#363B58] p-2 rounded-full">tune</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section>
            <div class="relative">
                <div class="relative w-full h-[33rem] max-md:h-[14rem] overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <img src="{{ asset($places->gambar_tempat) }}" class="w-full h-full object-cover object-center max-md:h-64" alt="{{ $places->nama_tempat }}c">
                </div>

                <div class="absolute top-[3rem] left-8 flex gap-3 max-md:top-[16px] max-md:left-[10px] max-md:gap-[6px] max-md:scale-75 max-md:origin-top-left">
                    <button onclick="history.back()" class="flex items-center gap-1 bg-[#FFFFFF] px-5 py-2 rounded-[1rem] text-[#FBB45E] font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" height="23px" viewBox="0 -960 960 960" width="23px" fill="#FBB45E">
                            <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/>
                        </svg>
                        <span class="text-sm max-md:hidden">Kembali</span>
                    </button>
                </div>

                <div class="absolute top-[3rem] right-8 flex gap-3 max-md:top-[16px] max-md:right-[10px] max-md:gap-[6px] max-md:scale-75 max-md:origin-top-right">
                    <button class="flex items-center gap-1 bg-[#FBB45E] px-5 py-2 rounded-[1rem] font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" height="23px" viewBox="0 -960 960 960" width="23px" fill="#000000">
                            <path d="M200-120v-640q0-33 23.5-56.5T280-840h400q33 0 56.5 23.5T760-760v640L480-240 200-120Zm80-122 200-86 200 86v-518H280v518Zm0-518h400-400Z" />
                        </svg>
                        <span class="text-sm max-md:hidden">Simpan</span>
                    </button>

                    <button class="flex items-center gap-1 bg-[#FBB45E] px-5 py-2 rounded-[1rem] font-bold" id="btnMaps">
                        <svg xmlns="http://www.w3.org/2000/svg" height="23px" viewBox="0 -960 960 960" width="23" fill="#000000">
                            <path d="m600-120-240-84-186 72q-20 8-37-4.5T120-170v-560q0-13 7.5-23t20.5-15l212-72 240 84 186-72q20-8 37 4.5t17 33.5v560q0 13-7.5 23T812-192l-212 72Zm-40-98v-468l-160-56v468l160 56Zm80 0 120-40v-474l-120 46v468Zm-440-10 120-46v-468l-120 40v474Zm440-458v468-468Zm-320-56v468-468Z" />
                        </svg>
                        <span class="text-sm max-md:hidden">Lihat Map</span>
                    </button>
                </div>
            </div>

            <div class="absolute inset-0 flex flex-col justify-end px-20 py-[35rem] text-white gap-3 pointer-events-none 
            max-md:px-4 max-md:py-[20.5rem]">
                <div class="text-6xl font-bold max-md:text-2xl max-md:leading-none">{{ $places->nama_tempat }}</div>
                <div class="text-3xl font-semibold max-md:text-[14px] max-md:leading-none">
                     ⭐⭐⭐⭐ • {{ $places->kategori->nama }} • Rp.{{ number_format($places->harga_min, 0, ',', '.') }}-{{ number_format($places->harga_max, 0, ',', '.') }} • 
                    <span id="jarak">Menghitung jarak...</span>
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
            <div class="flex flex-row justify-start items-center w-full px-[50px] py-5 box-border">
            <div class="font-bold">
                <p class="text-4xl
                max-md:text-2xl max-md:ml-[-50px]">Review</p>
                <p class="text-md py-5
                max-md:text-sm max-md:ml-[-50px]">⭐ 4.4 dari 524 ulasan</p>
            </div>
            
            <button class="bg-[#F4A64C] text-[#363b58] w-[400px] border-none py-[15px] px-[30px] rounded-xl text-lg font-semibold cursor-pointer whitespace-nowrap ml-auto
            max-md:w-auto max-md:py-[5px] max-md:px-[16px] max-md:text-sm max-md:rounded-lg max-md:ml-auto max-md:mr-[-50px]" id="openModal">+ Kirim Ulasan</button>

            <div class="fixed top-0 left-0 w-full h-full bg-black/50 hidden justify-center items-center z-[999]" id="overlay">
                <div class="p-5 bg-[#FAFAFA] flex flex-col gap-[1.8rem] rounded-[10px] w-[540px] relative
                max-md:w-[90%] max-md:gap-[1.2rem] max-md:p-4 max-md:max-h-[90vh] max-md:overflow-y-auto">

                    <button class="absolute top-3 right-3 w-fit bg-transparent border-none text-base cursor-pointer
                    max-md:top-5 max-md:right-5" id="closeModal">✖</button>

                    <div class="flex bg-white rounded-[10px] justify-between py-4 px-[1.2rem] items-center gap-6 w-fit mt-[50px]">
                        <img src="{{ asset($places->gambar_tempat) }}" alt="{{ asset($places->nama_tempat) }}" class="w-36 h-28 rounded-[10px]">
                        <div class="flex flex-col justify-between gap-[25px]">
                            <h3 class="font-[Poppins] text-xl font-semibold w-full h-full m-0
                            max-md:text-lg max-md:pt-[1px]">{{ $places->nama_tempat }}</h3>
                            <p class="text-[0.8rem] text-base font-medium mt-[-20px]
                            max-md:text-xs max-md:mt-[-20px]">{{ $places->alamat_lengkap }}</p>
                        </div>
                    </div>

                    <div class="flex justify-center gap-2">
                        <span class="text-3xl text-[#F4A64C]
                        max-md:text-2xl">★</span>
                        <span class="text-3xl text-[#F4A64C]
                        max-md:text-2xl">★</span>
                        <span class="text-3xl text-[#F4A64C]
                        max-md:text-2xl">★</span>
                        <span class="text-3xl text-[#F4A64C]
                        max-md:text-2xl">★</span>
                        <span class="text-3xl text-gray-300
                        max-md:text-2xl">★</span>
                    </div>

                    <div class="flex flex-col gap-[5px]">
                        <label for="judul" class="text-sm text-gray-600">Judul</label>
                        <input type="text" id="judul" placeholder="Masukkan Judul Ulasan"
                            class="border border-gray-200 rounded-lg px-3 py-2.5 text-sm outline-none focus:border-[#F4A64C]">
                    </div>

                    <div class="flex flex-col gap-[5px]">
                        <label for="ulasan" class="text-sm text-gray-600">Ulasan</label>
                        <textarea name="ulasan" id="ulasan" placeholder="Masukkan Ulasan"
                            class="h-[120px] border border-gray-200 rounded-lg px-3 py-2.5 text-sm outline-none focus:border-[#F4A64C] resize-none
                            max-md:h-[90px]"></textarea>
                    </div>

                    <div class="flex flex-col gap-2 border border-gray-200 rounded-xl p-4
                    max-md:p-3">
                        <p class="text-sm font-semibold text-gray-800 m-0">Tambahkan Foto atau Video</p>
                        <p class="text-xs text-gray-400 m-0 leading-relaxed">Unggah hingga 6 foto atau video (maks. 5MB)<br>Format: JPG, PNG, MP4, MOV</p>
                        <label class="inline-flex items-center gap-2 border border-gray-200 rounded-lg px-3 py-2 text-sm text-gray-600 cursor-pointer hover:bg-gray-50 w-fit mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M12 12V4m0 0L8 8m4-4l4 4"/>
                            </svg>
                            Unggah File
                            <input type="file" accept="image/*,video/*" multiple class="hidden">
                        </label>
                    </div>

                    <form onsubmit="handleSubmit(event)">
                        <button type="submit" class="w-full py-3 bg-[#F4A64C] rounded-xl font-semibold text-[#363b58] cursor-pointer border-none text-base
                         max-md:py-2.5 max-md:text-sm">
                            Kirim Ulasan
                        </button>
                    </form>

                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="pt-[100px] pb-[50px] bg-white border-4 border-[#E2E8F0] flex flex-col justify-center items-center w-full max-md:pt-[50px]">
                <div class="flex text-[#363b58] items-center gap-[10px]">
                    <img src="/assets/img/Locana_Logo 1.png" alt="f-logloc" class="h-10 max-sm:h-6">
                    <span class="font-bold text-xl text-gray-800 max-sm:text-base">LOCANA</span>
                </div>
                <div class="mt-[15px] max-w-[750px] text-center italic text-[30px] max-md:text-[15px]">
                    <p>Setiap momen punya tempatnya sendiri—kami bantu kamu menemukannya dengan lebih mudah dan personal.</p>
                </div>
                <div class="copyright font-bold max-md:text-[10px] mt-10">
                    <p>© Copyright by Biskuat. All Rights Reserved</p>
                </div>
            </div>
        </footer>

        <script>
            const overlay = document.getElementById('overlay');
            const openBtn = document.getElementById('openModal');
            const closeBtn = document.getElementById('closeModal');
            const mapBtn = document.getElementById('btnMaps');

            openBtn.addEventListener('click', () => {
                overlay.style.display = 'flex';
            });

            closeBtn.addEventListener('click', () => {
                overlay.style.display = 'none';
            });

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
    </body>
</html>