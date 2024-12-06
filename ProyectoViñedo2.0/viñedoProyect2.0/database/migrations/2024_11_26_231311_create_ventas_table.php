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
        Schema::create('ventas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->bigInteger('categoria_id')->nullable()->index('categoria_id');
            $table->bigInteger('cliente_id')->nullable()->index('cliente_id');
            $table->bigInteger('id_cantidad')->nullable();
            $table->decimal('id_valor_final', 15, 0)->nullable();
            $table->string('id_estado_venta', 20)->nullable();
            $table->boolean('cancelado')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
