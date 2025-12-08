<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\KasTransaction;
use Carbon\Carbon;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class KasDashboard extends Component
{
    public $bulan;
    public $tahun;
    public $saldoAwal = 0;
    public $totalPemasukan = 0;
    public $totalPengeluaran = 0;
    public $saldoAkhir = 0;

    public function mount()
    {
        $this->bulan = Carbon::now()->month;
        $this->tahun = Carbon::now()->year;
        $this->loadData();
    }

    public function loadData()
    {
        // Hitung total pemasukan bulan ini
        $this->totalPemasukan = KasTransaction::pemasukan()
            ->bulan($this->bulan, $this->tahun)
            ->sum('jumlah');

        // Hitung total pengeluaran bulan ini
        $this->totalPengeluaran = KasTransaction::pengeluaran()
            ->bulan($this->bulan, $this->tahun)
            ->sum('jumlah');

        // Hitung saldo akhir
        $this->saldoAkhir = $this->saldoAwal + $this->totalPemasukan - $this->totalPengeluaran;
    }

    public function updatedBulan()
    {
        $this->loadData();
    }

    public function updatedTahun()
    {
        $this->loadData();
    }

    public function render()
    {
        $transaksiTerbaru = KasTransaction::with(['user', 'category'])
            ->latest('tanggal')
            ->take(5)
            ->get();

        return view('livewire.kas-dashboard', [
            'transaksiTerbaru' => $transaksiTerbaru,
        ]);
    }
}
