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
                    <div class="relative bg-slate-100 border rounded-lg border-slate-200 max-sm:col-span-2 max-md:w-full">
                        <span class="material-symbols-outlined absolute left-3 top-2.5 text-[#363B58]">search</span>
                        <input type="text" placeholder="Telusuri" class="pl-10 pr-4 py-2 w-64 max-sm:w-full placeholder-[#363B58]">
                    </div>
                </div>
            </div>
        </header>

        <section class="relative">
            <div class="w-full h-[33rem] max-md:h-[14rem]">
                <img src="/assets/img/image+2.jpg" class="w-full h-full object-cover object-center max-md:h-64" alt="place-pic">
            </div>

            <div class="absolute top-16 left-8 flex gap-3 max-md:top-[16px] max-md:left-[10px] max-md:gap-[6px] max-md:scale-75 max-md:origin-top-left">
                <button onclick="history.back()" class="flex items-center gap-1 bg-[#FFF8EF] px-5 py-2 rounded-full text-[#FBB45E] font-bold">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FBB45E">
                        <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/>
                    </svg>
                    <span>Kembali</span>
                </button>
            </div>

            <div class="absolute top-16 right-8 flex gap-3 max-md:top-[16px] max-md:right-[10px] max-md:gap-[6px] max-md:scale-75 max-md:origin-top-right">
                <button class="flex items-center gap-1 bg-gray-300 px-5 py-2 rounded-full font-bold">
                    <svg xmlns="http://www.w3.org/2000/svg" height="2rem" viewBox="0 -960 960 960" width="2rem" fill="#000000">
                        <path d="M200-120v-640q0-33 23.5-56.5T280-840h400q33 0 56.5 23.5T760-760v640L480-240 200-120Zm80-122 200-86 200 86v-518H280v518Zm0-518h400-400Z" />
                    </svg>
                    <span>Simpan</span>
                </button>

                <button class="z-50 flex items-center gap-1 bg-gray-300 px-5 py-2 rounded-full font-bold" id="btnMaps">
                    <svg xmlns="http://www.w3.org/2000/svg" height="2rem" viewBox="0 -960 960 960" width="2rem" fill="#000000">
                        <path d="m600-120-240-84-186 72q-20 8-37-4.5T120-170v-560q0-13 7.5-23t20.5-15l212-72 240 84 186-72q20-8 37 4.5t17 33.5v560q0 13-7.5 23T812-192l-212 72Zm-40-98v-468l-160-56v468l160 56Zm80 0 120-40v-474l-120 46v468Zm-440-10 120-46v-468l-120 40v474Zm440-458v468-468Zm-320-56v468-468Z" />
                    </svg>
                    <span>Lihat Map</span>
                </button>
            </div>

            <div class="absolute top-0 left-0 w-full h-full flex flex-col justify-start px-20 py-[23rem] text-white gap-3 pointer-events-none max-md:py-[11rem] max-md:px-[1rem] max-md:gap-[5px]">
                <div class="text-6xl font-bold max-md:text-2xl">{{ $places->nama_tempat }}</div>
                <div class="text-3xl font-semibold max-md:text-[14px]">
                    • {{ $places->kategori->nama }} • Rp.{{ number_format($places->harga_min, 0, ',', '.') }}-{{ number_format($places->harga_max, 0, ',', '.') }}
                </div>
            </div>

            <div class="mx-[5rem] my-[3rem] max-md:mx-[1rem]">
                <div class="text-lg pb-2 max-md:text-[16px]">{{ $places->deskripsi }}</div>
                <div class="text-md font-bold py-2 max-md:text-[14px]">{{ $places->alamat_lengkap }}</div>
            </div>
        </section>

        <a href="/chatbot" class="fixed bottom-5 right-5 z-50 bg-[#FBB45E] text-[#363B58] w-14 h-14 rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition" style="font-variation-settings: 'FILL' 1;">
            <span class="material-symbols-outlined text-2xl">smart_toy</span>
        </a>

        <section class="my-4 mx-20 max-md:mx-5">
            <p class="text-4xl font-bold max-md:text-2xl">Galeri</p>
            <div class="my-3 font-semibold max-md:text-xs">
                <button class="bg-[#FBB45E] gap-1 px-10 py-2 rounded-xl">Interior</button>
                <button class="bg-[#FBB45E] gap-1 px-10 py-2 rounded-xl">Menu</button>
                <button class="bg-[#FBB45E] gap-1 px-10 py-2 rounded-xl">Outdoor</button>
            </div>
            <br>
            <div class="grid grid-cols-2 gap-8 max-md:gap-4">
                <div class="rounded-3xl overflow-hidden max-md:rounded-xl">
                    <img src="/assets/img/coffe.png" class="h-[21.5rem] w-full object-cover max-md:h-[7rem]">
                </div>
                <div class="rounded-3xl overflow-hidden max-md:rounded-xl">
                    <img src="/assets/img/cat.png" class="h-[21.5rem] w-full object-cover max-md:h-[7rem]">
                </div>
                <div class="rounded-3xl overflow-hidden max-md:rounded-xl">
                    <img src="/assets/img/place_view.png" class="h-[21.5rem] w-full object-cover max-md:h-[7rem]">
                </div>
                <div class="rounded-3xl overflow-hidden max-md:rounded-xl">
                    <img src="/assets/img/menu.png" class="h-[21.5rem] w-full object-cover max-md:h-[7rem]">
                </div>
            </div>
        </section>

        <br>

        <section class="p-[20px]">
            <div class="flex flex-row justify-start items-center w-full px-[50px] py-5 box-border">
                <div class="font-bold">
                    <p class="text-4xl max-md:text-2xl max-md:ml-[-50px]">Review</p>
                </div>
                <button class="bg-[#F4A64C] text-[#363b58] w-[400px] border-none py-[15px] px-[30px] rounded-xl text-lg font-semibold cursor-pointer ml-auto" id="openModal">+ Kirim Ulasan</button>

                <div class="fixed top-0 left-0 w-full h-full bg-black/50 hidden justify-center items-center z-[999]" id="overlay">
                    <div class="p-5 bg-[#FAFAFA] flex flex-col gap-[1.8rem] rounded-[10px] w-[540px] relative max-md:w-[90%]">
                        <button class="absolute top-3 right-3 w-fit bg-transparent border-none text-base cursor-pointer" id="closeModal">✖</button>
                        <div class="flex bg-white rounded-[10px] justify-between py-4 px-[1.2rem] items-center gap-6 w-fit mt-[50px]">
                            <div class="flex flex-col justify-between gap-[25px]">
                                <h3 class="font-[Poppins] text-xl font-semibold">{{ $places->nama_tempat }}</h3>
                                <p class="text-[0.8rem]">{{ $places->alamat_lengkap }}</p>
                            </div>
                        </div>
                        <div class="flex flex-col gap-[5px]">
                            <label for="judul" class="text-sm text-gray-600">Judul</label>
                            <input type="text" id="judul" placeholder="Masukkan Judul Ulasan" class="border border-gray-200 rounded-lg px-3 py-2.5 text-sm outline-none focus:border-[#F4A64C]">
                        </div>
                        <div class="flex flex-col gap-[5px]">
                            <label for="ulasan" class="text-sm text-gray-600">Ulasan</label>
                            <textarea name="ulasan" id="ulasan" placeholder="Masukkan Ulasan" class="h-[120px] border border-gray-200 rounded-lg px-3 py-2.5 text-sm outline-none focus:border-[#F4A64C] resize-none"></textarea>
                        </div>
                        <button class="w-full py-3 bg-[#F4A64C] rounded-xl font-semibold text-[#363b58] cursor-pointer border-none text-base">
                            Kirim Ulasan
                        </button>
                    </div>
                </div>
            </div>

            {{-- Review section --}}
            <div class="flex gap-10 flex-wrap mt-[30px] justify-center px-5 w-full">
                @forelse($places->reviews as $review)
                <div class="grid grid-cols-[auto_1fr_auto] items-center bg-white rounded-[20px] border-2 border-[#E2E8F0] p-10 w-[800px] h-auto max-md:w-full max-md:p-5">
                    <div class="col-span-1">
                        <img src="/assets/img/pp.png" alt="pp" class="w-[100px] h-[100px] rounded-full object-cover max-md:w-[60px] max-md:h-[60px]">
                    </div>
                    <div class="col-start-2 ml-5">
                        <span class="text-[35px] font-semibold block max-md:text-[20px]">{{ $review->user->username ?? 'Anonymous' }}</span>
                        <span class="text-[24px] text-[#666] max-md:text-[14px]">{{ $review->created_at->format('d F Y') }}</span>
                    </div>
                    <div class="col-start-3 justify-self-end text-[30px] text-[#F5A623] max-md:text-[15px]">
                        @for($i = 0; $i < $review->rating; $i++)⭐@endfor
                    </div>
                    <div class="col-span-3 mt-[30px] pb-5 text-[30px] italic leading-[1.5] border-b border-[#E2E8F0] max-md:text-[14px]">
                        "{{ $review->komentar }}"
                    </div>
                </div>
                @empty
                <p class="text-gray-400">Belum ada review untuk tempat ini.</p>
                @endforelse
            </div>
        </section>

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
        </script>
    </body>
</html>