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
        Schema::create('koni_structures', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Title of the structure, e.g., "KONI Sukoharjo 2021-2025"
            $table->text('description')->nullable(); // Description of the structure
            $table->string('photo'); // Path to the structure photo
            $table->string('period'); // Period of the structure, e.g., "2021-2025"
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
        Schema::dropIfExists('koni_structures');
    }
};
