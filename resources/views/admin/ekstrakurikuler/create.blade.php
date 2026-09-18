@extends('layouts.admin')

@section('title', 'Tambah Ekstrakurikuler')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Tambah Ekstrakurikuler</h2>
        <p class="text-muted mb-0">Tambahkan kegiatan ekstrakurikuler baru</p>
    </div>

    <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('admin.ekstrakurikuler.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Ekstrakurikuler</label>
                <input type="text" name="nama" id="nama"
                    class="form-control @error('nama') is-invalid @enderror"
                    value="{{ old('nama') }}" placeholder="Contoh: Pramuka" required>
                @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="5"
                    class="form-control @error('deskripsi') is-invalid @enderror"
                    placeholder="Masukkan deskripsi ekstrakurikuler...">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="pembina" class="form-label">Pembina</label>
                <input type="text" name="pembina" id="pembina"
                    class="form-control @error('pembina') is-invalid @enderror"
                    value="{{ old('pembina') }}" placeholder="Contoh: Bapak/Ibu Guru">
                @error('pembina')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="jadwal" class="form-label">Jadwal</label>
                <input type="text" name="jadwal" id="jadwal"
                    class="form-control @error('jadwal') is-invalid @enderror"
                    value="{{ old('jadwal') }}" placeholder="Contoh: Jumat, 14.00 - 16.00">
                @error('jadwal')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Foto Kegiatan Utama</label>
                <input type="file" name="gambar" id="gambar"
                    class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
                <small class="text-muted">Foto ini yang tampil besar di bagian atas halaman detail.</small>
                @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Foto Kegiatan Tambahan (opsional, maks 3)</label>
                <input type="file" name="foto2" class="form-control mb-2 @error('foto2') is-invalid @enderror" accept="image/*">
                @error('foto2')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror

                <input type="file" name="foto3" class="form-control mb-2 @error('foto3') is-invalid @enderror" accept="image/*">
                @error('foto3')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror

                <input type="file" name="foto4" class="form-control @error('foto4') is-invalid @enderror" accept="image/*">
                @error('foto4')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror

                <small class="text-muted">Muncul di kartu "Kegiatan" pada halaman detail, bareng foto utama.</small>
            </div>

            <div class="mb-3">
                <label for="logo" class="form-label">Logo Ekstrakurikuler</label>
                <input type="file" name="logo" id="logo"
                    class="form-control @error('logo') is-invalid @enderror" accept="image/*">
                <small class="text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB.</small>
                @error('logo')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>


            <div class="text-end">
                <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            </div>

        </form>

    </div>
</div>

@endsection