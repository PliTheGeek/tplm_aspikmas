<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hpp extends Model
{
    protected $fillable = [
        'nama_produk',
        'biaya_bahan_baku',
        'biaya_tenaga_kerja',
        'biaya_overhead',
        'total_hpp',
        'jumlah_produksi',
        'hpp_per_unit',
        'tanggal_produksi',
        'keterangan'
    ];

    protected $casts = [
        'biaya_bahan_baku' => 'decimal:2',
        'biaya_tenaga_kerja' => 'decimal:2',
        'biaya_overhead' => 'decimal:2',
        'total_hpp' => 'decimal:2',
        'hpp_per_unit' => 'decimal:2',
        'tanggal_produksi' => 'date',
    ];
}
