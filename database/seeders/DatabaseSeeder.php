<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            KategoriBeritaSeeder::class,
            ProfilSekolahSeeder::class,
            KontakSeeder::class,
            JurusanSeeder::class,
            GuruSeeder::class,
            SiswaSeeder::class,
            EkstrakurikulerSeeder::class,
        ]);
    }
}