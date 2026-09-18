@extends('layouts.admin')

@section('title', 'Edit Ekstrakurikuler')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Edit Ekstrakurikuler</h2>
        <p class="text-muted mb-0">Perbarui data ekstrakurikuler</p>
    </div>

    <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('admin.ekstrakurikuler.update', $ekstrakurikuler->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Ekstrakurikuler</label>
                <input type="text" name="nama" id="nama"
                    class="form-control @error('nama') is-invalid @enderror"
                    value="{{ old('nama', $ekstrakurikuler->nama) }}" required>
                @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="5"
                    class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $ekstrakurikuler->deskripsi) }}</textarea>
                @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="pembina" class="form-label">Pembina</label>
                <input type="text" name="pembina" id="pembina"
                    class="form-control @error('pembina') is-invalid @enderror"
                    value="{{ old('pembina', $ekstrakurikuler->pembina) }}">
                @error('pembina')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="jadwal" class="form-label">Jadwal</label>
                <input type="text" name="jadwal" id="jadwal"
                    class="form-control @error('jadwal') is-invalid @enderror"
                    value="{{ old('jadwal', $ekstrakurikuler->jadwal) }}">
                @error('jadwal')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Foto Kegiatan Utama</label>

                @if($ekstrakurikuler->gambar)
                    <div class="mb-2">
                        <img src="{{ asset('storage/'.$ekstrakurikuler->gambar) }}" width="120" class="rounded d-block">
                        <small class="text-muted">Foto saat ini</small>
                    </div>
                @endif

                <input type="file" name="gambar" id="gambar"
                    class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti.</small>
                @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Foto Kegiatan Tambahan (opsional, maks 3)</label>

                @foreach(['foto2', 'foto3', 'foto4'] as $field)
                    @if($ekstrakurikuler->$field)
                        <div class="mb-2">
                            <img src="{{ asset('storage/'.$ekstrakurikuler->$field) }}" width="90" class="rounded d-block">
                        </div>
                    @endif
                    <input type="file" name="{{ $field }}"
                        class="form-control mb-2 @error($field) is-invalid @enderror" accept="image/*">
                    @error($field)<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                @endforeach

                <small class="text-muted">Kosongkan slot yang tidak ingin diganti.</small>
            </div>

            <div class="mb-3">
                <label for="logo" class="form-label">Logo Ekstrakurikuler</label>

                @if($ekstrakurikuler->logo)
                    <div class="mb-2">
                        <img src="{{ asset('storage/'.$ekstrakurikuler->logo) }}" width="80" class="rounded d-block">
                        <small class="text-muted">Logo saat ini</small>
                    </div>
                @endif

                <input type="file" name="logo" id="logo"
                    class="form-control @error('logo') is-invalid @enderror" accept="image/*">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti.</small>
                @error('logo')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>


            <div class="text-end">
                <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Perubahan</button>
            </div>

        </form>

    </div>
</div>

@endsection