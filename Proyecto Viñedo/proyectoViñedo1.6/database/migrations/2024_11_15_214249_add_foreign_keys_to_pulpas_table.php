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
        Schema::table('pulpas', function (Blueprint $table) {
            $table->foreign(['categoria_id'], 'pulpas_ibfk_1')->references(['id'])->on('catalogos')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pulpas', function (Blueprint $table) {
            $table->dropForeign('pulpas_ibfk_1');
        });
    }
};
