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
        Schema::table('ventas', function (Blueprint $table) {
            $table->foreign(['categoria_id'], 'ventas_ibfk_1')->references(['id'])->on('catalogos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['cliente_id'], 'ventas_ibfk_2')->references(['id'])->on('clientes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ventas', function (Blueprint $table) {
            $table->dropForeign('ventas_ibfk_1');
            $table->dropForeign('ventas_ibfk_2');
        });
    }
};
