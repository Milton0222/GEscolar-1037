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
        Schema::create('propinas', function (Blueprint $table) {
            $table->id();
            $table->String('mes');
            $table->string('anoLectivo');
            $table->float('valor');
            $table->unsignedBigInteger('estudante');
            $table->unsignedBigInteger('usuario');
            $table->foreign('usuario')->references('id')->on('users');
            $table->foreign('estudante')->references('id')->on('estudantes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propinas');
    }
};
