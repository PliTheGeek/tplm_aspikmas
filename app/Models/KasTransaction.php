<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kas_category_id',
        'tipe',
        'jumlah',
        'tanggal',
        'keterangan',
        'bukti_transaksi',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'jumlah' => 'decimal:2',
    ];

    /**
     * Relasi ke user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke kategori kas
     */
    public function category()
    {
        return $this->belongsTo(KasCategory::class, 'kas_category_id');
    }

    /**
     * Scope untuk pemasukan
     */
    public function scopePemasukan($query)
    {
        return $query->where('tipe', 'pemasukan');
    }

    /**
     * Scope untuk pengeluaran
     */
    public function scopePengeluaran($query)
    {
        return $query->where('tipe', 'pengeluaran');
    }

    /**
     * Scope untuk filter berdasarkan bulan
     */
    public function scopeBulan($query, $bulan, $tahun)
    {
        return $query->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun);
    }

    /**
     * Scope untuk hari ini
     */
    public function scopeHariIni($query)
    {
        return $query->whereDate('tanggal', today());
    }
}
