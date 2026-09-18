<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jurusan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kode')->unique();
            $table->text('deskripsi')->nullable();
            $table->unsignedBigInteger('guru_id')->nullable(); // kepsek / koordinator
            $table->string('gambar')->nullable();
            $table->timestamps();

            $table->foreign('guru_id')->references('id')->on('guru')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jurusan');
    }
};