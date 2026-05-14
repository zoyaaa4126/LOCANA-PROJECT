<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin/dashboard');
    }
    public function lokasi()
    {
        return view('admin/lokasi/lokasi');
    }
    public function tambahLokasi()
    {
        return view('admin/lokasi/tambahLokasi');
    }
    public function ulasan()
    {
        return view('admin/ulasan');
    }
    public function pengguna()
    {
        return view('admin/pengguna/pengguna');
    }
    public function tambahPengguna()
    {
        return view('admin/pengguna/tambahPengguna');
    }
    public function viewPengguna()
    {
        return view('admin/pengguna/viewPengguna');
    }
}
