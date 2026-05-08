<!DOCTYPE html>
<html lang="en" class="m-0 p-0 font-['Poppins',_sans-serif] box-border text-[#363b58]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locana | Rekomendasi Tempat Hangout di Bandung</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>
<body class="m-0 p-0 box-border font-['Poppins',_sans-serif] text-[#363b58] scroll-smooth bg-[#fff8ef] h-screen flex justify-center items-center">

    <div class="w-4/5 h-[90%] max-w-[1728px] max-h-[1117px] flex rounded-[20px] overflow-hidden bg-white m-0 [box-shadow:0_10px_25px_rgba(0,0,0,0.2)]
            max-lg:flex-col max-lg:w-full max-lg:h-auto max-lg:mt-24 max-lg:mx-8 max-lg:mb-24">

        <!-- LEFT -->
        <div class="w-1/2 relative
            max-lg:w-full max-lg:flex max-lg:justify-center">
            <div class="mt-6 bg-white text-center w-full
                        max-md:w-[353px] max-md:p-5 max-md:m-0">

                <!-- LOGO -->
                <div class="flex items-center justify-center mb-4
                            max-md:mb-1">
                    <img src="assets/img/Locana_Logo 1.png"
                         alt="gambar"
                         class="w-12 h-auto
                                max-md:w-9 max-md:m-0">
                    <h2 class="font-bold text-[#363b58] m-0 text-base leading-tight
                               max-md:text-[13px] max-md:m-0">LOCANA
                    </h2>
                </div>

                <h1 class="mx-4 my-1 text-2xl font-bold
                           max-md:text-lg max-md:mb-1
                           max-lg:text-xl">
                    Hampir Selesai!
                </h1>
                <p class="w-3/4 text-xs font-semibold mx-auto my-0.5 leading-tight
                           max-md:w-11/12 max-md:text-[9px] max-md:mx-5 max-md:my-0
                           max-lg:mx-10 max-lg:text-[0.6rem]">
                    Masukkan nama kamu dan tambahkan foto profil untuk<br>melanjutkan proses register.
                </p>

                <!-- FORM -->
                <form id="loginForm">
                    <div class="flex flex-col items-start mx-14 my-auto
                                max-md:m-0
                                max-lg:mx-8">
                        <label for="nama" class="mt-3 font-semibold text-sm mb-1
                                                  max-md:mt-2.5 max-md:text-[10px] max-md:font-medium">
                            Nama
                        </label>
                        <input type="text" name="nama" id="nama" required
                               placeholder="Masukkan nama Disini"
                               class="hover:[box-shadow:0_0_10px_rgba(0,123,255,0.7)] w-full h-8 p-2 border border-[#ccc] rounded-md bg-[#FCFCFC] text-sm placeholder:text-sm
                                      max-md:h-8 max-md:placeholder:text-[10px]">
                    </div>

                    <div class="flex flex-col items-start mx-14 my-auto
                                max-md:m-0
                                max-lg:mx-8">
                        <label class="mt-3 font-semibold text-sm mb-1
                                      max-md:mt-2.5 max-md:text-[10px] max-md:font-medium">
                            Foto Profil
                        </label>
                        <div onclick="document.getElementById('foto-input').click()"
                             class="w-full border-2 border-dashed border-[#E2E8F0] rounded-xl p-8 flex flex-col items-center justify-center gap-2 cursor-pointer hover:border-[#FBB45E] hover:bg-[#FEF4E7]/40 transition-all group
                                    max-md:p-5">
                            <div id="foto-preview" class="hidden mb-2">
                                <img id="foto-img" src="" alt="Preview"
                                     class="w-24 h-24 object-cover rounded-full border-4 border-[#FBB45E]/30 shadow">
                            </div>
                            <div id="foto-placeholder" class="flex flex-col items-center gap-2">
                                <span class="material-symbols-outlined text-gray-300 group-hover:text-[#FBB45E] transition-colors text-4xl
                                             max-md:text-3xl">add_a_photo</span>
                                <p class="text-xs text-center text-gray-400 font-medium">
                                    Upload Foto<br>
                                    <span class="text-gray-300">(maks. 5MB) Format: PNG, JPG</span>
                                </p>
                            </div>
                        </div>
                        <input type="file" id="foto-input" name="foto_profil" accept="image/png,image/jpeg" class="hidden" onchange="previewFoto(this)">
                    </div>

                    <button type="button"
                            onclick="window.location.href='/home'"
                            class="w-4/5 h-10 p-2 bg-[#fbb45e] border-none ml-14 mt-3 text-sm text-[#363b58] font-semibold hover:bg-[#FEE8CD] rounded-md
                                   max-md:w-full max-md:mx-0 max-md:mt-1 max-md:h-9 max-md:text-base max-md:p-1
                                   max-lg:mx-0">
                        Lanjut
                    </button>
                </form>

            </div>
        </div>

        <!-- RIGHT -->
        <div class="w-1/2 relative before:content-[''] before:absolute before:inset-0 before:bg-black/50 overflow-hidden
            max-lg:w-full max-lg:h-56 max-lg:shrink-0">
            <img src="assets/img/180 Cafe - Bandung 1.png"
                 alt="Cafe"
                 class="absolute inset-0 w-full h-full object-cover z-0">

            <!-- OVERLAY -->
            <div class="absolute inset-0 bg-black/30 backdrop-blur-[2px]"></div>
            <div class="absolute bottom-8 left-8 text-white
                        max-md:left-5 max-md:bottom-5">
                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-white/[0.267] text-[10px] font-semibold text-white backdrop-blur-[6px]">
                    <span class="material-symbols-outlined text-white relative flex items-center text-base">verified</span>
                    PILIHAN TERBAIK
                </span>
                <h2 class="text-2xl mb-2.5 text-white font-bold
                           max-md:text-xl">
                    Jelajahi Suasana<br>Otentik Braga.
                </h2>
                <div class="flex items-center gap-4
                            max-md:gap-2">
                    <div class="flex items-center">
                        <img src="assets/img/nanamin.jpg" alt=""
                             class="w-12 h-12 rounded-full border-2 border-white object-cover -ml-4 first:ml-0
                                    max-md:w-8 max-md:h-8
                                    max-lg:w-10 max-lg:h-10">
                        <img src="assets/img/luffy.png" alt=""
                             class="w-12 h-12 rounded-full border-2 border-white object-cover -ml-4 first:ml-0
                                    max-md:w-8 max-md:h-8
                                    max-lg:w-10 max-lg:h-10">
                        <img src="assets/img/Suguru Geto.jpg" alt=""
                             class="w-12 h-12 rounded-full border-2 border-white object-cover -ml-4 first:ml-0
                                    max-md:w-8 max-md:h-8
                                    max-lg:w-10 max-lg:h-10">
                    </div>
                    <p class="text-sm text-white
                              max-md:text-[9px]
                              max-lg:text-xs max-lg:mx-5">
                        2.000+ Pengguna telah mereview tempat ini
                    </p>
                </div>
            </div>
        </div>

    </div>

    <script>
    function previewFoto(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                document.getElementById('foto-img').src = e.target.result;
                document.getElementById('foto-preview').classList.remove('hidden');
                document.getElementById('foto-placeholder').classList.add('hidden');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
    <script src="assets/js/script.js"></script>
</body>
</html>