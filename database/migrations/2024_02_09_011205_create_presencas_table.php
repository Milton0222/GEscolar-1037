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
        Schema::create('presencas', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->unsignedBigInteger('estudante');
            $table->unsignedBigInteger('turma');
            $table->enum('tipo',['P','F']);
            $table->foreign('estudante')->references('id')->on('estudantes')->onDelete('cascade');
            $table->foreign('turma')->references('id')->on('turmas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presencas');
    }
};
