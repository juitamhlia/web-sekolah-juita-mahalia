@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Jumlah Siswa</h2>

    <form action="{{ route('admin.siswa.update', $siswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah Siswa</label>
            <input type="number" name="jumlah" id="jumlah"
                   class="form-control"
                   value="{{ old('jumlah', $siswa->jumlah) }}"
                   min="0" required>
            @error('jumlah')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection