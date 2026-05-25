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
    <form action="/reset-password" method="POST">
        @csrf
    <div class="text-left mb-5 relative
                max-md:mb-3">
        <label class="text-sm text-[#363B58] font-semibold block mb-1
                        max-md:text-[12px]">
            Password Baru
        </label>
        <input 
            type="password" 
            name="password"
            id="pwd-new"
            placeholder="Masukkan Password Disini" required
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
            name="password_confirmation"
            placeholder="Masukkan Password Disini" required
            class="password-input 
                w-full h-[2.5rem] text-sm px-4 pr-10 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400
                max-md:text-[12px] max-md:h-[2.2rem]"
        >
        <span onclick="togglePwd('pwd-confirm', this)"
            class="material-symbols-outlined absolute right-3 top-[70%] -translate-y-1/2 cursor-pointer text-[18px] text-gray-500">
            visibility
        </span>
    </div>

    <!-- Condition False -->
    @if ($errors->any())
        <p class="text-red-500 text-xs mb-2">
            {{ implode(' dan ', $errors->all()) }}
        </p>
    @endif

    <!-- Button -->
    <button type="submit" class="w-full bg-[#FBB45E] text-[#363b58] font-bold py-2 rounded-lg mb-5
                    max-md:h-[2.2rem] max-md:text-[15px] max-md:mb-2">
      Lanjut
    </button>
    </form>

    <!-- Back -->
    <div class="flex justify-start text-sm">
        <a href="/verify-otp" class="flex items-center gap-1 text-gray-600 font-semibold cursor-pointer
                       max-md:text-[10px]">
            <span class="material-symbols-outlined text-base">arrow_left_alt</span>
            <span>Kembali</span>
        </a>
    </div>

  </div>

  <script>
    /* ===== TOGGLE PASSWORD VISIBILITY ===== */
    function togglePwd(inputId, iconEl) {
        const input = document.getElementById(inputId);
        const isHidden = input.type === 'password';
        input.type = isHidden ? 'text' : 'password';
        iconEl.textContent = isHidden ? 'visibility_off' : 'visibility';
    }
  </script>
</body>
</html>