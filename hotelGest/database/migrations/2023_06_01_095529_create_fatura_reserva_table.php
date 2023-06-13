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
        Schema::create('fatura_reserva', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_reserva');
            $table->unsignedBigInteger('id_fatura');
            $table->timestamps();

            $table->foreign('id_reserva')
                ->references('id')
                ->on('reserva')
                ->onDelete('cascade');

            $table->foreign('id_fatura')
                ->references('id')
                ->on('fatura')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fatura_reserva');
    }
};
