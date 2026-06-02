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
        Schema::table('places', function (Blueprint $table) {
        $table->boolean('wifi')->default(false);
        $table->boolean('ruang_ac')->default(false);
        $table->boolean('stopkontan')->default(false);
        $table->boolean('parkir_luas')->default(false);
        $table->boolean('area_merokok')->default(false);
        $table->boolean('toilet')->default(false);
        $table->boolean('photobooth')->default(false);
        $table->boolean('musholla')->default(false);
        $table->boolean('ruang_meeting')->default(false);
        $table->boolean('board_game')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('places', function (Blueprint $table) {
            $table->dropColumn(['wifi', 'ruang_ac', 'stopkontan', 'parkir_luas', 'area_merokok', 'toilet', 'photobooth', 'musholla', 'ruang_meeting', 'board_game']);
        });
    }
};
