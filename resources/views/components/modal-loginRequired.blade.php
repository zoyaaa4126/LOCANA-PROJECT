{{-- ====== MODAL LOGIN REQUIRED ====== --}}
<div id="modal-login-required"
     class="fixed inset-0 z-999 hidden items-center justify-center bg-black/40 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl p-8 w-full max-w-xs mx-4 relative text-center">

        {{-- Tombol Tutup --}}
        <button onclick="tutupModalLoginRequired()"
                class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition">
            <span class="material-symbols-outlined text-xl">close</span>
        </button>

        {{-- Icon --}}
        <div class="w-16 h-16 rounded-full bg-orange-100 flex items-center justify-center mx-auto mb-4">
            <span class="material-symbols-outlined text-[#FBB45E] text-3xl"
                  style="font-variation-settings:'FILL' 0;">lock</span>
        </div>

        {{-- Teks --}}
        <h3 class="text-lg font-bold text-[#363B58] mb-2">Login Diperlukan</h3>
        <p class="text-sm text-gray-400 mb-6 leading-relaxed">
            Kamu harus login terlebih dahulu<br>untuk mengirim review.
        </p>

        {{-- Tombol --}}
        <div class="flex gap-3">
            <button onclick="tutupModalLoginRequired()"
                    class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition">
                <span class="material-symbols-outlined text-xl">close</span>
            </button>
            <a href="/login"
               class="flex-1 bg-[#FBB45E] hover:bg-[#E2A255] text-[#363B58] font-semibold text-sm py-2.5 rounded-xl transition flex items-center justify-center">
                Login
            </a>
        </div>
    </div>
</div>

<script>
function bukaModalLoginRequired() {
    document.getElementById('modal-login-required').classList.remove('hidden');
    document.getElementById('modal-login-required').classList.add('flex');
}
function tutupModalLoginRequired() {
    document.getElementById('modal-login-required').classList.add('hidden');
    document.getElementById('modal-login-required').classList.remove('flex');
}
document.getElementById('modal-login-required').addEventListener('click', function(e) {
    if (e.target === this) tutupModalLoginRequired();
});
</script>