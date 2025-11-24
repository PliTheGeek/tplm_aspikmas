<div>
    {{-- Flash Message --}}
    @if (session()->has('message'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    {{-- Search and Button --}}
    <div class="mb-4 flex items-center gap-4">
        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
        <div class="relative w-full">
            <input 
                type="text" 
                wire:model.live.debounce.300ms="search" 
                placeholder="Cari nama produk atau keterangan..."
                class="block w-full pl-10 pr-3 py-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
            >
        </div>
        <button 
            wire:click="openModal"
            class="w-1/4 px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 whitespace-nowrap"
        >
            + Hitung HPP
        </button>
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full divide-y-2 divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center">No</th>
                    <th wire:click="sortBy('nama_produk')" class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-left cursor-pointer hover:bg-gray-100">
                        <div class="flex items-center">
                            Nama Produk
                            @if($sortField === 'nama_produk')
                                @if($sortDirection === 'asc')
                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"/></svg>
                                @else
                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z"/></svg>
                                @endif
                            @endif
                        </div>
                    </th>
                    <th wire:click="sortBy('tanggal_produksi')" class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-left cursor-pointer hover:bg-gray-100">
                        <div class="flex items-center">
                            Tanggal Produksi
                            @if($sortField === 'tanggal_produksi')
                                @if($sortDirection === 'asc')
                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"/></svg>
                                @else
                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z"/></svg>
                                @endif
                            @endif
                        </div>
                    </th>
                    <th wire:click="sortBy('biaya_bahan_baku')" class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-right cursor-pointer hover:bg-gray-100">
                        <div class="flex items-center justify-end">
                            Biaya Bahan Baku
                            @if($sortField === 'biaya_bahan_baku')
                                @if($sortDirection === 'asc')
                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"/></svg>
                                @else
                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z"/></svg>
                                @endif
                            @endif
                        </div>
                    </th>
                    <th wire:click="sortBy('biaya_tenaga_kerja')" class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-right cursor-pointer hover:bg-gray-100">
                        <div class="flex items-center justify-end">
                            Biaya Tenaga Kerja
                            @if($sortField === 'biaya_tenaga_kerja')
                                @if($sortDirection === 'asc')
                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"/></svg>
                                @else
                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z"/></svg>
                                @endif
                            @endif
                        </div>
                    </th>
                    <th wire:click="sortBy('biaya_overhead')" class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-right cursor-pointer hover:bg-gray-100">
                        <div class="flex items-center justify-end">
                            Biaya Overhead
                            @if($sortField === 'biaya_overhead')
                                @if($sortDirection === 'asc')
                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"/></svg>
                                @else
                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z"/></svg>
                                @endif
                            @endif
                        </div>
                    </th>
                    <th wire:click="sortBy('total_hpp')" class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-right cursor-pointer hover:bg-gray-100">
                        <div class="flex items-center justify-end">
                            Total HPP
                            @if($sortField === 'total_hpp')
                                @if($sortDirection === 'asc')
                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"/></svg>
                                @else
                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z"/></svg>
                                @endif
                            @endif
                        </div>
                    </th>
                    <th wire:click="sortBy('jumlah_produksi')" class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center cursor-pointer hover:bg-gray-100">
                        <div class="flex items-center justify-center">
                            Jumlah Produksi
                            @if($sortField === 'jumlah_produksi')
                                @if($sortDirection === 'asc')
                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"/></svg>
                                @else
                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z"/></svg>
                                @endif
                            @endif
                        </div>
                    </th>
                    <th wire:click="sortBy('hpp_per_unit')" class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-right cursor-pointer hover:bg-gray-100">
                        <div class="flex items-center justify-end">
                            HPP per Unit
                            @if($sortField === 'hpp_per_unit')
                                @if($sortDirection === 'asc')
                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"/></svg>
                                @else
                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z"/></svg>
                                @endif
                            @endif
                        </div>
                    </th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($hpps as $index => $hpp)
                <tr>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ $hpps->firstItem() + $index }}</td>
                    <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $hpp->nama_produk }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $hpp->tanggal_produksi->format('d/m/Y') }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-right">Rp {{ number_format($hpp->biaya_bahan_baku, 0, ',', '.') }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-right">Rp {{ number_format($hpp->biaya_tenaga_kerja, 0, ',', '.') }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-right">Rp {{ number_format($hpp->biaya_overhead, 0, ',', '.') }}</td>
                    <td class="whitespace-nowrap px-4 py-2 font-semibold text-gray-900 text-right">Rp {{ number_format($hpp->total_hpp, 0, ',', '.') }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ number_format($hpp->jumlah_produksi) }} unit</td>
                    <td class="whitespace-nowrap px-4 py-2 font-semibold text-gray-900 text-right">Rp {{ number_format($hpp->hpp_per_unit, 0, ',', '.') }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-center">
                        <button 
                            wire:click="edit({{ $hpp->id }})"
                            class="inline-flex items-center justify-center p-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-1 mr-2"
                            title="Edit"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </button>
                        <button 
                            wire:click="delete({{ $hpp->id }})"
                            wire:confirm="Apakah Anda yakin ingin menghapus data HPP ini?"
                            class="inline-flex items-center justify-center p-2 bg-red-600 text-white rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-1"
                            title="Hapus"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center py-4 text-gray-500">Tidak ada data HPP yang cocok dengan pencarian.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $hpps->links() }}
    </div>

    {{-- Modal --}}
    @if($showModal)
    <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            {{-- Background overlay --}}
            <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" wire:click="closeModal"></div>

            {{-- Modal panel --}}
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                <form wire:submit.prevent="save">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4" id="modal-title">
                                    {{ $editingId ? 'Edit Data HPP' : 'Hitung HPP Baru' }}
                                </h3>
                                
                                <div class="mt-4 space-y-4">
                                    {{-- Nama Produk --}}
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Nama Produk *</label>
                                        <input type="text" wire:model="nama_produk" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        @error('nama_produk') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                    </div>

                                    {{-- Tanggal Produksi --}}
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Tanggal Produksi *</label>
                                        <input type="date" wire:model="tanggal_produksi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        @error('tanggal_produksi') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                    </div>

                                    {{-- Grid untuk biaya --}}
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Biaya Bahan Baku (Rp) *</label>
                                            <input type="number" step="0.01" wire:model.live="biaya_bahan_baku" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            @error('biaya_bahan_baku') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Biaya Tenaga Kerja (Rp) *</label>
                                            <input type="number" step="0.01" wire:model.live="biaya_tenaga_kerja" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            @error('biaya_tenaga_kerja') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Biaya Overhead (Rp) *</label>
                                            <input type="number" step="0.01" wire:model.live="biaya_overhead" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            @error('biaya_overhead') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    {{-- Jumlah Produksi --}}
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Jumlah Produksi (unit) *</label>
                                        <input type="number" wire:model.live="jumlah_produksi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        @error('jumlah_produksi') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                    </div>

                                    {{-- Hasil Perhitungan --}}
                                    <div class="bg-gray-50 p-4 rounded-md">
                                        <h4 class="font-semibold text-gray-900 mb-2">Hasil Perhitungan:</h4>
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <span class="text-sm text-gray-600">Total HPP:</span>
                                                <p class="text-lg font-bold text-gray-900">Rp {{ number_format($total_hpp, 0, ',', '.') }}</p>
                                            </div>
                                            <div>
                                                <span class="text-sm text-gray-600">HPP per Unit:</span>
                                                <p class="text-lg font-bold text-gray-900">Rp {{ number_format($hpp_per_unit, 0, ',', '.') }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Keterangan --}}
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Keterangan</label>
                                        <textarea wire:model="keterangan" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                                        @error('keterangan') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                            {{ $editingId ? 'Perbarui' : 'Simpan' }}
                        </button>
                        <button type="button" wire:click="closeModal" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>
