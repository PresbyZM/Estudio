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
        Schema::create('peticiones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_evento_peticion', 30); 
            $table->date('dia_evento_peticion'); 
            $table->decimal('precio_evento_peticion', 8, 2)->nullable();
            $table->decimal('descuento_peticion', 8, 2)->nullable();
            $table->decimal('anticipo_peticion', 8, 2)->nullable();
            $table->decimal('resto_peticion', 8, 2)->nullable(); 
            $table->date('fecha_anticipo_peticion')->nullable(); 
            $table->date('fecha_resto_peticion')->nullable(); 
            $table->string('descripcion_evento_peticion', 50); 
            $table->string('estatus_peticion', 50)->nullable(); 
            $table->unsignedBigInteger('servicio_id');
            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('cascade');
            $table->unsignedBigInteger('usuario_cliente_id');
            $table->foreign('usuario_cliente_id')->references('id')->on('usuarios_clientes')->onDelete('cascade');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peticiones');
    }
};
