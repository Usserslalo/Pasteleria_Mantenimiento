<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pedido_especiales', function (\Illuminate\Database\Schema\Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('contacto');
            $table->text('descripcion');
            $table->date('fecha_deseada')->nullable();
            $table->string('imagen')->nullable();
            $table->enum('estado', ['pendiente', 'aceptado', 'rechazado'])->default('pendiente');
            $table->string('tiempo_estimado')->nullable();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido_especials');
    }
};
