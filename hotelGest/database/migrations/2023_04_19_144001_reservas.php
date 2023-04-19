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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_hotel');
            $table->unsignedBigInteger('id_quarto');
            $table->date('data_checkin');
            $table->date('data_checkout');
            $table->enum('status', ['reservado', 'cancelado', 'concluido'])->default('reservado');
            $table->timestamps();

            $table->foreign('id_cliente')
                ->references('id')
                ->on('clientes')
                ->onDelete('cascade');

            $table->foreign('id_hotel')
                ->references('id')
                ->on('hoteis')
                ->onDelete('cascade');

            $table->foreign('id_quarto')
                ->references('id')
                ->on('quartos')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
