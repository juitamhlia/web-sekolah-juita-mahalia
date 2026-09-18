@extends('layouts.admin')

@section('title', 'Edit Agenda')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Edit Agenda</h2>
        <p class="text-muted mb-0">Perbarui data agenda</p>
    </div>

    <a href="{{ route('admin.agenda.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('admin.agenda.update', $agenda->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="judul" class="form-label">Judul Agenda</label>
                <input
                    type="text"
                    name="judul"
                    id="judul"
                    class="form-control @error('judul') is-invalid @enderror"
                    value="{{ old('judul', $agenda->judul) }}"
                    placeholder="Masukkan judul agenda"
                    required
                >
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea
                    name="deskripsi"
                    id="deskripsi"
                    rows="3"
                    class="form-control @error('deskripsi') is-invalid @enderror"
                    placeholder="Masukkan deskripsi agenda"
                >{{ old('deskripsi', $agenda->deskripsi) }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input
                    type="text"
                    name="tanggal"
                    id="tanggal"
                    class="form-control @error('tanggal') is-invalid @enderror"
                    value="{{ old('tanggal', \Carbon\Carbon::parse($agenda->tanggal)->format('d/m/Y')) }}"
                    placeholder="dd/mm/yyyy"
                    required
                >
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="waktu" class="form-label">Waktu</label>
                <input
                    type="time"
                    name="waktu"
                    id="waktu"
                    class="form-control @error('waktu') is-invalid @enderror"
                    value="{{ old('waktu', $agenda->waktu) }}"
                    required
                >
                @error('waktu')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <input
                    type="text"
                    name="lokasi"
                    id="lokasi"
                    class="form-control @error('lokasi') is-invalid @enderror"
                    value="{{ old('lokasi', $agenda->lokasi) }}"
                    placeholder="Masukkan lokasi agenda"
                    required
                >
                @error('lokasi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-end">
                <a href="{{ route('admin.agenda.index') }}" class="btn btn-secondary">
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