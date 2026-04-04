/**
 * LOCANA - Scripts
 * Mengatur interaksi UI, Navigasi Mobile, dan Filter Sederhana
 */

document.addEventListener('DOMContentLoaded', () => {
    
    // --- 1. SELEKTOR ELEMEN ---
    const menuToggle = document.querySelector('.menu-toggle');
    const navMenu = document.querySelector('nav');
    const daftarMenu = document.querySelector('.daftar');
    const header = document.querySelector('header');
    const searchInput = document.querySelector('.search-box input');
    const searchBtn = document.querySelector('.btn-lg');
    const navLinks = document.querySelectorAll('nav a, .daftar a');

    // --- 2. LOGIKA MENU MOBILE (HAMBURGER) ---
    const toggleMobileMenu = () => {
        navMenu.classList.toggle('active');
        daftarMenu.classList.toggle('active');
        
        // Ubah icon hamburger menjadi 'X' saat terbuka
        if (navMenu.classList.contains('active')) {
            menuToggle.innerHTML = '<span class="material-symbols-outlined">close</span>';
            // Mencegah scroll body saat menu terbuka di mobile
            document.body.style.overflow = 'hidden';
        } else {
            menuToggle.innerHTML = '☰';
            document.body.style.overflow = 'auto';
        }
    };

    menuToggle.addEventListener('click', toggleMobileMenu);

    // Tutup menu otomatis jika link diklik (untuk UX yang baik)
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            navMenu.classList.remove('active');
            daftarMenu.classList.remove('active');
            menuToggle.innerHTML = '☰';
            document.body.style.overflow = 'auto';
        });
    });


    // --- 3. EFEK SCROLL PADA HEADER ---
    window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
            header.style.boxShadow = '0 2px 15px rgba(0,0,0,0.1)';
            header.style.padding = '15px 65px'; // Header sedikit mengecil saat scroll
        } else {
            header.style.boxShadow = 'none';
            header.style.padding = '25px 65px';
        }
    });


    // --- 4. FITUR PENCARIAN SEDERHANA ---
    const handleSearch = () => {
        const keyword = searchInput.value.toLowerCase().trim();
        const cards = document.querySelectorAll('.card');

        if (keyword === "") {
            cards.forEach(card => card.style.display = 'flex');
            return;
        }

        cards.forEach(card => {
            const title = card.querySelector('h4').innerText.toLowerCase();
            const location = card.querySelector('.loc p:last-child').innerText.toLowerCase();
            
            if (title.includes(keyword) || location.includes(keyword)) {
                card.style.display = 'flex';
                card.scrollIntoView({ behavior: 'smooth', block: 'center' });
            } else {
                card.style.display = 'none';
            }
        });
    };

    searchBtn.addEventListener('click', handleSearch);
    
    // Aktifkan enter untuk pencarian
    searchInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') handleSearch();
    });


    // --- 5. INTERAKSI TOMBOL LOKASI ---
    const locationButtons = document.querySelectorAll('.btn-loc');
    locationButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const placeName = this.parentElement.querySelector('h4').innerText;
            const googleMapsUrl = `https://www.google.com/maps/search/${encodeURIComponent(placeName + " Bandung")}`;
            window.open(googleMapsUrl, '_blank');
        });
    });


    // --- 6. ANIMASI REVEAL SAAT SCROLL (Opsional tapi Keren) ---
    const revealElements = document.querySelectorAll('.card, .card-rec, .user-rev');
    
    const revealOnScroll = () => {
        for (let i = 0; i < revealElements.size; i++) { // Menggunakan loop biasa untuk performa
            const windowHeight = window.innerHeight;
            const elementTop = revealElements[i].getBoundingClientRect().top;
            const elementVisible = 150;

            if (elementTop < windowHeight - elementVisible) {
                revealElements[i].style.opacity = '1';
                revealElements[i].style.transform = 'translateY(0)';
            }
        }
    };

    // Set initial style untuk animasi
    revealElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'all 0.6s ease-out';
    });

    window.addEventListener('scroll', revealOnScroll);
    revealOnScroll(); // Jalankan sekali saat load
});
