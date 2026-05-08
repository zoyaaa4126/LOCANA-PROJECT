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

    <style>
        .step { display: none; }
        .step.active { display: block; }
    </style>
</head>
<body class="bg-[#fff8ef] font-[Poppins] flex items-center justify-center h-screen">

  <!-- ===================== STEP 1: LUPA PASSWORD (EMAIL) ===================== -->
  <div class="step active bg-white w-[380px] p-8 rounded-2xl shadow-md text-center
              max-sm:w-[300px] max-sm:h-[350px] max-md:pt-6" id="step-1">

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
    <div class="w-[2.5rem] h-[2.5rem] bg-[#FEF4E7] rounded-xl flex items-center justify-center mx-auto mb-2.5 text-3xl">
        <span class="material-symbols-outlined text-[#FBB45E] w-[2.6rem]">
        lock
        </span>
    </div>
    
    <!-- Title -->
    <h2 class="text-xl font-bold text-[#363B58] mb-2
                max-md:text-sm">
      Lupa Password?
    </h2>

    <!-- Description -->
    <p class="text-xs text-gray-500 mb-6
                max-md:text-[10px] max-md:mb-2.5">
      Tenang, masukin email kamu dulu. Kami bakal kirim link buat bikin password baru.
    </p>

    <!-- Input -->
    <div class="text-left mb-5
                max-md:mb-3">
      <label class="text-sm text-[#363B58] font-semibold block mb-1
                    max-md:text-[12px]">Email</label>
      <input 
        type="email"
        id="email-input"
        placeholder="Masukkan Email Disini"
        class="w-full h-[2.5rem] text-sm px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400
                max-md:text-[12px] max-md:h-[2.2rem]"
      >
    </div>

    <!-- Button -->
    <button onclick="goStep(2)" class="w-full bg-[#FBB45E] text-[#363b58] font-bold py-2 rounded-lg mb-5
                    max-md:h-[2.2rem] max-md:text-[15px] max-md:mb-2">
      Kirim Kode
    </button>

    <!-- Footer -->
    <div class="flex justify-between text-sm">
        <a href="/login" class="flex items-center gap-1 text-gray-600 font-semibold
                       max-md:text-[10px]">
            <span class="material-symbols-outlined text-base">arrow_left_alt</span>
            <span>Kembali ke Login</span>
        </a>
    </div>

  </div>

  <!-- ===================== STEP 2: VERIFIKASI OTP ===================== -->
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
          ke***********i@gmail.com
        </span>
      </p>

    <!-- Input OTP -->
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

    <!-- Button -->
    <button onclick="goStep(3)" class="w-full bg-[#FBB45E] text-[#363b58] font-bold py-2 rounded-lg mb-5
                    max-md:h-[2.2rem] max-md:text-[15px] max-md:mb-2">
      Verifikasi
    </button>

    <!-- Footer -->
    <div class="flex justify-between text-sm">
        <a onclick="goStep(1)" class="flex items-center gap-1 text-gray-600 font-semibold cursor-pointer
                       max-md:text-[10px]">
            <span class="material-symbols-outlined text-base">arrow_left_alt</span>
            <span>Ubah Email</span>
        </a>
        <a href="#" class="text-orange-400 font-semibold hover:underline
                            max-md:text-[10px]">
            Kirim ulang kode
        </a>
    </div>

  </div>

  <!-- ===================== STEP 3: BUAT PASSWORD BARU ===================== -->
  <div class="step bg-white w-[380px] p-8 rounded-2xl shadow-md text-center
              max-sm:w-[300px] max-sm:h-[400px] max-md:pt-6" id="step-3">

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
    <div class="w-[2.5rem] h-[2.5rem] bg-[#FEF4E7] rounded-xl flex items-center justify-center mx-auto mb-2.5 text-3xl">
        <span class="material-symbols-outlined text-[#FBB45E] w-[2.6rem]">
        lock
        </span>
    </div>
    
    <!-- Title -->
    <h2 class="text-xl font-bold text-[#363B58] mb-2
                max-md:text-sm">
      Buat Password Baru
    </h2>

    <!-- Description -->
    <p class="text-xs text-gray-500 mb-6
                max-md:text-[10px] max-md:mb-2.5">
      Masukkan password baru untuk mengakses kembali akun kamu.
    </p>

    <!-- Input Password Baru -->
    <div class="text-left mb-5 relative
                max-md:mb-3">
        <label class="text-sm text-[#363B58] font-semibold block mb-1
                        max-md:text-[12px]">
            Password Baru
        </label>
        <input 
            type="password" 
            id="pwd-new"
            placeholder="Masukkan Password Disini"
            class="password-input 
                w-full h-[2.5rem] text-sm px-4 pr-10 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400
                max-md:text-[12px] max-md:h-[2.2rem]"
        >
        <span onclick="togglePwd('pwd-new', this)"
            class="material-symbols-outlined absolute right-3 top-[70%] -translate-y-1/2 cursor-pointer text-[18px] text-gray-500">
            visibility
        </span>
    </div>

    <div class="text-left mb-5 relative 
                max-md:mb-3">
        <label class="text-sm text-[#363B58] font-semibold block mb-1
                        max-md:text-[12px]">
            Konfirmasi Password
        </label>
        <input 
            type="password"
            id="pwd-confirm"
            placeholder="Masukkan Password Disini"
            class="password-input 
                w-full h-[2.5rem] text-sm px-4 pr-10 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400
                max-md:text-[12px] max-md:h-[2.2rem]"
        >
        <span onclick="togglePwd('pwd-confirm', this)"
            class="material-symbols-outlined absolute right-3 top-[70%] -translate-y-1/2 cursor-pointer text-[18px] text-gray-500">
            visibility
        </span>
    </div>

    <!-- Button -->
    <button onclick="goStep(4)" class="w-full bg-[#FBB45E] text-[#363b58] font-bold py-2 rounded-lg mb-5
                    max-md:h-[2.2rem] max-md:text-[15px] max-md:mb-2">
      Lanjut
    </button>

    <!-- Back -->
    <div class="flex justify-start text-sm">
        <a onclick="goStep(2)" class="flex items-center gap-1 text-gray-600 font-semibold cursor-pointer
                       max-md:text-[10px]">
            <span class="material-symbols-outlined text-base">arrow_left_alt</span>
            <span>Kembali</span>
        </a>
    </div>

  </div>

  <!-- ===================== STEP 4: BERHASIL ===================== -->
  <div class="step bg-white w-[380px] p-8 rounded-2xl shadow-md text-center
              max-sm:w-[300px] max-sm:h-[350px] max-md:pt-20" id="step-4">

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
    <div class="w-[3rem] h-[3rem] bg-[#DCFCE7] rounded-full flex items-center justify-center mx-auto mb-2.5 text-3xl">
        <span class="material-symbols-outlined text-[#00C951] w-[2.6rem]">
            check
        </span>
    </div>
    
    <!-- Title -->
    <h2 class="text-xl font-bold text-[#363B58] mb-2
                max-md:text-sm">
      Password Berhasil Diganti!
    </h2>

    <!-- Description -->
    <p class="text-xs text-gray-500 mb-6
                max-md:text-[10px] max-md:mb-2.5">
      Klik "Lanjut" untuk kembali ke halaman login.
    </p>

    <!-- Button -->
    <button onclick="window.location.href='/login'" class="w-full bg-[#FBB45E] text-[#363b58] font-bold py-2 rounded-lg mb-5
                    max-md:h-[2.2rem] max-md:text-[15px] max-md:mb-2">
      Lanjut
    </button>

  </div>

<script src="assets/js/script.js"></script>
<script>
    /* ===== STEP NAVIGATION ===== */
    function goStep(n) {
        // Saat pindah ke step 2, tampilkan email ter-mask
        if (n === 2) {
            const email = document.getElementById('email-input').value.trim();
            if (email) {
                const [user, domain] = email.split('@');
                const masked = user.slice(0, 2) + '***' + user.slice(-1);
                document.getElementById('email-display').textContent = masked + '@' + domain;
            }
        }
        document.querySelectorAll('.step').forEach(el => el.classList.remove('active'));
        document.getElementById('step-' + n).classList.add('active');
    }

    /* ===== TOGGLE PASSWORD VISIBILITY ===== */
    function togglePwd(inputId, iconEl) {
        const input = document.getElementById(inputId);
        const isHidden = input.type === 'password';
        input.type = isHidden ? 'text' : 'password';
        iconEl.textContent = isHidden ? 'visibility_off' : 'visibility';
    }

    /* ===== OTP AUTO FOCUS ===== */
    document.querySelectorAll('.otp-box').forEach(function (input, idx, all) {
        input.addEventListener('input', function () {
            this.value = this.value.replace(/[^0-9]/g, '');
            if (this.value && idx < all.length - 1) all[idx + 1].focus();
        });
        input.addEventListener('keydown', function (e) {
            if (e.key === 'Backspace' && !this.value && idx > 0) all[idx - 1].focus();
        });
    });
</script>
</body>
</html>