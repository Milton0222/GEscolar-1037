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
        Schema::create('estudantes', function (Blueprint $table) {
            $table->id();
            $table->String('nome');
            $table->String('bi',14)->nullable()->unique();
            $table->enum('sexo',['F','M','Femenino','Masculino']);
            $table->string('estado_civil')->default('solteiro');
            $table->integer('idade');
            $table->String('nomemae',30);
            $table->String('nomepai',30);
            $table->date('datanascimento');
            $table->String('contacto',9)->unique();
            $table->string('email',100)->unique()->nullable();
            $table->String('naturalidade',20);
            $table->String('morada',20);
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudantes');
    }
};
