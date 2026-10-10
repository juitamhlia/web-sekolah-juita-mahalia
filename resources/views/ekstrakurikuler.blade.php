@extends('layouts.app-public')

@section('title', 'Ekstrakurikuler')

@section('content')

@push('styles')
    @vite(['resources/css/ekstrakurikuler.css'])
@endpush


<div class="ekskul-page">

  <!-- HERO -->
  <div class="ekskul-hero">
    <img src="{{ asset('images/smk.jpg') }}" alt="Ekstrakurikuler SMK Negeri 1 Cijati">

    <div class="ekskul-hero-content">
      <span class="ekskul-hero-eyebrow">Ekstrakurikuler</span>
      <p>Kembangkan bakat, minat, dan potensi diri melalui berbagai kegiatan ekstrakurikuler.</p>
    </div>
  </div>

  <div class="wrap">
    <div class="ekskul-grid">
      @forelse($ekstrakurikuler as $item)
        <div class="ekskul-card">
          <div class="ekskul-card-photo">
            @if($item->gambar)
              <img src="{{ asset('storage/'.$item->gambar) }}" alt="Foto {{ $item->nama }}">
            @endif
          </div>

          <div class="ekskul-card-mark">
            @if($item->logo)
              <img src="{{ asset('storage/'.$item->logo) }}" alt="Logo {{ $item->nama }}">
            @else
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M9 12l2 2 4-4"/></svg>
            @endif
          </div>

          <div class="ekskul-card-body">
            <h3 class="ekskul-card-name">{{ $item->nama }}</h3>
            <p class="ekskul-card-desc">{{ $item->deskripsi }}</p>
            <a href="{{ route('ekstrakurikuler.show', $item->id) }}" class="ekskul-card-btn">Lihat Detail →</a>
          </div>
        </div>
      @empty
        <p style="grid-column:1/-1; text-align:center; color:var(--ink-soft);">
          Belum ada data ekstrakurikuler.
        </p>
      @endforelse
    </div>
  </div>
</div>

@endsection