<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('peticion_servicio', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('peticion_id');
            $table->unsignedBigInteger('servicio_id');
            $table->foreign('peticion_id')->references('id')->on('peticiones')->onDelete('cascade');
            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peticion_servicio');
    }
};
