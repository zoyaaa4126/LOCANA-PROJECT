@extends('layouts.app')

@section('title', 'Kirim Review - ' . $place->nama_tempat)

@section('content')

<div class="min-h-screen bg-gray-50 pb-16">
    <div class="max-w-5xl mx-auto px-4 py-8">

        {{-- BREADCRUMB + HEADER --}}
        <div class="flex items-center gap-4 mb-8">
            <a href="{{ route('places.show', $place->id) }}"
               class="w-10 h-10 bg-[#FBB45E] rounded-xl flex items-center justify-center hover:bg-[#E2A255] transition">
                <span class="material-symbols-outlined text-[#363B58]">arrow_back</span>
            </a>
            <div>
                <p class="text-xs text-gray-400">
                    Detail Lokasi / <span class="text-[#FBB45E] font-semibold">Kirim Review</span>
                </p>
                <h1 class="text-2xl font-extrabold text-[#363B58]">Kirim Review</h1>
            </div>
        </div>

        {{-- ERROR MESSAGES --}}
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

        <form action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="place_id" value="{{ $place->id }}">

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
                        <div class="flex gap-2 justify-center" id="starContainer">
                            @for ($i = 1; $i <= 5; $i++)
                            <button type="button"
                                    data-value="{{ $i }}"
                                    class="star-btn material-symbols-outlined text-4xl text-gray-300 hover:text-[#FBB45E] transition cursor-pointer"
                                    style="font-variation-settings:'FILL' 0;">
                                star
                            </button>
                            @endfor
                        </div>
                        <input type="hidden" name="rating" id="ratingInput" value="{{ old('rating') }}" required>
                        <p class="text-center text-xs text-gray-400 mt-3" id="ratingLabel">Pilih rating</p>
                    </div>

                </div>

                {{-- KOLOM KANAN --}}
                <div class="flex flex-col gap-4">

                    {{-- JUDUL --}}
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                        <label class="block font-bold text-[#363B58] mb-3">
                            Judul <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               name="title"
                               value="{{ old('title') }}"
                               placeholder="Masukkan Judul Ulasan"
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#FBB45E] placeholder-gray-300"
                               required>
                    </div>

                    {{-- ULASAN --}}
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                        <label class="block font-bold text-[#363B58] mb-3">Ulasan</label>
                        <textarea name="comment"
                                  rows="4"
                                  placeholder="Masukkan Ulasan"
                                  class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#FBB45E] placeholder-gray-300 resize-none">{{ old('comment') }}</textarea>
                    </div>

                    {{-- UPLOAD FOTO --}}
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                        <p class="font-bold text-[#363B58] mb-1">Tambahkan Foto atau Video</p>
                        <p class="text-gray-400 text-xs mb-1">Unggah hingga 6 foto atau video (maks. 5MB per file)</p>
                        <p class="text-gray-400 text-xs mb-4">Format: JPG, PNG, MP4, MOV</p>

                        <label for="fileUpload"
                            class="inline-flex items-center gap-2 border border-gray-200 rounded-xl px-5 py-2.5 text-sm font-medium text-[#363B58] hover:bg-gray-50 cursor-pointer transition">
                            <span class="material-symbols-outlined text-sm">upload</span>
                            Unggah File
                        </label>
                        <input type="file" id="fileUpload" name="file_url[]"
                            accept=".jpg,.jpeg,.png,.mp4,.mov"
                            class="hidden" multiple onchange="previewFiles(this)">

                        {{-- Error --}}
                        <p id="fileError" class="text-red-500 text-xs mt-2 hidden"></p>

                        {{-- Preview grid --}}
                        <div id="filePreview" class="mt-3 flex flex-wrap gap-2"></div>
                    </div>

                </div>
            </div>

            {{-- SUBMIT --}}
            <div class="flex justify-end mt-6">
                <button type="submit"
                        class="bg-[#FBB45E] hover:bg-[#E2A255] text-[#363B58] font-bold px-8 py-3 rounded-xl transition text-sm">
                    Kirim Review
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
        if (ratingLabel) {
            ratingLabel.textContent = ratingLabels[val];
            ratingLabel.classList.add('text-[#FBB45E]');
            ratingLabel.classList.remove('text-gray-400');
        }
    });
});

let activeFiles = [];

function previewFiles(input) {
    const preview = document.getElementById('filePreview');
    const errorEl = document.getElementById('fileError');

    errorEl.classList.add('hidden');
    errorEl.textContent = '';

    const newFiles = Array.from(input.files);

    // Gabungkan file lama dengan yang baru, hindari duplikat nama
    newFiles.forEach(newFile => {
        const isDuplicate = activeFiles.some(f => f.name === newFile.name && f.size === newFile.size);
        if (!isDuplicate) {
            activeFiles.push(newFile);
        }
    });

    // Reset input value biar bisa pilih file yang sama lagi kalau perlu
    input.value = '';

    if (activeFiles.length > 6) {
        errorEl.textContent = 'Maksimal 6 file.';
        errorEl.classList.remove('hidden');
        activeFiles = activeFiles.slice(0, 6);
    }

    for (const file of activeFiles) {
        if (file.size > 5 * 1024 * 1024) {
            errorEl.textContent = `File "${file.name}" melebihi 5MB.`;
            errorEl.classList.remove('hidden');
            activeFiles = activeFiles.filter(f => f !== file);
        }
    }

    // Sync ke input file
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

@if($loginRequired)
<script>
    document.addEventListener('DOMContentLoaded', function() {
        bukaModalLoginRequired();
    });

    history.pushState(null, null, location.href);
    window.addEventListener('popstate', function() {
        window.location.href = '/';
    });
</script>
@endif
@endsection