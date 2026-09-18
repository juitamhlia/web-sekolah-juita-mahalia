<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_id');
            $table->string('judul');
            $table->string('slug')->unique();
            $table->longText('isi');
            $table->string('gambar')->nullable();
            $table->date('tanggal');
            $table->boolean('status')->default(true); // published
            $table->boolean('featured')->default(false);
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('kategori_berita')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('berita');
    }
};