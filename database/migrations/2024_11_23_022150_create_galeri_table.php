<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul galeri
            $table->string('sport_category'); // Kategori olahraga
            $table->text('description')->nullable(); // Deskripsi galeri
            $table->date('date'); // Tanggal event
            $table->string('location'); // Lokasi event
            $table->string('media_type'); // Jenis media: foto atau video
            $table->string('media_path'); // Path untuk file media
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galleries');
    }
};
