<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->unsignedBigInteger('band_id'); // ID da banda
            $table->string('band_name'); // Nome da banda
            $table->string('name');
            $table->string('releaseDate');
            $table->timestamps();
            $table->foreign('band_id')->references('id')->on('bands'); // Chave estrangeira para o ID da banda

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albums');
    }
};
