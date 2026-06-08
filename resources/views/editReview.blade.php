@extends('layouts.app')
@section('title', 'Edit Ulasan - ' . $place->nama_tempat)
@section('content')

<div class="min-h-screen bg-gray-50 pb-16">
    <div class="max-w-5xl mx-auto px-4 py-8">

        <div class="flex items-center gap-4 mb-8">
            <a href="{{ route('profile') }}"
               class="w-10 h-10 bg-[#FBB45E] rounded-xl flex items-center justify-center hover:bg-[#E2A255] transition">
                <span class="material-symbols-outlined text-[#363B58]">arrow_back</span>
            </a>
            <div>
                <p class="text-xs text-gray-400">Profil / <span class="text-[#FBB45E] font-semibold">Edit Ulasan</span></p>
                <h1 class="text-2xl font-extrabold text-[#363B58]">Edit Ulasan</h1>
            </div>
        </div>

        @if($errors->any())
        <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6">
            <ul class="text-red-500 text-sm space-y-1">
                @foreach($errors->all() as $error)
                <li class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">error</span> {{ $error }}
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Sisa waktu edit --}}
        @php
            $sisaMenit = (24 * 60) - $review->created_at->diffInMinutes(now());
            $sisaJamBulat = floor($sisaMenit / 60);
            $sisaMinutSisa = $sisaMenit % 60;
        @endphp
        <div class="bg-orange-50 border border-orange-200 rounded-xl p-3 mb-6 flex items-center gap-2 text-sm text-orange-600">
            <span class="material-symbols-outlined text-base">schedule</span>
            Ulasan dapat diedit selama
            <strong class="ml-1">{{ $sisaJamBulat }} jam {{ $sisaMinutSisa }} menit lagi</strong>.
        </div>

        <form action="{{ route('reviews.update', $review->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Track foto lama yang dihapus --}}
            <div id="deletedFilesContainer"></div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- KOLOM KIRI --}}
                <div class="flex flex-col gap-4">

                    {{-- PLACE CARD --}}
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-4 flex gap-4 items-start">
                        <img src="{{ $place->gambar_tempat ? asset($place->gambar_tempat) : asset('assets/img/180 Cafe - Bandung 1.png') }}"
                            class="w-24 h-24 rounded-xl object-cover shrink-0" alt="{{ $place->nama_tempat }}">
                        <div>
                            <h2 class="font-bold text-lg text-[#363B58]">{{ $place->nama_tempat }}</h2>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="material-symbols-outlined text-[#FBB45E] text-sm" style="font-variation-settings:'FILL' 1;">star</span>
                                <span class="text-sm font-medium">{{ number_format($place->reviews->avg('rating') ?? 0, 1) }}</span>
                                <span class="text-gray-400 text-xs">({{ $place->reviews->count() }})</span>
                            </div>
                            <span class="inline-block bg-orange-100 text-[#FBB45E] text-xs font-semibold px-3 py-0.5 rounded-full mt-2">
                                {{ $place->kategori->nama ?? 'Kategori' }}
                            </span>
                            <p class="text-gray-400 text-xs mt-2 leading-relaxed">{{ $place->alamat_lengkap }}</p>
                        </div>
                    </div>

                    {{-- RATING --}}
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                        <p class="font-bold text-[#363B58] mb-4">
                            Rating Lokasi <span class="text-red-500">*</span>
                        </p>
                        <div class="flex gap-2 justify-center">
                            @for ($i = 1; $i <= 5; $i++)
                            <button type="button" data-value="{{ $i }}"
                                    class="star-btn material-symbols-outlined text-4xl transition cursor-pointer"
                                    style="color: {{ $i <= $review->rating ? '#FBB45E' : '#D1D5DB' }};
                                           font-variation-settings: '{{ $i <= $review->rating ? 'FILL' : '' }}' {{ $i <= $review->rating ? '1' : '0' }}">
                                star
                            </button>
                            @endfor
                        </div>
                        <input type="hidden" name="rating" id="ratingInput" value="{{ old('rating', $review->rating) }}">
                        <p class="text-center text-xs mt-3" id="ratingLabel"
                           style="color: #FBB45E">
                            {{ ['','Buruk','Kurang','Cukup','Bagus','Sangat Bagus!'][$review->rating] }}
                        </p>
                    </div>

                </div>

                {{-- KOLOM KANAN --}}
                <div class="flex flex-col gap-4">

                    {{-- JUDUL --}}
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                        <label class="block font-bold text-[#363B58] mb-3">
                            Judul <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="title" value="{{ old('title', $review->title) }}"
                               placeholder="Masukkan Judul Ulasan"
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#FBB45E] placeholder-gray-300"
                               required>
                    </div>

                    {{-- ULASAN --}}
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                        <label class="block font-bold text-[#363B58] mb-3">Ulasan</label>
                        <textarea name="comment" rows="4"
                                  placeholder="Masukkan Ulasan"
                                  class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#FBB45E] placeholder-gray-300 resize-none">{{ old('comment', $review->comment) }}</textarea>
                    </div>

                    {{-- FOTO & VIDEO --}}
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                        <p class="font-bold text-[#363B58] mb-1">Foto atau Video</p>
                        <p class="text-gray-400 text-xs mb-1">Unggah hingga 6 foto atau video (maks. 5MB per file)</p>
                        <p class="text-gray-400 text-xs mb-4">Format: JPG, PNG, MP4, MOV</p>

                        <label for="fileUpload"
                            class="inline-flex items-center gap-2 border border-gray-200 rounded-xl px-5 py-2.5 text-sm font-medium text-[#363B58] hover:bg-gray-50 cursor-pointer transition">
                            <span class="material-symbols-outlined text-sm">upload</span>
                            Unggah File
                        </label>
                        <input type="file" id="fileUpload" name="new_files[]"
                            accept=".jpg,.jpeg,.png,.mp4,.mov"
                            class="hidden" multiple onchange="previewNewFiles(this)">

                        <p id="fileError" class="text-red-500 text-xs mt-2 hidden"></p>

                        {{-- Preview foto LAMA --}}
                        <div class="mt-3 flex flex-row flex-wrap gap-2" id="allPreview">
                            @if($review->file_url)
                                @foreach(json_decode($review->file_url) as $file)
                                @php $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION)); @endphp
                                <div class="relative w-24 h-24 shrink-0" id="existing-{{ $loop->index }}">
                                    @if(in_array($ext, ['mp4', 'webm', 'mov', 'ogg']))
                                    <div class="w-24 h-24 rounded-xl bg-gray-100 flex flex-col items-center justify-center gap-1">
                                        <span class="material-symbols-outlined text-gray-400 text-2xl">videocam</span>
                                        <span class="text-[9px] text-gray-400 text-center px-1 line-clamp-2">{{ basename($file) }}</span>
                                    </div>
                                    @else
                                    <img src="{{ asset('storage/' . $file) }}" class="w-24 h-24 rounded-xl object-cover">
                                    @endif
                                    <span class="absolute bottom-1 right-1 bg-black/50 text-white text-[9px] px-1 rounded">{{ strtoupper($ext) }}</span>
                                    <button type="button"
                                            onclick="hapusFotoLama('{{ $file }}', 'existing-{{ $loop->index }}')"
                                            class="absolute top-1 left-1 z-10 bg-black/60 text-white rounded-full w-5 h-5 flex items-center justify-center hover:bg-red-500 transition">
                                        <span class="material-symbols-outlined" style="font-size:12px">close</span>
                                    </button>
                                </div>
                                @endforeach
                            @endif
                            <div id="newFilePreview" class="flex flex-row flex-wrap gap-2"></div>
                        </div>

                        {{-- Preview foto BARU --}}
                        <div id="newFilePreview" class="mt-2 flex flex-wrap gap-2"></div>
                    </div>

                </div>
            </div>

            <div class="flex justify-end gap-3 mt-6">
                <a href="{{ route('profile') }}"
                   class="border border-gray-200 text-gray-500 px-6 py-3 rounded-xl text-sm font-medium hover:bg-gray-50 transition">
                    Batal
                </a>
                <button type="submit"
                        class="bg-[#FBB45E] hover:bg-[#E2A255] text-[#363B58] font-bold px-8 py-3 rounded-xl transition text-sm">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// STAR RATING
const starBtns = document.querySelectorAll('.star-btn');
const ratingInput = document.getElementById('ratingInput');
const ratingLabel = document.getElementById('ratingLabel');
const ratingLabels = { 1:'Buruk', 2:'Kurang', 3:'Cukup', 4:'Bagus', 5:'Sangat Bagus!' };

function highlightStars(count) {
    starBtns.forEach(btn => {
        const val = parseInt(btn.dataset.value);
        btn.style.color = val <= count ? '#FBB45E' : '#D1D5DB';
        btn.style.fontVariationSettings = val <= count ? "'FILL' 1" : "'FILL' 0";
    });
}

starBtns.forEach(btn => {
    btn.addEventListener('mouseenter', () => highlightStars(parseInt(btn.dataset.value)));
    btn.addEventListener('mouseleave', () => highlightStars(parseInt(ratingInput.value) || 0));
    btn.addEventListener('click', () => {
        const val = parseInt(btn.dataset.value);
        ratingInput.value = val;
        highlightStars(val);
        ratingLabel.textContent = ratingLabels[val];
        ratingLabel.style.color = '#FBB45E';
    });
});

// HAPUS FOTO LAMA — tambahkan hidden input agar controller tahu file mana yang dihapus
function hapusFotoLama(filePath, wrapperId) {
    document.getElementById(wrapperId).remove();

    const input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'deleted_files[]';
    input.value = filePath;
    document.getElementById('deletedFilesContainer').appendChild(input);
}

// UPLOAD FILE BARU
let activeFiles = [];

function previewNewFiles(input) {
    const preview = document.getElementById('newFilePreview');
    const errorEl = document.getElementById('fileError');

    errorEl.classList.add('hidden');
    errorEl.textContent = '';

    Array.from(input.files).forEach(newFile => {
        const isDuplicate = activeFiles.some(f => f.name === newFile.name && f.size === newFile.size);
        if (!isDuplicate) activeFiles.push(newFile);
    });

    input.value = '';

    if (activeFiles.length > 6) {
        errorEl.textContent = 'Maksimal 6 file.';
        errorEl.classList.remove('hidden');
        activeFiles = activeFiles.slice(0, 6);
    }

    activeFiles = activeFiles.filter(file => {
        if (file.size > 5 * 1024 * 1024) {
            errorEl.textContent = `File "${file.name}" melebihi 5MB.`;
            errorEl.classList.remove('hidden');
            return false;
        }
        return true;
    });

    function syncInput() {
        const dt = new DataTransfer();
        activeFiles.forEach(f => dt.items.add(f));
        input.files = dt.files;
    }

    function renderPreviews() {
        preview.innerHTML = '';
        activeFiles.forEach((file, index) => {
            const wrapper = document.createElement('div');
            wrapper.className = 'relative w-24 h-24';

            const removeBtn = document.createElement('button');
            removeBtn.type = 'button';
            removeBtn.className = 'absolute top-1 left-1 z-10 bg-black/60 text-white rounded-full w-5 h-5 flex items-center justify-center hover:bg-red-500 transition';
            removeBtn.innerHTML = '<span class="material-symbols-outlined" style="font-size:12px">close</span>';
            removeBtn.addEventListener('click', () => {
                activeFiles.splice(index, 1);
                syncInput();
                renderPreviews();
            });

            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = e => {
                    wrapper.innerHTML = `
                        <img src="${e.target.result}" class="w-24 h-24 rounded-xl object-cover">
                        <span class="absolute bottom-1 right-1 bg-black/50 text-white text-[9px] px-1 rounded">${file.name.split('.').pop().toUpperCase()}</span>
                    `;
                    wrapper.appendChild(removeBtn);
                };
                reader.readAsDataURL(file);
            } else {
                wrapper.innerHTML = `
                    <div class="w-24 h-24 rounded-xl bg-gray-100 flex flex-col items-center justify-center gap-1">
                        <span class="material-symbols-outlined text-gray-400 text-2xl">videocam</span>
                        <span class="text-[9px] text-gray-400 text-center px-1 line-clamp-2">${file.name}</span>
                    </div>
                `;
                wrapper.appendChild(removeBtn);
            }

            preview.appendChild(wrapper);
        });
    }

    syncInput();
    renderPreviews();
}
</script>

@endsection