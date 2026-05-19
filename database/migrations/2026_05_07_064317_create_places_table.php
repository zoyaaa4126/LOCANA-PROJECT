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
        Schema::create('places', function (Blueprint $table) {
            $table->id();

            $table->foreignId('kategori_id')->constrained('kategoris');
            // $table->foreignId('moods_id')->constrained('moods');

            $table->string('nama_tempat');
            $table->text('deskripsi')->nullable();
            $table->text('alamat_lengkap');

            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);

            $table->integer('harga_min');
            $table->integer('harga_max');

            $table->boolean('status_aktif')->default(true);
            $table->boolean('tempat_unggulan')->default(false);

            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
