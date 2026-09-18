@extends('layouts.admin')

@section('title', 'Tambah Agenda')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold">Tambah Agenda</h2>
        <p class="text-muted mb-0">Tambahkan agenda kegiatan sekolah</p>
    </div>

    <a href="{{ route('admin.agenda.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('admin.agenda.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Judul Agenda</label>
                <input type="text"
                       name="judul"
                       class="form-control"
                       value="{{ old('judul') }}"
                       placeholder="Contoh: Upacara Hari Senin"
                       required>

                @error('judul')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi"
                          class="form-control"
                          rows="4"
                          placeholder="Deskripsi kegiatan...">{{ old('deskripsi') }}</textarea>

                @error('deskripsi')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="text"
                           name="tanggal"
                           id="tanggal"
                           class="form-control"
                           value="{{ old('tanggal') }}"
                           placeholder="tgl/bulan/tahun"
                           autocomplete="off"
                           required>

                    @error('tanggal')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Waktu</label>
                    <input type="time"
                           name="waktu"
                           class="form-control"
                           value="{{ old('waktu') }}"
                           required>

                    @error('waktu')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </div>

            <div class="mb-3">
                <label class="form-label">Lokasi</label>
                <input type="text"
                       name="lokasi"
                       class="form-control"
                       value="{{ old('lokasi') }}"
                       placeholder="Contoh: Lapangan Sekolah"
                       required>

                @error('lokasi')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <hr>

            <div class="d-flex justify-content-end gap-2">

                <a href="{{ route('admin.agenda.index') }}"
                   class="btn btn-secondary">
                    Batal
                </a>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Agenda
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