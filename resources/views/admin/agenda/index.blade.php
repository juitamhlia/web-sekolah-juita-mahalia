@extends('layouts.admin')

@section('title', 'Kelola Agenda')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold">Kelola Agenda</h2>
        <p class="text-muted mb-0">Daftar agenda kegiatan sekolah</p>
    </div>

    <a href="{{ route('admin.agenda.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Agenda
    </a>
</div>

{{-- Pesan sukses --}}
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- Tabel Agenda --}}
<div class="card shadow-sm">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">
                    <tr>
                        <th width="5%">No</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Lokasi</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($agenda as $item)

                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
                            <strong>{{ $item->judul }}</strong>

                            @if($item->deskripsi)
                                <br>
                                <small class="text-muted">
                                    {{ Str::limit($item->deskripsi, 50) }}
                                </small>
                            @endif
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}
                        </td>

                        <td>
                            {{ $item->waktu }}
                        </td>

                        <td>
                            {{ $item->lokasi }}
                        </td>

                        <td>

                            {{-- Tombol Edit --}}
                            <a href="{{ route('admin.agenda.edit', $item->id) }}"
                               class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            {{-- Tombol Hapus --}}
                            <form action="{{ route('admin.agenda.destroy', $item->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus agenda ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>

                            </form>

                        </td>
                    </tr>

                    @empty

                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <i class="fas fa-calendar-times fa-2x text-muted mb-2"></i>
                            <br>
                            Belum ada data agenda.
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>
        </div>

    </div>
</div>

@endsection