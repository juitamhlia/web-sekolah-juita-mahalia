<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\ProfilSekolah;
use App\Models\Jurusan;
use App\Models\Guru;
use App\Models\Ekstrakurikuler;
use App\Models\Galeri;
use App\Models\Agenda;

class BeritaController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | PUBLIK
    |--------------------------------------------------------------------------
    */

    // Halaman daftar berita publik
    public function index()
    {
        $berita = Berita::with('kategori')
            ->where('status', true)
            ->latest('tanggal')
            ->get();

        $profil = ProfilSekolah::first();
        $jurusan = Jurusan::all();
        $gurus= Guru::all();
        $ekskul= Ekstrakurikuler::all();
        $galeri= Galeri::all();
        $agenda= Agenda::all();

        return view('berita', compact('berita', 'profil', 'jurusan', 'gurus', 'ekskul', 'galeri', 'agenda'));
    }

    // Detail berita publik
    public function show($id)
    {
        $berita = Berita::with('kategori')
            ->findOrFail($id);

        // Berita terbaru untuk sidebar (selain berita yang sedang dibuka)
        $beritaTerbaru = Berita::where('status', true)
            ->where('id', '!=', $berita->id)
            ->latest('tanggal')
            ->take(10)
            ->get();

        return view('berita-detail', compact('berita', 'beritaTerbaru'));
    }
}