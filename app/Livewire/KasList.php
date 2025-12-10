<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\KasTransaction;
use Carbon\Carbon;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class KasList extends Component
{
    use WithPagination;

    public $search = '';
    public $tipeFilter = '';
    public $bulanFilter;
    public $tahunFilter;
    public $perPage = 10;

    public $showDeleteModal = false;
    public $deleteId;

    protected $queryString = [
        'search' => ['except' => ''],
        'tipeFilter' => ['except' => ''],
    ];

    public function mount()
    {
        $this->bulanFilter = Carbon::now()->month;
        $this->tahunFilter = Carbon::now()->year;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->showDeleteModal = true;
    }

    public function deleteTransaction()
    {
        KasTransaction::find($this->deleteId)->delete();

        $this->showDeleteModal = false;
        $this->deleteId = null;

        session()->flash('message', 'Transaksi berhasil dihapus!');
    }

    public function render()
    {
        $transactions = KasTransaction::with(['user', 'category'])
            ->when($this->search, function ($query) {
                $query->where('keterangan', 'like', '%' . $this->search . '%')
                    ->orWhereHas('category', function ($q) {
                        $q->where('nama', 'like', '%' . $this->search . '%');
                    });
            })
            ->when($this->tipeFilter, function ($query) {
                $query->where('tipe', $this->tipeFilter);
            })
            ->when($this->bulanFilter, function ($query) {
                $query->whereMonth('tanggal', $this->bulanFilter);
            })
            ->when($this->tahunFilter, function ($query) {
                $query->whereYear('tanggal', $this->tahunFilter);
            })
            ->latest('tanggal')
            ->paginate($this->perPage);

        return view('livewire.kas-list', [
            'transactions' => $transactions,
        ]);
    }
}
