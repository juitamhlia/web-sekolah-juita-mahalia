<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminGuruController;
use App\Http\Controllers\Admin\AdminSiswaController;
use App\Http\Controllers\Admin\AdminBeritaController;
use App\Http\Controllers\Admin\AdminGaleriController;
use App\Http\Controllers\Admin\AdminAgendaController;
use App\Http\Controllers\Admin\AdminJurusanController;
use App\Http\Controllers\Admin\AdminEkstrakurikulerController;
use App\Http\Controllers\Admin\AdminProfilSekolahController;

use Illuminate\Support\Facades\Route;


// =========================
// HALAMAN PUBLIK
// =========================

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/profil', [ProfilSekolahController::class, 'index'])->name('profil');
Route::get('/profil/sejarah', [ProfilSekolahController::class, 'sejarah'])->name('profil.sejarah');
Route::get('/profil/visi-misi', [ProfilSekolahController::class, 'visiMisi'])->name('profil.visimisi');
Route::get('/profil/guru-staff', [GuruController::class, 'publicIndex'])->name('profil.guru-staff');
Route::get('/profil/program-kebiasaan', [ProfilSekolahController::class, 'programKebiasaan'])->name('profil.programkebiasaan');
Route::get('/profil/kontak-sekolah', [ProfilSekolahController::class, 'kontakSekolah'])->name('profil.kontaksekolah');

Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');

Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda');

Route::get('/guru', [GuruController::class, 'index'])->name('guru.public');

Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan.public');
Route::get('/jurusan/{id}', [JurusanController::class, 'show'])->name('jurusan.show');

Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'index'])->name('ekstrakurikuler.public');
Route::get('/ekstrakurikuler/{id}', [EkstrakurikulerController::class, 'show'])->name('ekstrakurikuler.show');


// =========================
// AUTH (MANUAL, TANPA BREEZE)
// =========================

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


// =========================
// HALAMAN ADMIN
// =========================

Route::middleware('auth')->group(function () {

    // Dashboard admin
    Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    // CRUD GURU
    Route::resource('admin/guru', AdminGuruController::class)->names('admin.guru');

    // CRUD SISWA
    Route::resource('admin/siswa', AdminSiswaController::class)->names('admin.siswa');

    // CRUD BERITA
    Route::get('admin/berita', [AdminBeritaController::class, 'adminIndex'])->name('admin.berita.index');
    Route::get('admin/berita/create', [AdminBeritaController::class, 'create'])->name('admin.berita.create');
    Route::post('admin/berita', [AdminBeritaController::class, 'store'])->name('admin.berita.store');
    Route::get('admin/berita/{id}/edit', [AdminBeritaController::class, 'edit'])->name('admin.berita.edit');
    Route::put('admin/berita/{id}', [AdminBeritaController::class, 'update'])->name('admin.berita.update');
    Route::delete('admin/berita/{id}', [AdminBeritaController::class, 'destroy'])->name('admin.berita.destroy');

    // CRUD GALERI
    Route::get('admin/galeri', [AdminGaleriController::class, 'adminIndex'])->name('admin.galeri.index');
    Route::get('admin/galeri/create', [AdminGaleriController::class, 'create'])->name('admin.galeri.create');
    Route::post('admin/galeri', [AdminGaleriController::class, 'store'])->name('admin.galeri.store');
    Route::get('admin/galeri/{id}/edit', [AdminGaleriController::class, 'edit'])->name('admin.galeri.edit');
    Route::put('admin/galeri/{id}', [AdminGaleriController::class, 'update'])->name('admin.galeri.update');
    Route::delete('admin/galeri/{id}', [AdminGaleriController::class, 'destroy'])->name('admin.galeri.destroy');

    // CRUD AGENDA
    Route::get('admin/agenda', [AdminAgendaController::class, 'adminIndex'])->name('admin.agenda.index');
    Route::get('admin/agenda/create', [AdminAgendaController::class, 'create'])->name('admin.agenda.create');
    Route::post('admin/agenda', [AdminAgendaController::class, 'store'])->name('admin.agenda.store');
    Route::get('admin/agenda/{id}/edit', [AdminAgendaController::class, 'edit'])->name('admin.agenda.edit');
    Route::put('admin/agenda/{id}', [AdminAgendaController::class, 'update'])->name('admin.agenda.update');
    Route::delete('admin/agenda/{id}', [AdminAgendaController::class, 'destroy'])->name('admin.agenda.destroy');

    // CRUD JURUSAN
    Route::get('admin/jurusan', [AdminJurusanController::class, 'adminIndex'])->name('admin.jurusan.index');
    Route::get('admin/jurusan/create', [AdminJurusanController::class, 'create'])->name('admin.jurusan.create');
    Route::post('admin/jurusan', [AdminJurusanController::class, 'store'])->name('admin.jurusan.store');
    Route::get('admin/jurusan/{id}/edit', [AdminJurusanController::class, 'edit'])->name('admin.jurusan.edit');
    Route::put('admin/jurusan/{id}', [AdminJurusanController::class, 'update'])->name('admin.jurusan.update');
    Route::delete('admin/jurusan/{id}', [AdminJurusanController::class, 'destroy'])->name('admin.jurusan.destroy');

    // CRUD EKSTRAKURIKULER
    Route::get('admin/ekstrakurikuler', [AdminEkstrakurikulerController::class, 'adminIndex'])->name('admin.ekstrakurikuler.index');
    Route::get('admin/ekstrakurikuler/create', [AdminEkstrakurikulerController::class, 'create'])->name('admin.ekstrakurikuler.create');
    Route::post('admin/ekstrakurikuler', [AdminEkstrakurikulerController::class, 'store'])->name('admin.ekstrakurikuler.store');
    Route::get('admin/ekstrakurikuler/{id}/edit', [AdminEkstrakurikulerController::class, 'edit'])->name('admin.ekstrakurikuler.edit');
    Route::put('admin/ekstrakurikuler/{id}', [AdminEkstrakurikulerController::class, 'update'])->name('admin.ekstrakurikuler.update');
    Route::delete('admin/ekstrakurikuler/{id}', [AdminEkstrakurikulerController::class, 'destroy'])->name('admin.ekstrakurikuler.destroy');

    // PROFIL SEKOLAH (admin)
    Route::get('admin/profil', [AdminProfilSekolahController::class, 'edit'])->name('admin.profil.edit');
    Route::put('admin/profil', [AdminProfilSekolahController::class, 'update'])->name('admin.profil.update');

});