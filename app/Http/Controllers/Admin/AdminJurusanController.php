<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Guru;
use Illuminate\Http\Request;

class AdminJurusanController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */

    // Menampilkan semua jurusan di halaman admin
    public function adminIndex()
    {
        $jurusan = Jurusan::with('guru')
            ->latest()
            ->get();

        return view('admin.jurusan.index', compact('jurusan'));
    }


    // Halaman tambah jurusan
    public function create()
    {
        $guru = Guru::orderBy('nama')
            ->get();

        return view('admin.jurusan.create', compact('guru'));
    }


    // Menyimpan jurusan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',

            'kode' => 'required|string|max:50|unique:jurusan,kode',

            'deskripsi' => 'nullable|string',

            'guru_id' => 'nullable|exists:guru,id',

            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
        ]);

        $data = [
            'nama' => $request->nama,
            'kode' => $request->kode,
            'deskripsi' => $request->deskripsi,
            'guru_id' => $request->guru_id,
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('jurusan', 'public');
        }

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('jurusan/logo', 'public');
        }

        Jurusan::create($data);


        return redirect()
            ->route('admin.jurusan.index')
            ->with(
                'success',
                'Data jurusan berhasil ditambahkan.'
            );
    }


    // Halaman edit jurusan
    public function edit($id)
    {
        $jurusan = Jurusan::findOrFail($id);

        $guru = Guru::orderBy('nama')
            ->get();

        return view(
            'admin.jurusan.edit',
            compact('jurusan', 'guru')
        );
    }


    // Memperbarui jurusan
    public function update(Request $request, $id)
    {
        $jurusan = Jurusan::findOrFail($id);


        $request->validate([
            'nama' => 'required|string|max:255',

            'kode' => 'required|string|max:50|unique:jurusan,kode,' . $jurusan->id,

            'deskripsi' => 'nullable|string',

            'guru_id' => 'nullable|exists:guru,id',

            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
        ]);

        $data = [
            'nama' => $request->nama,
            'kode' => $request->kode,
            'deskripsi' => $request->deskripsi,
            'guru_id' => $request->guru_id,
        ];

        if ($request->hasFile('gambar')) {
            if ($jurusan->gambar && \Storage::disk('public')->exists($jurusan->gambar)) {
                \Storage::disk('public')->delete($jurusan->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('jurusan', 'public');
        }

        if ($request->hasFile('logo')) {
            if ($jurusan->logo && \Storage::disk('public')->exists($jurusan->logo)) {
                \Storage::disk('public')->delete($jurusan->logo);
            }

            $data['logo'] = $request->file('logo')->store('jurusan/logo', 'public');
        }

        $jurusan->update($data);


        return redirect()
            ->route('admin.jurusan.index')
            ->with(
                'success',
                'Data jurusan berhasil diperbarui.'
            );
    }


    // Menghapus jurusan
    public function destroy($id)
    {
        $jurusan = Jurusan::findOrFail($id);

        if ($jurusan->gambar && \Storage::disk('public')->exists($jurusan->gambar)) {
            \Storage::disk('public')->delete($jurusan->gambar);
        }

        if ($jurusan->logo && \Storage::disk('public')->exists($jurusan->logo)) {
            \Storage::disk('public')->delete($jurusan->logo);
        }

        $jurusan->delete();


        return redirect()
            ->route('admin.jurusan.index')
            ->with(
                'success',
                'Data jurusan berhasil dihapus.'
            );
    }
}