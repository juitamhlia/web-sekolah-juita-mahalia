@extends('layouts.app-public')

@section('title', 'Agenda Sekolah - SMK Negeri 1 Cijati')

@section('content')

@push('styles')
    @vite(['resources/css/agenda.css'])
@endpush


<!-- ======================= HERO ======================= -->
<div class="jd-hero">
    <img src="{{ asset('images/smk.jpg') }}" alt="Agenda Sekolah">
    <div class="jd-hero-content">
        <span class="jd-hero-eyebrow">Agenda Sekolah</span>
        <p class="jd-hero-subtitle">Informasi kegiatan dan agenda SMKN 1 Cijati</p>
    </div>
</div>


{{-- ======================= GRID AGENDA (MODERN, senada Program Kebiasaan) ======================= --}}

<section class="ag-section py-5">
    <div class="container">

        <div class="ag-grid">

            @forelse($agenda as $a)
                <div class="ag-card">

                    <div class="ag-title">
                        {{ $a->judul }}
                    </div>

                    <div class="ag-meta">
                        <div class="ag-meta-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="ag-meta-text">
                            {{ \Carbon\Carbon::parse($a->tanggal)->locale('id')->translatedFormat('d F Y') }}
                        </div>
                    </div>

                    <div class="ag-meta">
                        <div class="ag-meta-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="ag-meta-text">
                            {{ \Carbon\Carbon::parse($a->waktu)->format('H:i') }} WIB
                        </div>
                    </div>

                    <div class="ag-meta mb-0">
                        <div class="ag-meta-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="ag-meta-text">
                            {{ $a->lokasi }}
                        </div>
                    </div>

                    @if($a->deskripsi)
                        <p class="ag-desc mb-0">
                            {{ $a->deskripsi }}
                        </p>
                    @endif

                </div>
            @empty
                <div class="text-center py-5" style="grid-column:1 / -1;">
                    <p class="text-muted mb-0">Belum ada agenda yang tersedia.</p>
                </div>
            @endforelse

        </div>

    </div>
</section>

@endsection