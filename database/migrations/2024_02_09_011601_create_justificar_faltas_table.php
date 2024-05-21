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
        Schema::create('justificar_faltas', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->float('valor');
            $table->unsignedBigInteger('estudante');
            $table->unsignedBigInteger('presenca');
            $table->foreign('estudante')->references('id')->on('estudantes')->onDelete('cascade');
            $table->foreign('presenca')->references('id')->on('presencas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('justificar_faltas');
    }
};
