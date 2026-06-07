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

// ESC UNTUK TUTUP SIDEBAR
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        if (menuSidebar && !menuSidebar.classList.contains('hidden')) closeMenuSidebar();
        if (filterSidebar && !filterSidebar.classList.contains('hidden')) closeFilterSidebar();
    }
});

// WISHLIST
const btnWishlist = document.getElementById('btnWishlist');

if (btnWishlist) {
    if (btnWishlist.dataset.saved === 'true') setSaved(btnWishlist);

    btnWishlist.addEventListener('click', () => {
        const placeId = btnWishlist.dataset.placeId;
        fetch('/wishlist/toggle', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ place_id: placeId })
        })
        .then(res => {
            if (res.status === 401) { window.location.href = '/login'; return; }
            return res.json();
        })
        .then(data => {
            if (!data) return;
            if (data.status === 'added') setSaved(btnWishlist);
            else setUnsaved(btnWishlist);
        });
    });
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

// POP UP
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

// MOBILE MENU
const menuBtn = document.getElementById('menuBtn');
const closeBtn = document.getElementById('closeBtn');
const mobileSidebar = document.getElementById('mobileSidebar');
const overlay = document.getElementById('overlay');

if (menuBtn && closeBtn && mobileSidebar && overlay) {
    menuBtn.onclick = () => {
        mobileSidebar.classList.remove('translate-x-full');
        overlay.classList.remove('hidden');
    };
    closeBtn.onclick = overlay.onclick = () => {
        mobileSidebar.classList.add('translate-x-full');
        overlay.classList.add('hidden');
    };
}

// MOBILE FILTER
const mobileToggle = document.getElementById("mobileFilterToggle");
const mobileFilterSidebar = document.getElementById("desktopSidebar");
if (mobileToggle && mobileFilterSidebar) {
    mobileToggle.addEventListener("click", () => {
        mobileFilterSidebar.classList.toggle("max-sm:hidden");
    });
}

// DESKTOP FILTER
const desktopToggle = document.getElementById("desktopFilterToggle");
const desktopSidebar = document.getElementById("desktopSidebar");
if (desktopToggle && desktopSidebar) {
    desktopToggle.addEventListener("click", () => {
        desktopSidebar.classList.toggle("w-80");
        desktopSidebar.classList.toggle("w-0");
        desktopSidebar.classList.toggle("p-6");
        desktopSidebar.classList.toggle("overflow-hidden");
        if (desktopSidebar.classList.contains("w-0")) {
            desktopSidebar.classList.add("opacity-0");
        } else {
            desktopSidebar.classList.remove("opacity-0");
        }
        desktopToggle.classList.toggle("bg-gray-100");
    });
}

document.addEventListener("DOMContentLoaded", function () {

    // TOGGLE PASSWORD
    const toggles = document.querySelectorAll(".toggle-password");
    if (toggles.length) {
        toggles.forEach(function(toggle) {
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
    }

    // REVIEW PAGE - SORT DROPDOWN
    const sortSelect = document.getElementById('sortSelect');
    if (sortSelect) {
        sortSelect.addEventListener('change', function () {
            console.log('Sort by:', this.value);
        });
    }

    // CREATE REVIEW - STAR RATING
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

    // ADMIN TAMBAH PENGGUNA
    const roleBtn = document.getElementById('role-btn');
    const roleMenu = document.getElementById('role-menu');
    const roleChev = document.getElementById('role-chevron');
    const roleLabel = document.getElementById('role-label');
    const roleVal = document.getElementById('role-value');

    if (roleBtn && roleMenu) {
        roleBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            const open = roleMenu.style.display === 'block';
            roleMenu.style.display = open ? 'none' : 'block';
            if (roleChev) roleChev.style.transform = open ? 'rotate(0deg)' : 'rotate(180deg)';
        });

        document.querySelectorAll('.role-opt').forEach(function(opt) {
            opt.addEventListener('click', function(e) {
                e.stopPropagation();
                if (roleVal) roleVal.value = this.dataset.val;
                if (roleLabel) { roleLabel.textContent = this.dataset.label; roleLabel.style.color = '#363B58'; }
                roleMenu.style.display = 'none';
                if (roleChev) roleChev.style.transform = 'rotate(0deg)';
            });
        });

        document.addEventListener('click', function(e) {
            const roleWrapper = document.getElementById('role-wrapper');
            if (roleWrapper && !roleWrapper.contains(e.target)) {
                roleMenu.style.display = 'none';
                if (roleChev) roleChev.style.transform = 'rotate(0deg)';
            }
        });
    }

    // PREVIEW FOTO PROFIL
    const fotoInput = document.getElementById('foto-input');
    if (fotoInput) {
        fotoInput.addEventListener('change', function() {
            const file = this.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('foto-preview');
                const placeholder = document.getElementById('foto-placeholder');
                if (preview) { preview.src = e.target.result; preview.style.display = 'block'; }
                if (placeholder) placeholder.style.display = 'none';
            };
            reader.readAsDataURL(file);
        });
    }

    // CHATBOT
    const chatOutput = document.getElementById('chatOutput');
    if (chatOutput) {
        const mainMenu     = document.getElementById('mainMenu');
        const followUpMenu = document.getElementById('followUpMenu');
        const divider      = document.getElementById('divider');
        const ratingCard   = document.getElementById('ratingCard');
        const ratingThanks = document.getElementById('ratingThanks');
        const flow         = window.chatbotFlow || {};

        function addUserMessage(text) {
            const el = document.createElement('div');
            el.className = 'flex justify-end';
            el.innerHTML = `<div class="bg-[#FBB45E] text-white px-4 py-3 rounded-2xl rounded-tr-none text-sm max-w-xs shadow-sm">${text}</div>`;
            chatOutput.appendChild(el);
            el.scrollIntoView({ behavior: 'smooth' });
        }

        function addBotMessage(text) {
            const el = document.createElement('div');
            el.className = 'flex items-start gap-3';
            el.innerHTML = `
                <div class="bg-[#FBB45E] w-9 h-9 rounded-xl flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-white text-xl" style="font-variation-settings:'FILL' 1;">smart_toy</span>
                </div>
                <div>
                    <div class="text-sm font-semibold text-[#363B58] mb-1">Locana Assistant</div>
                    <div class="bg-white px-4 py-3 rounded-2xl rounded-tl-none text-sm text-[#363B58] shadow-sm whitespace-pre-line">${text}</div>
                </div>`;
            chatOutput.appendChild(el);
            el.scrollIntoView({ behavior: 'smooth' });
        }

        function renderOptions(options) {
            followUpMenu.innerHTML = '';
            mainMenu.classList.add('hidden');

            if (!options || options.length === 0) {
                divider.classList.add('hidden');
                followUpMenu.classList.add('hidden');
                if (ratingCard) ratingCard.classList.remove('hidden');
                return;
            }

            options.forEach(opt => {
                const btn = document.createElement('button');
                btn.className = 'chat-option bg-white border border-slate-200 shadow-sm text-sm text-[#363B58] px-4 py-2 rounded-full hover:bg-[#FBB45E] hover:text-white hover:border-[#FBB45E] transition w-full text-left';
                btn.textContent = opt.label;
                btn.addEventListener('click', function() {
                    addUserMessage(opt.label);
                    followUpMenu.innerHTML = '';

                    if (opt.next === '__menu__') {
                        mainMenu.classList.remove('hidden');
                        followUpMenu.classList.add('hidden');
                        return;
                    }

                    const step = flow[opt.next];
                    if (!step) return;

                    setTimeout(() => {
                        addBotMessage(step.message);
                        renderOptions(step.options);
                    }, 300);
                });
                followUpMenu.appendChild(btn);
            });

            followUpMenu.classList.remove('hidden');
            divider.classList.remove('hidden');
        }

        document.querySelectorAll('.chat-option').forEach(card => {
            card.addEventListener('click', function() {
                const key = this.dataset.next;
                const label = this.querySelector('.text-sm.font-bold').textContent.trim();

                addUserMessage(label);
                mainMenu.classList.add('hidden');

                const step = flow[key];
                if (!step) return;

                setTimeout(() => {
                    addBotMessage(step.message);
                    renderOptions(step.options);
                }, 300);
            });
        });

        if (ratingCard) {
            ratingCard.querySelectorAll('.star-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const val = parseInt(this.dataset.value);
                    ratingCard.querySelectorAll('.star-btn').forEach(b => {
                        b.querySelector('.material-symbols-outlined').style.color =
                            parseInt(b.dataset.value) <= val ? '#FBB45E' : '#D1D5DB';
                    });
                    if (ratingThanks) ratingThanks.classList.remove('hidden');
                    ratingCard.querySelectorAll('.star-btn').forEach(b => b.disabled = true);
                });
            });
        }
    }

});