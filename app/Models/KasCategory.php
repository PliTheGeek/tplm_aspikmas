<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tipe',
        'keterangan',
    ];

    /**
     * Relasi ke transaksi kas
     */
    public function transactions()
    {
        return $this->hasMany(KasTransaction::class);
    }

    /**
     * Scope untuk kategori pemasukan
     */
    public function scopePemasukan($query)
    {
        return $query->where('tipe', 'pemasukan');
    }

    /**
     * Scope untuk kategori pengeluaran
     */
    public function scopePengeluaran($query)
    {
        return $query->where('tipe', 'pengeluaran');
    }
}
