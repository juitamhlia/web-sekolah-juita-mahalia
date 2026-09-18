<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AdminAgendaController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ADMIN - CRUD
    |--------------------------------------------------------------------------
    */

    // Menampilkan semua agenda di admin
    public function adminIndex()
    {
        $agenda = Agenda::orderBy('tanggal', 'desc')
            ->orderBy('waktu', 'asc')
            ->get();

        return view('admin.agenda.index', compact('agenda'));
    }

    // Halaman tambah agenda
    public function create()
    {
        return view('admin.agenda.create');
    }

    // Menyimpan agenda
    public function store(Request $request)
    {
        // Konversi format tanggal dari dd/mm/yyyy ke yyyy-mm-dd
        $request->merge([
            'tanggal' => \Carbon\Carbon::createFromFormat('d/m/Y', $request->tanggal)->format('Y-m-d'),
        ]);

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'lokasi' => 'required|string|max:255',
        ]);

        Agenda::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'lokasi' => $request->lokasi,
        ]);

        return redirect()
            ->route('admin.agenda.index')
            ->with('success', 'Agenda berhasil ditambahkan.');
    }

    // Halaman edit agenda
    public function edit($id)
    {
        $agenda = Agenda::findOrFail($id);

        return view('admin.agenda.edit', compact('agenda'));
    }

    // Update agenda
    public function update(Request $request, $id)
    {
        // Konversi format tanggal dari dd/mm/yyyy ke yyyy-mm-dd
        $request->merge([
            'tanggal' => \Carbon\Carbon::createFromFormat('d/m/Y', $request->tanggal)->format('Y-m-d'),
        ]);

        $agenda = Agenda::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'lokasi' => 'required|string|max:255',
        ]);

        $agenda->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'lokasi' => $request->lokasi,
        ]);

        return redirect()
            ->route('admin.agenda.index')
            ->with('success', 'Agenda berhasil diperbarui.');
    }

    // Hapus agenda
    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);

        $agenda->delete();

        return redirect()
            ->route('admin.agenda.index')
            ->with('success', 'Agenda berhasil dihapus.');
    }
}