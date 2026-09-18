<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jurusan;

class JurusanSeeder extends Seeder
{
    public function run(): void
    {
        $jurusan = [
            [
                'nama' => 'Rekayasa Perangkat Lunak',
                'kode' => 'RPL',
                'deskripsi' => 'Mempelajari pengembangan software, web, dan mobile.',
                'gambar' => 'rpl.jpg',
            ],
            [
                'nama' => 'Agribisnis Pengolahan Hasil Pertanian',
                'kode' => 'APHP',
                'deskripsi' => 'Mempelajari cara mengolah bahan mentah dari hasil pertanian, perkebunan, atau perikanan (nabati dan hewani) menjadi produk makanan, minuman, atau barang setengah jadi yang bernilai jual tinggi.',
                'gambar' => 'aphp.jpg',
            ],
            [
                'nama' => 'Bisnis Daring Dan Pemasaran',
                'kode' => 'BDP',
                'deskripsi' => 'Mempelajari ilmu dasar marketing (pemasaran), manajemen bisnis, serta strategi penjualan secara konvensional (offline) maupun digital (online).',
                'gambar' => 'bdp.jpg',
            ],
            [
                'nama' => 'Teknik Kendaraan Ringan',
                'kode' => 'TKR',
                'deskripsi' => 'Mempelajari cara merawat, memperbaiki, dan mendiagnosis kerusakan pada mobil atau kendaraan roda empat.',
                'gambar' => 'tkr.jpg',
            ],
        ];

        foreach ($jurusan as $j) {
            Jurusan::updateOrCreate(
                ['kode' => $j['kode']],
                $j
            );
        }
    }
}