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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_evento', 30); 
            $table->date('dia_evento'); 
            $table->decimal('precio_evento', 8, 2)->nullable();
            $table->decimal('descuento', 8, 2)->nullable();
            $table->decimal('anticipo', 8, 2)->nullable();
            $table->decimal('resto', 8, 2)->nullable(); 
            $table->date('fecha_anticipo')->nullable(); 
            $table->date('fecha_resto')->nullable(); 
            $table->string('descripcion_evento', 50); 
            $table->string('estatus', 50); 
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
