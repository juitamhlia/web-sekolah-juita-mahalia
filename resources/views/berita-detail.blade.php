@extends('layouts.app-public')

@section('title', $berita->judul . ' - SMK Negeri 1 Cijati')

@section('content')

<style>
    @keyframes fadeSlideUp {
        from { opacity: 0; transform: translateY(24px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeSlideRight {
        from { opacity: 0; transform: translateX(20px); }
        to { opacity: 1; transform: translateX(0); }
    }

    /* ===== HERO (disamakan dengan halaman daftar berita) ===== */
    .jd-hero {
        position: relative;
        height: 400px;
        overflow: hidden;
    }
    .jd-hero img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .jd-hero::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(10,20,40,.55) 0%, rgba(10,20,40,.35) 45%, rgba(10,20,40,.75) 100%);
    }
    .jd-hero-content {
        position: absolute;
        inset: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 0 20px;
        z-index: 2;
    }
    .jd-hero-content h1 {
        color: #fff;
        font-weight: 800;
        font-size: clamp(1.3rem, 2.4vw, 1.8rem);
        letter-spacing: -0.01em;
        margin-bottom: 10px;
        animation: fadeSlideUp .6s ease both .05s;
    }
    .jd-hero-content p {
        color: rgba(255,255,255,.85);
        font-size: .95rem;
        margin: 0;
        animation: fadeSlideUp .6s ease both .1s;
    }
    .jd-hero-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 1rem;
        font-weight: 700;
        letter-spacing: .08em;
        text-transform: uppercase;
        color: #eaf2ff;
        background: rgba(255,255,255,.12);
        border: 1px solid rgba(255,255,255,.25);
        padding: 6px 16px;
        border-radius: 999px;
        backdrop-filter: blur(4px);
        margin-bottom: 16px;
        animation: fadeSlideUp .6s ease both .1s;
    }

    .detail-berita-card {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 35px -10px rgba(0,0,0,.10);
        animation: fadeSlideUp 0.6s ease both;
    }

    .detail-berita-foto {
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 25px -8px rgba(0,0,0,.12);
    }

    .sidebar-berita-card {
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 25px -8px rgba(0,0,0,.08);
        animation: fadeSlideRight 0.6s ease both;
    }

    .sidebar-berita-item {
        display: flex;
        gap: 12px;
        padding: 14px;
        text-decoration: none;
        transition: background 0.25s ease;
        border-bottom: 1px solid #f1f3f5;
    }
    .sidebar-berita-item:last-child {
        border-bottom: none;
    }
    .sidebar-berita-item:hover {
        background: #f8f9fc;
    }
    .sidebar-berita-item img {
        width: 70px;
        height: 60px;
        object-fit: cover;
        border-radius: 10px;
        flex-shrink: 0;
        transition: transform 0.3s ease;
    }
    .sidebar-berita-item:hover img {
        transform: scale(1.06);
    }
    .sidebar-berita-judul {
        color: #1f2937;
        font-weight: 600;
        font-size: .88rem;
        line-height: 1.4;
    }
    .sidebar-berita-item:hover .sidebar-berita-judul {
        color: #228be6;
    }
    .sidebar-berita-tanggal {
        color: #228be6;
        font-size: .75rem;
        font-weight: 600;
        margin-top: 4px;
    }
</style>


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