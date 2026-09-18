@extends('layouts.admin')

@section('title', 'Edit Profil Sekolah')

@section('content')

<h2 class="fw-bold mb-4">Edit Profil Sekolah</h2>

<div class="card shadow-sm">
    <div class="card-body p-4">

        <form action="{{ route('admin.profil.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Sekolah</label>
                <input type="text" name="nama_sekolah" class="form-control"
                       value="{{ old('nama_sekolah', $profil->nama_sekolah ?? '') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi / Sejarah Singkat</label>
                <textarea name="deskripsi" rows="6" class="form-control">{{ old('deskripsi', $profil->deskripsi ?? '') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" rows="2" class="form-control">{{ old('alamat', $profil->alamat ?? '') }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control"
                           value="{{ old('email', $profil->email ?? '') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Telepon</label>
                    <input type="text" name="telepon" class="form-control"
                           value="{{ old('telepon', $profil->telepon ?? '') }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Website</label>
                    <input type="text" name="website" class="form-control"
                           value="{{ old('website', $profil->website ?? '') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tahun Berdiri</label>
                    <input type="number" name="tahun_berdiri" class="form-control"
                           value="{{ old('tahun_berdiri', $profil->tahun_berdiri ?? '') }}">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Kepala Sekolah</label>
                <input type="text" name="kepala_sekolah" class="form-control"
                       value="{{ old('kepala_sekolah', $profil->kepala_sekolah ?? '') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Visi</label>
                <textarea name="visi" rows="3" class="form-control">{{ old('visi', $profil->visi ?? '') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Misi</label>
                <textarea name="misi" rows="3" class="form-control">{{ old('misi', $profil->misi ?? '') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Foto (nama file, contoh: sekolah.jpg)</label>
                <input type="text" name="foto" class="form-control"
                       value="{{ old('foto', $profil->foto ?? '') }}">
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>

        </form>

    </div>
</div>

@endsection