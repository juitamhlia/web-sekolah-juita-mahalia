@extends('layouts.admin')

@section('title', 'Tambah Galeri')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Tambah Galeri</h2>
        <p class="text-muted mb-0">Tambahkan foto kegiatan sekolah</p>
    </div>

    <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>

                <input
                    type="text"
                    name="judul"
                    id="judul"
                    class="form-control @error('judul') is-invalid @enderror"
                    value="{{ old('judul') }}"
                    placeholder="Contoh: Upacara Bendera Senin"
                    required
                >

                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>

                <select
                    name="kategori"
                    id="kategori"
                    class="form-select @error('kategori') is-invalid @enderror"
                >
                    <option value="">-- Pilih kategori --</option>
                    <option value="Kegiatan Rutin" {{ old('kategori') == 'Kegiatan Rutin' ? 'selected' : '' }}>Kegiatan Rutin</option>
                    <option value="Ekstrakurikuler" {{ old('kategori') == 'Ekstrakurikuler' ? 'selected' : '' }}>Ekstrakurikuler</option>
                    <option value="Akademik" {{ old('kategori') == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                    <option value="Prestasi" {{ old('kategori') == 'Prestasi' ? 'selected' : '' }}>Prestasi</option>
                    <option value="Seni & Budaya" {{ old('kategori') == 'Seni & Budaya' ? 'selected' : '' }}>Seni &amp; Budaya</option>
                </select>

                <small class="text-muted">
                    Label kecil yang muncul di atas judul foto.
                </small>

                @error('kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>

                <input
                    type="file"
                    name="gambar"
                    id="gambar"
                    accept="image/*"
                    class="form-control @error('gambar') is-invalid @enderror"
                    required
                >

                <small class="text-muted">
                    Format JPG/PNG, maksimal 2MB.
                </small>

                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-end">

                <a href="{{ route('admin.galeri.index') }}"
                   class="btn btn-secondary">
                    Batal
                </a>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    Simpan
                </button>

            </div>

        </form>

    </div>
</div>

@endsection