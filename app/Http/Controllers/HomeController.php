<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use App\Models\Jurusan;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Agenda;
use App\Models\Ekstrakurikuler;
use App\Models\Guru;
use App\Models\Siswa;

class HomeController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();

        $jurusan = Jurusan::take(4)->get();

        $berita = Berita::latest()->take(10)->get();

        $galeri = Galeri::latest()->take(6)->get();

        $agenda = Agenda::whereDate('tanggal', '>=', now())
            ->orderBy('tanggal')
            ->take(5)
            ->get();

        $ekskul = Ekstrakurikuler::all();

        $gurus = Guru::take(4)->get();

        // =========================
        // STATISTIK SEKOLAH
        // =========================

        // Jumlah guru
        $jumlahGuru = Guru::count();

        // Jumlah siswa
        // Mengambil angka dari kolom "jumlah"
        $siswa = Siswa::first();
        $jumlahSiswa = $siswa->jumlah ?? 0;

        // Jumlah jurusan
        $jumlahJurusan = Jurusan::count();

        // Jumlah ekstrakurikuler
        $jumlahEkskul = Ekstrakurikuler::count();


        return view('home', compact(
            'profil',
            'jurusan',
            'berita',
            'galeri',
            'agenda',
            'ekskul',
            'gurus',
            'jumlahGuru',
            'jumlahSiswa',
            'jumlahJurusan',
            'jumlahEkskul'
        ));
    }
}