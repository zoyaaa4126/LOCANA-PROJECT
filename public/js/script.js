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

if (filterBtn && filterSidebar) {
    function openFilterSidebar() {
        filterSidebar.classList.remove('hidden');
        setTimeout(() => {
            if (filterOverlay) filterOverlay.classList.add('opacity-100');
            if (filterContent) filterContent.classList.remove('-translate-x-full');
        }, 10);
        document.body.style.overflow = 'hidden';
    }

    function closeFilterSidebar() {
        if (filterOverlay) filterOverlay.classList.remove('opacity-100');
        if (filterContent) filterContent.classList.add('-translate-x-full');
        setTimeout(() => {
            if (filterSidebar) filterSidebar.classList.add('hidden');
            document.body.style.overflow = '';
        }, 300);
    }

    filterBtn.addEventListener('click', openFilterSidebar);
    if (closeFilterBtn) closeFilterBtn.addEventListener('click', closeFilterSidebar);
    if (filterOverlay) filterOverlay.addEventListener('click', closeFilterSidebar);

    const resetFiltersBtn = document.getElementById('resetFilters');
    if (resetFiltersBtn) {
        resetFiltersBtn.addEventListener('click', () => {
            document.querySelectorAll('#filterSidebar input[type="checkbox"]').forEach(checkbox => {
                checkbox.checked = false;
            });
            document.querySelectorAll('#filterSidebar input[type="radio"]').forEach(radio => {
                radio.checked = false;
            });
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
        if (menuSidebar && !menuSidebar.classList.contains('hidden')) {
            closeMenuSidebar();
        }
        if (filterSidebar && filterSidebar.style && !filterSidebar.classList.contains('hidden')) {
            if (typeof closeFilterSidebar === 'function') closeFilterSidebar();
        }
    }
});

// CHATBOT
document.addEventListener("DOMContentLoaded", function () {
    const chatOutput       = document.getElementById('chatOutput');
    const mainMenu         = document.getElementById('mainMenu');
    const followUpMenu     = document.getElementById('followUpMenu');
    const greeting         = document.getElementById('greeting');
    const divider          = document.getElementById('divider');
    const ratingCard       = document.getElementById('ratingCard');
    const starButtons      = document.querySelectorAll('.star-btn');
    const ratingThanks     = document.getElementById('ratingThanks');

    let started      = false;
    let ratingDone   = false;

    // ── Render bubble bot ────────────────────────────────────────
    function appendBot(message) {
        const div = document.createElement('div');
        div.className = 'flex items-start gap-3';
        div.innerHTML = `
            <div class="bg-[#FBB45E] w-9 h-9 rounded-xl flex items-center justify-center shrink-0">
                <span class="material-symbols-outlined text-white text-xl" style="font-variation-settings:'FILL' 1;">smart_toy</span>
            </div>
            <div>
                <div class="text-sm font-semibold text-[#363B58] mb-1">Locana Assistant</div>
                <div class="bg-white px-4 py-3 rounded-2xl rounded-tl-none text-sm text-[#363B58] shadow-sm whitespace-pre-line max-w-xs">
                    ${message}
                </div>
            </div>
        `;
        chatOutput.appendChild(div);
    }

    // ── Render bubble user ───────────────────────────────────────
    function appendUser(label) {
        const div = document.createElement('div');
        div.className = 'w-full flex justify-end';
        div.innerHTML = `
            <div class="bg-[#FBB45E] text-white px-4 py-3 rounded-2xl rounded-tr-none text-sm shadow-sm max-w-xs">
                ${label}
            </div>
        `;
        chatOutput.appendChild(div);
    }

    // ── Tampilkan rating card ────────────────────────────────────
    function showRatingCard() {
        ratingCard.classList.remove('hidden');
        window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
    }

    // ── Render follow-up pill buttons ────────────────────────────
    function renderFollowUp(options, isEnd = false) {
        followUpMenu.innerHTML = '';
        mainMenu.classList.add('hidden');

        if (options.length === 0) {
            // Chat selesai — sembunyikan semua opsi, tampilkan rating
            followUpMenu.classList.add('hidden');
            divider.classList.add('hidden');
            showRatingCard();
            return;
        }

        options.forEach(opt => {
            const btn = document.createElement('button');
            btn.className = 'chat-option bg-white border border-slate-200 shadow-sm text-sm text-[#363B58] px-4 py-2 rounded-full hover:bg-[#FBB45E] hover:text-white hover:border-[#FBB45E] transition w-full text-left';
            btn.textContent = opt.label;
            btn.dataset.next = opt.next;
            followUpMenu.appendChild(btn);
        });

        followUpMenu.classList.remove('hidden');
        divider.classList.remove('hidden');
        attachListeners(followUpMenu.querySelectorAll('.chat-option'));
    }

    // ── Render menu utama sebagai pill buttons ───────────────────
    function renderMainMenuAsPills(options) {
        followUpMenu.innerHTML = '';
        mainMenu.classList.add('hidden');

        options.forEach(opt => {
            const btn = document.createElement('button');
            btn.className = 'chat-option bg-white border border-slate-200 shadow-sm text-sm text-[#363B58] px-4 py-2 rounded-full hover:bg-[#FBB45E] hover:text-white hover:border-[#FBB45E] transition w-full text-left';
            btn.textContent = opt.label;
            btn.dataset.next = opt.next;
            followUpMenu.appendChild(btn);
        });

        followUpMenu.classList.remove('hidden');
        divider.classList.remove('hidden');
        attachListeners(followUpMenu.querySelectorAll('.chat-option'));
    }

    // ── Fetch step dari server ───────────────────────────────────
    async function handleStep(next, label) {
        appendUser(label);

        mainMenu.classList.add('hidden');
        followUpMenu.classList.add('hidden');
        divider.classList.add('hidden');

        try {
            const res  = await fetch(`/chatbot/step/${next}`);
            const data = await res.json();

            appendBot(data.message);

            if (data.is_menu) {
                renderMainMenuAsPills(data.options);
            } else {
                renderFollowUp(data.options);
            }

            window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });

        } catch (err) {
            console.error(err);
        }
    }

    // ── Attach listeners ─────────────────────────────────────────
    function attachListeners(buttons) {
        buttons.forEach(btn => {
            btn.addEventListener('click', async () => {
                const next  = btn.dataset.next;
                const label = btn.textContent.trim();
                if (!next) return;

                if (!started) {
                    greeting.remove();
                    started = true;
                }

                await handleStep(next, label);
            });
        });
    }

    // ── Star rating ──────────────────────────────────────────────
    starButtons.forEach(btn => {
        // Hover: warnai bintang sampai yang di-hover
        btn.addEventListener('mouseenter', () => {
            if (ratingDone) return;
            const val = parseInt(btn.dataset.value);
            starButtons.forEach(b => {
                const star = b.querySelector('span');
                star.style.color = parseInt(b.dataset.value) <= val ? '#FBB45E' : '';
            });
        });

        // Mouse leave: reset ke nilai terpilih (atau kosong)
        btn.addEventListener('mouseleave', () => {
            if (ratingDone) return;
            resetStars(0);
        });

        // Klik: kunci pilihan
        btn.addEventListener('click', () => {
            if (ratingDone) return;
            ratingDone = true;
            const val = parseInt(btn.dataset.value);

            starButtons.forEach(b => {
                const star = b.querySelector('span');
                star.style.color = parseInt(b.dataset.value) <= val ? '#FBB45E' : '#cbd5e1';
                b.style.pointerEvents = 'none'; // nonaktifkan setelah klik
            });

            ratingThanks.classList.remove('hidden');
        });
    });

    function resetStars(selected) {
        starButtons.forEach(b => {
            const star = b.querySelector('span');
            star.style.color = parseInt(b.dataset.value) <= selected ? '#FBB45E' : '';
        });
    }

    // ── Init ──────────────────────────────────────────────────────
    attachListeners(mainMenu.querySelectorAll('.chat-option'));
});

document.querySelectorAll('.main-cards').forEach(cardSection => {

  let scrollContainer = cardSection.querySelector('.scrollContainer');
  let backBtn = cardSection.querySelector('.scrollLeft');
  let nextBtn = cardSection.querySelector('.scrollRight');

  function updateButtons() {
    if (scrollContainer.scrollLeft <= 0) {
      backBtn.style.opacity = "0";
      backBtn.style.pointerEvents = "none";
    } else {
      backBtn.style.opacity = "1";
      backBtn.style.pointerEvents = "auto";
    }

    if (scrollContainer.scrollLeft + scrollContainer.clientWidth >= scrollContainer.scrollWidth - 1) {
      nextBtn.style.opacity = "0";
      nextBtn.style.pointerEvents = "none";
    } else {
      nextBtn.style.opacity = "1";
      nextBtn.style.pointerEvents = "auto";
    }
  }

  nextBtn.addEventListener("click", () => {
    scrollContainer.scrollBy({ left: 900, behavior: "smooth" });
  });

  backBtn.addEventListener("click", () => {
    scrollContainer.scrollBy({ left: -900, behavior: "smooth" });
  });

  scrollContainer.addEventListener("scroll", updateButtons);

  updateButtons();
});

//ADMIN TAMBAH PENGGUNA
document.addEventListener('DOMContentLoaded', function () {

    /* ===== ROLE DROPDOWN ===== */
    const roleBtn   = document.getElementById('role-btn');
    const roleMenu  = document.getElementById('role-menu');
    const roleChev  = document.getElementById('role-chevron');
    const roleLabel = document.getElementById('role-label');
    const roleVal   = document.getElementById('role-value');

    roleBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        const open = roleMenu.style.display === 'block';
        roleMenu.style.display  = open ? 'none' : 'block';
        roleChev.style.transform = open ? 'rotate(0deg)' : 'rotate(180deg)';
    });

    document.querySelectorAll('.role-opt').forEach(function (opt) {
        opt.addEventListener('click', function (e) {
            e.stopPropagation();
            roleVal.value          = this.dataset.val;
            roleLabel.textContent  = this.dataset.label;
            roleLabel.style.color  = '#363B58';
            roleMenu.style.display = 'none';
            roleChev.style.transform = 'rotate(0deg)';
        });
    });

    document.addEventListener('click', function (e) {
        if (!document.getElementById('role-wrapper').contains(e.target)) {
            roleMenu.style.display   = 'none';
            roleChev.style.transform = 'rotate(0deg)';
        }
    });

    /* ===== TOGGLE PASSWORD ===== */
    const pwdInput  = document.getElementById('password-input');
    const toggleBtn = document.getElementById('toggle-password');
    const eyeIcon   = document.getElementById('eye-icon');

    toggleBtn.addEventListener('click', function () {
        const isHidden = pwdInput.type === 'password';
        pwdInput.type      = isHidden ? 'text' : 'password';
        eyeIcon.textContent = isHidden ? 'visibility' : 'visibility_off';
    });

    /* ===== PREVIEW FOTO PROFIL ===== */
    document.getElementById('foto-input').addEventListener('change', function () {
        const file = this.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function (e) {
            const preview     = document.getElementById('foto-preview');
            const placeholder = document.getElementById('foto-placeholder');
            preview.src           = e.target.result;
            preview.style.display = 'block';
            placeholder.style.display = 'none';
        };
        reader.readAsDataURL(file);
    });

});

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

//POP UP
function confirmHapus() {
    document.getElementById('modal-hapus').classList.remove('hidden');
}
function tutupModal() {
    document.getElementById('modal-hapus').classList.add('hidden');
}
// Tutup modal jika klik backdrop
document.getElementById('modal-hapus').addEventListener('click', function(e) {
    if (e.target === this) tutupModal();
});