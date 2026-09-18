@extends('layouts.admin')

@section('title', 'Tambah Jurusan')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Tambah Jurusan</h2>
        <p class="text-muted mb-0">Tambahkan program keahlian baru</p>
    </div>

    <a href="{{ route('admin.jurusan.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('admin.jurusan.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Jurusan</label>
                <input
                    type="text"
                    name="nama"
                    class="form-control @error('nama') is-invalid @enderror"
                    value="{{ old('nama') }}"
                    placeholder="Contoh: Rekayasa Perangkat Lunak"
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
                    value="{{ old('kode') }}"
                    placeholder="Contoh: RPL"
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
                            {{ old('guru_id') == $g->id ? 'selected' : '' }}>
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
                    placeholder="Masukkan deskripsi jurusan..."
                >{{ old('deskripsi') }}</textarea>

                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar Utama</label>

                <input
                    type="file"
                    name="gambar"
                    class="form-control @error('gambar') is-invalid @enderror"
                    accept="image/*"
                >

                <small class="text-muted">
                    Foto kegiatan/dokumentasi jurusan. Format: JPG, JPEG, PNG, atau WEBP. Maksimal 2MB.
                </small>

                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Logo Jurusan</label>

                <input
                    type="file"
                    name="logo"
                    class="form-control @error('logo') is-invalid @enderror"
                    accept="image/*"
                >

                <small class="text-muted">
                    Lambang/badge khusus jurusan ini (ditampilkan bulat, menumpuk di atas gambar utama). Format: JPG, JPEG, PNG, atau WEBP. Maksimal 1MB.
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
                    Simpan
                </button>
            </div>

        </form>

    </div>
</div>

@endsection