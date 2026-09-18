<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProfilSekolah;

class ProfilSekolahSeeder extends Seeder
{
    public function run()
    {
        ProfilSekolah::create([
           'nama_sekolah' => 'SMK Negeri 1 Cijati',
            'deskripsi' => 'SMK Negeri 1 Cijati merupakan sekolah menengah kejuruan yang berkomitmen mencetak generasi kompeten, berkarakter, kreatif, dan siap menghadapi dunia kerja serta melanjutkan pendidikan.',
            'alamat' => 'Jl. Raya Cijati Kecamatan Cijati, Kabupaten Cianjur, Jawa Barat',
            'email' => 'smkn.1cijati@yahoo.co.id',
            'telepon' => '(0263) 2360657',
            'website' => 'https://smkn1cijati.sch.id',
            'tahun_berdiri' => 2006,
            'kepala_sekolah' => 'A. Rahmat Dimyati S.Pd, M.Pd.',
            'visi' => 'Menjadi SMK unggul yang menghasilkan lulusan berkarakter, kompeten, dan berdaya saing global.',
            'misi' => '1. Menyelenggarakan pendidikan berbasis kompetensi dan karakter.
             2. Mengembangkan potensi siswa melalui kegiatan intrakurikuler dan ekstrakurikuler.
             3. Menjalin kerjasama dengan dunia usaha dan industri (DUDI).',
            'foto' => 'sekolah.jpg'
        ]);
    }
}