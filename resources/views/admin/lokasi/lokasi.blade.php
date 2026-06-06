@extends('layouts.admin')

@section('title', 'Lokasi')

@section('content')

<div class="m-5">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-5">
        <div>
            <p class="text-slate-300 text-sm font-semibold">Dashboard / <span class="text-[#FBB45E] font-bold">Lokasi</span></p>
            <h1 class="text-2xl font-bold text-[#363B58]">Halo Admin <span class="text-yellow-400">Higuruma Hiromi!</span></h1>
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
                @foreach ($lokasi as $item)
                <tr class="border-t border-[#F1F5F9] hover:bg-[#FAFAFA] transition-colors">
                    <td class="px-4 py-4 align-middle">
                        <img src="{{ asset($item->gambar_tempat) }}" class="w-[52px] h-[52px] rounded-xl object-fill" alt="">
                    </td>
                    <td class="px-4 py-4 align-middle font-semibold text-navy">{{ $item->nama_tempat }}</td>
                    <td class="px-4 py-4 align-middle">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold
                            @switch($item->kategori_id)
                                @case(1) bg-[#FEF4E7] text-[#c78332] @break
                                @case(2) bg-[#E3F2FD] text-blue-600 @break
                                @case(5) bg-[#FFF3E0] text-orange-600 @break
                                @case(6) bg-[#E8F5E9] text-green-700 @break
                                @default bg-gray-100 text-gray-600
                            @endswitch">
                            {{ $item->kategori->nama ?? '-' }}
                        </span>
                    </td>
                    <td class="px-4 py-4 align-middle text-gray-400 text-sm hidden md:table-cell">{{ $item->alamat_lengkap }}</td>
                    <td class="px-4 py-4 align-middle">
                        <div class="flex gap-3 items-center justify-center">
                            <button onclick="window.location='/lokasi/{{ $item->id }}/edit'" class="text-gray-500 hover:text-[#363B58] transition-colors p-1"><span class="material-symbols-outlined">edit</span></button>
                            <button onclick="window.location='/places/{{ $item->id }}'" class="text-[#FBB45E] hover:text-[#363B58] transition-colors p-1"><span class="material-symbols-outlined">visibility</span></button>
                            <form action="/lokasi/{{ $item->id }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-600 transition-colors p-1"><span class="material-symbols-outlined">delete</span></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Footer -->
        <div class="flex justify-between items-center mt-6 pt-4 border-t border-[#F1F5F9]">
            <p class="text-gray-400 text-sm">Menampilkan {{ $lokasi->count() }} dari {{ $lokasi->total() }}</p>
            <div class="flex items-center gap-1">
                <button onclick="window.location='{{ $lokasi->previousPageUrl() ?? '#' }}'" class="w-9 h-9 flex items-center justify-center rounded-lg border border-[#E2E8F0] hover:bg-[#FEF4E7] transition-colors">
                    <span class="material-symbols-outlined">chevron_backward</span>
                </button>
                @for($i = 1; $i <= $lokasi->lastPage(); $i++)
                <button onclick="window.location='{{ $lokasi->url($i) }}'"
                    class="w-9 h-9 flex items-center justify-center rounded-lg text-sm transition-colors
                    {{ $i == $lokasi->currentPage() ? 'bg-[#FBB45E] text-[#363B58] font-bold' : 'border border-[#E2E8F0] text-gray-400 hover:bg-[#FEF4E7]' }}">
                    {{ $i }}
                </button>
                @endfor
                <button onclick="window.location='{{ $lokasi->nextPageUrl() ?? '#' }}'" class="w-9 h-9 flex items-center justify-center rounded-lg border border-[#E2E8F0] hover:bg-[#FEF4E7] transition-colors">
                    <span class="material-symbols-outlined">chevron_forward</span>
                </button>
            </div>
        </div>
    </div>
</div>

@endsection