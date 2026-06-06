{{-- resources/views/components/modal-confirm.blade.php --}}
<div id="modal-confirm"
     class="fixed inset-0 z-[999] hidden items-center justify-center bg-black/40 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl p-8 w-full max-w-xs mx-4 relative text-center">

        <button onclick="tutupModalConfirm()"
                class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition">
            <span class="material-symbols-outlined text-xl">close</span>
        </button>

        <div class="w-16 h-16 rounded-full bg-red-100 flex items-center justify-center mx-auto mb-4">
            <span class="material-symbols-outlined text-red-500 text-3xl"
                  style="font-variation-settings:'FILL' 0;">delete</span>
        </div>

        <h3 class="text-lg font-bold text-[#363B58] mb-2">Apakah Anda Yakin?</h3>
        <p id="modal-confirm-desc" class="text-sm text-gray-400 mb-6 leading-relaxed">
            Anda akan menghapus data ini untuk semua orang
        </p>

        <div class="flex gap-3">
            <button onclick="tutupModalConfirm()"
                    class="flex-1 border border-[#E2E8F0] text-[#363B58] font-semibold text-sm py-2.5 rounded-xl hover:bg-[#F1F5F9] transition">
                Batalkan
            </button>
            <button id="modal-confirm-btn"
                    class="flex-1 bg-red-500 hover:bg-red-600 text-white font-semibold text-sm py-2.5 rounded-xl transition">
                Hapus
            </button>
        </div>
    </div>
</div>

<script>
function bukaModalConfirm(desc, onConfirm) {
    if (desc) document.getElementById('modal-confirm-desc').textContent = desc;

    const btn = document.getElementById('modal-confirm-btn');
    const newBtn = btn.cloneNode(true);
    btn.parentNode.replaceChild(newBtn, btn);
    newBtn.addEventListener('click', () => {
        onConfirm();
        tutupModalConfirm();
    });

    const modal = document.getElementById('modal-confirm');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function tutupModalConfirm() {
    const modal = document.getElementById('modal-confirm');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

document.getElementById('modal-confirm').addEventListener('click', function(e) {
    if (e.target === this) tutupModalConfirm();
});
</script>