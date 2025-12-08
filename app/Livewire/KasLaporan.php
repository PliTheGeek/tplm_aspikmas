<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\KasTransaction;
use Carbon\Carbon;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class KasLaporan extends Component
{
    public $bulan;
    public $tahun;
    public $tanggalMulai;
    public $tanggalSelesai;
    public $tipeFilter = '';
    public $jenisPeriode = 'bulan'; // bulan, custom

    public $saldoAwal = 0;
    public $totalPemasukan = 0;
    public $totalPengeluaran = 0;
    public $saldoAkhir = 0;

    public function mount()
    {
        $this->bulan = Carbon::now()->month;
        $this->tahun = Carbon::now()->year;
        $this->tanggalMulai = Carbon::now()->startOfMonth()->format('Y-m-d');
        $this->tanggalSelesai = Carbon::now()->endOfMonth()->format('Y-m-d');

        $this->generateLaporan();
    }

    public function generateLaporan()
    {
        $query = KasTransaction::query();

        if ($this->jenisPeriode === 'bulan') {
            $query->bulan($this->bulan, $this->tahun);
        } else {
            $query->whereBetween('tanggal', [$this->tanggalMulai, $this->tanggalSelesai]);
        }

        if ($this->tipeFilter) {
            $query->where('tipe', $this->tipeFilter);
        }

        // Hitung total pemasukan
        $this->totalPemasukan = (clone $query)->where('tipe', 'pemasukan')->sum('jumlah');

        // Hitung total pengeluaran
        $this->totalPengeluaran = (clone $query)->where('tipe', 'pengeluaran')->sum('jumlah');

        // Hitung saldo akhir
        $this->saldoAkhir = $this->saldoAwal + $this->totalPemasukan - $this->totalPengeluaran;
    }

    public function updated($propertyName)
    {
        if (in_array($propertyName, ['bulan', 'tahun', 'tanggalMulai', 'tanggalSelesai', 'tipeFilter', 'jenisPeriode'])) {
            $this->generateLaporan();
        }
    }

    public function exportPDF()
    {
        // TODO: Implementasi export PDF
        session()->flash('message', 'Fitur export PDF akan segera hadir!');
    }

    public function exportExcel()
    {
        // TODO: Implementasi export Excel
        session()->flash('message', 'Fitur export Excel akan segera hadir!');
    }

    public function render()
    {
        $query = KasTransaction::with(['user', 'category']);

        if ($this->jenisPeriode === 'bulan') {
            $query->bulan($this->bulan, $this->tahun);
        } else {
            $query->whereBetween('tanggal', [$this->tanggalMulai, $this->tanggalSelesai]);
        }

        if ($this->tipeFilter) {
            $query->where('tipe', $this->tipeFilter);
        }

        $transactions = $query->latest('tanggal')->get();

        return view('livewire.kas-laporan', [
            'transactions' => $transactions,
        ]);
    }
}
