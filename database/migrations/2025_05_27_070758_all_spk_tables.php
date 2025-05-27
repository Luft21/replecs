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
            // $table->timestamps();
        });

        // Tabel Kriteria
        Schema::create('kriteria', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama');
            $table->string('jenis', 10); // Contoh: 'benefit', 'cost'
            $table->text('deskripsi')->nullable();
            // $table->timestamps();
        });

        // Tabel Sesi SPK
        Schema::create('sesi_spk', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('id_user')->constrained('users', 'id')->onDelete('cascade'); // Pastikan nama tabel 'users' sudah benar
            // $table->timestamps();
        });

        // Tabel Hasil SPK (VIKOR)
        Schema::create('hasil_spk', function (Blueprint $table) {
            $table->foreignUuid('id_sesi')->constrained('sesi_spk', 'id')->onDelete('cascade');
            $table->foreignUuid('id_laptop')->constrained('laptop', 'id')->onDelete('cascade');
            $table->float('nilai_S');
            $table->float('nilai_R');
            $table->float('nilai_Q');
            // $table->integer('ranking')->nullable(); // Ranking bisa dihitung saat query
            // $table->timestamps();
        });

        // Tabel Nilai Kriteria per Laptop
        Schema::create('nilai_kriteria_laptop', function (Blueprint $table) {
            $table->foreignUuid('id_kriteria')->constrained('kriteria', 'id')->onDelete('cascade');
            $table->foreignUuid('id_laptop')->constrained('laptop', 'id')->onDelete('cascade');
            $table->float('nilai'); // Atau $table->decimal('nilai', 8, 2); jika perlu presisi
            $table->primary(['id_kriteria', 'id_laptop']);
            // $table->timestamps();
        });

        // Tabel Bobot Kriteria per Sesi
        Schema::create('bobot_kriteria', function (Blueprint $table) {
            $table->foreignUuid('id_kriteria')->constrained('kriteria', 'id')->onDelete('cascade');
            $table->foreignUuid('id_sesi')->constrained('sesi_spk', 'id')->onDelete('cascade');
            $table->float('nilai_bobot'); // Atau $table->decimal('nilai_bobot', 8, 4);
            $table->primary(['id_kriteria', 'id_sesi']);
            // $table->timestamps();
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
