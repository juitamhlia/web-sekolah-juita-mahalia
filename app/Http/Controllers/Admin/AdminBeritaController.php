<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminBeritaController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ADMIN - CRUD
    |--------------------------------------------------------------------------
    */

    // Menampilkan berita di halaman admin
    public function adminIndex()
    {
        $berita = Berita::with('kategori')
            ->latest('tanggal')
            ->get();

        return view('admin.berita.index', compact('berita'));
    }

    // Halaman tambah berita
    public function create()
    {
        $kategori = KategoriBerita::orderBy('nama')->get();

        return view('admin.berita.create', compact('kategori'));
    }

    // Menyimpan berita baru
    public function store(Request $request)
    {
        // Konversi format tanggal dari dd/mm/yyyy ke yyyy-mm-dd
        $request->merge([
            'tanggal' => \Carbon\Carbon::createFromFormat('d/m/Y', $request->tanggal)->format('Y-m-d'),
        ]);

        $request->validate([
            'kategori_id' => 'required|exists:kategori_berita,id',
            'judul' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:berita,slug',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tanggal' => 'required|date',
        ]);

        $slug = $request->slug
            ? Str::slug($request->slug)
            : Str::slug($request->judul);

        if (Berita::where('slug', $slug)->exists()) {
            $slug .= '-' . time();
        }

        $data = [
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'slug' => $slug,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => $request->has('status'),
            'featured' => $request->has('featured'),
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create($data);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    // Halaman edit berita
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        $kategori = KategoriBerita::orderBy('nama')->get();

        return view('admin.berita.edit', compact('berita', 'kategori'));
    }

    // Update berita
    public function update(Request $request, $id)
    {
        // Konversi format tanggal dari dd/mm/yyyy ke yyyy-mm-dd
        $request->merge([
            'tanggal' => \Carbon\Carbon::createFromFormat('d/m/Y', $request->tanggal)->format('Y-m-d'),
        ]);

        $berita = Berita::findOrFail($id);

        $request->validate([
            'kategori_id' => 'required|exists:kategori_berita,id',
            'judul' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:berita,slug,' . $berita->id,
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tanggal' => 'required|date',
        ]);

        $slug = $request->slug
            ? Str::slug($request->slug)
            : Str::slug($request->judul);

        if (
            Berita::where('slug', $slug)
                ->where('id', '!=', $berita->id)
                ->exists()
        ) {
            $slug .= '-' . time();
        }

        $data = [
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'slug' => $slug,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => $request->has('status'),
            'featured' => $request->has('featured'),
        ];

        if ($request->hasFile('gambar')) {
            if ($berita->gambar && \Storage::disk('public')->exists($berita->gambar)) {
                \Storage::disk('public')->delete($berita->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    // Hapus berita
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        if ($berita->gambar && \Storage::disk('public')->exists($berita->gambar)) {
            \Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}