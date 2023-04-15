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
        Schema::create('tipos_de_quarto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_hotel');
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->timestamps();
            $table->foreignId('hotel_id')->constrained('hotel');

            $table->foreign('id_hotel')
                ->references('id')
                ->on('hotel')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipos_de_quarto');
    }
};
