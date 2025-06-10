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
        Schema::create('laptop', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama');
            $table->string('merek', 100);
            $table->text('specs')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();
        });

        Schema::create('kriteria', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('urutan');
            $table->string('nama');
            $table->string('jenis', 10);
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        Schema::create('sesi_spk', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('id_user')->constrained('users', 'id')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('hasil_spk', function (Blueprint $table) {
            $table->foreignUuid('id_sesi')->constrained('sesi_spk', 'id')->onDelete('cascade');
            $table->foreignUuid('id_laptop')->constrained('laptop', 'id')->onDelete('cascade');
            $table->float('nilai_S');
            $table->float('nilai_R');
            $table->float('nilai_Q');
            $table->integer('ranking')->nullable();
            $table->timestamps();
        });

        Schema::create('nilai_kriteria_laptop', function (Blueprint $table) {
            $table->foreignUuid('id_kriteria')->constrained('kriteria', 'id')->onDelete('cascade');
            $table->foreignUuid('id_laptop')->constrained('laptop', 'id')->onDelete('cascade');
            $table->integer('nilai');
            $table->primary(['id_kriteria', 'id_laptop']);
            $table->timestamps();
        });

        Schema::create('bobot_kriteria', function (Blueprint $table) {
            $table->foreignUuid('id_kriteria')->constrained('kriteria', 'id')->onDelete('cascade');
            $table->foreignUuid('id_sesi')->constrained('sesi_spk', 'id')->onDelete('cascade');
            $table->float('nilai_bobot');
            $table->primary(['id_kriteria', 'id_sesi']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bobot_kriteria');
        Schema::dropIfExists('nilai_kriteria_laptop');
        Schema::dropIfExists('hasil_spk');
        Schema::dropIfExists('sesi_spk');
        Schema::dropIfExists('kriteria');
        Schema::dropIfExists('laptop');
    }
};
