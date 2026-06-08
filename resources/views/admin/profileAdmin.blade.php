@extends('layouts.admin')

@section('title', 'Profile Admin')

@section('content')

    <div class="flex flex-col overflow-x-hidden">
        <div class="flex flex-col md:flex-row">

            <!-- KONTEN UTAMA -->
            <div class="flex-1 p-6 md:p-8 max-md:order-1">
                <div class="max-w-4xl mx-auto space-y-10">
                    <!-- HEADER PROFIL dengan Avatar -->
                    <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-sm flex flex-col sm:flex-row items-center gap-6">
                        <div class="relative">
                            <!-- FOTO PROFILE BERUBAH -->
                            @if(Auth::user()->fotoProfile)
                                <img src="{{ asset('storage/' . Auth::user()->fotoProfile) }}" 
                                    class="w-24 h-24 rounded-full object-cover" alt="Profile">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->nama) }}&background=FBB45E&color=363B58" 
                                    class="w-24 h-24 rounded-full object-cover" alt="Profile">
                            @endif
                            <button class="absolute bottom-0 right-0 bg-[#FBB45E] w-8 h-8 flex items-center justify-center rounded-full cursor-pointer">
                                <span class="material-symbols-outlined text-[#363B58] text-sm">edit</span>
                            </button>
                        </div>
                        <div class="flex-1 text-center sm:text-left">
                            <h1 class="text-2xl font-bold text-gray-800">{{ $user->nama }}</h1>
                            <p class="text-gray-500">{{ $user->username }}</p>
                        </div>
                        <a href="/admin/edit-profile-admin">
                            <button class="bg-[#FBB45E] text-[#363B58] px-5 py-2 rounded-lg text-sm font-bold cursor-pointer">Edit Profil</button>
                        </a>
                    </div>

                    <div class="w-full bg-white rounded-2xl p-6 shadow-sm overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr>
                        <th class="text-left text-xs text-gray-400 font-bold tracking-widest px-4 pb-4">AKTIVITAS</th>
                        <th class="text-left text-xs text-gray-400 font-bold tracking-widest px-4 pb-4">WAKTU</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logs as $log)
                    <tr class="border-t border-[#F1F5F9] hover:bg-[#FAFAFA] transition-colors">
                        <td class="px-4 py-4 align-middle font-semibold text-navy">{{ $log->aktivitas }}</td>
                        <td class="px-4 py-4 align-middle font-semibold text-navy">{{ $log->created_at->diffForHumans() }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2" class="px-4 py-4 text-center text-gray-400 text-sm">Belum ada aktivitas.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Footer -->
            <div class="flex justify-between items-center mt-6 pt-4 border-t border-[#F1F5F9]">
                <p class="text-gray-400 text-sm">Menampilkan {{ $logs->firstItem() }} - {{ $logs->lastItem() }} dari {{ $logs->total() }}</p>
                <div class="flex items-center gap-1">
                    @if($logs->onFirstPage())
                        <button disabled class="w-9 h-9 flex items-center justify-center rounded-lg border border-[#E2E8F0] opacity-40">
                            <span class="material-symbols-outlined">chevron_backward</span>
                        </button>
                    @else
                        <a href="{{ $logs->previousPageUrl() }}" class="w-9 h-9 flex items-center justify-center rounded-lg border border-[#E2E8F0] hover:bg-[#FEF4E7]">
                            <span class="material-symbols-outlined">chevron_backward</span>
                        </a>
                    @endif

                    @for($i = 1; $i <= $logs->lastPage(); $i++)
                        @if($i == $logs->currentPage())
                            <button class="w-9 h-9 flex items-center justify-center rounded-lg bg-[#FBB45E] text-[#363B58] font-bold text-sm">{{ $i }}</button>
                        @else
                            <a href="{{ $logs->url($i) }}" class="w-9 h-9 flex items-center justify-center rounded-lg border border-[#E2E8F0] text-gray-400 text-sm hover:bg-[#FEF4E7]">{{ $i }}</a>
                        @endif
                    @endfor

                    @if($logs->hasMorePages())
                        <a href="{{ $logs->nextPageUrl() }}" class="w-9 h-9 flex items-center justify-center rounded-lg border border-[#E2E8F0] hover:bg-[#FEF4E7]">
                            <span class="material-symbols-outlined">chevron_forward</span>
                        </a>
                    @else
                        <button disabled class="w-9 h-9 flex items-center justify-center rounded-lg border border-[#E2E8F0] opacity-40">
                            <span class="material-symbols-outlined">chevron_forward</span>
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection