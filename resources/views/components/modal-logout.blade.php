{{-- ====== MODAL KONFIRMASI LOGOUT ====== --}}
<div id="modal-logout"
     class=" fixed inset-0 z-999 hidden items-center justify-center bg-black/40 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl p-8 w-full max-w-xs mx-4 relative text-center">

        {{-- Tombol Tutup --}}
        <button onclick="tutupModalLogout()"
                class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition">
            <span class="material-symbols-outlined text-xl">close</span>
        </button>

        {{-- Icon --}}
        <div class="w-16 h-16 rounded-full bg-red-100 flex items-center justify-center mx-auto mb-4">
            <span class="material-symbols-outlined text-red-500 text-3xl"
                  style="font-variation-settings:'FILL' 0;">logout</span>
        </div>

        {{-- Teks --}}
        <h3 class="text-lg font-bold text-[#363B58] mb-2">Apakah Anda Yakin?</h3>
        <p class="text-sm text-gray-400 mb-6 leading-relaxed">
            Jika anda keluar dari akun, anda harus masuk<br>kembali untuk mengakses konten.
        </p>

        {{-- Tombol --}}
        <div class="flex gap-3">
            <button onclick="tutupModalLogout()"
                    class="flex-1 border border-[#E2E8F0] text-[#363B58] font-semibold text-sm py-2.5 rounded-xl hover:bg-[#F1F5F9] transition">
                Batalkan
            </button>
            <form action="{{ route('logout') }}" method="POST" class="flex-1">
                @csrf
                <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold text-sm py-2.5 rounded-xl transition">
                    Logout
                </button>
            </form>
        </div>
    </div>
</div>

<script>
function bukaModalLogout() {
    document.getElementById('modal-logout').classList.remove('hidden');
}
function tutupModalLogout() {
    document.getElementById('modal-logout').classList.add('hidden');
}
document.getElementById('modal-logout').addEventListener('click', function(e) {
    if (e.target === this) tutupModalLogout();
});
</script>