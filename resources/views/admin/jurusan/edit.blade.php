@extends('layouts.admin')

@section('title', 'Edit Jurusan')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Edit Jurusan</h2>
        <p class="text-muted mb-0">Perbarui data program keahlian</p>
    </div>

    <a href="{{ route('admin.jurusan.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('admin.jurusan.update', $jurusan->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Jurusan</label>

                <input
                    type="text"
                    name="nama"
                    class="form-control @error('nama') is-invalid @enderror"
                    value="{{ old('nama', $jurusan->nama) }}"
                    required
                >

                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Kode Jurusan</label>

                <input
                    type="text"
                    name="kode"
                    class="form-control @error('kode') is-invalid @enderror"
                    value="{{ old('kode', $jurusan->kode) }}"
                    required
                >

                @error('kode')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Guru / Koordinator</label>

                <select name="guru_id" class="form-select @error('guru_id') is-invalid @enderror">
                    <option value="">-- Pilih Guru --</option>

                    @foreach($guru as $g)
                        <option value="{{ $g->id }}"
                            {{ old('guru_id', $jurusan->guru_id) == $g->id ? 'selected' : '' }}>
                            {{ $g->nama }}
                        </option>
                    @endforeach
                </select>

                @error('guru_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>

                <textarea
                    name="deskripsi"
                    class="form-control @error('deskripsi') is-invalid @enderror"
                    rows="5"
                >{{ old('deskripsi', $jurusan->deskripsi) }}</textarea>

                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar Utama</label>

                @if($jurusan->gambar)
                    <div class="mb-2">
                        <img
                            src="{{ asset('storage/' . $jurusan->gambar) }}"
                            alt="{{ $jurusan->nama }}"
                            style="width: 180px; height: 110px; object-fit: cover;"
                            class="rounded"
                        >
                    </div>
                @endif

                <input
                    type="file"
                    name="gambar"
                    class="form-control @error('gambar') is-invalid @enderror"
                    accept="image/*"
                >

                <small class="text-muted">
                    Kosongkan jika tidak ingin mengganti gambar. Format: JPG, JPEG, PNG, atau WEBP. Maksimal 2MB.
                </small>

                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Logo Jurusan</label>

                @if($jurusan->logo)
                    <div class="mb-2">
                        <img
                            src="{{ asset('storage/' . $jurusan->logo) }}"
                            alt="Logo {{ $jurusan->nama }}"
                            style="width: 80px; height: 80px; object-fit: contain;"
                            class="rounded-circle border"
                        >
                    </div>
                @endif

                <input
                    type="file"
                    name="logo"
                    class="form-control @error('logo') is-invalid @enderror"
                    accept="image/*"
                >

                <small class="text-muted">
                    Kosongkan jika tidak ingin mengganti logo. Format: JPG, JPEG, PNG, atau WEBP. Maksimal 1MB.
                </small>

                @error('logo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-end">
                <a href="{{ route('admin.jurusan.index') }}"
                   class="btn btn-secondary">
                    Batal
                </a>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    Simpan Perubahan
                </button>
            </div>

        </form>

    </div>
</div>

@endsection