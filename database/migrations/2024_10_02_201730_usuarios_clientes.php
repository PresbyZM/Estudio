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
        Schema::create('usuarios_clientes', function (Blueprint $table) {
            $table->id(); 
            $table->string('nombre_usuacli', 30); 
            $table->string('apellidop_usuacli', 30)->nullable();  
            $table->string('apellidom_usuacli', 30)->nullable(); 
            $table->string('telefono_usuacli', 30)->nullable(); 
            $table->string('email_usuacli', 30)->unique();  
            $table->string('password');  
            $table->timestamp('last_login_at')->nullable();
            $table->foreignId('cliente_id') ->constrained('clientes')->onDelete('cascade'); 
            $table->rememberToken(); 
            $table->timestamps();  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios_clientes');
    }
};
