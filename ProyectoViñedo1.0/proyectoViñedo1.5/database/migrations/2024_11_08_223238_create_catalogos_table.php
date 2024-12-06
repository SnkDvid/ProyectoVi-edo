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
        Schema::create('catalogos', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('id_imagen_producto', 500);
            $table->string('id_nombre_producto', 50);
            $table->string('id_descripcion', 50);
            $table->decimal('id_precio', 15, 2);
            $table->string('id_peso', 50);
            $table->string('id_categoria', 50);
            $table->boolean('habilitado')->default(1); // habilitado 1, deshabilitado 0.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalogos');
    }
};
