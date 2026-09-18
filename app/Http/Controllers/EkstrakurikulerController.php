<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;

class EkstrakurikulerController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | PUBLIK
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $ekstrakurikuler = Ekstrakurikuler::latest()->get();
        return view('ekstrakurikuler', compact('ekstrakurikuler'));
    }

    public function show($id)
    {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);
        return view('ekstrakurikuler-detail', compact('ekstrakurikuler'));
    }
}