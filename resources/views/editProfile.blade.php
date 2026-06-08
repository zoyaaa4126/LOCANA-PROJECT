@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')

<div class="m-5 pb-10">

    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
        <div>
            <p class="text-slate-400 text-sm font-semibold">
                Profil/ <span class="text-[#FBB45E] font-bold">Edit Profil</span>
            </p>
            <h1 class="text-2xl font-bold text-[#363B58]">Edit Profil</h1>
        </div>
        <div class="flex gap-3">
            <a href="/profile" class="flex items-center gap-2 bg-white border border-[#E2E8F0] text-[#363B58] font-bold text-sm px-5 py-2.5 rounded-[10px] no-underline hover:bg-[#F1F5F9] active:bg-[#E2E8F0] transition-colors duration-200 select-none">
                Kembali
            </a>
            <button type="submit" form="form-edit-profile" class="flex items-center gap-2 bg-[#FBB45E] text-[#363B58] font-bold text-sm px-5 py-2.5 rounded-[10px] border-none cursor-pointer hover:bg-[#E2A255] active:bg-[#FEE8CD] focus:outline-none focus:ring-2 focus:ring-[#FBB45E]/50 transition-colors duration-200 select-none">
                Simpan
            </button>
        </div>
    </div>

    <form id="form-edit-profile" action="/edit-profile" method="POST" enctype="multipart/form-data"
          class="grid grid-cols-1 lg:grid-cols-[1fr_380px] gap-5 items-start">
          @csrf

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-[#F1F5F9]">
            <h2 class="flex items-center gap-2 font-bold text-[#363B58] text-base mb-5">
                <span class="material-symbols-outlined text-[#FBB45E]"
                      style="font-size:22px; font-variation-settings:'FILL' 1;">info</span>
                Informasi Pengguna
            </h2>

            <div class="flex flex-col gap-1.5 mb-4">
                <label class="text-sm font-semibold text-[#363B58]">Nama</label>
                <input type="text" name="nama" placeholder="Masukkan Nama Disini" value="{{ $user->nama }}"
                       class="border border-[#E2E8F0] rounded-xl px-4 py-3 text-sm outline-none
                              bg-[#FAFAFA] placeholder-gray-300
                              focus:border-[#FBB45E] focus:ring-2 focus:ring-[#FBB45E]/20
                              hover:border-[#FBB45E]/50
                              transition-all duration-200">
            </div>

            <div class="flex flex-col gap-1.5 mb-4">
                <label class="text-sm font-semibold text-[#363B58]">Username</label>
                <input type="text" name="username" placeholder="Masukkan Username Disini" value="{{ $user->username }}"
                       class="border border-[#E2E8F0] rounded-xl px-4 py-3 text-sm outline-none
                              bg-[#FAFAFA] placeholder-gray-300
                              focus:border-[#FBB45E] focus:ring-2 focus:ring-[#FBB45E]/20
                              hover:border-[#FBB45E]/50
                              transition-all duration-200">
            </div>

            <div class="flex flex-col gap-1.5 mb-4">
                <label class="text-sm font-semibold text-[#363B58]">Email</label>
                <input type="email" name="email" placeholder="contoh@email.com" value="{{ $user->email }}"
                       class="border border-[#E2E8F0] rounded-xl px-4 py-3 text-sm outline-none
                              bg-[#FAFAFA] placeholder-gray-300
                              focus:border-[#FBB45E] focus:ring-2 focus:ring-[#FBB45E]/20
                              hover:border-[#FBB45E]/50
                              transition-all duration-200">
            </div>

            <div class="flex flex-col gap-1.5 mb-4">
                <label class="text-sm font-semibold text-[#363B58]">Password</label>
                <div class="relative">
                    <input type="password" id="password-input" name="password" placeholder="••••••••"
                           class="w-full border border-[#E2E8F0] rounded-xl px-4 py-3 pr-12 text-sm outline-none bg-[#FAFAFA] placeholder-gray-300 focus:border-[#FBB45E] focus:ring-2 focus:ring-[#FBB45E]/20 hover:border-[#FBB45E]/50 transition-all duration-200">
                    <button type="button" id="toggle-password" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-[#363B58] active:text-[#FBB45E] transition-colors">
                        <span class="material-symbols-outlined" style="font-size:20px;" id="eye-icon">visibility_off</span>
                    </button>
                </div>
            </div>

            <div class="flex flex-col gap-1.5">
                <label class="text-sm font-semibold text-[#363B58]">Deskripsi</label>
                <textarea name="deskripsi" rows="5" placeholder="Masukkan Deskripsi Tempat Disini&#10;(maks. 300 kata)" 
                          class="border border-[#E2E8F0] rounded-xl px-4 py-3 text-sm outline-none bg-[#FAFAFA] placeholder-gray-300 resize-none focus:border-[#FBB45E] focus:ring-2 focus:ring-[#FBB45E]/20 hover:border-[#FBB45E]/50 transition-all duration-200" >{{ $user->deskripsi }}</textarea>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-[#F1F5F9]">
            <h2 class="flex items-center gap-2 font-bold text-[#363B58] text-base mb-5">
                <span class="material-symbols-outlined text-[#FBB45E]" style="font-size:22px; font-variation-settings:'FILL' 1;">image</span>
                Media
            </h2>

            <label class="text-sm font-semibold text-[#363B58] mb-2 block">Foto Profil</label>

            <div id="foto-drop"
                onclick="document.getElementById('foto-input').click()"
                class="w-full border-2 border-dashed border-gray-200 rounded-xl py-6 flex flex-col items-center justify-center gap-2 cursor-pointer
                        hover:border-[#FBB45E] hover:bg-[#FEF4E7]/40 active:bg-[#FEE8CD]/30
                        transition-all duration-200 group">

                {{-- Preview foto lama atau baru --}}
                @if($user->fotoProfile)
                    <div id="foto-preview" class="mb-1">
                        <img id="foto-img" src="{{ asset('storage/' . $user->fotoProfile) }}" alt="Preview"
                            class="w-20 h-20 object-cover rounded-full border-4 border-[#FBB45E]/40 shadow-md">
                    </div>
                @else
                    <div id="foto-preview" class="hidden mb-1">
                        <img id="foto-img" src="" alt="Preview"
                            class="w-20 h-20 object-cover rounded-full border-4 border-[#FBB45E]/40 shadow-md">
                    </div>
                @endif

                <div id="foto-placeholder" class="{{ $user->fotoProfile ? 'hidden' : 'flex' }} flex-col items-center gap-2">
                    <span class="material-symbols-outlined text-gray-300 group-hover:text-[#FBB45E] transition-colors"
                        style="font-size:36px; font-variation-settings:'FILL' 1;">add_a_photo</span>
                    <div class="text-center">
                        <p class="text-xs text-gray-400 font-medium">Upload Foto</p>
                        <p class="text-xs text-gray-300">(maks. 5MB) Format: PNG, JPG</p>
                    </div>
                </div>
            </div>

            <button type="button" onclick="document.getElementById('foto-input').click()"
                    class="mt-3 w-full flex items-center justify-center gap-2 border border-[#E2E8F0] rounded-xl py-2.5 text-xs font-semibold text-gray-500 hover:border-[#FBB45E] hover:text-[#FBB45E] hover:bg-[#FEF4E7]/30 active:bg-[#FEE8CD]/30 transition-all duration-200">
                <span class="material-symbols-outlined" style="font-size:16px;">upload</span>
                Unggah File
            </button>
            <input type="file" id="foto-input" name="foto_profil" accept="image/*" class="hidden" onchange="previewFotoProfil(this)">
        </div>

    </form>
</div>

@push('scripts')
<script>
function previewFotoProfil(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('foto-img').src = e.target.result;
            document.getElementById('foto-preview').classList.remove('hidden');
            document.getElementById('foto-placeholder').classList.add('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush

@endsection