// PROFILE DROPDOWN
const dropdownButton = document.getElementById("dropdownButton");
const dropdownMenu   = document.getElementById("dropdownMenu");
const arrowIcon      = document.getElementById("arrowIcon");

if (dropdownButton) {
    dropdownButton.addEventListener("click", function (e) {
        e.stopPropagation();

        dropdownMenu.classList.toggle("opacity-0");
        dropdownMenu.classList.toggle("scale-95");
        dropdownMenu.classList.toggle("pointer-events-none");

        arrowIcon.classList.toggle("rotate-180");
    });

    document.addEventListener("click", function (e) {
        if (!document.getElementById("profileDropdown").contains(e.target)) {
            dropdownMenu.classList.add("opacity-0", "scale-95", "pointer-events-none");
            arrowIcon.classList.remove("rotate-180");
        }
    });
}

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

const mobileToggle = document.getElementById("mobileFilterToggle");
const sidebar = document.getElementById("desktopSidebar");

const desktopToggle = document.getElementById("desktopFilterToggle");
const desktopSidebar = document.getElementById("desktopSidebar");

mobileToggle.addEventListener("click", () => {
    sidebar.classList.toggle("max-sm:hidden");
});

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