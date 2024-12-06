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
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('id_nombre_cliente', 500)->nullable();
            $table->bigInteger('id_telefono_cliente')->nullable();
            $table->string('id_correo_cliente', 50)->nullable();
            $table->string('id_direccion_cliente', 40)->nullable();
            $table->string('id_barrio_cliente', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
