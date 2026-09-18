<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use App\Models\Jurusan;
use App\Models\Guru;

class ProfilSekolahController extends Controller
{
    // Halaman profil publik
    public function index()
    {
        $profil = ProfilSekolah::first();
        $jurusan = Jurusan::all();

        return view('profil', compact('profil', 'jurusan'));
    }

    public function sejarah()
    {
        $profil = ProfilSekolah::first();

        return view('profil.sejarah', compact('profil'));
    }

    public function kontakSekolah()
    {
        $profil = ProfilSekolah::first();

        return view('profil.kontak-sekolah', compact('profil'));
    }

    public function visiMisi()
    {
        $profil = ProfilSekolah::first();

        return view('profil.visi-misi', compact('profil'));
    }

    public function guruStaff()
    {
        $jumlahGuru = Guru::count();

        return view('profil.guru-staff', compact('jumlahGuru'));
    }

    public function programKebiasaan()
    {
        return view('profil.program-kebiasaan');
    }
}