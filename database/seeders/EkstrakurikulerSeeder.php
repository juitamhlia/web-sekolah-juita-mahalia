<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ekstrakurikuler;

class EkstrakurikulerSeeder extends Seeder
{
    public function run()
    {
        $ekskuls = [
            ['nama' => 'Pramuka', 'deskripsi' => 'Kegiatan kepramukaan untuk membentuk karakter disiplin dan mandiri.', 'pembina' => 'Drs. Budi Santoso', 'jadwal' => 'Sabtu, 08:00 - 12:00', 'gambar' => 'pramuka.jpg'],
            ['nama' => 'Paskibra', 'deskripsi' => 'Pasukan pengibar bendera, melatih kedisiplinan dan kekompakan.', 'pembina' => 'Siti Rahayu, S.Kom.', 'jadwal' => 'Jumat, 15:00 - 17:00', 'gambar' => 'paskibra.jpg'],
            ['nama' => 'PMR', 'deskripsi' => 'Palang Merah Remaja, belajar pertolongan pertama dan kesehatan.', 'pembina' => 'dr. Rina', 'jadwal' => 'Kamis, 14:00 - 16:00', 'gambar' => 'pmr.jpg'],
            ['nama' => 'OSIS', 'deskripsi' => 'Organisasi siswa intra sekolah, wadah pengembangan kepemimpinan.', 'pembina' => 'Ahmad Fauzi, S.Pd.', 'jadwal' => 'Rabu, 15:00 - 17:00', 'gambar' => 'osis.jpg'],
            ['nama' => 'Futsal', 'deskripsi' => 'Olahraga futsal untuk meningkatkan kebugaran dan kerjasama tim.', 'pembina' => 'Yanto', 'jadwal' => 'Senin & Rabu, 16:00 - 18:00', 'gambar' => 'futsal.jpg'],
            ['nama' => 'Basket', 'deskripsi' => 'Olahraga basket, melatih fisik dan strategi.', 'pembina' => 'Rudi', 'jadwal' => 'Selasa & Kamis, 16:00 - 18:00', 'gambar' => 'basket.jpg'],
        ];

        foreach ($ekskuls as $e) {
            Ekstrakurikuler::create($e);
        }
    }
}