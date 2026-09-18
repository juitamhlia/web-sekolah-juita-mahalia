@extends('layouts.admin')

@section('title', 'Edit Guru')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Edit Guru</h2>
        <p class="text-muted mb-0">Ubah data guru / staff</p>
    </div>

    <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('admin.guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            {{-- NAMA --}}
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>

                <input
                    type="text"
                    name="nama"
                    id="nama"
                    class="form-control @error('nama') is-invalid @enderror"
                    value="{{ old('nama', $guru->nama) }}"
                    required
                >

                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- JABATAN --}}
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>

                <input
                    type="text"
                    name="jabatan"
                    id="jabatan"
                    class="form-control @error('jabatan') is-invalid @enderror"
                    value="{{ old('jabatan', $guru->jabatan) }}"
                    placeholder="Contoh: Guru Matematika, Kepala Sekolah, dll"
                >

                @error('jabatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- FOTO --}}
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>

                @if($guru->foto)
                    <div class="mb-2">
                        <img src="{{ asset('storage/guru/' . $guru->foto) }}"
                             alt="{{ $guru->nama }}"
                             width="100"
                             class="rounded">
                    </div>
                @endif

                <input
                    type="file"
                    name="foto"
                    id="foto"
                    class="form-control @error('foto') is-invalid @enderror"
                    accept="image/*"
                >

                <small class="text-muted">
                    Kosongkan jika tidak ingin mengganti foto. Format: JPG, JPEG, PNG, WEBP. Maksimal 2MB.
                </small>

                @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- BUTTON --}}
            <div class="text-end">
                <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary">Batal</a>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update
                </button>
            </div>

        </form>

    </div>
</div>

@endsection