@extends('layouts.admin')

@section('title', 'Detail Pengguna')

@section('content')

<div class="m-5 pb-10">

    <form action="/detail-pengguna" method="POST">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
            <div>
                <p class="text-slate-400 text-sm font-semibold">
                    Dashboard / Pengguna / <span class="text-[#FBB45E] font-bold">Detail Pengguna</span>
                </p>
                <h1 class="text-2xl font-bold text-[#363B58]">Detail Pengguna</h1>
            </div>
            <a href="/pengguna"
            class="flex items-center gap-2 bg-white border border-[#E2E8F0] text-[#363B58] font-bold text-sm px-5 py-2.5 rounded-[10px] hover:bg-[#F1F5F9] transition-colors duration-200">
                <span class="material-symbols-outlined" style="font-size:18px;">arrow_back</span>
                Kembali
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-[1fr_380px] gap-5 items-start">

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-[#F1F5F9]">
                <h2 class="flex items-center gap-2 font-bold text-[#363B58] text-lg mb-5">
                    <span class="material-symbols-outlined text-[#FBB45E]" style="font-size:22px; font-variation-settings:'FILL' 1;">info</span>
                    Informasi Pengguna
                </h2>

                <div class="flex flex-col gap-1.5 mb-4">
                    <label class="text-sm font-semibold text-[#363B58]">Nama</label>
                    <div class="border border-[#E2E8F0] rounded-xl px-4 py-3 text-sm bg-[#FAFAFA] text-[#363B58]">
                        Nanami Kento
                    </div>
                </div>

                <div class="flex flex-col gap-1.5 mb-4">
                    <label class="text-sm font-semibold text-[#363B58]">Username</label>
                    <div class="border border-[#E2E8F0] rounded-xl px-4 py-3 text-sm bg-[#FAFAFA] text-[#363B58]">
                        nnmkentoo
                    </div>
                </div>

                <div class="flex flex-col gap-1.5 mb-4">
                    <label class="text-sm font-semibold text-[#363B58]">Email</label>
                    <div class="border border-[#E2E8F0] rounded-xl px-4 py-3 text-sm bg-[#FAFAFA] text-[#363B58]">
                        nanami@gmail.com
                    </div>
                </div>

                <div class="flex flex-col gap-1.5 mb-4">
                    <label class="text-sm font-semibold text-[#363B58]">Role</label>
                    <div class="border border-[#E2E8F0] rounded-xl px-4 py-3 text-sm bg-[#FAFAFA] text-[#363B58] flex justify-between items-center">
                        <span>User</span>
                        <span class="material-symbols-outlined text-gray-400" style="font-size:20px;">expand_more</span>
                    </div>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-sm font-semibold text-[#363B58]">Deskripsi</label>
                    <div class="border border-[#E2E8F0] rounded-xl px-4 py-3 text-sm bg-[#FAFAFA] text-[#363B58] min-h-[140px]">
                        Exploring new spots, from cozy coffee corners to lively hangout places.
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-5">

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-[#F1F5F9]">
                    <h2 class="flex items-center gap-2 font-bold text-[#363B58] text-lg mb-4">
                        <span class="material-symbols-outlined text-[#FBB45E]" style="font-size:22px; font-variation-settings:'FILL' 1;">image</span>
                        Media
                    </h2>

                    <label class="text-sm font-semibold text-[#363B58] mb-3 block">Foto Profil</label>
                    <div class="border-2 border-dashed border-[#E2E8F0] rounded-xl p-4 flex items-center justify-center bg-[#FAFAFA] min-h-[200px]">
                        <img src="assets/img/nanamin.jpg"
                            alt="Foto Profil"
                            class="w-40 h-40 object-cover rounded-xl shadow-sm">
                    </div>
                </div>

                <div class="bg-[#363B58] rounded-2xl p-6 shadow-sm">
                    <h2 class="flex items-center gap-2 font-bold text-white text-lg mb-5">
                        <span class="material-symbols-outlined text-[#FBB45E]" style="font-size:22px; font-variation-settings:'FILL' 1;">apps</span>
                        Aksi
                    </h2>

                    <div class="flex flex-col gap-3">
                        <a href="" class="w-full flex items-center justify-center gap-2 bg-white hover:bg-[#F1F5F9] text-[#363B58] font-bold text-sm px-5 py-3 rounded-xl transition-colors duration-200"><span class="material-symbols-outlined" style="font-size:18px;">edit</span>
                            Edit Pengguna
                        </a>

                        {{-- Hapus --}}
                        <button type="button" onclick="confirmHapus()" class="w-full flex items-center justify-center gap-2 bg-red-500 hover:bg-red-600 active:bg-red-700 text-white font-bold text-sm px-5 py-3 rounded-xl transition-colors duration-200">
                            <span class="material-symbols-outlined" style="font-size:18px;">delete</span>
                            Hapus Pengguna
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="modal-hapus" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm">
        <div class="bg-white rounded-2xl shadow-xl p-6 w-full max-w-sm mx-4">
            <div class="flex flex-col items-center text-center gap-3 mb-5">
                <div class="w-14 h-14 rounded-full bg-red-100 flex items-center justify-center">
                    <span class="material-symbols-outlined text-red-500" style="font-size:30px; font-variation-settings:'FILL' 1;">delete</span>
                </div>
                <h3 class="text-lg font-bold text-[#363B58]">Hapus Pengguna?</h3>
                <p class="text-sm text-gray-500">Tindakan ini tidak dapat dibatalkan. Data pengguna <span class="font-semibold text-[#363B58]">Nanami Kento</span> akan dihapus secara permanen.</p>
            </div>
            <div class="flex gap-3">
                <button onclick="tutupModal()"
                        class="flex-1 border border-[#E2E8F0] text-[#363B58] font-bold text-sm py-2.5 rounded-xl hover:bg-[#F1F5F9] transition-colors">
                    Batalkan
                </button>
                <form action="" method="POST" class="flex-1">
                    <!-- @csrf
                    @method('DELETE') -->
                    <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white font-bold text-sm py-2.5 rounded-xl transition-colors">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </form>
</div>

@endsection