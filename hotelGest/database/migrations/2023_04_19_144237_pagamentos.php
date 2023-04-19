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
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_fatura');
            $table->enum('metodo_de_pagamento', ['cartao_de_credito', 'transferencia_bancaria']);
            $table->decimal('valor_pago', 10, 2);
            $table->timestamps();

            $table->foreign('id_fatura')
                ->references('id')
                ->on('faturas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagamentos');
    }
};
