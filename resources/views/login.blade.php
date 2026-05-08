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
<body class="m-0 p-0 box-border font-['Poppins',_sans-serif] text-[#363b58] scroll-smooth bg-[#fff8ef] min-h-screen flex justify-center items-center py-8">

    <div class="w-4/5 max-w-[1728px] flex rounded-[20px] overflow-hidden bg-white [box-shadow:0_10px_25px_rgba(0,0,0,0.2)]
                max-lg:flex-col max-lg:w-11/12 max-lg:mx-auto">

        <!-- LEFT -->
        <div class="w-1/2 flex justify-center items-start py-10 px-6
                    max-lg:w-full max-lg:px-8 max-lg:py-8">

            <div class="w-full max-w-sm text-center">

                <!-- LOGO -->
                <div class="flex items-center justify-center gap-2 mb-5
                            max-md:mb-3">
                    <img src="assets/img/Locana_Logo 1.png"
                         alt="gambar"
                         class="w-10 h-auto max-md:w-8">
                    <h2 class="font-bold text-[#363b58] text-base leading-tight m-0">LOCANA</h2>
                </div>

                <!-- TAB LOGIN / REGISTER -->
                <div class="flex justify-center items-center mx-auto mb-5 bg-[#E1E2E6] rounded-md p-0.5 w-52
                            max-md:w-36 max-md:mb-3">
                    <!-- Masuk (ACTIVE) -->
                    <a href="/login" class="w-full">
                        <div class="w-full text-center bg-white shadow-md text-black py-1 text-sm font-medium rounded-md transition hover:bg-[#C1C2CB]
                                    max-md:text-xs max-md:py-0.5">
                            Masuk
                        </div>
                    </a>
                    <!-- Daftar (NON ACTIVE) -->
                    <a href="/register" class="w-full">
                        <div class="w-full text-center text-[#939393] py-0.5 text-sm font-medium rounded-md transition hover:bg-[#C1C2CB]
                                    max-md:text-xs">
                            Daftar
                        </div>
                    </a>
                </div>

                <h1 class="text-2xl font-bold mx-4 my-1
                           max-md:text-lg max-md:mb-1
                           max-lg:text-xl">
                    Waktunya <span class="text-[#fbb45e]">Nongkrong!</span>
                </h1>
                <p class="text-xs font-semibold leading-snug text-gray-500 mb-4
                          max-md:text-[9px] max-md:mb-2">
                    Yuk lanjutkan perjalananmu menemukan tempat yang bikin nyaman.
                </p>

                <!-- FORM -->
                <form id="loginForm" class="text-left flex flex-col gap-3">

                    <!-- Email -->
                    <div class="flex flex-col gap-1">
                        <label for="email" class="font-semibold text-sm max-md:text-xs">Email</label>
                        <input type="email" name="email" id="email" required
                               placeholder="Masukkan Email Disini"
                               class="w-full h-9 px-3 border border-[#ccc] rounded-md bg-[#FCFCFC] text-sm placeholder:text-sm
                                      hover:[box-shadow:0_0_10px_rgba(0,123,255,0.7)]
                                      max-md:placeholder:text-xs max-md:text-xs">
                    </div>

                    <!-- Password -->
                    <div class="flex flex-col gap-1 relative">
                        <label for="password" class="font-semibold text-sm max-md:text-xs">Password</label>
                        <input type="password" required
                               placeholder="Masukkan Password Disini"
                               class="password-input
                                      w-full h-9 px-3 pr-9 border border-[#ccc] rounded-md bg-[#FCFCFC] text-sm placeholder:text-sm
                                      hover:[box-shadow:0_0_10px_rgba(0,123,255,0.7)]
                                      max-md:placeholder:text-xs max-md:text-xs">
                        <span class="toggle-password material-symbols-outlined absolute right-3 bottom-2 cursor-pointer text-base text-gray-400"
                                    >visibility</span>
                    </div>

                    <!-- Ingat Saya & Lupa Password -->
                    <div class="flex justify-between items-center">
                        <label class="flex items-center gap-2 font-semibold text-sm bg-[#FCFCFC]
                                      max-md:text-xs">
                            <input type="checkbox"> Ingat Saya
                        </label>
                        <a href="/forgot-password"
                           class="underline text-xs font-semibold max-md:text-[10px]">
                            Lupa Password
                        </a>
                    </div>

                    <!-- Submit -->
                    <button type="button" onclick="window.location.href='/home'" id="submit" class="w-full h-10 bg-[#fbb45e] border-none text-sm text-[#363b58] font-semibold hover:bg-[#FEE8CD] rounded-md mt-1 max-md:h-9 max-md:text-xs">
                        Masuk
                    </button>

                    <p id="error-msg" class="text-red-500 text-xs mt-1"></p>

                    <p class="text-center text-sm font-semibold mb-6 mt-1
                              max-md:text-xs max-md:mb-4">
                        Belum punya akun?
                        <a href="/register" class="text-orange-400 underline font-medium">Daftar</a>
                    </p>

                </form>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="w-1/2 relative overflow-hidden min-h-[420px]
                    max-lg:w-full max-lg:min-h-56">
            <img src="assets/img/180 Cafe - Bandung 1.png"
                 alt="Cafe"
                 class="absolute inset-0 w-full h-full object-cover z-0">

            <div class="absolute inset-0 bg-black/30 backdrop-blur-[2px]"></div>

            <div class="absolute bottom-8 left-8 text-white
                        max-md:left-5 max-md:bottom-5">
                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-white/[0.267] text-[10px] font-semibold text-white backdrop-blur-[6px] mb-2">
                    <span class="material-symbols-outlined text-white text-base relative flex items-center">verified</span>
                    PILIHAN TERBAIK
                </span>
                <h2 class="text-2xl mb-2.5 text-white font-bold max-md:text-xl">
                    Jelajahi Suasana<br>Otentik Braga.
                </h2>
                <div class="flex items-center gap-4 max-md:gap-2">
                    <div class="flex items-center">
                        <img src="assets/img/nanamin.jpg" alt=""
                             class="w-12 h-12 rounded-full border-2 border-white object-cover -ml-4 first:ml-0
                                    max-md:w-8 max-md:h-8 max-lg:w-10 max-lg:h-10">
                        <img src="assets/img/luffy.png" alt=""
                             class="w-12 h-12 rounded-full border-2 border-white object-cover -ml-4
                                    max-md:w-8 max-md:h-8 max-lg:w-10 max-lg:h-10">
                        <img src="assets/img/Suguru Geto.jpg" alt=""
                             class="w-12 h-12 rounded-full border-2 border-white object-cover -ml-4
                                    max-md:w-8 max-md:h-8 max-lg:w-10 max-lg:h-10">
                    </div>
                    <p class="text-sm text-white max-md:text-[9px] max-lg:text-xs">
                        2.000+ Pengguna telah mereview tempat ini
                    </p>
                </div>
            </div>
        </div>

    </div>

    <script src="../../public/js/script.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {

        const toggles = document.querySelectorAll(".toggle-password");

        toggles.forEach(function(toggle) {

            toggle.addEventListener("click", function() {

            const password =
                toggle.parentElement.querySelector(".password-input");

            if (password.type === "password") {
                password.type = "text";
                toggle.textContent = "visibility_off";
            } else {
                password.type = "password";
                toggle.textContent = "visibility";
            }

            });

        });

        });
    </script>
</body>
</html>