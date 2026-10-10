@extends('layouts.app-public')

@section('title', $ekstrakurikuler->nama . ' - SMK Negeri 1 Cijati')

@section('content')

@push('styles')
    @vite(['resources/css/ekstrakurikuler-detail.css'])
@endpush


<section class="ed-section">
    <div class="ed-container">

        <div class="ed-grid">

            {{-- ===== KOLOM KIRI: FOTO ===== --}}
            <div>
                <div class="ed-main-photo" id="edMainPhoto">
                    @if($ekstrakurikuler->gambar)
                        <img src="{{ asset('storage/' . $ekstrakurikuler->gambar) }}" alt="{{ $ekstrakurikuler->nama }}" id="edMainPhotoImg">
                    @else
                        <div style="width:100%; height:100%; background:linear-gradient(135deg,#1e3a8a,#2f5fe0);"></div>
                    @endif
                </div>

                {{--
                    GALERI THUMBNAIL: dinamis dari database
                    (gambar utama + foto2, foto3, foto4). Kalau salah satu foto
                    belum diisi di admin, thumbnail itu otomatis di-skip.
                --}}
                @php
                    $semuaFoto = collect([
                        $ekstrakurikuler->gambar,
                        $ekstrakurikuler->foto2,
                        $ekstrakurikuler->foto3,
                        $ekstrakurikuler->foto4,
                    ])->filter();
                @endphp

                @if($semuaFoto->count() > 1)
                <div class="ed-thumb-row">
                    <div class="ed-thumb-nav" data-thumb-dir="-1">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
                    </div>

                    <div class="ed-thumb-track" id="edThumbTrack">
                        @foreach($semuaFoto as $i => $foto)
                            <div class="ed-thumb {{ $i === 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $foto) }}" alt="{{ $ekstrakurikuler->nama }} {{ $i + 1 }}">
                            </div>
                        @endforeach
                    </div>

                    <div class="ed-thumb-nav" data-thumb-dir="1">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>
                    </div>
                </div>
                @endif
            </div>

            {{-- ===== KOLOM KANAN: KONTEN ===== --}}
            <div>
                <h1 class="ed-title">{{ $ekstrakurikuler->nama }}</h1>
                <p class="ed-desc">
                    {{ $ekstrakurikuler->deskripsi ?? 'Deskripsi kegiatan belum tersedia.' }}
                </p>

                {{--
                    FOKUS KEGIATAN: sekarang beda-beda per ekstrakurikuler,
                    dicocokkan lewat $ekstrakurikuler->id.
                    ID: 1 Bahasa Jepang, 2 Cinematik, 3 Futsal Ball, 4 Volly Ball,
                        5 Karawitan, 6 Rohis, 7 Marching Band, 8 PMR,
                        9 Pramuka, 10 Paskibra
                    Kalau ada ekskul baru ditambahkan di admin, tambahkan
                    case id barunya di sini juga (fallback ke 'default' kalau lupa).
                --}}
                @php
                    $iconPaths = [
                        'star' => '<path d="M12 2l3 6.5 7 1-5 5 1.2 7-6.2-3.4L5.8 21.5 7 14.5l-5-5 7-1L12 2z"/>',
                        'people' => '<path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>',
                        'target' => '<circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1"/>',
                        'heart' => '<path d="M20.8 8.6c0 4.4-8.8 10.4-8.8 10.4S3.2 13 3.2 8.6a4.8 4.8 0 019-2.2 4.8 4.8 0 018.6 2.2z"/>',
                        'book' => '<path d="M4 19.5A2.5 2.5 0 016.5 17H20"/><path d="M4 4.5A2.5 2.5 0 016.5 2H20v18H6.5A2.5 2.5 0 004 17.5v-13z"/>',
                        'music' => '<path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/>',
                        'shield' => '<path d="M12 2l8 4v6c0 5-3.5 8.5-8 10-4.5-1.5-8-5-8-10V6l8-4z"/>',
                        'compass' => '<circle cx="12" cy="12" r="9"/><path d="M16 8l-2 6-6 2 2-6 6-2z"/>',
                    ];

                    $fokusKegiatan = match($ekstrakurikuler->id) {
                        1 => [ // Bahasa Jepang
                            ['icon' => 'book', 'judul' => 'Kemampuan Bahasa', 'desc' => 'Melatih kemampuan membaca, menulis, dan berbicara bahasa Jepang.'],
                            ['icon' => 'heart', 'judul' => 'Wawasan Budaya', 'desc' => 'Mengenal budaya dan kebiasaan masyarakat Jepang.'],
                            ['icon' => 'star', 'judul' => 'Percaya Diri', 'desc' => 'Membangun rasa percaya diri berkomunikasi bahasa asing.'],
                        ],
                        2 => [ // Cinematik
                            ['icon' => 'star', 'judul' => 'Kreativitas', 'desc' => 'Mengembangkan ide dan kreativitas dalam produksi video.'],
                            ['icon' => 'people', 'judul' => 'Kerja Sama Tim', 'desc' => 'Berkolaborasi dalam proses produksi film dan video.'],
                            ['icon' => 'book', 'judul' => 'Kemampuan Bercerita', 'desc' => 'Melatih penyampaian pesan lewat visual dan naskah.'],
                        ],
                        3 => [ // Futsal Ball
                            ['icon' => 'people', 'judul' => 'Kerja Sama Tim', 'desc' => 'Melatih kekompakan dan strategi bermain bersama tim.'],
                            ['icon' => 'shield', 'judul' => 'Sportivitas', 'desc' => 'Menjunjung tinggi sikap sportif dan fair play.'],
                            ['icon' => 'target', 'judul' => 'Stamina & Ketangkasan', 'desc' => 'Meningkatkan kebugaran fisik dan ketangkasan.'],
                        ],
                        4 => [ // Volly Ball
                            ['icon' => 'people', 'judul' => 'Kerja Sama Tim', 'desc' => 'Melatih kekompakan dan komunikasi antar pemain.'],
                            ['icon' => 'shield', 'judul' => 'Sportivitas', 'desc' => 'Menjunjung tinggi sikap sportif dan fair play.'],
                            ['icon' => 'target', 'judul' => 'Ketangkasan', 'desc' => 'Meningkatkan refleks dan ketangkasan bermain.'],
                        ],
                        5 => [ // Karawitan
                            ['icon' => 'music', 'judul' => 'Pelestarian Budaya', 'desc' => 'Melestarikan seni musik tradisional daerah.'],
                            ['icon' => 'people', 'judul' => 'Kekompakan', 'desc' => 'Melatih keselarasan bermain gamelan bersama.'],
                            ['icon' => 'heart', 'judul' => 'Kepekaan Seni', 'desc' => 'Mengasah rasa seni dan apresiasi budaya.'],
                        ],
                        6 => [ // Rohis
                            ['icon' => 'heart', 'judul' => 'Keimanan', 'desc' => 'Memperkuat keimanan dan ketakwaan siswa.'],
                            ['icon' => 'star', 'judul' => 'Akhlak Mulia', 'desc' => 'Membentuk akhlak dan karakter yang baik.'],
                            ['icon' => 'people', 'judul' => 'Kepedulian Sosial', 'desc' => 'Menumbuhkan kepedulian terhadap sesama.'],
                        ],
                        7 => [ // Marching Band
                            ['icon' => 'people', 'judul' => 'Kekompakan', 'desc' => 'Melatih kekompakan formasi dan barisan.'],
                            ['icon' => 'shield', 'judul' => 'Disiplin', 'desc' => 'Membentuk sikap disiplin dan tanggung jawab.'],
                            ['icon' => 'music', 'judul' => 'Ketepatan Irama', 'desc' => 'Mengasah ketepatan irama dan harmoni musik.'],
                        ],
                        8 => [ // PMR
                            ['icon' => 'heart', 'judul' => 'Kepedulian Sosial', 'desc' => 'Menumbuhkan kepedulian dan sikap tolong-menolong.'],
                            ['icon' => 'shield', 'judul' => 'Kesiapsiagaan', 'desc' => 'Melatih kesiapsiagaan dalam pertolongan pertama.'],
                            ['icon' => 'people', 'judul' => 'Kerja Sama Tim', 'desc' => 'Bekerja sama saat penanganan situasi darurat.'],
                        ],
                        9 => [ // Pramuka
                            ['icon' => 'compass', 'judul' => 'Kemandirian', 'desc' => 'Melatih kemandirian dan keterampilan hidup.'],
                            ['icon' => 'shield', 'judul' => 'Kedisiplinan', 'desc' => 'Membentuk sikap disiplin dan tanggung jawab.'],
                            ['icon' => 'star', 'judul' => 'Kepemimpinan', 'desc' => 'Melatih jiwa kepemimpinan dan percaya diri.'],
                        ],
                        10 => [ // Paskibra
                            ['icon' => 'star', 'judul' => 'Disiplin', 'desc' => 'Membentuk sikap disiplin dan tanggung jawab.'],
                            ['icon' => 'people', 'judul' => 'Kekompakan', 'desc' => 'Meningkatkan kerja sama tim dan solidaritas.'],
                            ['icon' => 'star', 'judul' => 'Kepemimpinan', 'desc' => 'Melatih jiwa kepemimpinan dan percaya diri.'],
                        ],
                        default => [
                            ['icon' => 'star', 'judul' => 'Disiplin', 'desc' => 'Membentuk sikap disiplin dan tanggung jawab.'],
                            ['icon' => 'people', 'judul' => 'Kekompakan', 'desc' => 'Meningkatkan kerja sama tim dan solidaritas.'],
                            ['icon' => 'star', 'judul' => 'Kepemimpinan', 'desc' => 'Melatih jiwa kepemimpinan dan percaya diri.'],
                        ],
                    };
                @endphp

                <div class="ed-fokus-card">
                    <h3>Fokus Kegiatan</h3>
                    <p>Nilai-nilai utama yang dikembangkan dalam {{ $ekstrakurikuler->nama }}.</p>

                    <div class="ed-fokus-grid">
                        @foreach($fokusKegiatan as $f)
                            <div class="ed-fokus-item">
                                <div class="ed-fokus-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        {!! $iconPaths[$f['icon']] ?? $iconPaths['star'] !!}
                                    </svg>
                                </div>
                                <h5>{{ $f['judul'] }}</h5>
                                <p>{{ $f['desc'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

        {{-- ===== INFO CARD HORIZONTAL ===== --}}
        <div class="ed-info-card">

            <div class="ed-info-item">
                <div class="ed-info-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                </div>
                <div>
                    <div class="ed-info-label">Jadwal Latihan</div>
                    <div class="ed-info-value">{{ $ekstrakurikuler->jadwal ?? '-' }}</div>
                </div>
            </div>

            {{-- "Waktu" belum ada kolom terpisah di database, masih placeholder manual --}}
            <div class="ed-info-item">
                <div class="ed-info-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/></svg>
                </div>
                <div>
                    <div class="ed-info-label">Waktu</div>
                    <div class="ed-info-value">15.30 - 17.30 WIB</div>
                </div>
            </div>

            <div class="ed-info-item">
                <div class="ed-info-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </div>
                <div>
                    <div class="ed-info-label">Pembina</div>
                    <div class="ed-info-value">{{ $ekstrakurikuler->pembina ?? '-' }}</div>
                </div>
            </div>

            {{-- "Lokasi" belum ada kolom terpisah di database, masih placeholder manual --}}
            <div class="ed-info-item">
                <div class="ed-info-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21s7-6.1 7-11.5A7 7 0 105 9.5C5 14.9 12 21 12 21z"/><circle cx="12" cy="9.5" r="2.4"/></svg>
                </div>
                <div>
                    <div class="ed-info-label">Lokasi</div>
                    <div class="ed-info-value">Lapangan Sekolah</div>
                </div>
            </div>

        </div>

    </div>
</section>


@push('scripts')
    @vite(['resources/js/ekstrakurikuler-detail.js'])
@endpush

@endsection