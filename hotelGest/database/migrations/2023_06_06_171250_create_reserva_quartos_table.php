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
        Schema::create('reserva_quartos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_reserva');
            $table->unsignedBigInteger('id_quarto');
            $table->timestamps();

            $table->foreign('id_quarto')
                ->references('id')
                ->on('quartos')
                ->onDelete('cascade');

            $table->foreign('id_reserva')
                ->references('id')
                ->on('reserva')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserva_quartos');
    }
};
