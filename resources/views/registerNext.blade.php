<!DOCTYPE html>
<html lang="en" class="m-0 p-0 box-border text-[#363b58]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locana | Hampir Selesai</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />
</head>

<body class="m-0 p-0 font-[Poppins] text-[#363b58] bg-[#fff8ef] min-h-screen flex justify-center items-center p-6">

    <div class="w-full max-w-[1000px] flex rounded-2xl overflow-hidden bg-white shadow-2xl
                max-md:flex-col-reverse max-md:max-w-[420px]">

        <!-- ===== LEFT: FORM ===== -->
        <div class="w-1/2 flex flex-col p-8 relative
                    max-md:w-full max-md:p-6">

            <!-- Close -->
            <a href="/welcome" class="absolute top-5 left-5 text-gray-400 hover:text-gray-700 transition-colors">
                <span class="material-symbols-outlined" style="font-size:22px;">close</span>
            </a>

            <!-- Logo -->
            <div class="flex items-center justify-center gap-2 mt-2 mb-6
                        max-md:mb-4">
                <img src="assets/img/Locana_Logo 1.png" alt="Locana" class="w-8 h-8 object-contain">
                <span class="font-bold text-[#363b58] text-base tracking-wide">LOCANA</span>
            </div>

            <!-- Heading -->
            <div class="text-center mb-6 max-md:mb-5">
                <h1 class="text-2xl font-bold text-[#363b58] mb-2 max-md:text-xl">
                    Hampir Selesai!
                </h1>
                <p class="text-xs text-gray-500 leading-relaxed max-w-[280px] mx-auto">
                    Masukkan nama kamu dan tambahkan foto profil untuk melanjutkan proses register.
                </p>
            </div>

            <!-- Form -->
            <form action="/register-nextStep" method="POST" id="loginForm" class="flex flex-col gap-4 flex-1">
                @csrf

                <!-- Nama -->
                <div class="flex flex-col gap-1.5">
                    <label for="nama" class="text-sm font-semibold text-[#363b58]">Nama</label>
                    <input type="text" name="nama" id="nama" required
                           placeholder="Masukkan Nama Disini"
                           class="w-full h-11 px-4 py-2 border border-gray-200 rounded-xl bg-[#FCFCFC] text-sm
                                  placeholder:text-gray-300 outline-none
                                  focus:border-[#FBB45E] focus:ring-2 focus:ring-[#FBB45E]/20
                                  hover:border-[#FBB45E]/50
                                  transition-all duration-200">
                </div>

                <!-- Foto Profil -->
                <div class="flex flex-col gap-1.5">
                    <label class="text-sm font-semibold text-[#363b58]">Foto Profil</label>

                    <div onclick="document.getElementById('foto-input').click()"
                         class="w-full border-2 border-dashed border-gray-200 rounded-xl py-6 flex flex-col items-center justify-center gap-2 cursor-pointer
                                hover:border-[#FBB45E] hover:bg-[#FEF4E7]/40 active:bg-[#FEE8CD]/30
                                transition-all duration-200 group">

                        <!-- Preview -->
                        <div id="foto-preview" class="hidden mb-1">
                            <img id="foto-img" src="" alt="Preview"
                                 class="w-20 h-20 object-cover rounded-full border-4 border-[#FBB45E]/40 shadow-md">
                        </div>

                        <!-- Placeholder -->
                        <div id="foto-placeholder" class="flex flex-col items-center gap-2">
                            <span class="material-symbols-outlined text-gray-300 group-hover:text-[#FBB45E] transition-colors"
                                  style="font-size:36px; font-variation-settings:'FILL' 1;">add_a_photo</span>
                            <div class="text-center">
                                <p class="text-xs text-gray-400 font-medium">Upload Foto</p>
                                <p class="text-xs text-gray-300">(maks. 5MB) Format: PNG, JPG</p>
                            </div>
                        </div>
                    </div>

                    <input type="file" id="foto-input" name="foto_profil"
                           accept="image/png,image/jpeg" class="hidden"
                           onchange="previewFoto(this)">
                </div>

                <!-- Submit -->
                <button type="submit"
                        class="w-full h-11 bg-[#FBB45E] text-[#363b58] font-bold text-sm rounded-xl border-none cursor-pointer mt-1
                               hover:bg-[#E2A255] active:bg-[#FEE8CD]
                               focus:outline-none focus:ring-2 focus:ring-[#FBB45E]/50
                               transition-all duration-200 shadow-sm">
                    Lanjut
                </button>
            </form>

        </div>

        <!-- ===== RIGHT: IMAGE ===== -->
        <div class="w-1/2 relative overflow-hidden min-h-[460px]
                    max-md:w-full max-md:min-h-[220px] max-md:order-first">

            <!-- Background image -->
            <img src="assets/img/180 Cafe - Bandung 1.png" alt="Cafe"
                 class="absolute inset-0 w-full h-full object-cover z-0">

            <!-- Overlay -->
            <div class="absolute inset-0 bg-black/35 backdrop-blur-[2px] z-10"></div>

            <!-- Text overlay -->
            <div class="absolute bottom-8 left-7 right-7 z-20 text-white
                        max-md:bottom-5 max-md:left-5">

                <!-- Badge -->
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/20 text-xs font-semibold text-white backdrop-blur-md mb-3">
                    <span class="material-symbols-outlined text-white" style="font-size:14px; font-variation-settings:'FILL' 1;">verified</span>
                    PILIHAN TERBAIK
                </span>

                <!-- Headline -->
                <h2 class="text-2xl font-bold text-white leading-snug mb-4
                           max-md:text-xl max-md:mb-3">
                    Jelajahi Suasana<br>Otentik Braga.
                </h2>

                <!-- Avatars + text -->
                <div class="flex items-center gap-3">
                    <div class="flex">
                        <img src="assets/img/nanamin.jpg" alt=""
                             class="w-9 h-9 rounded-full border-2 border-white object-cover">
                        <img src="assets/img/luffy.png" alt=""
                             class="w-9 h-9 rounded-full border-2 border-white object-cover -ml-3">
                        <img src="assets/img/Suguru Geto.jpg" alt=""
                             class="w-9 h-9 rounded-full border-2 border-white object-cover -ml-3">
                    </div>
                    <p class="text-xs text-white/90 leading-relaxed">
                        2.000+ Pengguna telah mereview<br>tempat ini
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