<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasSaldo extends Model
{
    use HasFactory;

    protected $table = 'kas_saldo';

    protected $fillable = [
        'saldo_awal',
        'total_pemasukan',
        'total_pengeluaran',
        'saldo_akhir',
        'periode_bulan',
    ];

    protected $casts = [
        'periode_bulan' => 'date',
        'saldo_awal' => 'decimal:2',
        'total_pemasukan' => 'decimal:2',
        'total_pengeluaran' => 'decimal:2',
        'saldo_akhir' => 'decimal:2',
    ];

    /**
     * Hitung saldo akhir
     */
    public function hitungSaldoAkhir()
    {
        $this->saldo_akhir = $this->saldo_awal + $this->total_pemasukan - $this->total_pengeluaran;
        return $this->saldo_akhir;
    }
}
