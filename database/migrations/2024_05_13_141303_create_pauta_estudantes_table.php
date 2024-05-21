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
        Schema::create('pauta_estudantes', function (Blueprint $table) {
        
            $table->float('avaliacao1')->default(0);
            $table->float('avaliacao2')->default(0);
            $table->float('avaliacao3')->default(0);
            $table->float('media')->default(0);
            $table->integer('falta')->default(0);
            $table->enum('classificacao',['Apto','N/apto']);

            $table->unsignedBigInteger('aluno');
            $table->unsignedBigInteger('disciplina');
            $table->unsignedBigInteger('pauta');

            $table->foreign('pauta')->references('id')->on('pautas')->onDelete('cascade');
            $table->foreign('aluno')->references('id')->on('estudantes')->onDelete('cascade');
            $table->foreign('disciplina')->references('id')->on('disciplinas')->onDelete('cascade')->onUpdate('cascade');

            $table->primary(['pauta','aluno','disciplina']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pauta_estudantes');
    }
};
