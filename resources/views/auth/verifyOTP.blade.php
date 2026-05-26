<!DOCTYPE html>
<html lang="en" class="m-0 p-0 font-['Poppins',_sans-serif] box-border text-[#363b58]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locana | Lupa Password</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

</head>

<body class="bg-[#fff8ef] font-[Poppins] flex items-center justify-center h-screen">
    <div class="step bg-white w-[380px] p-8 rounded-2xl shadow-md text-center
              max-sm:w-[300px] max-sm:h-[350px] max-md:pt-6" id="step-2">

        <!-- LOGO -->
        <div class="flex items-center justify-center mb-[17px]
                    max-md:mb-[10px]">
            <img src="assets/img/Locana_Logo 1.png" 
                 alt="gambar" 
                 class="w-[2.5rem] h-auto
                        max-md:m-[0] max-md:w-[35px]">
            <h2 class="font-bold text-[#363b58] m-0 text-[1.1rem] leading-[1.2]
                       max-md:text-[13px] max-md:m-[0]">LOCANA
            </h2>
        </div>

    <!-- Icon -->
    <div class="w-[3rem] h-[3rem] bg-[#FEF4E7] rounded-xl flex items-center justify-center mx-auto mb-2.5 text-3xl">
        <span class="material-symbols-outlined text-[#FBB45E] w-[2.6rem]">
        lock
        </span>
    </div>
    
    <!-- Title -->
    <h2 class="text-xl font-bold text-[#363B58] mb-2
                max-md:text-sm">
      Verifikasi Kode OTP
    </h2>

    <!-- Description -->
     <p class="text-center text-[#5B5B74] text-sm leading-6 mb-10
                 max-md:text-[10px] max-md:mb-2.5 max-md:leading-3">
        Masukkan 4 digit kode yang kami kirimkan <br>
        <span class="font-semibold text-[#36395A] max-md:text-[10px]" id="email-display">
          ke {{ session('reset_email') }}
        </span>
      </p>

    <!-- Input OTP -->
    <form action="/verify-otp" method="POST">
        @csrf
     <div class="flex gap-1.5 mb-5 justify-center">
        <input type="text" maxlength="1"
               class="otp-box w-[74px] h-[74px] rounded-2xl border border-[#D9D9D9] text-center text-3xl font-semibold outline-none focus:border-[#F0AE56] bg-white
                        max-md:w-[55px] max-md:h-[55px] max-md:rounded-xl">
        <input type="text" maxlength="1"
               class="otp-box w-[74px] h-[74px] rounded-2xl border border-[#D9D9D9] text-center text-3xl font-semibold outline-none focus:border-[#F0AE56] bg-white
                        max-md:w-[55px] max-md:h-[55px] max-md:rounded-xl">
        <input type="text" maxlength="1"
               class="otp-box w-[74px] h-[74px] rounded-2xl border border-[#D9D9D9] text-center text-3xl font-semibold outline-none focus:border-[#F0AE56] bg-white
                        max-md:w-[55px] max-md:h-[55px] max-md:rounded-xl">
        <input type="text" maxlength="1"
               class="otp-box w-[74px] h-[74px] rounded-2xl border border-[#D9D9D9] text-center text-3xl font-semibold outline-none focus:border-[#F0AE56] bg-white
                        max-md:w-[55px] max-md:h-[55px] max-md:rounded-xl">
      </div>
      <!-- agar bisa dibaca -->
      <input type="hidden" name="otp" id="otp">

      <p id="error-msg" class="text-red-500 text-xs mb-2">
            @error('otp')
            {{ $message }}
            @enderror
    </p>

    <!-- Button -->
    <button type="submit" class="w-full bg-[#FBB45E] text-[#363b58] font-bold py-2 rounded-lg mb-5
                    max-md:h-[2.2rem] max-md:text-[15px] max-md:mb-2">
      Verifikasi
    </button>
    </form>

    @if(session('success'))
        <div class="text-green-500 text-xs mb-2">
            {{ session('success') }}
        </div>
    @endif

    <!-- Footer -->
    <div class="flex justify-between text-sm">
        <a href="/forgot-password" class="flex items-center gap-1 text-gray-600 font-semibold cursor-pointer
                       max-md:text-[10px]">
            <span class="material-symbols-outlined text-base">arrow_left_alt</span>
            <span>Ubah Email</span>
        </a>
        <a href="#" onclick="document.getElementById('resend-form').submit()" 
            class="text-orange-400 font-semibold hover:underline max-md:text-[10px]">
                Kirim ulang kode
            </a>

            <form id="resend-form" action="/resend-otp" method="POST" class="hidden">
                @csrf
            </form>
    </div>

    <script>
    /* ===== OTP AUTO FOCUS & NGIRIM OTP KE LARAVEL ===== */
    const otpBoxes = document.querySelectorAll('.otp-box');
    const otpInput = document.getElementById('otp');

    otpBoxes.forEach(function (input, idx, all) {

        input.addEventListener('input', function () {

            // hanya angka
            this.value = this.value.replace(/[^0-9]/g, '');

            // auto focus
            if (this.value && idx < all.length - 1) {
                all[idx + 1].focus();
            }

            // gabung otpnya
            let otp = '';

            all.forEach(box => {
                otp += box.value;
            });

            otpInput.value = otp;
        });

        // buat backspace
        input.addEventListener('keydown', function (e) {

            if (e.key === 'Backspace' && !this.value && idx > 0) {
                all[idx - 1].focus();
            }

        });

    });
    </script>

  </div>
</body>