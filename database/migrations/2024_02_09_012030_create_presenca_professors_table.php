<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('presenca_professors', function (Blueprint $table) {
            $table->id();
            $table->date('data_entrada');
            $table->time('hora_entrada');
            $table->text('obs')->nullable();
            $table->unsignedBigInteger('professor');
            $table->foreign('professor')->references('id')->on('professors')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presenca_professors');
    }
};
