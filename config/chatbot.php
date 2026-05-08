<?php
return [
    // MENU UTAMA
    'menu' => [
        [
            'key'   => 'akun_login',
            'icon'  => 'key',
            'label' => 'Akun & Login',
            'desc'  => 'Lupa password, logout akun, daftar akun baru',
        ],
        [
            'key'   => 'pencarian_tempat',
            'icon'  => 'location_on',
            'label' => 'Pencarian Tempat',
            'desc'  => 'Pencarian tidak muncul, cara menggunakan filter',
        ],
        [
            'key'   => 'wishlist',
            'icon'  => 'bookmark',
            'label' => 'Wishlist',
            'desc'  => 'Menambahkan tempat ke wishlist, menghapus wishlist',
        ],
        [
            'key'   => 'review',
            'icon'  => 'kid_star',
            'label' => 'Review',
            'desc'  => 'Memberi review, edit atau hapus review, review tidak muncul',
        ],
        [
            'key'   => 'pengaturan_akun',
            'icon'  => 'settings',
            'label' => 'Pengaturan Akun',
            'desc'  => 'Cara mengubah profil, mengubah password, menghapus akun',
        ],
    ],

    // ALUR PERCAKAPAN
    'flow' => [

        // AKUN & LOGIN
        'akun_login' => [
            'message' => 'Oke, soal akun & login kamu lagi butuh bantuan apa?',
            'options' => [
                ['label' => 'Lupa password',   'next' => 'akun_lupa_password'],
                ['label' => 'Logout akun',      'next' => 'akun_logout'],
                ['label' => 'Daftar akun baru', 'next' => 'akun_daftar'],
            ],
        ],
        'akun_lupa_password' => [
            'message' => "Berikut step-by-step untuk masalah \"Lupa Password\"\n\n1. Buka halaman Login lalu klik \"Lupa Password?\"\n2. Masukkan email kamu yang terdaftar di Locana\n3. Kami akan mengirimkan email berisi link untuk reset password kamu.\n\nApakah jawaban dari kami membantu?",
            'options' => [
                ['label' => 'Membantu',     'next' => 'feedback_positif'],
                ['label' => 'Tidak membantu', 'next' => 'feedback_negatif'],
            ],
        ],
        'akun_logout' => [
            'message' => "Untuk logout akun:\n\n1. Klik foto profil di pojok kanan atas\n2. Pilih menu \"Keluar\"\n3. Kamu akan otomatis keluar dari akun.\n\nApakah jawaban dari kami membantu?",
            'options' => [
                ['label' => 'Membantu',       'next' => 'feedback_positif'],
                ['label' => 'Tidak membantu', 'next' => 'feedback_negatif'],
            ],
        ],
        'akun_daftar' => [
            'message' => "Untuk daftar akun baru:\n\n1. Klik tombol \"Daftar\" di halaman utama\n2. Isi nama, email, dan password kamu\n3. Verifikasi email yang kami kirim\n4. Akun kamu siap digunakan!\n\nApakah jawaban dari kami membantu?",
            'options' => [
                ['label' => 'Membantu',       'next' => 'feedback_positif'],
                ['label' => 'Tidak membantu', 'next' => 'feedback_negatif'],
            ],
        ],

        // PENCARIAN TEMPAT
        'pencarian_tempat' => [
            'message' => 'Soal pencarian tempat, kamu mengalami masalah apa?',
            'options' => [
                ['label' => 'Pencarian tidak muncul',       'next' => 'cari_tidak_muncul'],
                ['label' => 'Cara menggunakan filter',      'next' => 'cari_filter'],
                ['label' => 'Hasil pencarian tidak relevan','next' => 'cari_tidak_relevan'],
            ],
        ],
        'cari_tidak_muncul' => [
            'message' => "Jika hasil pencarian tidak muncul, coba:\n\n1. Periksa koneksi internet kamu\n2. Pastikan kata kunci tidak typo\n3. Coba gunakan kata kunci yang lebih umum\n4. Refresh halaman dan coba lagi\n\nApakah jawaban dari kami membantu?",
            'options' => [
                ['label' => 'Membantu',       'next' => 'feedback_positif'],
                ['label' => 'Tidak membantu', 'next' => 'feedback_negatif'],
            ],
        ],
        'cari_filter' => [
            'message' => "Cara menggunakan filter pencarian:\n\n1. Ketik kata kunci di kolom pencarian\n2. Klik ikon filter di sebelah kanan kolom\n3. Pilih kategori, jarak, atau rating\n4. Klik \"Terapkan\" untuk melihat hasilnya\n\nApakah jawaban dari kami membantu?",
            'options' => [
                ['label' => 'Membantu',       'next' => 'feedback_positif'],
                ['label' => 'Tidak membantu', 'next' => 'feedback_negatif'],
            ],
        ],
        'cari_tidak_relevan' => [
            'message' => "Jika hasil tidak relevan:\n\n1. Coba gunakan kata kunci yang lebih spesifik\n2. Gunakan filter kategori untuk mempersempit hasil\n3. Cek ejaan kata kunci kamu\n\nApakah jawaban dari kami membantu?",
            'options' => [
                ['label' => 'Membantu',       'next' => 'feedback_positif'],
                ['label' => 'Tidak membantu', 'next' => 'feedback_negatif'],
            ],
        ],

        // WISHLIST
        'wishlist' => [
            'message' => 'Soal wishlist, kamu butuh bantuan apa?',
            'options' => [
                ['label' => 'Tambah ke wishlist',   'next' => 'wishlist_tambah'],
                ['label' => 'Hapus dari wishlist',  'next' => 'wishlist_hapus'],
                ['label' => 'Lihat daftar wishlist','next' => 'wishlist_lihat'],
            ],
        ],
        'wishlist_tambah' => [
            'message' => "Cara menambahkan tempat ke wishlist:\n\n1. Buka halaman detail tempat\n2. Klik ikon bookmark di pojok kanan atas kartu\n3. Tempat otomatis tersimpan ke wishlist kamu\n\nApakah jawaban dari kami membantu?",
            'options' => [
                ['label' => 'Membantu',       'next' => 'feedback_positif'],
                ['label' => 'Tidak membantu', 'next' => 'feedback_negatif'],
            ],
        ],
        'wishlist_hapus' => [
            'message' => "Cara menghapus dari wishlist:\n\n1. Buka halaman Wishlist di menu profil\n2. Klik ikon bookmark yang sudah aktif pada tempat yang ingin dihapus\n3. Tempat akan langsung terhapus dari wishlist\n\nApakah jawaban dari kami membantu?",
            'options' => [
                ['label' => 'Membantu',       'next' => 'feedback_positif'],
                ['label' => 'Tidak membantu', 'next' => 'feedback_negatif'],
            ],
        ],
        'wishlist_lihat' => [
            'message' => "Cara melihat daftar wishlist:\n\n1. Klik foto profil di pojok kanan atas\n2. Pilih menu \"Wishlist\"\n3. Semua tempat yang kamu simpan akan tampil di sini\n\nApakah jawaban dari kami membantu?",
            'options' => [
                ['label' => 'Membantu',       'next' => 'feedback_positif'],
                ['label' => 'Tidak membantu', 'next' => 'feedback_negatif'],
            ],
        ],

        // REVIE
        'review' => [
            'message' => 'Soal review, kamu butuh bantuan apa?',
            'options' => [
                ['label' => 'Cara memberi review',    'next' => 'review_beri'],
                ['label' => 'Edit atau hapus review', 'next' => 'review_edit'],
                ['label' => 'Review tidak muncul',    'next' => 'review_tidak_muncul'],
            ],
        ],
        'review_beri' => [
            'message' => "Cara memberi review:\n\n1. Buka halaman detail tempat\n2. Scroll ke bawah ke bagian \"Ulasan\"\n3. Klik \"Tulis Review\"\n4. Beri bintang dan tulis komentarmu\n5. Klik \"Kirim\"\n\nApakah jawaban dari kami membantu?",
            'options' => [
                ['label' => 'Membantu',       'next' => 'feedback_positif'],
                ['label' => 'Tidak membantu', 'next' => 'feedback_negatif'],
            ],
        ],
        'review_edit' => [
            'message' => "Cara edit atau hapus review:\n\n1. Buka halaman profil kamu\n2. Pilih menu \"Review Saya\"\n3. Klik ikon edit atau hapus di samping review\n4. Simpan perubahan jika mengedit\n\nApakah jawaban dari kami membantu?",
            'options' => [
                ['label' => 'Membantu',       'next' => 'feedback_positif'],
                ['label' => 'Tidak membantu', 'next' => 'feedback_negatif'],
            ],
        ],
        'review_tidak_muncul' => [
            'message' => "Jika review tidak muncul:\n\n1. Review membutuhkan waktu beberapa menit untuk tampil\n2. Pastikan kamu sudah login saat menulis review\n3. Review yang melanggar aturan komunitas otomatis tidak ditampilkan\n4. Coba refresh halaman\n\nApakah jawaban dari kami membantu?",
            'options' => [
                ['label' => 'Membantu',       'next' => 'feedback_positif'],
                ['label' => 'Tidak membantu', 'next' => 'feedback_negatif'],
            ],
        ],

        // PENGATURAN AKUN─
        'pengaturan_akun' => [
            'message' => 'Soal pengaturan akun, kamu mau melakukan apa?',
            'options' => [
                ['label' => 'Ubah foto profil',  'next' => 'akun_foto'],
                ['label' => 'Ubah password',     'next' => 'akun_ubah_password'],
                ['label' => 'Hapus akun',        'next' => 'akun_hapus'],
            ],
        ],
        'akun_foto' => [
            'message' => "Cara mengubah foto profil:\n\n1. Buka halaman Profil\n2. Klik foto profil kamu\n3. Pilih \"Ganti Foto\"\n4. Upload foto baru dari galeri\n5. Klik \"Simpan\"\n\nApakah jawaban dari kami membantu?",
            'options' => [
                ['label' => 'Membantu',       'next' => 'feedback_positif'],
                ['label' => 'Tidak membantu', 'next' => 'feedback_negatif'],
            ],
        ],
        'akun_ubah_password' => [
            'message' => "Cara mengubah password:\n\n1. Buka halaman Profil\n2. Pilih \"Pengaturan Akun\"\n3. Klik \"Ubah Password\"\n4. Masukkan password lama, lalu password baru\n5. Klik \"Simpan Perubahan\"\n\nApakah jawaban dari kami membantu?",
            'options' => [
                ['label' => 'Membantu',       'next' => 'feedback_positif'],
                ['label' => 'Tidak membantu', 'next' => 'feedback_negatif'],
            ],
        ],
        'akun_hapus' => [
            'message' => "Cara menghapus akun:\n\n1. Buka halaman Profil\n2. Pilih \"Pengaturan Akun\"\n3. Scroll ke bawah, klik \"Hapus Akun\"\n4. Konfirmasi dengan memasukkan password\n⚠️ Akun yang dihapus tidak dapat dipulihkan.\n\nApakah jawaban dari kami membantu?",
            'options' => [
                ['label' => 'Membantu',       'next' => 'feedback_positif'],
                ['label' => 'Tidak membantu', 'next' => 'feedback_negatif'],
            ],
        ],

        // FEEDBAC─
        'feedback_positif' => [
            'message' => "Baik, terima kasih atas feedbacknya 😊\n\nAda yang bisa aku bantu lagi?",
            'options' => [
                ['label' => 'Ada',      'next' => '__menu__'],
                ['label' => 'Tidak ada','next' => 'selesai'],
            ],
        ],
        'feedback_negatif' => [
            'message' => "Maaf jawaban kami kurang membantu 😔\n\nKamu bisa hubungi tim kami langsung di support@locana.id\n\nAda yang bisa aku bantu lagi?",
            'options' => [
                ['label' => 'Ada',      'next' => '__menu__'],
                ['label' => 'Tidak ada','next' => 'selesai'],
            ],
        ],
        'selesai' => [
            'message' => 'Baik! Sampai jumpa lagi 👋 Jangan ragu untuk kembali jika butuh bantuan.',
            'options' => [],
        ],
    ],
];