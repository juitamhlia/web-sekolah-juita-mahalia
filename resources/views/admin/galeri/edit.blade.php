@extends('layouts.admin')

@section('title', 'Edit Galeri')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Edit Galeri</h2>
        <p class="text-muted mb-0">Perbarui data foto kegiatan sekolah</p>
    </div>

    <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>

                <input
                    type="text"
                    name="judul"
                    id="judul"
                    class="form-control @error('judul') is-invalid @enderror"
                    value="{{ old('judul', $galeri->judul) }}"
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
                    @php
                        $pilihanKategori = ['Kegiatan Rutin', 'Ekstrakurikuler', 'Akademik', 'Prestasi', 'Seni & Budaya'];
                        $kategoriTerpilih = old('kategori', $galeri->kategori);
                    @endphp
                    @foreach($pilihanKategori as $opsi)
                        <option value="{{ $opsi }}" {{ $kategoriTerpilih == $opsi ? 'selected' : '' }}>
                            {{ $opsi }}
                        </option>
                    @endforeach
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

                @if($galeri->gambar)
                    <div class="mb-2">
                        <img
                            src="{{ asset('storage/' . $galeri->gambar) }}"
                            alt="{{ $galeri->judul }}"
                            style="width: 150px; height: 100px; object-fit: cover;"
                            class="rounded"
                        >
                    </div>
                @endif

                <input
                    type="file"
                    name="gambar"
                    id="gambar"
                    accept="image/*"
                    class="form-control @error('gambar') is-invalid @enderror"
                >

                <small class="text-muted">
                    Kosongkan jika tidak ingin mengganti gambar. Format JPG/PNG, maksimal 2MB.
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
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>
</div>

@endsection