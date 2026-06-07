<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="assets/img/Locana_Logo 1.png" type="image/gif">
    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>

<body class="min-h-screen font-[Poppins]" style="font-variation-settings: 'FILL' 1;">

    <header class="bg-white border-b border-gray-300 sticky top-0 z-50 shadow-sm">

        {{-- DESKTOP NAVBAR --}}
        <div class="hidden md:block container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <a href="/" class="flex items-center gap-2">
                    <img src="{{ asset('assets/img/Locana_Logo 1.png') }}" class="h-10 object-contain" alt="Logo">
                    <span class="font-bold text-xl text-gray-800">LOCANA</span>
                </a>
                <div class="flex flex-row-reverse gap-4 items-center">

                    @auth
                        <div class="relative" id="profileDropdown">
                            <button id="dropdownButton" class="flex items-center gap-2 hover:bg-gray-100 px-2 py-1 rounded-lg transition">
                                @if(auth()->user()->fotoProfile)
                                    <img src="{{ asset('storage/' . auth()->user()->fotoProfile) }}"
                                         class="w-10 h-10 rounded-full object-cover" alt="Profile">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->nama) }}&background=FBB45E&color=363B58"
                                         class="w-10 h-10 rounded-full object-cover" alt="Profile">
                                @endif
                                <div class="flex flex-col items-end leading-tight">
                                    <span class="text-sm font-semibold">{{ auth()->user()->nama }}</span>
                                    <span class="text-xs text-gray-500">{{ auth()->user()->username }}</span>
                                </div>
                                <span id="arrowIcon" class="material-symbols-outlined transition-transform duration-300">expand_more</span>
                            </button>
                            <div id="dropdownMenu" class="absolute right-0 mt-2 w-60 bg-white rounded-xl shadow-lg border z-50 opacity-0 scale-95 pointer-events-none transition-all duration-200 ease-out">
                                <ul class="py-2 text-sm text-gray-700">
                                    <a href="/home"><li class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100"><span class="material-symbols-outlined text-gray-500">home</span>Beranda</li></a>
                                    <a href="/profile"><li class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100"><span class="material-symbols-outlined text-gray-500">person</span>Profile</li></a>
                                    <a href="/wishlist"><li class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100"><span class="material-symbols-outlined text-gray-500">favorite</span>Wishlist</li></a>
                                    <a href="/security"><li class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100"><span class="material-symbols-outlined text-gray-500">security</span>Privasi & Keamanan</li></a>
                                    <a href="/help"><li class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100"><span class="material-symbols-outlined text-gray-500">help</span>Bantuan</li></a>
                                    <hr class="my-1">
                                    <a onclick="bukaModalLogout()"><li class="flex items-center gap-3 px-4 py-2 hover:bg-red-50 text-red-500 cursor-pointer"><span class="material-symbols-outlined">logout</span>Keluar</li></a>
                                </ul>
                            </div>
                        </div>
                    @else
                        <a href="/login" class="bg-[#FBB45E] hover:bg-[#E2A255] text-[#363B58] px-5 py-2 rounded-lg font-bold text-sm transition shadow-sm">
                            Masuk
                        </a>
                    @endauth

                    @if(!request()->is('*/map') && !request()->is('places/*') && !request()->is('profile') && !request()->is('edit-profile') && !request()->is('wishlist'))
                    <div class="relative bg-slate-100 border rounded-lg border-slate-200">
                        <span class="material-symbols-outlined absolute left-3 top-2.5 text-[#363B58]">search</span>
                        <input type="text" placeholder="Telusuri" class="pl-10 pr-4 py-2 w-64 placeholder-[#363B58] bg-transparent outline-none">
                    </div>
                    @endif

                </div>
            </div>
        </div>

        {{-- MOBILE NAVBAR --}}
        <div class="md:hidden px-4 py-3">
            <div class="flex justify-between items-center">
                <a href="/" class="flex items-center gap-2">
                    <img src="{{ asset('assets/img/Locana_Logo 1.png') }}" class="h-7 object-contain" alt="Logo">
                    <span class="font-bold text-base text-gray-800">LOCANA</span>
                </a>
                <div class="flex items-center gap-2">
                    @if(request()->is('/') || request()->is('home'))
                    <button id="filterBtn" class="p-2 rounded-lg hover:bg-gray-100 transition">
                        <span class="material-symbols-outlined text-2xl text-[#363B58]">tune</span>
                    </button>
                    @endif
                    <button id="hamburgerBtn" class="p-2 rounded-lg hover:bg-gray-100 transition">
                        <span class="material-symbols-outlined text-2xl text-[#363B58]">menu</span>
                    </button>
                </div>
            </div>
            @if(!request()->is('*/map') && !request()->is('places/*'))
            <div class="mt-3">
                <div class="relative bg-slate-100 border rounded-lg border-slate-200 w-full">
                    <span class="material-symbols-outlined absolute left-3 top-2 text-[#363B58] text-base">search</span>
                    <input type="text" placeholder="Telusuri" class="pl-9 pr-4 py-2 w-full placeholder-[#363B58] text-sm rounded-lg bg-transparent outline-none">
                </div>
            </div>
            @endif
        </div>
    </header>

    {{-- FILTER SIDEBAR (mobile) --}}
    @if(request()->is('/') || request()->is('home'))
    <div id="filterSidebar" class="fixed inset-0 z-50 hidden md:hidden">
        <div id="filterOverlay" class="absolute inset-0 bg-black/50 transition-opacity duration-300 opacity-0"></div>
        <div id="filterContent" class="absolute left-0 top-0 h-full w-80 bg-white shadow-2xl transform -translate-x-full transition-transform duration-300 ease-out overflow-y-auto">
            <div class="p-4 border-b border-gray-200 flex justify-between items-center sticky top-0 bg-white z-10">
                <h2 class="font-bold text-xl text-[#363B58]">Filters</h2>
                <div class="flex items-center gap-2">
                    <button id="resetFilters" class="text-[#FBB45E] text-sm font-semibold">RESET</button>
                    <button id="closeFilterBtn" class="p-2 hover:bg-gray-100 rounded-lg">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>
            </div>
            <div class="p-4">
                <div class="mb-6">
                    <p class="text-gray-400 font-semibold text-sm mb-3 uppercase tracking-wide">KATEGORI</p>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3 p-2 rounded-lg bg-orange-50 text-[#FBB45E] cursor-pointer"><span class="material-symbols-outlined">coffee</span> Cafe</div>
                        <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 cursor-pointer"><span class="material-symbols-outlined">restaurant</span> Restaurant</div>
                        <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 cursor-pointer"><span class="material-symbols-outlined">bakery_dining</span> Bakery</div>
                        <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 cursor-pointer"><span class="material-symbols-outlined">music_note</span> Live Music</div>
                        <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 cursor-pointer"><span class="material-symbols-outlined">home</span> Indoor</div>
                        <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 cursor-pointer"><span class="material-symbols-outlined">landscape</span> Outdoor</div>
                    </div>
                </div>
                <div class="mb-6">
                    <p class="text-gray-400 font-semibold text-sm mb-3 uppercase tracking-wide">BUDGET</p>
                    <div class="space-y-2">
                        <label class="flex items-center gap-2"><input type="checkbox" class="rounded text-[#FBB45E]"> <span class="text-sm">&#60; Rp50.000</span></label>
                        <label class="flex items-center gap-2"><input type="checkbox" class="rounded text-[#FBB45E]"> <span class="text-sm">Rp50.000 – Rp100.000</span></label>
                        <label class="flex items-center gap-2"><input type="checkbox" class="rounded text-[#FBB45E]"> <span class="text-sm">Rp100.001 – Rp150.000</span></label>
                        <label class="flex items-center gap-2"><input type="checkbox" class="rounded text-[#FBB45E]"> <span class="text-sm">Rp150.001 – Rp200.000</span></label>
                        <label class="flex items-center gap-2"><input type="checkbox" class="rounded text-[#FBB45E]"> <span class="text-sm">&#62; Rp200.001</span></label>
                    </div>
                </div>
                <div class="mb-6">
                    <p class="text-gray-400 font-semibold text-sm mb-3 uppercase tracking-wide">RATING</p>
                    <div class="space-y-2">
                        <label class="flex items-center gap-2"><input type="radio" name="rating" class="text-[#FBB45E]"> <span class="text-sm">Rating Tertinggi</span></label>
                        <label class="flex items-center gap-2"><input type="radio" name="rating" class="text-[#FBB45E]"> <span class="text-sm">Rating Terendah</span></label>
                    </div>
                </div>
                <button class="mt-3 bg-[#FBB45E] hover:bg-[#E2A255] w-full px-5 py-2 rounded-lg text-md font-bold flex gap-1 justify-center items-center transition">Terapkan Filter</button>
            </div>
        </div>
    </div>
    @endif

    {{-- MENU SIDEBAR (mobile) --}}
    <div id="menuSidebar" class="fixed inset-0 z-50 hidden md:hidden">
        <div id="menuOverlay" class="absolute inset-0 bg-black/50 transition-opacity duration-300 opacity-0"></div>
        <div id="menuContent" class="absolute right-0 top-0 h-full w-80 bg-white shadow-2xl transform translate-x-full transition-transform duration-300 ease-out">
            <div class="flex flex-col h-full">

                <div class="p-4 border-b border-gray-200 flex justify-between items-start">
                    @auth
                        <div class="flex items-center gap-3">
                            @if(auth()->user()->fotoProfile)
                                <img src="{{ asset('storage/' . auth()->user()->fotoProfile) }}"
                                     class="w-12 h-12 rounded-full object-cover" alt="Profile">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->nama) }}&background=FBB45E&color=363B58"
                                     class="w-12 h-12 rounded-full object-cover" alt="Profile">
                            @endif
                            <div>
                                <p class="font-semibold text-base">{{ auth()->user()->nama }}</p>
                                <p class="text-xs text-gray-500">{{ auth()->user()->username }}</p>
                            </div>
                        </div>
                    @else
                        <div class="flex items-center gap-2 py-2">
                            <span class="material-symbols-outlined text-gray-400 text-3xl">account_circle</span>
                            <p class="font-medium text-gray-600 text-sm">Mode Penjelajah (Guest)</p>
                        </div>
                    @endauth

                    <button id="closeMenuBtn" class="p-2 hover:bg-gray-100 rounded-lg">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>

                <nav class="flex-1 py-2">
                    <a href="/home" class="flex items-center gap-3 px-4 py-3 text-[#363B58] hover:bg-gray-50 transition border-l-4 border-transparent hover:border-[#FBB45E]">
                        <span class="material-symbols-outlined text-gray-500">home</span> Home
                    </a>

                    @auth
                        <a href="/profile" class="flex items-center gap-3 px-4 py-3 text-[#363B58] hover:bg-gray-50 transition border-l-4 border-transparent hover:border-[#FBB45E]">
                            <span class="material-symbols-outlined text-gray-500">person</span> Profile
                        </a>
                        <a href="/wishlist" class="flex items-center gap-3 px-4 py-3 text-[#363B58] hover:bg-gray-50 transition border-l-4 border-transparent hover:border-[#FBB45E]">
                            <span class="material-symbols-outlined text-gray-500">favorite</span> Wishlist
                        </a>
                        <a href="/security" class="flex items-center gap-3 px-4 py-3 text-[#363B58] hover:bg-gray-50 transition border-l-4 border-transparent hover:border-[#FBB45E]">
                            <span class="material-symbols-outlined text-gray-500">security</span> Privasi & Keamanan
                        </a>
                    @endauth

                    <a href="/help" class="flex items-center gap-3 px-4 py-3 text-[#363B58] hover:bg-gray-50 transition border-l-4 border-transparent hover:border-[#FBB45E]">
                        <span class="material-symbols-outlined text-gray-500">help</span> Bantuan
                    </a>
                    <div class="h-px bg-gray-200 my-2 mx-4"></div>

                    @auth
                        <a onclick="bukaModalLogout()" class="flex items-center gap-3 px-4 py-3 text-red-500 hover:bg-red-50 transition cursor-pointer">
                            <span class="material-symbols-outlined">logout</span> Keluar
                        </a>
                    @else
                        <a href="/login" class="flex items-center gap-3 px-4 py-3 text-emerald-600 hover:bg-emerald-50 transition font-bold">
                            <span class="material-symbols-outlined">login</span> Masuk / Login
                        </a>
                    @endauth
                </nav>

                <div class="p-4 border-t border-gray-200">
                    <div class="flex items-center gap-2 text-xs text-gray-400">
                        <span>© 2024 LOCANA</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main>
        @yield('content')
    </main>

    @if(!request()->is('*/map'))
    <x-footer />
    @endif

    @if(!request()->is('*/map'))
    <a href="/chatbot" class="fixed bottom-5 right-5 z-50 bg-[#FBB45E] text-[#363B58] w-14 h-14 rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition"
       style="font-variation-settings: 'FILL' 1;" title="Chatbot" id="chatbotBtn">
        <span class="material-symbols-outlined text-2xl">smart_toy</span>
    </a>
    @endif

    @include('components.modal-logout')
    @include('components.modal-loginRequired')
    @include('components.modal-delete')
    <script src="{{ asset('js/script.js') }}"></script>

<script>
// PROFILE DROPDOWN
const dropdownButton = document.getElementById('dropdownButton');
const dropdownMenu = document.getElementById('dropdownMenu');
const arrowIcon = document.getElementById('arrowIcon');

if (dropdownButton && dropdownMenu) {
    dropdownButton.addEventListener('click', (e) => {
        e.stopPropagation();
        const isOpen = !dropdownMenu.classList.contains('pointer-events-none');
        if (isOpen) {
            dropdownMenu.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
            dropdownMenu.classList.remove('opacity-100', 'scale-100', 'pointer-events-auto');
            if (arrowIcon) arrowIcon.style.transform = 'rotate(0deg)';
        } else {
            dropdownMenu.classList.remove('opacity-0', 'scale-95', 'pointer-events-none');
            dropdownMenu.classList.add('opacity-100', 'scale-100', 'pointer-events-auto');
            if (arrowIcon) arrowIcon.style.transform = 'rotate(180deg)';
        }
    });
    document.addEventListener('click', (e) => {
        const profileDropdown = document.getElementById('profileDropdown');
        if (profileDropdown && !profileDropdown.contains(e.target)) {
            dropdownMenu.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
            dropdownMenu.classList.remove('opacity-100', 'scale-100', 'pointer-events-auto');
            if (arrowIcon) arrowIcon.style.transform = 'rotate(0deg)';
        }
    });
}

// MENU SIDEBAR (KANAN)
const hamburgerBtn = document.getElementById('hamburgerBtn');
const menuSidebar = document.getElementById('menuSidebar');
const menuContent = document.getElementById('menuContent');
const menuOverlay = document.getElementById('menuOverlay');
const closeMenuBtn = document.getElementById('closeMenuBtn');

function openMenuSidebar() {
    if (!menuSidebar) return;
    menuSidebar.classList.remove('hidden');
    setTimeout(() => {
        if (menuOverlay) menuOverlay.classList.add('opacity-100');
        if (menuContent) menuContent.classList.remove('translate-x-full');
    }, 10);
    document.body.style.overflow = 'hidden';
}
function closeMenuSidebar() {
    if (menuOverlay) menuOverlay.classList.remove('opacity-100');
    if (menuContent) menuContent.classList.add('translate-x-full');
    setTimeout(() => {
        if (menuSidebar) menuSidebar.classList.add('hidden');
        document.body.style.overflow = '';
    }, 300);
}

if (hamburgerBtn) hamburgerBtn.addEventListener('click', openMenuSidebar);
if (closeMenuBtn) closeMenuBtn.addEventListener('click', closeMenuSidebar);
if (menuOverlay) menuOverlay.addEventListener('click', closeMenuSidebar);

// FILTER SIDEBAR (KIRI)
const filterBtn = document.getElementById('filterBtn');
const filterSidebar = document.getElementById('filterSidebar');
const filterContent = document.getElementById('filterContent');
const filterOverlay = document.getElementById('filterOverlay');
const closeFilterBtn = document.getElementById('closeFilterBtn');

function closeFilterSidebar() {
    if (filterOverlay) filterOverlay.classList.remove('opacity-100');
    if (filterContent) filterContent.classList.add('-translate-x-full');
    setTimeout(() => {
        if (filterSidebar) filterSidebar.classList.add('hidden');
        document.body.style.overflow = '';
    }, 300);
}

if (filterBtn && filterSidebar) {
    function openFilterSidebar() {
        filterSidebar.classList.remove('hidden');
        setTimeout(() => {
            if (filterOverlay) filterOverlay.classList.add('opacity-100');
            if (filterContent) filterContent.classList.remove('-translate-x-full');
        }, 10);
        document.body.style.overflow = 'hidden';
    }
    filterBtn.addEventListener('click', openFilterSidebar);
    if (closeFilterBtn) closeFilterBtn.addEventListener('click', closeFilterSidebar);
    if (filterOverlay) filterOverlay.addEventListener('click', closeFilterSidebar);

    const resetFiltersBtn = document.getElementById('resetFilters');
    if (resetFiltersBtn) {
        resetFiltersBtn.addEventListener('click', () => {
            document.querySelectorAll('#filterSidebar input[type="checkbox"]').forEach(cb => cb.checked = false);
            document.querySelectorAll('#filterSidebar input[type="radio"]').forEach(r => r.checked = false);
            document.querySelectorAll('#filterSidebar .bg-orange-50').forEach(el => {
                el.classList.remove('bg-orange-50', 'text-[#FBB45E]');
                el.classList.add('hover:bg-gray-50');
            });
        });
    }
}

// ESC TUTUP SIDEBAR
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        if (menuSidebar && !menuSidebar.classList.contains('hidden')) closeMenuSidebar();
        if (filterSidebar && !filterSidebar.classList.contains('hidden')) closeFilterSidebar();
    }
});

// WISHLIST TOGGLE
function toggleWishlist(btn) {
    const placeId = btn.dataset.id;
    if (!placeId) return;

    fetch('/wishlist/toggle', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: `place_id=${placeId}`
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === 'added') {
            btn.style.background = '#FBB45E';
            btn.style.color = '#363B58';
            btn.dataset.active = 'true';
        } else {
            btn.style.background = '#FFF8EF';
            btn.style.color = '#FBB45E';
            btn.dataset.active = 'false';
            const card = btn.closest('.flex.flex-col.bg-white');
            if (card) card.remove();
        }
    })
    .catch(err => console.error(err));
}
function setSaved(btn) {
    btn.style.backgroundColor = '#363B58';
    btn.style.color = '#FBB45E';
    btn.querySelector('#wishlistIcon').style.fill = '#FBB45E';
    btn.querySelector('#wishlistIcon').setAttribute('d', 'M200-120v-640q0-33 23.5-56.5T280-840h400q33 0 56.5 23.5T760-760v640L480-240 200-120Z');
    btn.onmouseenter = () => btn.style.backgroundColor = '#4a5068';
    btn.onmouseleave = () => btn.style.backgroundColor = '#363B58';
}
function setUnsaved(btn) {
    btn.style.backgroundColor = '#FBB45E';
    btn.style.color = '#000000';
    btn.querySelector('#wishlistIcon').style.fill = '#000000';
    btn.querySelector('#wishlistIcon').setAttribute('d', 'M200-120v-640q0-33 23.5-56.5T280-840h400q33 0 56.5 23.5T760-760v640L480-240 200-120Zm80-122 200-86 200 86v-518H280v518Zm0-518h400-400Z');
    btn.onmouseenter = () => btn.style.backgroundColor = '#E2A255';
    btn.onmouseleave = () => btn.style.backgroundColor = '#FBB45E';
}

// SCROLL CARDS
document.querySelectorAll('.main-cards').forEach(cardSection => {
    const scrollContainer = cardSection.querySelector('.scrollContainer');
    const backBtn = cardSection.querySelector('.scrollLeft');
    const nextBtn = cardSection.querySelector('.scrollRight');
    if (!scrollContainer || !backBtn || !nextBtn) return;
    function updateButtons() {
        backBtn.style.opacity = scrollContainer.scrollLeft <= 0 ? "0" : "1";
        backBtn.style.pointerEvents = scrollContainer.scrollLeft <= 0 ? "none" : "auto";
        const atEnd = scrollContainer.scrollLeft + scrollContainer.clientWidth >= scrollContainer.scrollWidth - 1;
        nextBtn.style.opacity = atEnd ? "0" : "1";
        nextBtn.style.pointerEvents = atEnd ? "none" : "auto";
    }
    nextBtn.addEventListener("click", () => scrollContainer.scrollBy({ left: 900, behavior: "smooth" }));
    backBtn.addEventListener("click", () => scrollContainer.scrollBy({ left: -900, behavior: "smooth" }));
    scrollContainer.addEventListener("scroll", updateButtons);
    updateButtons();
});

// POP UP HAPUS
function confirmHapus() {
    const modal = document.getElementById('modal-hapus');
    if (modal) modal.classList.remove('hidden');
}
function tutupModal() {
    const modal = document.getElementById('modal-hapus');
    if (modal) modal.classList.add('hidden');
}
const modalHapus = document.getElementById('modal-hapus');
if (modalHapus) {
    modalHapus.addEventListener('click', function(e) {
        if (e.target === this) tutupModal();
    });
}

// MOBILE FILTER TOGGLE (desktopSidebar)
const mobileToggle = document.getElementById("mobileFilterToggle");
const mobileFilterSidebar = document.getElementById("desktopSidebar");
if (mobileToggle && mobileFilterSidebar) {
    mobileToggle.addEventListener("click", () => {
        mobileFilterSidebar.classList.toggle("max-sm:hidden");
    });
}

// DESKTOP FILTER TOGGLE
const desktopToggle = document.getElementById("desktopFilterToggle");
const desktopSidebar = document.getElementById("desktopSidebar");
if (desktopToggle && desktopSidebar) {
    desktopToggle.addEventListener("click", () => {
        desktopSidebar.classList.toggle("w-80");
        desktopSidebar.classList.toggle("w-0");
        desktopSidebar.classList.toggle("p-6");
        desktopSidebar.classList.toggle("overflow-hidden");
        desktopSidebar.classList.toggle("opacity-0");
        desktopToggle.classList.toggle("bg-gray-100");
    });
}

document.addEventListener("DOMContentLoaded", function () {

    // TOGGLE PASSWORD
    document.querySelectorAll(".toggle-password").forEach(function(toggle) {
        toggle.addEventListener("click", function() {
            const password = toggle.parentElement.querySelector(".password-input");
            if (!password) return;
            if (password.type === "password") {
                password.type = "text";
                toggle.textContent = "visibility_off";
            } else {
                password.type = "password";
                toggle.textContent = "visibility";
            }
        });
    });

    // STAR RATING (create review)
    const starBtns = document.querySelectorAll('.star-btn');
    const ratingInput = document.getElementById('ratingInput');
    const ratingLabel = document.getElementById('ratingLabel');
    const ratingLabels = { 1: 'Buruk', 2: 'Kurang', 3: 'Cukup', 4: 'Bagus', 5: 'Sangat Bagus!' };

    if (starBtns.length && ratingInput) {
        const initialRating = parseInt(ratingInput.value);
        if (initialRating) highlightStars(initialRating);

        starBtns.forEach(btn => {
            btn.addEventListener('mouseenter', function () {
                highlightStars(parseInt(this.dataset.value));
            });
            btn.addEventListener('mouseleave', function () {
                const selected = parseInt(ratingInput.value);
                selected ? highlightStars(selected) : resetStars();
            });
            btn.addEventListener('click', function () {
                const val = parseInt(this.dataset.value);
                ratingInput.value = val;
                highlightStars(val);
                if (ratingLabel) {
                    ratingLabel.textContent = ratingLabels[val] || '';
                    ratingLabel.classList.add('text-[#FBB45E]');
                    ratingLabel.classList.remove('text-gray-400');
                }
            });
        });
    }

    function highlightStars(count) {
        document.querySelectorAll('.star-btn').forEach(btn => {
            const val = parseInt(btn.dataset.value);
            if (!btn.closest('#ratingCard')) {
                btn.style.color = val <= count ? '#FBB45E' : '#D1D5DB';
                btn.style.fontVariationSettings = val <= count ? "'FILL' 1" : "'FILL' 0";
            }
        });
    }
    function resetStars() {
        document.querySelectorAll('.star-btn').forEach(btn => {
            if (!btn.closest('#ratingCard')) {
                btn.style.color = '#D1D5DB';
                btn.style.fontVariationSettings = "'FILL' 0";
            }
        });
    }
});
</script>

    @stack('scripts')
</body>
</html>