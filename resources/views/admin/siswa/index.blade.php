@extends('layouts.admin')

@section('title', 'Jumlah Siswa')

@section('content')

    <div class="max-w-3xl mx-auto">

        {{-- PESAN BERHASIL --}}
        @if(session('success'))

            <div style="
                background-color: #dcfce7;
                border: 1px solid #86efac;
                color: #166534;
                padding: 15px;
                border-radius: 8px;
                margin-bottom: 20px;
            ">
                {{ session('success') }}
            </div>

        @endif


        {{-- CARD --}}
        <div class="bg-white rounded-xl shadow-sm p-6">

            <h1 style="
                font-size: 24px;
                font-weight: bold;
                color: #1f2937;
                margin-bottom: 5px;
            ">
                Jumlah Siswa
            </h1>

            <p style="
                color: #6b7280;
                margin-bottom: 25px;
            ">
                Atur jumlah seluruh siswa di sekolah.
            </p>


            {{-- JUMLAH SAAT INI --}}
            <div style="
                background-color: #eff6ff;
                border: 1px solid #bfdbfe;
                padding: 20px;
                border-radius: 10px;
                margin-bottom: 25px;
                text-align: center;
            ">

                <div style="
                    font-size: 36px;
                    font-weight: bold;
                    color: #2563eb;
                ">
                    {{ $siswa->jumlah ?? 0 }}
                </div>

                <div style="
                    color: #6b7280;
                    margin-top: 5px;
                ">
                    Total Siswa
                </div>

            </div>


            {{-- TOMBOL --}}
            @if($siswa)

                <a href="{{ route('admin.siswa.edit', $siswa->id) }}"
                   style="
                       display: inline-block;
                       background-color: #f59e0b;
                       color: white;
                       padding: 10px 20px;
                       border-radius: 8px;
                       text-decoration: none;
                       font-weight: 600;
                   ">
                    Edit Jumlah
                </a>

            @else

                <a href="{{ route('admin.siswa.create') }}"
                   style="
                       display: inline-block;
                       background-color: #2563eb;
                       color: white;
                       padding: 10px 20px;
                       border-radius: 8px;
                       text-decoration: none;
                       font-weight: 600;
                   ">
                    + Atur Jumlah Siswa
                </a>

            @endif

        </div>

    </div>

@endsection