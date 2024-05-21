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
        Schema::create('professor_disciplinas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('professor');
            $table->unsignedBigInteger('disciplina');
   
            $table->foreign('disciplina')->references('id')->on('disciplinas')->onDelete('cascade');
            $table->foreign('professor')->references('id')->on('professors')->onDelete('cascade');
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professor_disciplinas');
    }
};
