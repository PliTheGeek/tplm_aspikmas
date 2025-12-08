<div>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">{{ $isEdit ? 'Edit' : 'Tambah' }} Transaksi Kas</h2>
                        <a href="{{ route('kas.index') }}" class="text-gray-600 hover:text-gray-900">← Kembali</a>
                    </div>

                    <form wire:submit.prevent="save">
                        <!-- Tipe Transaksi -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tipe Transaksi *</label>
                            <div class="flex gap-4">
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio" wire:model.live="tipe" value="pemasukan" name="tipe_transaksi" class="form-radio text-green-600 h-4 w-4">
                                    <span class="ml-3">Pemasukan</span>
                                </label>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio" wire:model.live="tipe" value="pengeluaran" name="tipe_transaksi" class="form-radio text-red-600 h-4 w-4">
                                    <span class="ml-3">Pengeluaran</span>
                                </label>
                            </div>
                            @error('tipe') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Kategori -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kategori *</label>
                            <select wire:model="kas_category_id" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->nama }}</option>
                                @endforeach
                            </select>
                            @error('kas_category_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Jumlah -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah (Rp) *</label>
                            <input type="number" wire:model="jumlah" step="0.01" min="0"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Masukkan jumlah">
                            @error('jumlah') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Tanggal -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal *</label>
                            <input type="date" wire:model="tanggal"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('tanggal') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Keterangan -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Keterangan</label>
                            <textarea wire:model="keterangan" rows="3"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Tambahkan keterangan (opsional)"></textarea>
                            @error('keterangan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Upload Bukti Transaksi -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Bukti Transaksi</label>
                            <input type="file" wire:model="bukti_transaksi" accept=".jpg,.jpeg,.png,.pdf"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, PDF (Max: 2MB)</p>
                            
                            @if ($bukti_transaksi)
                                <div class="mt-2 text-sm text-green-600">
                                    File dipilih: {{ $bukti_transaksi->getClientOriginalName() }}
                                </div>
                            @elseif ($oldBuktiTransaksi)
                                <div class="mt-2 text-sm text-gray-600">
                                    File saat ini: <a href="{{ Storage::url($oldBuktiTransaksi) }}" target="_blank" class="text-blue-600 hover:underline">Lihat File</a>
                                </div>
                            @endif
                            
                            @error('bukti_transaksi') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Loading Indicator -->
                        <div wire:loading wire:target="bukti_transaksi" class="text-sm text-blue-600 mb-4">
                            Mengupload file...
                        </div>

                        <!-- Buttons -->
                        <div class="flex gap-4">
                            <button type="submit" 
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline"
                                wire:loading.attr="disabled">
                                <span wire:loading.remove wire:target="save">{{ $isEdit ? 'Update' : 'Simpan' }}</span>
                                <span wire:loading wire:target="save">Menyimpan...</span>
                            </button>
                            <a href="{{ route('kas.index') }}" 
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-6 rounded">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>