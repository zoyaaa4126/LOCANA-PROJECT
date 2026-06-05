@extends('layouts.admin')

@section('title', 'Pengguna')

@section('content')

<div class="m-5">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-5">
            <div>
                <p class="text-slate-300 text-sm font-semibold">Dashboard / <span class="text-[#FBB45E] font-bold">Pengguna</span></p>
                <h1 class="text-2xl font-bold text-[#363B58]">Pengguna</h1>
            </div>
            <a href="/tambah-pengguna" class="flex gap-2 bg-[#FBB45E] text-[#363B58] font-bold text-md px-4 py-2 rounded-[10px] border-none cursor-pointer whitespace-nowrap hover:bg-[#E2A255] active:bg-[#FEE8CD] transition-colors duration-200">
                <span class="material-symbols-outlined">add</span>Tambah Pengguna
            </a>
        </div>
        
        <div class="bg-white rounded-2xl shadow-sm overflow-x-auto mb-10">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="border-b border-[#F1F5F9]">
                        <th class="text-left text-xs text-gray-400 font-bold tracking-widest px-6 py-4">
                            <div class="flex items-center gap-1">
                                USERNAME
                                <span class="material-symbols-outlined text-gray-300" style="font-size:16px;">unfold_more</span>
                            </div>
                        </th>
                        <th class="text-left text-xs text-gray-400 font-bold tracking-widest px-6 py-4">
                            <div class="flex items-center gap-1">
                                ROLE
                                <span class="material-symbols-outlined text-gray-300" style="font-size:16px;">unfold_more</span>
                            </div>
                        </th>
                        <th class="text-left text-xs text-gray-400 font-bold tracking-widest px-6 py-4 hidden md:table-cell">
                            <div class="flex items-center gap-1">
                                EMAIL
                                <span class="material-symbols-outlined text-gray-300" style="font-size:16px;">unfold_more</span>
                            </div>
                        </th>
                        <th class="text-center text-xs text-gray-400 font-bold tracking-widest px-6 py-4">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $u)
                    <tr class="border-b border-[#F1F5F9] hover:bg-[#FAFAFA] transition-colors group">

                        <td class="px-6 py-4 align-middle">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0
                                    {{ $u->role === 'admin' ? 'bg-[#363B58] text-white' : 'bg-[#FEF4E7] text-brand' }}">
                                    {{ strtoupper(substr($u->username, 0, 1)) }}
                                </div>
                                <span class="font-bold text-[#363B58] text-[15px]">{{ $u->username }}</span>
                            </div>
                        </td>

                        <td class="px-6 py-4 align-middle">
                            @if($u->role === 'admin')
                                <span class="px-4 py-1.5 rounded-full text-xs font-bold bg-[#E2E8F0] text-[#363B58]">Admin</span>
                            @else
                                <span class="px-4 py-1.5 rounded-full text-xs font-bold bg-[#FEF4E7] text-brand">User</span>
                            @endif
                        </td>

                        <td class="px-6 py-4 align-middle text-gray-500 text-sm hidden md:table-cell">
                            {{ $u->email }}
                        </td>

                        <td class="px-6 py-4 align-middle">
                            <div class="flex gap-3 items-center justify-center">
                                <a href="/pengguna/edit/{{ $u->id }}">
                                    <button class="text-gray-500 hover:text-navy transition-colors p-1">
                                        <span class="material-symbols-outlined">edit</span>
                                    </button>
                                </a>
                                <a href="/detail-pengguna/{{ $u->id }}">
                                    <button class="text-[#FBB45E] hover:text-navy transition-colors p-1">
                                        <span class="material-symbols-outlined">visibility</span>
                                    </button>
                                </a>
                              <button class="text-red-400 hover:text-red-600 transition-colors p-1"
                                data-id="{{ $u->id }}"
                                data-nama="{{ $u->nama ?? $u->username }}"
                                onclick="confirmHapus(this.dataset.id, this.dataset.nama)">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 px-6 py-4">
                <p class="text-gray-400 text-sm">
                    Menampilkan {{ $users->firstItem() }} - {{ $users->lastItem() }} dari {{ $users->total() }}
                </p>
                <div class="flex items-center gap-1">

                    {{-- Tombol Prev --}}
                    @if($users->onFirstPage())
                        <button disabled class="w-9 h-9 flex items-center justify-center rounded-lg border border-[#E2E8F0] opacity-40 cursor-not-allowed">
                            <span class="material-symbols-outlined">chevron_backward</span>
                        </button>
                    @else
                        <a href="{{ $users->previousPageUrl() }}" class="w-9 h-9 flex items-center justify-center rounded-lg border border-[#E2E8F0] hover:bg-[#FEF4E7] transition-colors">
                            <span class="material-symbols-outlined">chevron_backward</span>
                        </a>
                    @endif

                    {{-- Nomor Halaman --}}
                    @for($i = 1; $i <= $users->lastPage(); $i++)
                        @if($i == $users->currentPage())
                            <button class="w-9 h-9 flex items-center justify-center rounded-lg bg-[#FBB45E] text-[#363B58] font-bold text-sm">
                                {{ $i }}
                            </button>
                        @else
                            <a href="{{ $users->url($i) }}" class="w-9 h-9 flex items-center justify-center rounded-lg border border-[#E2E8F0] text-gray-400 text-sm hover:bg-[#FEF4E7] transition-colors">
                                {{ $i }}
                            </a>
                        @endif
                    @endfor

                    {{-- Tombol Next --}}
                    @if($users->hasMorePages())
                        <a href="{{ $users->nextPageUrl() }}" class="w-9 h-9 flex items-center justify-center rounded-lg border border-[#E2E8F0] hover:bg-[#FEF4E7] transition-colors">
                            <span class="material-symbols-outlined">chevron_forward</span>
                        </a>
                    @else
                        <button disabled class="w-9 h-9 flex items-center justify-center rounded-lg border border-[#E2E8F0] opacity-40 cursor-not-allowed">
                            <span class="material-symbols-outlined">chevron_forward</span>
                        </button>
                    @endif
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
            <p class="text-sm text-gray-500">Tindakan ini tidak dapat dibatalkan. Data pengguna <span id="modal-nama" class="font-semibold text-[#363B58]"></span> akan dihapus secara permanen.</p>
        </div>
        <div class="flex gap-3">
            <button onclick="tutupModal()" class="flex-1 border border-[#E2E8F0] text-[#363B58] font-bold text-sm py-2.5 rounded-xl hover:bg-[#F1F5F9] transition-colors">
                Batalkan
            </button>
            <form id="form-hapus" action="" method="POST" class="flex-1">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white font-bold text-sm py-2.5 rounded-xl transition-colors">
                    Hapus
                </button>
            </form>
        </div>
    </div>
</div>

@endsection