<?php

namespace App\Livewire;

use App\Models\Hpp;
use Livewire\Component;
use Livewire\WithPagination;

class HppList extends Component
{
    use WithPagination;

    public string $search = '';
    public bool $showModal = false;
    public ?int $editingId = null;
    
    // Sorting
    public string $sortField = 'tanggal_produksi';
    public string $sortDirection = 'desc';
    
    // Form fields
    public string $nama_produk = '';
    public string $biaya_bahan_baku = '';
    public string $biaya_tenaga_kerja = '';
    public string $biaya_overhead = '';
    public string $jumlah_produksi = '';
    public string $tanggal_produksi = '';
    public string $keterangan = '';
    
    // Calculated fields
    public string $total_hpp = '0';
    public string $hpp_per_unit = '0';

    protected $rules = [
        'nama_produk' => 'required|string|max:255',
        'biaya_bahan_baku' => 'required|numeric|min:0',
        'biaya_tenaga_kerja' => 'required|numeric|min:0',
        'biaya_overhead' => 'required|numeric|min:0',
        'jumlah_produksi' => 'required|integer|min:1',
        'tanggal_produksi' => 'required|date',
        'keterangan' => 'nullable|string',
    ];

    public function updated($propertyName)
    {
        // Auto-calculate when cost or production quantity changes
        if (in_array($propertyName, ['biaya_bahan_baku', 'biaya_tenaga_kerja', 'biaya_overhead', 'jumlah_produksi'])) {
            $this->calculateHpp();
        }
        
        // Reset pagination when search changes
        if ($propertyName === 'search') {
            $this->resetPage();
        }
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function calculateHpp()
    {
        $bahan = floatval($this->biaya_bahan_baku ?: 0);
        $tenaga = floatval($this->biaya_tenaga_kerja ?: 0);
        $overhead = floatval($this->biaya_overhead ?: 0);
        $jumlah = intval($this->jumlah_produksi ?: 0);

        $this->total_hpp = $bahan + $tenaga + $overhead;
        $this->hpp_per_unit = $jumlah > 0 ? $this->total_hpp / $jumlah : 0;
    }

    public function openModal()
    {
        $this->resetForm();
        $this->showModal = true;
        $this->editingId = null;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->nama_produk = '';
        $this->biaya_bahan_baku = '';
        $this->biaya_tenaga_kerja = '';
        $this->biaya_overhead = '';
        $this->jumlah_produksi = '';
        $this->tanggal_produksi = '';
        $this->keterangan = '';
        $this->total_hpp = '0';
        $this->hpp_per_unit = '0';
        $this->editingId = null;
        $this->resetValidation();
    }

    public function save()
    {
        $this->validate();

        $this->calculateHpp();

        $data = [
            'nama_produk' => $this->nama_produk,
            'biaya_bahan_baku' => $this->biaya_bahan_baku,
            'biaya_tenaga_kerja' => $this->biaya_tenaga_kerja,
            'biaya_overhead' => $this->biaya_overhead,
            'total_hpp' => $this->total_hpp,
            'jumlah_produksi' => $this->jumlah_produksi,
            'hpp_per_unit' => $this->hpp_per_unit,
            'tanggal_produksi' => $this->tanggal_produksi,
            'keterangan' => $this->keterangan,
        ];

        if ($this->editingId) {
            $hpp = Hpp::find($this->editingId);
            $hpp->update($data);
            session()->flash('message', 'Data HPP berhasil diperbarui.');
        } else {
            Hpp::create($data);
            session()->flash('message', 'Data HPP berhasil ditambahkan.');
        }

        $this->closeModal();
    }

    public function edit($id)
    {
        $hpp = Hpp::find($id);
        
        $this->editingId = $id;
        $this->nama_produk = $hpp->nama_produk;
        $this->biaya_bahan_baku = $hpp->biaya_bahan_baku;
        $this->biaya_tenaga_kerja = $hpp->biaya_tenaga_kerja;
        $this->biaya_overhead = $hpp->biaya_overhead;
        $this->jumlah_produksi = $hpp->jumlah_produksi;
        $this->tanggal_produksi = $hpp->tanggal_produksi->format('Y-m-d');
        $this->keterangan = $hpp->keterangan ?? '';
        
        $this->calculateHpp();
        $this->showModal = true;
    }

    public function delete($id)
    {
        Hpp::destroy($id);
        session()->flash('message', 'Data HPP berhasil dihapus.');
    }

    public function render()
    {
        $hpps = Hpp::query()
            ->when($this->search, function ($query) {
                $query->where('nama_produk', 'like', '%' . $this->search . '%')
                      ->orWhere('keterangan', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.hpp-list', [
            'hpps' => $hpps,
        ]);
    }
}
