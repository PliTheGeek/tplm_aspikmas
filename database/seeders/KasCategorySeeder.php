<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KasCategory;

class KasCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            // Kategori Pemasukan
            [
                'nama' => 'Iuran Anggota',
                'tipe' => 'pemasukan',
                'keterangan' => 'Iuran rutin anggota ASPIKMAS',
            ],
            [
                'nama' => 'Donasi',
                'tipe' => 'pemasukan',
                'keterangan' => 'Donasi dari pihak ketiga',
            ],
            [
                'nama' => 'Pendapatan Event',
                'tipe' => 'pemasukan',
                'keterangan' => 'Pendapatan dari kegiatan/event',
            ],
            [
                'nama' => 'Lain-lain',
                'tipe' => 'pemasukan',
                'keterangan' => 'Pemasukan lainnya',
            ],

            // Kategori Pengeluaran
            [
                'nama' => 'Operasional Kantor',
                'tipe' => 'pengeluaran',
                'keterangan' => 'Biaya operasional kantor',
            ],
            [
                'nama' => 'Konsumsi Rapat',
                'tipe' => 'pengeluaran',
                'keterangan' => 'Konsumsi untuk rapat',
            ],
            [
                'nama' => 'Transport',
                'tipe' => 'pengeluaran',
                'keterangan' => 'Biaya transportasi',
            ],
            [
                'nama' => 'ATK',
                'tipe' => 'pengeluaran',
                'keterangan' => 'Alat Tulis Kantor',
            ],
            [
                'nama' => 'Pemeliharaan',
                'tipe' => 'pengeluaran',
                'keterangan' => 'Biaya pemeliharaan',
            ],
            [
                'nama' => 'Event/Kegiatan',
                'tipe' => 'pengeluaran',
                'keterangan' => 'Biaya penyelenggaraan event',
            ],
            [
                'nama' => 'Lain-lain',
                'tipe' => 'pengeluaran',
                'keterangan' => 'Pengeluaran lainnya',
            ],
        ];

        foreach ($categories as $category) {
            KasCategory::create($category);
        }
    }
}
