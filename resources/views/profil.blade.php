@extends('layouts.app-public')

@section('title', 'Profil Sekolah - SMK Negeri 1 Cijati')

@section('content')

@push('styles')
    @vite(['resources/css/profil.css'])
@endpush


{{-- ======================= TENTANG SEKOLAH ======================= --}}


<section class="ts2-section">
  <div class="ts2-wrap">

    <div class="ts2-grid">

      <div class="ts2-photo">
        @if($profil->foto ?? false)
          <img src="{{ asset('storage/'.$profil->foto) }}"
               alt="Gedung {{ $profil->nama_sekolah ?? 'SMKN 1 Cijati' }}">
        @else
          <img src="{{ asset('images/gedung-sekolah.jpg') }}"
               alt="Gedung SMKN 1 Cijati">
        @endif

        <div class="ts2-photo-cut"></div>
        <div class="ts2-photo-dots"></div>
      </div>

      <div>

        <h2 class="ts2-title-main">
          {{ strtoupper($profil->nama_sekolah ?? 'SMKN 1 Cijati') }}
        </h2>

        <p class="ts2-desc">
          {{ $profil->deskripsi ?? 'SMK Negeri 1 Cijati merupakan sekolah menengah kejuruan yang berkomitmen mencetak lulusan kompeten, berkarakter, dan siap bersaing di dunia kerja maupun dunia usaha melalui pembelajaran berbasis praktik dan kompetensi keahlian.' }}
        </p>

        <div class="ts2-divider"></div>

        <div class="ts2-info-grid">

          <div class="ts2-info-item">
            <div class="ts2-info-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-6h6v6"/>
              </svg>
            </div>

            <div>
              <div class="ts2-info-label">Nama Sekolah</div>
              <div class="ts2-info-value">
                {{ $profil->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}
              </div>
            </div>
          </div>

          <div class="ts2-info-item">
            <div class="ts2-info-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M9 12l2 2 4-4"/>
                <circle cx="12" cy="12" r="9"/>
              </svg>
            </div>

            <div>
              <div class="ts2-info-label">Status</div>
              <div class="ts2-info-value">
                {{ $profil->status ?? 'Negeri' }}
              </div>
            </div>
          </div>

          <div class="ts2-info-item">
            <div class="ts2-info-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="4" width="18" height="17" rx="2"/>
                <path d="M3 9h18M8 2v4M16 2v4"/>
              </svg>
            </div>

            <div>
              <div class="ts2-info-label">Tahun Berdiri</div>
              <div class="ts2-info-value">
                {{ $profil->tahun_berdiri ?? '-' }}
              </div>
            </div>
          </div>

          <div class="ts2-info-item ts2-wide">
            <div class="ts2-info-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 21s7-6.1 7-11.5A7 7 0 105 9.5C5 14.9 12 21 12 21z"/>
                <circle cx="12" cy="9.5" r="2.4"/>
              </svg>
            </div>

            <div>
              <div class="ts2-info-label">Alamat</div>
              <div class="ts2-info-value">
                {{ $profil->alamat ?? '-' }}
              </div>
            </div>
          </div>

          <div class="ts2-info-item">
            <div class="ts2-info-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M8 21h8M12 17v4M7 4h10v4a5 5 0 01-10 0V4z"/>
                <path d="M7 5H4a1 1 0 00-1 1c0 2.5 1.8 4.5 4 5M17 5h3a1 1 0 011 1c0 2.5-1.8 4.5-4 5"/>
              </svg>
            </div>

            <div>
              <div class="ts2-info-label">Akreditasi</div>
              <div class="ts2-info-value">
                {{ $profil->akreditasi ?? 'A' }}
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

{{-- ======================= TABEL INFORMASI PROFIL SEKOLAH ======================= --}}

<section style="padding:60px 0; background:#fff;">
  <div style="max-width:1120px; margin:0 auto; padding:0 28px; text-align:center;">

    <h2 class="sb-title">Tabel Informasi Profil Sekolah</h2>
    <div class="sb-underline" style="background:#2B6FEA;"></div>

    <div class="table-responsive" style="text-align:left;">
      <table class="table table-bordered table-striped align-middle">
        <tbody>
          <tr>
            <th style="width:220px;">Nama Sekolah</th>
            <td>{{ $profil->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}</td>
          </tr>
          <tr>
            <th>Status</th>
            <td>{{ $profil->status ?? 'Negeri' }}</td>
          </tr>
          <tr>
            <th>Tahun Berdiri</th>
            <td>{{ $profil->tahun_berdiri ?? '-' }}</td>
          </tr>
          <tr>
            <th>Akreditasi</th>
            <td>{{ $profil->akreditasi ?? 'A' }}</td>
          </tr>
          <tr>
            <th>Alamat</th>
            <td>{{ $profil->alamat ?? '-' }}</td>
          </tr>
          <tr>
            <th>Kepala Sekolah</th>
            <td>{{ $profil->kepala_sekolah ?? '-' }}</td>
          </tr>
          <tr>
            <th>Email</th>
            <td>{{ $profil->email ?? '-' }}</td>
          </tr>
          <tr>
            <th>Telepon</th>
            <td>{{ $profil->telepon ?? '-' }}</td>
          </tr>
          <tr>
            <th>Website</th>
            <td>{{ $profil->website ?? '-' }}</td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
</section>


{{-- ======================= SAMBUTAN KEPALA SEKOLAH ======================= --}}


<section class="sb-section">
  <div class="sb-wrap">

    <div class="sb-head">
      <h2 class="sb-title">Sambutan Kepala Sekolah</h2>
    </div>

    <div class="sb-underline"></div>

    <div class="sb-grid">

      <div class="sb-photo-card">
        <img src="{{ asset('images/kepala-sekolah.jpg') }}"
             alt="{{ $profil->nama_kepsek ?? 'Kepala Sekolah' }}">

        <div class="sb-photo-name">
          <strong>{{ $profil->nama_kepsek ?? 'A. Rahmat, S.Pd., M.M.' }}</strong>
          <span>Kepala SMKN 1 Cijati</span>
        </div>
      </div>

      <div class="sb-quote-card">

        <svg class="sb-quote-icon" viewBox="0 0 44 34" fill="currentColor">
          <path d="M12.5 0C5.6 3.6 0 10.8 0 19.2 0 27 5.4 33.6 13 33.6c6 0 10.4-4.4 10.4-10.2 0-5.4-3.8-9.4-8.8-9.4-1 0-1.8.2-2.4.4C13 8.4 17.4 4 22.6 1.6L12.5 0zm22 0C27.6 3.6 22 10.8 22 19.2 22 27 27.4 33.6 35 33.6c6 0 10.4-4.4 10.4-10.2 0-5.4-3.8-9.4-8.8-9.4-1 0-1.8.2-2.4.4C35 8.4 39.4 4 44.6 1.6L34.5 0z"/>
        </svg>

        <div class="sb-quote-text">

          @if($profil->sambutan ?? false)

            @foreach(array_filter(array_map('trim', explode("\n", trim($profil->sambutan)))) as $p)
              <p>{{ $p }}</p>
            @endforeach

          @else

            <p>Assalamu'alaikum Warahmatullahi Wabarakatuh,</p>

            <p>
              Puji syukur kita panjatkan ke hadirat Allah SWT atas limpahan
              rahmat dan karunia-Nya, sehingga SMKN 1 Cijati terus berkembang
              sebagai lembaga pendidikan vokasi yang unggul, berdaya saing,
              dan berorientasi pada kemajuan teknologi serta kebutuhan dunia kerja.
            </p>

            <p>
              Dalam era digitalisasi ini, kami berkomitmen untuk menghadirkan
              layanan pendidikan yang inovatif, berbasis teknologi, dan sesuai
              dengan perkembangan industri. Semoga website ini dapat menjadi
              media informasi yang bermanfaat bagi seluruh siswa, orang tua,
              alumni, serta masyarakat umum.
            </p>

            <p>Wassalamu'alaikum Warahmatullahi Wabarakatuh.</p>

          @endif

        </div>
      </div>

    </div>
  </div>
</section>


{{-- ======================= SEJARAH ======================= --}}


<section class="sj-section">
  <div class="sj-wrap">

    <div class="sj-grid">

      <div class="sj-left">

        <div class="sj-head">
          <h2 class="sj-title">Sejarah Sekolah</h2>
        </div>

        <div class="sj-underline"></div>

        <div class="sj-desc">

          @if($profil->deskripsi ?? false)

            @foreach(array_filter(array_map('trim', explode("\n", trim($profil->deskripsi)))) as $i => $p)

              @if($i < 1)
                <p>{{ $p }}</p>
              @endif

            @endforeach

          @else

            <p>
              SMKN 1 Cijati berdiri pada tahun 2008 sebagai jawaban
              atas kebutuhan pendidikan kejuruan di wilayah Cijati dan sekitarnya.
            </p>

          @endif

        </div>

        @php
          $timeline = [
            [
              'tahun' => '2008',
              'text' => 'Sekolah didirikan dengan 2 program keahlian awal.',
              'icon' => 'M4 19.5A2.5 2.5 0 016.5 17H20M4 19.5A2.5 2.5 0 006.5 22H20V4a2 2 0 00-2-2H6.5A2.5 2.5 0 004 4.5v15z'
            ],
            [
              'tahun' => '2012',
              'text' => 'Penambahan ruang kelas dan laboratorium praktik.',
              'icon' => 'M3 21h18M5 21V7l7-4 7 4v14M9 21v-6h6v6M9 10h.01M15 10h.01'
            ],
            [
              'tahun' => '2016',
              'text' => 'Pembukaan program keahlian baru sesuai kebutuhan industri.',
              'icon' => 'M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8zM23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75'
            ],
            [
              'tahun' => '2020 - Sekarang',
              'text' => 'Terus berkembang menjadi SMK unggul dan berprestasi.',
              'icon' => 'M8 21h8M12 17v4M7 4h10v3a5 5 0 01-10 0V4zM3 5h4v2a4 4 0 01-4 4V5zM21 5h-4v2a4 4 0 004 4V5z'
            ],
          ];
        @endphp

        <div class="sj-timeline-track">

          @foreach($timeline as $i => $t)

            <div class="sj-timeline-item"
                 style="animation-delay:{{ $i * 0.08 }}s">

              <div class="sj-timeline-dot">
                <svg viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2"
                     stroke-linecap="round"
                     stroke-linejoin="round">

                  <path d="{{ $t['icon'] }}"/>

                </svg>
              </div>

              <div>
                <div class="sj-timeline-year">
                  {{ $t['tahun'] }}
                </div>

                <div class="sj-timeline-text">
                  {{ $t['text'] }}
                </div>
              </div>

            </div>

          @endforeach

        </div>

      </div>

      <div class="sj-photo-wrap">

        <div class="sj-photo">
          <img src="{{ asset('images/lingkungan-sekolah.jpg') }}"
               alt="Lingkungan SMKN 1 Cijati">
        </div>

        <div class="sj-quote">
          <p>
            "Bersama melangkah, bersama berkembang, mewujudkan SMK unggul berdaya saing global."
          </p>
        </div>

      </div>

    </div>
  </div>
</section>


{{-- ======================= VISI & MISI ======================= --}}


<section class="vm-section">
  <div class="vm-wrap">

    <div class="vm-head">
      <h2 class="vm-title">Visi &amp; Misi</h2>
    </div>

    <div class="vm-underline"></div>

    <div class="vm-grid">

      <div class="vm-card vm-card--visi">

        <div class="vm-icon">
          <svg viewBox="0 0 24 24"
               fill="none"
               stroke="currentColor"
               stroke-width="2"
               stroke-linecap="round"
               stroke-linejoin="round">

            <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"/>
            <circle cx="12" cy="12" r="3"/>

          </svg>
        </div>

        <h3>VISI</h3>

        <p>
          @if($profil->visi ?? false)
            {{ $profil->visi }}
          @else
            Menjadi sekolah kejuruan yang unggul, berkarakter,
            berbudaya industri, dan berdaya saing global.
          @endif
        </p>

      </div>


      <div class="vm-card vm-card--misi">

        <div class="vm-misi-head">

          <div class="vm-icon">

            <svg viewBox="0 0 24 24"
                 fill="none"
                 stroke="currentColor"
                 stroke-width="2"
                 stroke-linecap="round"
                 stroke-linejoin="round">

              <circle cx="12" cy="12" r="9"/>
              <circle cx="12" cy="12" r="5"/>
              <circle cx="12" cy="12" r="1"/>

            </svg>

          </div>

          <h3>MISI</h3>

        </div>


        <ul class="vm-list">

          @php

            $misiList = $profil->misi ?? null;

            $misiItems = $misiList
              ? array_filter(array_map('trim', explode("\n", trim($misiList))))
              : [
                  'Menyelenggarakan pendidikan kejuruan yang bermutu dan relevan dengan kebutuhan industri.',
                  'Membentuk peserta didik yang berkarakter, disiplin, dan berakhlak mulia.',
                  'Mengembangkan potensi peserta didik melalui kegiatan intrakurikuler dan ekstrakurikuler.',
                  'Meningkatkan kerja sama dengan dunia usaha dan dunia industri.',
                  'Mewujudkan lingkungan sekolah yang nyaman, aman, dan kondusif.',
                ];

          @endphp


          @foreach($misiItems as $item)

            <li>

              <span class="vm-check">

                <svg viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="3"
                     stroke-linecap="round"
                     stroke-linejoin="round">

                  <polyline points="20 6 9 17 4 12"/>

                </svg>

              </span>

              <span>{{ $item }}</span>

            </li>

          @endforeach

        </ul>

      </div>

    </div>
  </div>
</section>

@endsection