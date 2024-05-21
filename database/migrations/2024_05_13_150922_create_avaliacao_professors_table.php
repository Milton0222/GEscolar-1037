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
        Schema::create('avaliacao_professors', function (Blueprint $table) {
            $table->id();
            $table->float('avaliacao1')->default(0);
            $table->float('avaliacao2')->default(0);
            $table->float('avaliacao3')->default(0);
            $table->float('avaliacao4')->default(0);
            $table->enum('resultado',['Bom','Medíocre','Mau','Suficiente','Excelente']);
            $table->unsignedBigInteger('avaliador');
            $table->unsignedBigInteger('professor');

            $table->foreign('avaliador')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('professor')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avaliacao_professors');
    }
};
