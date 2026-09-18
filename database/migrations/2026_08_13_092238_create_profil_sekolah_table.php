<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('profil_sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah');
            $table->text('deskripsi');
            $table->text('alamat');
            $table->string('email');
            $table->string('telepon');
            $table->string('website')->nullable();
            $table->integer('tahun_berdiri');
            $table->string('kepala_sekolah');
            $table->text('visi');
            $table->text('misi');
            $table->string('foto')->nullable(); // foto sekolah
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profil_sekolah');
    }
};