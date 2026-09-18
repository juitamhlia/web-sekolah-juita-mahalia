<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilSekolah;
use Illuminate\Http\Request;

class AdminProfilSekolahController extends Controller
{
    // Halaman edit profil admin
    public function edit()
    {
        $profil = ProfilSekolah::first();

        return view('profil.edit', compact('profil'));
    }

    // Update profil sekolah
    public function update(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:255',
            'website' => 'nullable|string|max:255',
            'tahun_berdiri' => 'required|integer',
            'kepala_sekolah' => 'required|string|max:255',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'foto' => 'nullable|string|max:255',
        ]);

        $profil = ProfilSekolah::first();

        if (!$profil) {
            $profil = new ProfilSekolah();
        }

        $profil->fill([
            'nama_sekolah' => $request->nama_sekolah,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'website' => $request->website,
            'tahun_berdiri' => $request->tahun_berdiri,
            'kepala_sekolah' => $request->kepala_sekolah,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'foto' => $request->foto,
        ]);

        $profil->save();

        return redirect()
            ->route('admin.profil.edit')
            ->with('success', 'Profil sekolah berhasil diperbarui.');
    }
}