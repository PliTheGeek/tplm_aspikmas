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
        // Tabel Kategori Kas
        Schema::create('kas_categories', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('tipe', ['pemasukan', 'pengeluaran']);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });

        // Tabel Transaksi Kas
        Schema::create('kas_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('kas_category_id')->constrained()->onDelete('restrict');
            $table->enum('tipe', ['pemasukan', 'pengeluaran']);
            $table->decimal('jumlah', 15, 2);
            $table->date('tanggal');
            $table->text('keterangan')->nullable();
            $table->string('bukti_transaksi')->nullable(); // untuk upload file
            $table->timestamps();
        });

        // Tabel Saldo Kas
        Schema::create('kas_saldo', function (Blueprint $table) {
            $table->id();
            $table->decimal('saldo_awal', 15, 2)->default(0);
            $table->decimal('total_pemasukan', 15, 2)->default(0);
            $table->decimal('total_pengeluaran', 15, 2)->default(0);
            $table->decimal('saldo_akhir', 15, 2)->default(0);
            $table->date('periode_bulan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kas_transactions');
        Schema::dropIfExists('kas_categories');
        Schema::dropIfExists('kas_saldo');
    }
};
