<?php

namespace App\Http\Controllers;

use App\Models\Agenda;

class AgendaController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | PUBLIK
    |--------------------------------------------------------------------------
    */

    // Menampilkan agenda untuk pengunjung
    public function index()
    {
        $agenda = Agenda::orderBy('tanggal', 'asc')
            ->orderBy('waktu', 'asc')
            ->get();

        return view('agenda', compact('agenda'));
    }
}