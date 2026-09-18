@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Edit Berita</h2>
        <p class="text-muted mb-0">Perbarui berita sekolah</p>
    </div>

    <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            {{-- KATEGORI --}}
            <div class="mb-3">
                <label for="kategori_id" class="form-label">
                    Kategori Berita
                </label>

                <select
                    name="kategori_id"
                    id="kategori_id"
                    class="form-select @error('kategori_id') is-invalid @enderror"
                    required
                >
                    <option value="">-- Pilih Kategori --</option>

                    @foreach($kategori as $item)
                        <option value="{{ $item->id }}"
                            {{ old('kategori_id', $berita->kategori_id) == $item->id ? 'selected' : '' }}>
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </select>

                @error('kategori_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- JUDUL --}}
            <div class="mb-3">
                <label for="judul" class="form-label">
                    Judul Berita
                </label>

                <input
                    type="text"
                    name="judul"
                    id="judul"
                    class="form-control @error('judul') is-invalid @enderror"
                    value="{{ old('judul', $berita->judul) }}"
                    required
                >

                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- SLUG --}}
            <div class="mb-3">
                <label for="slug" class="form-label">
                    Slug
                </label>

                <input
                    type="text"
                    name="slug"
                    id="slug"
                    class="form-control @error('slug') is-invalid @enderror"
                    value="{{ old('slug', $berita->slug) }}"
                >

                @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- ISI --}}
            <div class="mb-3">
                <label for="isi" class="form-label">
                    Isi Berita
                </label>

                <textarea
                    name="isi"
                    id="isi"
                    rows="10"
                    class="form-control @error('isi') is-invalid @enderror"
                    required
                >{{ old('isi', $berita->isi) }}</textarea>

                @error('isi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- GAMBAR --}}
            <div class="mb-3">
                <label for="gambar" class="form-label">
                    Gambar
                </label>

                @if($berita->gambar)
                    <div class="mb-2">
                        <img
                            src="{{ asset('storage/' . $berita->gambar) }}"
                            alt="{{ $berita->judul }}"
                            style="width: 180px; height: 110px; object-fit: cover;"
                            class="rounded"
                        >
                    </div>
                @endif

                <input
                    type="file"
                    name="gambar"
                    id="gambar"
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

            {{-- TANGGAL --}}
            <div class="mb-3">
                <label for="tanggal" class="form-label">
                    Tanggal
                </label>

                <input
                    type="text"
                    name="tanggal"
                    id="tanggal"
                    class="form-control @error('tanggal') is-invalid @enderror"
                    value="{{ old('tanggal', \Carbon\Carbon::parse($berita->tanggal)->format('d/m/Y')) }}"
                    placeholder="tgl/bulan/tahun"
                    autocomplete="off"
                >

                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- STATUS --}}
            <div class="mb-3 form-check">
                <input
                    type="checkbox"
                    name="status"
                    id="status"
                    class="form-check-input"
                    value="1"
                    {{ old('status', $berita->status) ? 'checked' : '' }}
                >
                <label for="status" class="form-check-label">
                    Publikasikan berita ini (Published)
                </label>
            </div>

            {{-- FEATURED --}}
            <div class="mb-3 form-check">
                <input
                    type="checkbox"
                    name="featured"
                    id="featured"
                    class="form-check-input"
                    value="1"
                    {{ old('featured', $berita->featured) ? 'checked' : '' }}
                >
                <label for="featured" class="form-check-label">
                    Jadikan berita unggulan (Featured)
                </label>
            </div>

            {{-- TOMBOL --}}
            <div class="d-flex gap-2 mt-4">
                <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">
                    Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </div>

        </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#tanggal", {
        dateFormat: "d/m/Y",
        allowInput: true,
    });
</script>
@endpush