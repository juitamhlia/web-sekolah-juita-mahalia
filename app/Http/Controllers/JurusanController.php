<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Guru;
use App\Models\ProfilSekolah;
use App\Models\Ekstrakurikuler;
use App\Models\Galeri;
use App\Models\Berita;
use App\Models\Agenda;

class JurusanController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | PUBLIK
    |--------------------------------------------------------------------------
    */

    // Menampilkan semua jurusan untuk pengunjung
    public function index()
    {
        $jurusan = Jurusan::with('guru')
            ->latest()
            ->get();

        $profil = ProfilSekolah::first();
        $gurus = Guru::all();
        $ekskul = Ekstrakurikuler::all();
        $galeri = Galeri::all();
        $berita = Berita::all();
        $agenda = Agenda::all();

        return view('jurusan', compact(
            'jurusan',
            'profil',
            'gurus',
            'ekskul',
            'galeri',
            'berita',
            'agenda'
        ));
    }

    // Menampilkan detail 1 jurusan untuk pengunjung
    public function show($id)
    {
        $jurusan = Jurusan::with('guru')->findOrFail($id);
        $profil = ProfilSekolah::first();

        return view('jurusan-detail', compact('jurusan', 'profil'));
    }
}