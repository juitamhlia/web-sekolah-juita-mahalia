<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kontak;

class KontakSeeder extends Seeder
{
    public function run()
    {
        Kontak::create([
            'alamat' => 'l. Raya Cijati Kecamatan Cijati, Kabupaten Cianjur, Jawa Barat',
            'email' => 'smkn.1cijati@yahoo.co.id',
            'telepon' => '(0263) 2360657',
            'instagram' => 'https://instagram.com/smkn1cijati',
            'facebook' => 'https://facebook.com/smkn1cijati',
            'website' => 'https://smkn1cijati.sch.id'
        ]);
    }
}