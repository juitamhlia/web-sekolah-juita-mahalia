<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guru;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        Guru::query()->delete();

        for ($i = 1; $i <= 50; $i++) {
            Guru::create([
                'nama' => 'Guru ' . $i,
            ]);
        }
    }
}