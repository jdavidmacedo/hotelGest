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
        Schema::create('tipo_quartos_epoca', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_quarto');
            $table->unsignedBigInteger('id_epoca');
            $table->unsignedBigInteger('id_tipo_quartos');
            $table->decimal('preco_base_por_noite', 10, 2);
            $table->timestamps();

            $table->foreign('id_quarto')->references('id')->on('quarto');
            $table->foreign('id_epoca')->references('id')->on('epoca');
            $table->foreign('id_tipo_quartos')->references('id')->on('tipo_quartos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_quartos_epoca');
    }
};
