<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriBerita;

class KategoriBeritaSeeder extends Seeder
{
    public function run(): void
    {
        $kategoris = [
            ['nama' => 'Prestasi', 'slug' => 'prestasi'],
            ['nama' => 'Kegiatan', 'slug' => 'kegiatan'],
            ['nama' => 'Pengumuman', 'slug' => 'pengumuman'],
            ['nama' => 'Sekolah', 'slug' => 'sekolah'],
            ['nama' => 'Pendidikan', 'slug' => 'pendidikan'],
        ];

        foreach ($kategoris as $k) {
            KategoriBerita::updateOrCreate(
                ['slug' => $k['slug']],
                $k
            );
        }
    }
}