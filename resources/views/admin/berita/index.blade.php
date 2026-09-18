@extends('layouts.admin')

@section('title', 'Data Berita')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Data Berita</h2>
        <p class="text-muted mb-0">
            Kelola berita dan informasi sekolah
        </p>
    </div>

    <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Berita
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
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Featured</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($berita as $item)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>
                                <strong>{{ $item->judul }}</strong>

                                <br>

                                <small class="text-muted">
                                    {{ $item->slug }}
                                </small>
                            </td>

                            <td>
                                <span class="badge bg-info">
                                    {{ $item->kategori->nama ?? 'Umum' }}
                                </span>
                            </td>

                            <td>
                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}
                            </td>

                            <td>
                                @if($item->status)
                                    <span class="badge bg-success">
                                        Published
                                    </span>
                                @else
                                    <span class="badge bg-secondary">
                                        Draft
                                    </span>
                                @endif
                            </td>

                            <td>
                                @if($item->featured)
                                    <span class="badge bg-warning text-dark">
                                        Ya
                                    </span>
                                @else
                                    <span class="badge bg-light text-dark">
                                        Tidak
                                    </span>
                                @endif
                            </td>

                            <td>

                                <a href="{{ route('admin.berita.edit', $item->id) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </a>

                                <form action="{{ route('admin.berita.destroy', $item->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus berita ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                        Hapus
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="text-center py-4">

                                <i class="fas fa-newspaper fa-2x text-muted mb-2"></i>

                                <p class="mb-0 text-muted">
                                    Belum ada data berita.
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