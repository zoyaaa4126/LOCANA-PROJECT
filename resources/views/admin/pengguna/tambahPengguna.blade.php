@extends('layouts.admin')

@section('title', 'Tambah Pengguna')

@section('content')

<div class="m-5 pb-10">

    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
        <div>
            <p class="text-slate-400 text-sm font-semibold">
                Dashboard / Pengguna / <span class="text-[#FBB45E] font-bold">Tambah Pengguna</span>
            </p>
            <h1 class="text-2xl font-bold text-[#363B58]">Tambah Pengguna</h1>
        </div>
        <div class="flex gap-3">
            <a href="/pengguna" class="flex items-center gap-2 bg-white border border-[#E2E8F0] text-[#363B58] font-bold text-sm px-5 py-2.5 rounded-[10px] no-underline hover:bg-[#F1F5F9] active:bg-[#E2E8F0] transition-colors duration-200 select-none">
                Kembali
            </a>
            <button type="submit" form="form-tambah-pengguna" class="flex items-center gap-2 bg-[#FBB45E] text-[#363B58] font-bold text-sm px-5 py-2.5 rounded-[10px] border-none cursor-pointer hover:bg-[#E2A255] active:bg-[#FEE8CD] focus:outline-none focus:ring-2 focus:ring-[#FBB45E]/50 transition-colors duration-200 select-none">
                Simpan
            </button>
        </div>
    </div>

    <form id="form-tambah-pengguna" action="/tambah-pengguna" method="POST"
          class="grid grid-cols-1 lg:grid-cols-[1fr_380px] gap-5 items-start">

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-[#F1F5F9]">
            <h2 class="flex items-center gap-2 font-bold text-[#363B58] text-base mb-5">
                <span class="material-symbols-outlined text-[#FBB45E]"
                      style="font-size:22px; font-variation-settings:'FILL' 1;">info</span>
                Informasi Pengguna
            </h2>

            <div class="flex flex-col gap-1.5 mb-4">
                <label class="text-sm font-semibold text-[#363B58]">Nama</label>
                <input type="text" name="nama" placeholder="Masukkan Nama Disini"
                       class="border border-[#E2E8F0] rounded-xl px-4 py-3 text-sm outline-none
                              bg-[#FAFAFA] placeholder-gray-300
                              focus:border-[#FBB45E] focus:ring-2 focus:ring-[#FBB45E]/20
                              hover:border-[#FBB45E]/50
                              transition-all duration-200">
            </div>

            <div class="flex flex-col gap-1.5 mb-4">
                <label class="text-sm font-semibold text-[#363B58]">Username</label>
                <input type="text" name="username" placeholder="Masukkan Username Disini"
                       class="border border-[#E2E8F0] rounded-xl px-4 py-3 text-sm outline-none
                              bg-[#FAFAFA] placeholder-gray-300
                              focus:border-[#FBB45E] focus:ring-2 focus:ring-[#FBB45E]/20
                              hover:border-[#FBB45E]/50
                              transition-all duration-200">
            </div>

            <div class="flex flex-col gap-1.5 mb-4">
                <label class="text-sm font-semibold text-[#363B58]">Email</label>
                <input type="email" name="email" placeholder="contoh@email.com"
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

            <div class="flex flex-col gap-1.5 mb-4">
                <label class="text-sm font-semibold text-[#363B58]">Role</label>
                <div class="relative" id="role-wrapper">
                    <button type="button" id="role-btn" class="w-full flex justify-between items-center border border-[#E2E8F0] rounded-xl px-4 py-3 text-sm bg-[#FAFAFA] outline-none hover:border-[#FBB45E]/50 focus:border-[#FBB45E] focus:ring-2 focus:ring-[#FBB45E]/20 transition-all duration-200">
                        <span id="role-label" class="text-gray-300">Pilih Role</span>
                        <span class="material-symbols-outlined text-gray-400" id="role-chevron" style="font-size:20px; transition: transform .2s;">expand_more</span>
                    </button>
                    <div id="role-menu" style="display:none;" class="absolute top-full left-0 right-0 mt-1 bg-white border border-[#E2E8F0] rounded-xl shadow-lg z-50 overflow-hidden">
                        <button type="button" class="role-opt w-full flex items-center gap-3 px-4 py-3 text-sm text-[#363B58] font-medium hover:bg-[#FEF4E7] hover:text-[#FBB45E] active:bg-[#FEE8CD] transition-colors border-b border-[#F1F5F9]" data-val="user" data-label="User">
                            User
                        </button>
                        <button type="button" class="role-opt w-full flex items-center gap-3 px-4 py-3 text-sm text-[#363B58] font-medium hover:bg-[#FEF4E7] hover:text-[#FBB45E] active:bg-[#FEE8CD] transition-colors" data-val="admin" data-label="Admin">
                            <span class="material-symbols-outlined text-gray-400" style="font-size:18px; font-variation-settings:'FILL' 1;">admin_panel_settings</span>
                            Admin
                        </button>
                    </div>
                    <input type="hidden" name="role" id="role-value">
                </div>
            </div>

            <div class="flex flex-col gap-1.5">
                <label class="text-sm font-semibold text-[#363B58]">Deskripsi</label>
                <textarea name="deskripsi" rows="5" placeholder="Masukkan Deskripsi Tempat Disini&#10;(maks. 300 kata)" class="border border-[#E2E8F0] rounded-xl px-4 py-3 text-sm outline-none bg-[#FAFAFA] placeholder-gray-300 resize-none focus:border-[#FBB45E] focus:ring-2 focus:ring-[#FBB45E]/20 hover:border-[#FBB45E]/50 transition-all duration-200"></textarea>
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
                 class="border-2 border-dashed border-[#E2E8F0] rounded-xl p-8 flex flex-col items-center justify-center gap-3 cursor-pointer hover:border-[#FBB45E] hover:bg-[#FEF4E7]/30 active:bg-[#FEE8CD]/30 transition-all duration-200 group min-h-[220px]">

                <img id="foto-preview" src="" alt="Preview" style="display:none;" class="w-full h-48 object-cover rounded-xl">

                <div id="foto-placeholder" class="flex flex-col items-center gap-3">
                    <span class="material-symbols-outlined text-gray-300 group-hover:text-[#FBB45E] transition-colors" style="font-size:48px; font-variation-settings:'FILL' 1;">add_a_photo</span>
                    <div class="text-center">
                        <p class="text-sm text-gray-400 font-medium">Upload Foto</p>
                        <p class="text-xs text-gray-300">(maks. 5MB)</p>
                        <p class="text-xs text-gray-300">Format: PNG, JPG</p>
                    </div>
                </div>
            </div>

            <button type="button" onclick="document.getElementById('foto-input').click()"
                    class="mt-3 w-full flex items-center justify-center gap-2 border border-[#E2E8F0] rounded-xl py-2.5 text-xs font-semibold text-gray-500 hover:border-[#FBB45E] hover:text-[#FBB45E] hover:bg-[#FEF4E7]/30 active:bg-[#FEE8CD]/30 transition-all duration-200">
                <span class="material-symbols-outlined" style="font-size:16px;">upload</span>
                Unggah File
            </button>
            <input type="file" id="foto-input" name="foto_profil" accept="image/*" class="hidden">
        </div>

    </form>
</div>

@endsection