<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AdminSiswaController extends Controller
{
    // =========================
    // HALAMAN ADMIN - JUMLAH SISWA
    // =========================
    public function index()
    {
        $siswa = Siswa::first();

        return view('admin.siswa.index', compact('siswa'));
    }

    // =========================
    // FORM TAMBAH JUMLAH SISWA
    // =========================
    public function create()
    {
        $siswa = Siswa::first();

        return view('admin.siswa.create', compact('siswa'));
    }

    // =========================
    // SIMPAN JUMLAH SISWA
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:0',
        ]);

        Siswa::create([
            'jumlah' => $request->jumlah,
        ]);

        return redirect()
            ->route('admin.siswa.index')
            ->with('success', 'Jumlah siswa berhasil disimpan.');
    }

    // =========================
    // FORM EDIT JUMLAH SISWA
    // =========================
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);

        return view('admin.siswa.edit', compact('siswa'));
    }

    // =========================
    // UPDATE JUMLAH SISWA
    // =========================
    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:0',
        ]);

        $siswa = Siswa::findOrFail($id);

        $siswa->update([
            'jumlah' => $request->jumlah,
        ]);

        return redirect()
            ->route('admin.siswa.index')
            ->with('success', 'Jumlah siswa berhasil diperbarui.');
    }

    // =========================
    // HAPUS DATA JUMLAH
    // =========================
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->delete();

        return redirect()
            ->route('admin.siswa.index')
            ->with('success', 'Jumlah siswa berhasil dihapus.');
    }
}