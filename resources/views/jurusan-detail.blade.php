@extends('layouts.app-public')

@section('title', $jurusan->nama . ' - SMK Negeri 1 Cijati')

@section('content')

@push('styles')
    @vite(['resources/css/jurusan-detail.css'])
@endpush


<!-- ======================= 1. HEADER DETAIL JURUSAN ======================= -->
<section class="jd-hero">
    <img src="{{ asset('images/smk.jpg') }}" alt="{{ $jurusan->nama }}">
    <div class="jd-hero-content">
        @if($jurusan->logo)
            <div class="jd-hero-badge">
                <img src="{{ asset('storage/' . $jurusan->logo) }}" alt="Logo {{ $jurusan->nama }}">
            </div>
        @endif
        <span class="jd-hero-eyebrow">{{ $jurusan->nama }}</span>
    </div>
</section>


<!-- ======================= 2. DESKRIPSI JURUSAN ======================= -->
<section class="jd-section" style="background:#fff;">
    <div class="container">
        <div class="jd-section-head">
            <span class="jd-section-eyebrow" style= "font-size:1.3rem;">Tentang Program</span>
            <p>Membangun kompetensi menuju dunia kerja</p>
        </div>

        <div class="jd-desc-card">
            @foreach(explode("\n", trim($jurusan->deskripsi)) as $paragraf)
                @if(trim($paragraf) !== '')
                    <p>{{ trim($paragraf) }}</p>
                @endif
            @endforeach
        </div>
    </div>
</section>

<!-- =======================  KEPALA JURUSAN ======================= -->
@if($jurusan->guru)
<section class="jd-section" style="background:#f8f9fc;">
    <div class="container">
        <div class="jd-section-head">
            <span class="jd-section-eyebrow">Penanggung Jawab Program</span>
            <p>Guru koordinator program</p>

        <div class="jd-kepala-card">
            <div class="jd-kepala-title">Kepala Konsentrasi Keahlian</div>

           <div class="jd-kepala-photo">
                @if($jurusan->guru->foto)
                    <img src="{{ asset('storage/' . $jurusan->guru->foto) }}" alt="{{ $jurusan->guru->nama }}">
                @else
                    <img src="{{ asset('images/kepala-rpl.jpg') }}" alt="{{ $jurusan->guru->nama }}">
                @endif
             </div>

            <div class="jd-kepala-nama">{{ $jurusan->guru->nama }}</div>

        </div>

    </div>

</section>

@endif

<!-- ======================= GURU PRODUKTIF ======================= -->
<section class="jd-section jd-guru-section">
    <div class="container">
        <div class="jd-section-head">
            <span class="jd-section-eyebrow">Tenaga Pengajar</span>
            <p>Didukung tenaga pengajar yang kompeten</p>
        </div>

        {{--
            Daftar guru produktif diatur MANUAL di sini per jurusan,
            berdasarkan potongan nama (tanpa gelar) yang ada di kolom
            `nama` tabel guru. Pencocokan pakai LIKE '%nama%' supaya
            tidak gagal gara-gara beda titik/spasi pada gelar.
            RPL = 1, APHP = 2, BDP = 3, TKR = 4
        --}}
        @php
            $namaGuruProduktif = match($jurusan->id) {
                1 => [ // RPL
                    'Didi Mei Somantri',
                    'Silvi Danu Respita',
                    'Bani Fudoly',
                    'Wahyudin',
                    'Sima Kristiana',
                ],
                2 => [ // APHP
                    'Budiana',
                    'Ende Iskandar',
                ],
                3 => [ // BDP / Pemasaran
                    'Eli Maryamah',
                    'Nanang Suryana',
                    'Setiawan, S.E',
                    'Dini Andriani',
                    'Kamalia',
                ],
                4 => [ // TKR / Otomotif
                    'Andri Muhoir',
                    'Jajang Ridwan',
                ],
                default => [],
            };

            $guruProduktif = collect($namaGuruProduktif)
                ->map(function ($nama) {
                    return \App\Models\Guru::where('nama', 'like', '%' . trim($nama) . '%')->first();
                })
                ->filter();
        @endphp

        <div class="jd-guru-grid">
            @foreach($guruProduktif as $gp)
                <div class="jd-guru-card">
                    <div class="jd-guru-photo">
                        @if($gp->foto)
                            <img src="{{ asset('storage/' . $gp->foto) }}" alt="{{ $gp->nama }}">
                        @else
                            <i class="fas fa-user"></i>
                        @endif
                    </div>
                    <div class="jd-guru-nama">{{ $gp->nama }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ======================= 3. KOMPETENSI YANG DIPELAJARI ======================= -->
<section class="jd-section" style="background:#f8f9fc;">
    <div class="container">
        <div class="jd-section-head">
            <span class="jd-section-eyebrow">Kompetensi yang Dipelajari</span>
            <p>Keterampilan utama yang dibangun sepanjang program {{ $jurusan->nama }}</p>
        </div>

        @php
            $kompetensi = match($jurusan->id) {
                1 => [ // RPL - Rekayasa Perangkat Lunak
                    ['icon' => 'fa-code', 'judul' => 'Pemrograman', 'desc' => 'Menulis dan menguji kode program secara terstruktur dan efisien.'],
                    ['icon' => 'fa-database', 'judul' => 'Basis Data', 'desc' => 'Merancang dan mengelola basis data untuk kebutuhan aplikasi.'],
                    ['icon' => 'fa-diagram-project', 'judul' => 'Rekayasa Sistem', 'desc' => 'Merancang alur dan struktur sistem sesuai kebutuhan pengguna.'],
                    ['icon' => 'fa-mobile-screen-button', 'judul' => 'Pengembangan Aplikasi', 'desc' => 'Membangun aplikasi berbasis web maupun mobile.'],
                ],
                2 => [ // APHP - Agribisnis Pengolahan Hasil Pertanian
                    ['icon' => 'fa-seedling', 'judul' => 'Pengolahan Hasil Pertanian', 'desc' => 'Mengolah bahan pertanian menjadi produk pangan bernilai jual.'],
                    ['icon' => 'fa-flask', 'judul' => 'Uji Mutu Produk', 'desc' => 'Menguji kualitas dan keamanan produk hasil olahan.'],
                    ['icon' => 'fa-box', 'judul' => 'Pengemasan Produk', 'desc' => 'Mengemas produk agar aman, menarik, dan tahan lama.'],
                    ['icon' => 'fa-industry', 'judul' => 'Manajemen Produksi', 'desc' => 'Mengelola proses produksi pangan secara efisien.'],
                ],
                3 => [ // BDP - Bisnis Daring dan Pemasaran
                    ['icon' => 'fa-cart-shopping', 'judul' => 'Pemasaran Digital', 'desc' => 'Memasarkan produk dan jasa melalui platform digital.'],
                    ['icon' => 'fa-chart-line', 'judul' => 'Analisis Pasar', 'desc' => 'Menganalisis peluang dan tren pasar untuk strategi bisnis.'],
                    ['icon' => 'fa-handshake', 'judul' => 'Komunikasi Bisnis', 'desc' => 'Melakukan negosiasi dan pelayanan pelanggan secara profesional.'],
                    ['icon' => 'fa-file-invoice-dollar', 'judul' => 'Administrasi Transaksi', 'desc' => 'Mengelola pencatatan dan administrasi penjualan.'],
                ],
                4 => [ // TKR - Teknik Kendaraan Ringan
                    ['icon' => 'fa-car', 'judul' => 'Perawatan Kendaraan', 'desc' => 'Melakukan perawatan berkala pada kendaraan ringan.'],
                    ['icon' => 'fa-wrench', 'judul' => 'Perbaikan Mesin', 'desc' => 'Mendiagnosis dan memperbaiki kerusakan mesin kendaraan.'],
                    ['icon' => 'fa-car-battery', 'judul' => 'Kelistrikan Otomotif', 'desc' => 'Menangani sistem kelistrikan dan komponen elektronik kendaraan.'],
                    ['icon' => 'fa-gauge', 'judul' => 'Sistem Kemudi & Rem', 'desc' => 'Memeriksa dan memperbaiki sistem kemudi, rem, dan suspensi.'],
                ],
                default => [
                    ['icon' => 'fa-graduation-cap', 'judul' => 'Kompetensi Umum', 'desc' => 'Kompetensi dasar sesuai bidang keahlian.'],
                ],
            };
        @endphp

        <div class="jd-kompetensi-grid">
            @foreach($kompetensi as $k)
                <div class="jd-kompetensi-card">
                    <div class="jd-kompetensi-icon">
                        <i class="fas {{ $k['icon'] }}"></i>
                    </div>
                    <h5>{{ $k['judul'] }}</h5>
                    <p>{{ $k['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection