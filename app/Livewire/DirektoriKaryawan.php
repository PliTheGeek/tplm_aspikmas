<?php

namespace App\Livewire;

use App\Models\Karyawan;
use Livewire\Component;
use Livewire\WithPagination; // <-- Tambahkan untuk pagination

class DirektoriKaryawan extends Component
{
    use WithPagination; // <-- Gunakan trait pagination

    public string $search = ''; // Properti untuk menampung input pencarian

    public function render()
    {
        $karyawans = Karyawan::query()
            ->where('nama_lengkap', 'like', '%' . $this->search . '%')
            ->orWhere('posisi', 'like', '%' . $this->search . '%')
            ->paginate(10); // Ambil data dengan pagination

        return view('livewire.direktori-karyawan', [
            'karyawans' => $karyawans,
        ]);
    }
}