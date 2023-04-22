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
        Schema::create('quartos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_hotel');
            $table->unsignedBigInteger('id_tipo_quartos');
            $table->integer('numero_do_quarto');
            $table->enum('status', ['disponivel', 'indisponivel', 'manutencao']);
            $table->timestamps();

            $table->foreign('id_hotel')
                ->references('id')
                ->on('hotel')
                ->onDelete('cascade');

            $table->foreign('id_tipo_quartos')
                ->references('id')
                ->on('tipo_quartos')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quartos');
    }
};
