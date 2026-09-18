@extends('layouts.admin')

@section('title', 'Tambah Guru')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Tambah Guru</h2>
        <p class="text-muted mb-0">Tambahkan data guru baru</p>
    </div>

    <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('admin.guru.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">
                    Nama Guru
                </label>

                <input
                    type="text"
                    name="nama"
                    id="nama"
                    class="form-control @error('nama') is-invalid @enderror"
                    value="{{ old('nama') }}"
                    placeholder="Masukkan nama guru"
                    required
                >

                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jabatan" class="form-label">
                    Jabatan
                </label>

                <input
                    type="text"
                    name="jabatan"
                    id="jabatan"
                    class="form-control @error('jabatan') is-invalid @enderror"
                    value="{{ old('jabatan') }}"
                    placeholder="Contoh: Kepala Sekolah, Guru Produktif, Staf TU"
                >

                @error('jabatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">
                    Foto Guru
                </label>

                <input
                    type="file"
                    name="foto"
                    id="foto"
                    class="form-control @error('foto') is-invalid @enderror"
                    accept="image/*"
                >

                <div class="form-text">
                    Opsional. Format JPG/PNG, maksimal 2MB.
                </div>

                @error('foto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="text-end">
                <a href="{{ route('admin.guru.index') }}"
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