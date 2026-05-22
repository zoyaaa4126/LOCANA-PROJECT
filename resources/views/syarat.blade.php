@extends('layouts.app')

@section('title', 'Syarat & Ketentuan')

@section('content')

<div class="max-w-6xl mx-auto px-6 py-10">

    <p class="text-sm text-slate-400 mb-2">
      Register / <span class="text-[#FBB45E] font-bold">Syarat & Ketentuan</span>
    </p>


    <div class="flex items-center justify-between mb-6">
      <h1 class="text-3xl font-bold text-[#363B58]">Syarat dan Ketentuan</h1>
      <a href="/register" class="bg-gray-200 px-4 py-2 rounded-lg text-md font-bold text-[#363B58] hover:bg-gray-300">
        Kembali
      </a>
    </div>

    <p class="mb-6 leading-relaxed">
      Selamat datang di Locana, platform rekomendasi tempat hangout di Bandung. 
      Dengan mengakses dan menggunakan layanan ini, Anda dianggap telah membaca, 
      memahami, dan menyetujui seluruh syarat dan ketentuan yang berlaku di bawah ini.
    </p>

    <div class="space-y-6 text-sm leading-relaxed">

      <div>
        <h2 class="font-semibold text-gray-800">1. Definisi</h2>
        <p>
          Locana adalah platform digital yang menyediakan informasi, rekomendasi, dan ulasan terkait tempat hangout di wilayah Bandung. 
          Pengguna adalah setiap individu yang mengakses atau menggunakan layanan Locana, baik sebagai pengunjung maupun sebagai admin/pengelola konten.
        </p>
      </div>

      <div>
        <h2 class="font-semibold text-gray-800">2. Penggunaan Layanan</h2>
        <p>
            Pengguna setuju untuk menggunakan layanan Locana hanya untuk tujuan yang sah dan tidak melanggar hukum yang berlaku. 
            Pengguna tidak diperkenankan untuk:
        </p>
        <ul class="list-disc ml-5 mt-2 space-y-1">
          <li>Menyalahgunakan fitur yang tersedia</li>
          <li>Mengunggah atau menyebarkan konten yang bersifat ilegal, menyesatkan, atau merugikan pihak lain</li>
          <li>Melakukan aktivitas yang dapat mengganggu kinerja atau keamanan sistem</li>
        </ul>
        <p class="mt-2">
            Locana berhak untuk membatasi atau menghentikan akses pengguna yang melanggar ketentuan ini tanpa pemberitahuan sebelumnya.
        </p>
      </div>

      <div>
        <h2 class="font-semibold text-gray-800">3. Informasi dan Konten</h2>
        <p>
            Locana berusaha menyajikan informasi yang akurat dan terbaru mengenai tempat hangout, termasuk lokasi, fasilitas, harga, dan jam operasional. Namun, Locana tidak menjamin bahwa seluruh informasi selalu lengkap, akurat, atau terkini.
            Perubahan informasi oleh pihak tempat (misalnya jam buka, harga, atau status operasional) dapat terjadi sewaktu-waktu di luar kendali Locana.
        </p>
      </div>

      <div>
        <h2 class="font-semibold text-gray-800">4. Akun Pengguna</h2>
        <p>Untuk menggunakan fitur tertentu, pengguna mungkin diminta untuk membuat akun. Pengguna bertanggung jawab penuh atas:</p>
        <ul class="list-disc ml-5 mt-2 space-y-1">
          <li>Kerahasiaan data akun</li>
          <li>Segala aktivitas yang terjadi di dalam akun</li>
        </ul>
        <p>Locana tidak bertanggung jawab atas penyalahgunaan akun akibat kelalaian pengguna.</p>
      </div>

      <div>
        <h2 class="font-semibold text-gray-800">5. Konten Pengguna</h2>
        <p>Pengguna dapat memberikan ulasan, rating, atau kontribusi konten lainnya. Dengan mengunggah konten, pengguna menyatakan bahwa:</p>
        <ul class="list-disc ml-5 mt-2 space-y-1">
          <li>Konten tidak melanggar hak pihak lain</li>
          <li>Konten tidak mengandung unsur SARA, kebencian, atau hal yang merugikan</li>
        </ul>
        <p>Locana berhak menghapus atau menyunting konten yang dianggap tidak sesuai tanpa pemberitahuan.</p>
      </div>

      <div>
        <h2 class="font-semibold text-gray-800">6. Hak Kekayaan Intelektual</h2>
        <p>
          Seluruh konten yang terdapat di Locana, termasuk desain, logo, teks, dan elemen lainnya merupakan milik Locana atau pihak terkait yang dilindungi oleh hukum. 
          Pengguna tidak diperkenankan menggunakan atau mendistribusikan konten tanpa izin.
        </p>
      </div>

      <div>
        <h2 class="font-semibold text-gray-800">7. Tautan Pihak Ketiga</h2>
        <p>
          Locana dapat menyediakan tautan ke layanan pihak ketiga, seperti peta atau media sosial. Locana tidak bertanggung jawab atas isi, kebijakan, maupun layanan dari pihak tersebut.
        </p>
      </div>

      <div>
        <h2 class="font-semibold text-gray-800">8. Batasan Tanggung Jawab</h2>
        <p>Locana tidak bertanggung jawab atas:</p>
        <ul class="list-disc ml-5 mt-2 space-y-1">
          <li>Kerugian yang timbul akibat penggunaan informasi dari platform</li>
          <li>Pengalaman pengguna saat mengunjungi lokasi yang direkomendasikan</li>
        </ul>
        <p>Pengguna bertanggung jawab untuk melakukan verifikasi mandiri sebelum mengunjungi suatu tempat.</p>
      </div>

      <div>
        <h2 class="font-semibold text-gray-800">9. Perubahan Layanan</h2>
        <p>
          Locana berhak untuk mengubah, menambah, atau menghentikan sebagian maupun seluruh layanan tanpa pemberitahuan terlebih dahulu.
        </p>
      </div>

      <div>
        <h2 class="font-semibold text-gray-800">10. Perubahan Syarat</h2>
        <p>
          Syarat dan ketentuan ini dapat diperbarui sewaktu-waktu. Pengguna disarankan untuk memeriksa halaman ini secara berkala.
        </p>
      </div>

      <div>
        <h2 class="font-semibold text-gray-800">11. Hukum yang Berlaku</h2>
        <p>
          Syarat dan ketentuan ini diatur dan ditafsirkan sesuai dengan hukum yang berlaku di Indonesia.
        </p>
      </div>

    </div>

    <!-- Footer note -->
    <p class="mt-8 text-sm text-gray-600">
      Dengan menggunakan layanan Locana, Anda menyatakan telah memahami dan menyetujui seluruh isi syarat dan ketentuan ini. Jika Anda tidak setuju dengan salah satu bagian, disarankan untuk tidak menggunakan layanan ini.
    </p>

</div>

@endsection