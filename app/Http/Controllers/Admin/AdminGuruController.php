<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;

class AdminGuruController extends Controller
{
    // ========================================
    // ADMIN - MENAMPILKAN DATA GURU
    // ========================================
    public function index()
    {
        $guru = Guru::latest()->get();

        return view('admin.guru.index', compact('guru'));
    }


    // ========================================
    // ADMIN - FORM TAMBAH GURU
    // ========================================
    public function create()
    {
        return view('admin.guru.create');
    }


    // ========================================
    // ADMIN - SIMPAN GURU
    // ========================================
    public function store(Request $request)
    {
        $request->validate([
            'nama'    => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'foto'    => 'nullable|image|max:2048',
        ]);

        $data = [
            'nama'    => $request->nama,
            'jabatan' => $request->jabatan,
        ];

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('guru', 'public');
        }

        Guru::create($data);

        return redirect()
            ->route('admin.guru.index')
            ->with('success', 'Data guru berhasil ditambahkan.');
    }


    // ========================================
    // ADMIN - FORM EDIT GURU
    // ========================================
    public function edit($id)
    {
        $guru = Guru::findOrFail($id);

        return view('admin.guru.edit', compact('guru'));
    }


    // ========================================
    // ADMIN - UPDATE GURU
    // ========================================
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'    => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'foto'    => 'nullable|image|max:2048',
        ]);

        $guru = Guru::findOrFail($id);

        $data = [
            'nama'    => $request->nama,
            'jabatan' => $request->jabatan,
        ];

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('guru', 'public');
        }

        $guru->update($data);

        return redirect()
            ->route('admin.guru.index')
            ->with('success', 'Data guru berhasil diperbarui.');
    }


    // ========================================
    // ADMIN - HAPUS GURU
    // ========================================
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);

        $guru->delete();

        return redirect()
            ->route('admin.guru.index')
            ->with('success', 'Data guru berhasil dihapus.');
    }
}