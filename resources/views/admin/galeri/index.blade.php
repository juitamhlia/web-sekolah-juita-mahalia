@extends('layouts.admin')

@section('title', 'Data Galeri')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Data Galeri</h2>
        <p class="text-muted mb-0">Kelola foto kegiatan sekolah</p>
    </div>

    <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Galeri
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
                        <th width="70">No</th>
                        <th width="110">Foto</th>
                        <th>Judul</th>
                        <th width="140">Kategori</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($galeri as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                @if($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}"
                                         alt="{{ $item->judul }}"
                                         style="width:80px; height:56px; object-fit:cover; border-radius:8px;">
                                @else
                                    <div style="width:80px; height:56px; background:#e5e7eb; border-radius:8px; display:flex; align-items:center; justify-content:center; color:#9ca3af;">
                                        <i class="fas fa-image"></i>
                                    </div>
                                @endif
                            </td>

                            <td>
                                <strong>{{ $item->judul }}</strong>
                            </td>

                            <td>
                                @if($item->kategori)
                                    <span class="badge bg-primary">{{ $item->kategori }}</span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('admin.galeri.edit', $item->id) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <form action="{{ route('admin.galeri.destroy', $item->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus foto ini?')">

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
                            <td colspan="5" class="text-center py-4">
                                <i class="fas fa-images fa-2x text-muted mb-2"></i>

                                <p class="mb-0 text-muted">
                                    Belum ada data galeri.
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