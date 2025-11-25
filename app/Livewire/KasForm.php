<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\KasTransaction;
use App\Models\KasCategory;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class KasForm extends Component
{
    use WithFileUploads;

    public $transactionId;
    public $tipe = 'pemasukan';
    public $kas_category_id;
    public $jumlah;
    public $tanggal;
    public $keterangan;
    public $bukti_transaksi;
    public $oldBuktiTransaksi;

    public $isEdit = false;

    protected $rules = [
        'tipe' => 'required|in:pemasukan,pengeluaran',
        'kas_category_id' => 'required|exists:kas_categories,id',
        'jumlah' => 'required|numeric|min:0',
        'tanggal' => 'required|date',
        'keterangan' => 'nullable|string|max:500',
        'bukti_transaksi' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ];

    public function mount($id = null)
    {
        $this->tanggal = Carbon::now()->format('Y-m-d');

        if ($id) {
            $this->isEdit = true;
            $transaction = KasTransaction::findOrFail($id);
            $this->transactionId = $transaction->id;
            $this->tipe = $transaction->tipe;
            $this->kas_category_id = $transaction->kas_category_id;
            $this->jumlah = $transaction->jumlah;
            $this->tanggal = $transaction->tanggal->format('Y-m-d');
            $this->keterangan = $transaction->keterangan;
            $this->oldBuktiTransaksi = $transaction->bukti_transaksi;
        }
    }

    public function save()
    {
        $this->validate();

        $data = [
            'user_id' => Auth::id(),
            'tipe' => $this->tipe,
            'kas_category_id' => $this->kas_category_id,
            'jumlah' => $this->jumlah,
            'tanggal' => $this->tanggal,
            'keterangan' => $this->keterangan,
        ];

        // Upload file jika ada
        if ($this->bukti_transaksi) {
            $data['bukti_transaksi'] = $this->bukti_transaksi->store('kas-bukti', 'public');
        }

        if ($this->isEdit) {
            KasTransaction::find($this->transactionId)->update($data);
            session()->flash('message', 'Transaksi berhasil diupdate!');
        } else {
            KasTransaction::create($data);
            session()->flash('message', 'Transaksi berhasil ditambahkan!');
        }

        return redirect()->route('kas.index');
    }

    public function render()
    {
        $categories = KasCategory::where('tipe', $this->tipe)->get();

        return view('livewire.kas-form', [
            'categories' => $categories,
        ]);
    }
}
