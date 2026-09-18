@extends('layouts.admin')

@section('title', 'Data Ekstrakurikuler')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Data Ekstrakurikuler</h2>
        <p class="text-muted mb-0">
            Kelola kegiatan ekstrakurikuler sekolah
        </p>
    </div>

    <a href="{{ route('admin.ekstrakurikuler.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Ekstrakurikuler
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        <i class="fas fa-check-circle me-2"></i>
        {{ session('success') }}
    </div>
@endif

<div class="card shadow-sm">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">
                    <tr>
                        <th width="60">No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Pembina</th>
                        <th>Jadwal</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($ekstrakurikuler as $item)

                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                <strong>{{ $item->nama }}</strong>
                            </td>

                            <td>
                                {{ Str::limit($item->deskripsi ?? '-', 60) }}
                            </td>

                            <td>
                                {{ $item->pembina ?? '-' }}
                            </td>

                            <td>
                                {{ $item->jadwal ?? '-' }}
                            </td>

                            <td>

                                <a href="{{ route('admin.ekstrakurikuler.edit', $item->id) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </a>

                                <form action="{{ route('admin.ekstrakurikuler.destroy', $item->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus ekstrakurikuler ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                        Hapus
                                    </button>

                                </form>

                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center py-4">

                                <i class="fas fa-futbol fa-2x text-muted mb-2"></i>

                                <p class="mb-0 text-muted">
                                    Belum ada data ekstrakurikuler.
                                </p>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>
        </div>

    </div>
</div>

@endsection