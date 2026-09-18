<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilSekolah extends Model
{
    use HasFactory;

    protected $table = 'profil_sekolah';
    protected $fillable = [
        'nama_sekolah', 'deskripsi', 'alamat', 'email', 'telepon',
        'website', 'tahun_berdiri', 'kepala_sekolah', 'visi', 'misi', 'foto'
    ];
}