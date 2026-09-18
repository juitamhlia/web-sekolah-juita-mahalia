<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        Siswa::query()->delete();

        for ($i = 1; $i <= 500; $i++) {
            Siswa::create([
                'nama' => 'Siswa ' . $i,
            ]);
        }
    }
}