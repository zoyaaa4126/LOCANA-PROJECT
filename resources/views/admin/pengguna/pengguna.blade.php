@extends('layouts.admin')

@section('title', 'Pengguna')

@section('content')

<div class="m-5">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-5">
        <div>
            <p class="text-slate-300 text-sm font-semibold">Dashboard / <span class="text-[#FBB45E] font-bold">Pengguna</span></p>
            <h1 class="text-2xl font-bold text-[#363B58]">Pengguna</h1>
        </div>
        <a class="flex gap-2 bg-[#FBB45E] text-[#363B58] font-bold text-md px-4 py-2 rounded-[10px] border-none cursor-pointer whitespace-nowrap hover:bg-[#E2A255] active:bg-[#FEE8CD] transition-colors duration-200">
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
                @php
                $users = [
                    ['username' => 'nnmkentoo',    'role' => 'User',  'email' => 'nnmkentoo@gmail.com'],
                    ['username' => 'sgrgetoo',     'role' => 'Admin', 'email' => 'sgrgetoo@gmail.com'],
                    ['username' => 'luffydl',      'role' => 'User',  'email' => 'luffydl@gmail.com'],
                    ['username' => 'luffydl',      'role' => 'User',  'email' => 'luffydl@gmail.com'],
                    ['username' => 'togeinumaki',  'role' => 'User',  'email' => 'togeinumaki@gmail.com'],
                    ['username' => 'kusingimup',   'role' => 'Admin', 'email' => 'kusingimup@gmail.com'],
                    ['username' => 'kusingimup',   'role' => 'User',  'email' => 'kusingimup@gmail.com'],
                    ['username' => 'kusingimup',   'role' => 'User',  'email' => 'kusingimup@gmail.com'],
                    ['username' => 'kusingimup',   'role' => 'Admin', 'email' => 'kusingimup@gmail.com'],
                ];
                @endphp
    
                @foreach($users as $i => $user)
                <tr class="border-b border-[#F1F5F9] hover:bg-[#FAFAFA] transition-colors group">
    
                    {{-- Username --}}
                    <td class="px-6 py-4 align-middle">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0
                                {{ $user['role'] === 'Admin' ? 'bg-[#363B58] text-white' : 'bg-[#FEF4E7] text-brand' }}">
                                {{ strtoupper(substr($user['username'], 0, 1)) }}
                            </div>
                            <span class="font-bold text-navy text-[15px]">{{ $user['username'] }}</span>
                        </div>
                    </td>
    
                    <td class="px-6 py-4 align-middle">
                        @if($user['role'] === 'Admin')
                            <span class="px-4 py-1.5 rounded-full text-xs font-bold bg-[#E2E8F0] text-[#363B58]">Admin</span>
                        @else
                            <span class="px-4 py-1.5 rounded-full text-xs font-bold bg-[#FEF4E7] text-brand">User</span>
                        @endif
                    </td>
    
                    <td class="px-6 py-4 align-middle text-gray-500 text-sm hidden md:table-cell">
                        {{ $user['email'] }}
                    </td>
    
                    <td class="px-6 py-4 align-middle">
                        <div class="flex gap-3 items-center justify-center">
                            <button class="text-gray-500 hover:text-navy transition-colors p-1"><span class="material-symbols-outlined">edit</span></button>
                            <button class="text-[#FBB45E] hover:text-navy transition-colors p-1"><span class="material-symbols-outlined">visibility</span></button>
                            <button class="text-red-400 hover:text-red-600 transition-colors p-1"><span class="material-symbols-outlined">delete</span></button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 px-6 py-4">
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
</div>

@endsection