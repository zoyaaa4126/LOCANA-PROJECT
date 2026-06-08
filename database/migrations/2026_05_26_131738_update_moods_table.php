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
        //
        Schema::table('moods', function (Blueprint $table) {
            // Adds a 'status' column right after the 'airline' column
            $table->string('deskripsi')->nullable();
            $table->string('icons')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('moods', function (Blueprint $table) {
            $table->dropColumn('deskripsi');
            $table->dropColumn('icons');
        });
    }
};
