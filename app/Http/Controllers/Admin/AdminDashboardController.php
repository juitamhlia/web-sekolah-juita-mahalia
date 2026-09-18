<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Berita;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Agenda;
use App\Models\ProfilSekolah;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $jumlahJurusan = Jurusan::count();
        $jumlahBerita = Berita::count();
        $jumlahGuru = Guru::count();
        $jumlahSiswa = Siswa::sum('jumlah');
        $agendaTerdekat = Agenda::whereDate('tanggal', '>=', now())->orderBy('tanggal')->take(5)->get();
        $profil = ProfilSekolah::first();

        return view('admin.dashboard', compact('jumlahJurusan', 'jumlahBerita', 'jumlahGuru', 'jumlahSiswa', 'agendaTerdekat', 'profil'));
    }
}