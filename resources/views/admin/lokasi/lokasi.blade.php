@extends('layouts.admin')

@section('title', 'Lokasi')

@section('content')

<div class="m-5">
    <form action="/lokasi" method="POST">
        @csrf
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-5">
            <div>
                <p class="text-slate-300 text-sm font-semibold">Dashboard / <span class="text-[#FBB45E] font-bold">Lokasi</span></p>
                <h1 class="text-2xl font-bold text-[#363B58]">Halo Admin <span class="text-yellow-400">{{ $user->nama }}</span></h1>
            </div>
            <a href="/tambah-lokasi" class="flex gap-2 bg-[#FBB45E] text-[#363B58] font-bold text-md px-4 py-2 rounded-[10px] border-none cursor-pointer whitespace-nowrap hover:bg-[#E2A255] active:bg-[#FEE8CD] transition-colors duration-200">
                <span class="material-symbols-outlined">add</span>Tambah Lokasi
            </a>
        </div>
        
        <div class="w-full bg-white rounded-2xl p-6 shadow-sm overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr>
                        <th class="text-left text-xs text-gray-400 font-bold tracking-widest px-4 pb-4">#</th>
                        <th class="text-left text-xs text-gray-400 font-bold tracking-widest px-4 pb-4">NAMA LOKASI</th>
                        <th class="text-left text-xs text-gray-400 font-bold tracking-widest px-4 pb-4">KATEGORI</th>
                        <th class="text-left text-xs text-gray-400 font-bold tracking-widest px-4 pb-4 hidden md:table-cell">ALAMAT</th>
                        <th class="text-center text-xs text-gray-400 font-bold tracking-widest px-4 pb-4">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    <tr class="border-t border-[#F1F5F9] hover:bg-[#FAFAFA] transition-colors">
                        <td class="px-4 py-4 align-middle">
                            <img src="assets/img/180 Cafe - Bandung 1.png" class="w-[52px] h-[52px] rounded-xl object-fill" alt="">
                        </td>
                        <td class="px-4 py-4 align-middle font-semibold text-navy">Alam Cafe</td>
                        <td class="px-4 py-4 align-middle">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-[#FEF4E7] text-[#c78332]">Cafe</span>
                        </td>
                        <td class="px-4 py-4 align-middle text-gray-400 text-sm hidden md:table-cell">Sumurbandung, Kota Bandung</td>
                        <td class="px-4 py-4 align-middle">
                            <div class="flex gap-3 items-center justify-center">
                                <button class="text-gray-500 hover:text-navy transition-colors p-1"><span class="material-symbols-outlined">edit</span></button>
                                <button class="text-[#FBB45E] hover:text-navy transition-colors p-1"><span class="material-symbols-outlined">visibility</span></button>
                                <button class="text-red-400 hover:text-red-600 transition-colors p-1"><span class="material-symbols-outlined">delete</span></button>
                            </div>
                        </td>
                    </tr>
                    <!-- Row 2 -->
                    <tr class="border-t border-[#F1F5F9] hover:bg-[#FAFAFA] transition-colors">
                        <td class="px-4 py-4 align-middle">
                            <img src="assets/img/180 Cafe - Bandung 1.png" class="w-[52px] h-[52px] rounded-xl object-fill" alt="">
                        </td>
                        <td class="px-4 py-4 align-middle font-semibold text-navy">Taman Hutan Raya Ir. H. Djuanda</td>
                        <td class="px-4 py-4 align-middle">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-[#E8F5E9] text-green-700">Taman</span>
                        </td>
                        <td class="px-4 py-4 align-middle text-gray-400 text-sm hidden md:table-cell">Cimenyan, Kab. Bandung</td>
                        <td class="px-4 py-4 align-middle">
                            <div class="flex gap-3 items-center justify-center">
                                <button class="text-gray-500 hover:text-navy transition-colors p-1"><span class="material-symbols-outlined">edit</span></button>
                                <button class="text-[#FBB45E] hover:text-navy transition-colors p-1"><span class="material-symbols-outlined">visibility</span></button>
                                <button class="text-red-400 hover:text-red-600 transition-colors p-1"><span class="material-symbols-outlined">delete</span></button>
                            </div>
                        </td>
                    </tr>
                    <!-- Row 3 -->
                    <tr class="border-t border-[#F1F5F9] hover:bg-[#FAFAFA] transition-colors">
                        <td class="px-4 py-4 align-middle">
                            <img src="assets/img/180 Cafe - Bandung 1.png" class="w-[52px] h-[52px] rounded-xl object-fill" alt="">
                        </td>
                        <td class="px-4 py-4 align-middle font-semibold text-navy">Warung Nasi Ampera</td>
                        <td class="px-4 py-4 align-middle">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-[#E3F2FD] text-blue-600">Restoran</span>
                        </td>
                        <td class="px-4 py-4 align-middle text-gray-400 text-sm hidden md:table-cell">Lengkong, Kota Bandung</td>
                        <td class="px-4 py-4 align-middle">
                            <div class="flex gap-3 items-center justify-center">
                                <button class="text-gray-500 hover:text-navy transition-colors p-1"><span class="material-symbols-outlined">edit</span></button>
                                <button class="text-[#FBB45E] hover:text-navy transition-colors p-1"><span class="material-symbols-outlined">visibility</span></button>
                                <button class="text-red-400 hover:text-red-600 transition-colors p-1"><span class="material-symbols-outlined">delete</span></button>
                            </div>
                        </td>
                    </tr>
                    <!-- Row 4 -->
                    <tr class="border-t border-[#F1F5F9] hover:bg-[#FAFAFA] transition-colors">
                        <td class="px-4 py-4 align-middle">
                            <img src="assets/img/180 Cafe - Bandung 1.png" class="w-[52px] h-[52px] rounded-xl object-fill" alt="">
                        </td>
                        <td class="px-4 py-4 align-middle font-semibold text-navy">Paris Van Java Mall</td>
                        <td class="px-4 py-4 align-middle">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-[#FFF3E0] text-orange-600">Mall</span>
                        </td>
                        <td class="px-4 py-4 align-middle text-gray-400 text-sm hidden md:table-cell">Sukajadi, Kota Bandung</td>
                        <td class="px-4 py-4 align-middle">
                            <div class="flex gap-3 items-center justify-center">
                                <button class="text-gray-500 hover:text-navy transition-colors p-1"><span class="material-symbols-outlined">edit</span></button>
                                <button class="text-[#FBB45E] hover:text-navy transition-colors p-1"><span class="material-symbols-outlined">visibility</span></button>
                                <button class="text-red-400 hover:text-red-600 transition-colors p-1"><span class="material-symbols-outlined">delete</span></button>
                            </div>
                        </td>
                    </tr>
                    <!-- Row 5 -->
                    <tr class="border-t border-[#F1F5F9] hover:bg-[#FAFAFA] transition-colors">
                        <td class="px-4 py-4 align-middle">
                            <img src="assets/img/180 Cafe - Bandung 1.png" class="w-[52px] h-[52px] rounded-xl object-fill" alt="">
                        </td>
                        <td class="px-4 py-4 align-middle font-semibold text-navy">Kopi Senja</td>
                        <td class="px-4 py-4 align-middle">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-[#FEF4E7] text-[#c78332]">Cafe</span>
                        </td>
                        <td class="px-4 py-4 align-middle text-gray-400 text-sm hidden md:table-cell">Coblong, Kota Bandung</td>
                        <td class="px-4 py-4 align-middle">
                            <div class="flex gap-3 items-center justify-center">
                                <button class="text-gray-500 hover:text-navy transition-colors p-1"><span class="material-symbols-outlined">edit</span></button>
                                <button class="text-[#FBB45E] hover:text-navy transition-colors p-1"><span class="material-symbols-outlined">visibility</span></button>
                                <button class="text-red-400 hover:text-red-600 transition-colors p-1"><span class="material-symbols-outlined">delete</span></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Footer -->
            <div class="flex justify-between items-center mt-6 pt-4 border-t border-[#F1F5F9]">
                <p class="text-gray-400 text-sm">Menampilkan 5 dari 42</p>
                <div class="flex items-center gap-1">
                    <button class="w-9 h-9 flex items-center justify-center rounded-lg border border-[#E2E8F0] hover:bg-[#FEF4E7] transition-colors">
                        <span class="material-symbols-outlined">chevron_backward</span>
                    </button>
                    <button class="w-9 h-9 flex items-center justify-center rounded-lg bg-[#FBB45E] text-[#363B58] font-bold text-sm">1</button>
                    <button class="w-9 h-9 flex items-center justify-center rounded-lg border border-[#E2E8F0] text-gray-400 text-sm hover:bg-[#FEF4E7] transition-colors">2</button>
                    <button class="w-9 h-9 flex items-center justify-center rounded-lg border border-[#E2E8F0] text-gray-400 text-sm hover:bg-[#FEF4E7] transition-colors">3</button>
                    <button class="w-9 h-9 flex items-center justify-center rounded-lg border border-[#E2E8F0] hover:bg-[#FEF4E7] transition-colors">
                        <span class="material-symbols-outlined">chevron_forward</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection