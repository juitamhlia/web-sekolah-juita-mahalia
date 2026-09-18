<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusan';

    protected $fillable = ['nama', 'kode', 'deskripsi', 'guru_id', 'gambar', 'logo'];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}