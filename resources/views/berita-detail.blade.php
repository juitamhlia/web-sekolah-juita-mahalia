@extends('layouts.app-public')

@section('title', $berita->judul . ' - SMK Negeri 1 Cijati')

@section('content')

@push('styles')
    @vite(['resources/css/berita-detail.css'])
@endpush


<!-- ======================= HERO ======================= -->
<section class="jd-hero">
    <img src="{{ asset('images/smk.jpg') }}" alt="Berita Sekolah">
    <div class="jd-hero-content">
        <span class="jd-hero-eyebrow">berita sekolah</span>
        <p>
            <a href="{{ route('home') }}" style="color:rgba(255,255,255,.85); text-decoration:none;">Informasi terbaru SMKN 1 Cijati</a>
        </p>
    </div>
</section>


<!-- ======================= ISI + SIDEBAR ======================= -->
<section class="py-5" style="background:#f8f9fc;">
    <div class="container">
        <div class="row g-4">

            <!-- ISI BERITA -->
            <div class="col-lg-8">

                <div class="bg-white detail-berita-card p-4 p-md-5">

                    <h1 class="fw-bold text-center mb-3" style="color:#1f2937; font-size:1.7rem; line-height:1.4;">
                        {{ $berita->judul }}
                    </h1>

                    <div class="d-flex align-items-center justify-content-center gap-3 mb-4 text-muted" style="font-size:.88rem;">
                        <span>
                            <i class="fas fa-calendar-alt me-1"></i>
                            {{ \Carbon\Carbon::parse($berita->tanggal)->locale('id')->translatedFormat('d F Y') }}
                        </span>
                    </div>

                    @if($berita->gambar)
                        <div class="detail-berita-foto mb-4">
                            <img src="{{ asset('storage/' . $berita->gambar) }}"
                                 class="w-100" style="max-height:420px; object-fit:cover;"
                                 alt="{{ $berita->judul }}">
                        </div>
                    @endif

                    @if($berita->kategori)
                        <div class="text-center mb-4">
                            <span class="px-3 py-1" style="background:#e7f1ff; color:#2563eb; border-radius:20px; font-size:.8rem; font-weight:600;">
                                {{ $berita->kategori->nama }}
                            </span>
                        </div>
                    @endif

                    <div style="line-height: 1.9; color:#374151; font-size:1rem;">
                        {!! nl2br(e($berita->isi)) !!}
                    </div>

                </div>

                <div class="mt-4 text-center">
                    <a href="{{ route('berita') }}" class="fw-semibold text-decoration-none" style="color:#228be6;">
                        ← Kembali ke Semua Berita
                    </a>
                </div>

            </div>


            <!-- SIDEBAR BERITA TERBARU -->
            <div class="col-lg-4">

                <div class="bg-white sidebar-berita-card">

                    <div class="p-3" style="border-bottom: 1px solid #f1f3f5;">
                        <h5 class="fw-bold mb-0" style="color:#1f2937;">Berita Terbaru</h5>
                    </div>

                    @forelse($beritaTerbaru as $bt)
                        <a href="{{ route('berita.show', $bt->id) }}" class="sidebar-berita-item">

                            @if($bt->gambar)
                                <img src="{{ asset('storage/' . $bt->gambar) }}" alt="{{ $bt->judul }}">
                            @endif

                            <div>
                                <div class="sidebar-berita-judul">
                                    {{ Str::limit($bt->judul, 60) }}
                                </div>
                                <div class="sidebar-berita-tanggal">
                                    <i class="fas fa-calendar-alt me-1"></i>
                                    {{ \Carbon\Carbon::parse($bt->tanggal)->locale('id')->translatedFormat('d F Y') }}
                                </div>
                            </div>

                        </a>
                    @empty
                        <p class="text-muted small p-3 mb-0">Belum ada berita lain.</p>
                    @endforelse

                </div>

            </div>

        </div>
    </div>
</section>

@endsection