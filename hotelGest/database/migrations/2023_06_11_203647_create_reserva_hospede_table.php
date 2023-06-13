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
        Schema::create('reserva_hospede', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_reserva');
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('email', 191)->unique();
            $table->string('telefone');
            $table->string('endereco');
            $table->string('pais');
            $table->date('data_nascimento')->nullable();
            $table->string('NIF')->nullable();
            $table->timestamps();

            $table->foreign('id_cliente')
                ->references('id')
                ->on('cliente')
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
        Schema::dropIfExists('reserva_hospede');
    }
};
