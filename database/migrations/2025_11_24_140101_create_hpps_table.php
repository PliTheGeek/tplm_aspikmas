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
        Schema::create('hpps', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->decimal('biaya_bahan_baku', 15, 2);
            $table->decimal('biaya_tenaga_kerja', 15, 2);
            $table->decimal('biaya_overhead', 15, 2);
            $table->decimal('total_hpp', 15, 2);
            $table->integer('jumlah_produksi');
            $table->decimal('hpp_per_unit', 15, 2);
            $table->date('tanggal_produksi');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hpps');
    }
};
