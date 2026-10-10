@extends('layouts.app-public')

@section('title', 'Galeri')

@section('content')

@push('styles')
    @vite(['resources/css/galeri.css'])
@endpush


<!-- ======================= HERO (TIDAK DIUBAH) ======================= -->
<section class="gl-hero">
    <img src="{{ asset('images/smk.jpg') }}" alt="Galeri Kegiatan SMK Negeri 1 Cijati">
    <span class="gl-hero-eyebrow">Galeri Kegiatan</span>
    <p>Dokumentasi kegiatan, prestasi, dan momen berharga siswa SMK Negeri 1 Cijati.</p>
</section>

<!-- ======================= ISI GALERI ======================= -->
<section class="gl-section">
    <div class="gl-container">

        <!-- TOOLBAR: filter pills -->
        <div class="gl-toolbar">
            <div class="gl-filters" id="glFilters">
                <button class="gl-filter-btn active" data-filter="Semua">Semua</button>
                <button class="gl-filter-btn" data-filter="Akademik">Akademik</button>
                <button class="gl-filter-btn" data-filter="Prestasi">Prestasi</button>
                <button class="gl-filter-btn" data-filter="Kegiatan Rutin">Kegiatan Rutin</button>
            </div>
        </div>

        <!-- GRID -->
        <div class="gl-grid" id="glGrid">

            @forelse($galeri as $g)
                <div class="gl-card" data-kategori="{{ $g->kategori ?? 'Semua' }}">

                    <div class="gl-card-photo">
                        @if($g->gambar)
                            <img src="{{ asset('storage/' . $g->gambar) }}" alt="{{ $g->judul }}">

                            {{-- tombol zoom, muncul saat hover --}}
                            <button
                                type="button"
                                class="gl-zoom-btn"
                                data-img="{{ asset('storage/' . $g->gambar) }}"
                                data-title="{{ $g->judul }}"
                                data-kategori="{{ $g->kategori ?? '' }}"
                                aria-label="Perbesar foto {{ $g->judul }}"
                            >
                                <svg viewBox="0 0 24 24" fill="none" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="7"/>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                                    <line x1="11" y1="8" x2="11" y2="14"/>
                                    <line x1="8" y1="11" x2="14" y2="11"/>
                                </svg>
                            </button>
                        @else
                            <div style="position:absolute; inset:0; background:linear-gradient(135deg,#1e3a8a,#2f5fe0);"></div>
                        @endif

                        @if($g->kategori)
                            <span class="gl-card-tag">{{ $g->kategori }}</span>
                        @endif
                    </div>

                    <div class="gl-card-body">
                        <div class="gl-card-title">{{ $g->judul }}</div>
                    </div>
                </div>
            @empty
                <div class="gl-empty">
                    <i class="fas fa-images"></i>
                    Belum ada foto di galeri.
                </div>
            @endforelse

        </div>

    </div>
</section>

<!-- ======================= LIGHTBOX MODAL ======================= -->
<div class="gl-lightbox" id="glLightbox">
    <button type="button" class="gl-lightbox-close" id="glLightboxClose" aria-label="Tutup">
        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"/>
            <line x1="6" y1="6" x2="18" y2="18"/>
        </svg>
    </button>

    <div class="gl-lightbox-content">
        <img src="" alt="" id="glLightboxImg">
        <p class="gl-lightbox-title" id="glLightboxTitle"></p>
        <span class="gl-lightbox-tag" id="glLightboxTag" style="display:none;"></span>
    </div>
</div>


@push('scripts')
    @vite(['resources/js/galeri.js'])
@endpush

@endsection