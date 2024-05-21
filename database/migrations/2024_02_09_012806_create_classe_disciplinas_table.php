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
        Schema::create('classe_disciplinas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('disciplina');
            $table->unsignedBigInteger('classe');
            $table->foreign('disciplina')->references('id')->on('disciplinas')->onDelete('cascade');
            $table->foreign('classe')->references('id')->on('classes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classe_disciplinas');
    }
};
