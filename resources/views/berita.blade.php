@extends('layouts.app-public')

@section('title', 'Berita Sekolah - SMK Negeri 1 Cijati')

@section('content')

@push('styles')
    @vite(['resources/css/berita.css'])
@endpush


<!-- ======================= HERO ======================= -->
<section class="jd-hero">
    <img src="{{ asset('images/smk.jpg') }}" alt="Sejarah Sekolah">
    <div class="jd-hero-content">
        <span class="jd-hero-eyebrow">berita sekolah</span>
        <p>Informasi terbaru SMK Negeri 1 Cijati</p>
    </div>
</section>


<!-- ======================= GRID BERITA ======================= -->
<section class="py-5">
    <div class="container">

        <div class="row g-4">

            @forelse($berita as $b)
                <div class="col-md-4">
                    <div class="bg-white h-100 berita-page-card">

                        @if($b->gambar)
                            <div style="overflow:hidden;">
                                <img src="{{ asset('storage/' . $b->gambar) }}"
                                     class="w-100" style="height:210px; object-fit:cover;"
                                     alt="{{ $b->judul }}">
                            </div>
                        @endif

                        <div class="p-3">
                            <div class="berita-page-tanggal mb-2">
                                <i class="fas fa-calendar-alt me-1"></i>
                                {{ \Carbon\Carbon::parse($b->tanggal)->translatedFormat('d F Y') }}
                            </div>

                            <h5 class="fw-bold mb-2" style="font-size:1.05rem; line-height:1.4;">
                                {{ $b->judul }}
                            </h5>

                            <p class="small text-muted mb-3">
                                {{ Str::limit(strip_tags($b->isi), 100) }}
                            </p>

                            <a href="{{ route('berita.show', $b->id) }}" class="berita-page-link">
                                Baca selengkapnya →
                            </a>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted mb-0">Belum ada berita yang dipublikasikan.</p>
                </div>
            @endforelse

        </div>

    </div>
</section>

@endsection