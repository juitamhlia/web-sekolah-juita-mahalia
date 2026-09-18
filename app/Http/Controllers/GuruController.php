<?php

namespace App\Http\Controllers;

use App\Models\Guru;

class GuruController extends Controller
{
    // ========================================
    // HALAMAN PUBLIK - DATA GURU (profil/guru-staff)
    // ========================================
    public function publicIndex()
    {
        $guru = Guru::orderBy('id')->get();

        return view('profil.guru-staff', compact('guru'));
    }


    // ========================================
    // HALAMAN PUBLIK - /guru
    // ========================================
    public function index()
    {
        $guru = Guru::latest()->get();

        return view('admin.guru.index', compact('guru'));
    }
}