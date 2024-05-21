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
        Schema::create('professors', function (Blueprint $table) {
            $table->id();
            $table->String('nome');
            $table->String('bi',14);
            $table->enum('sexo',['F','M']);
            $table->date('datanascimento');
            $table->enum('grauacademico',['Tecnico','Lic','Msc','Phd'])->default('Tecnico');
            $table->String('municipio',20);
            $table->String('morada',20);
            $table->String('contacto',9)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professors');
    }
};
