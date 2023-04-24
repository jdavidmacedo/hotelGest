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
        Schema::create('preco', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tipo_quartos');
            $table->unsignedBigInteger('id_epoca');
            $table->decimal('preco', 10, 2);
            $table->timestamps();

            $table->foreign('id_tipo_quartos')
                ->references('id')
                ->on('tipo_quartos')
                ->onDelete('cascade');

            $table->foreign('id_epoca')
                ->references('id')
                ->on('epocas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preco');
    }
};
