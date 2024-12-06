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
        Schema::table('desayunos', function (Blueprint $table) {
            $table->foreign(['categoria_id'], 'desayunos_ibfk_1')->references(['id'])->on('catalogos')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('desayunos', function (Blueprint $table) {
            $table->dropForeign('desayunos_ibfk_1');
        });
    }
};
