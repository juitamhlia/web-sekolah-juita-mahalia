<?php

namespace App\Http\Controllers;

use App\Models\Galeri;

class GaleriController extends Controller
{
    // Menampilkan data galeri (PUBLIK)
    public function index()
    {
        $galeri = Galeri::latest()->get();

        return view('galeri', compact('galeri'));
    }
}