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
        Schema::create('pautas', function (Blueprint $table) {
            $table->id();
            $table->string('anoLectivo');
            $table->enum('trimestre',['1º','2º','3º','4º'])->default('1º');
            $table->unsignedBigInteger('turma');
            $table->unsignedBigInteger('funcionario');

            $table->foreign('turma')->references('id')->on('turmas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('funcionario')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pautas');
    }
};
