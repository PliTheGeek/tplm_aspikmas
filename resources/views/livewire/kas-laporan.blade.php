<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Header -->
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Laporan Kas</h2>

                        <div class="flex gap-3">
                            <button wire:click="exportPDF"
                                class="flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg shadow transition">
                                <span>📄</span>
                                <span>Export PDF</span>
                            </button>

                            <button wire:click="exportExcel"
                                class="flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow transition">
                                <span>📊</span>
                                <span>Export Excel</span>
                            </button>
                        </div>
                    </div>


                    <!-- Flash Message -->
                    @if (session()->has('message'))
                        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded mb-4"
                            role="alert">
                            <span class="block sm:inline">{{ session('message') }}</span>
                        </div>
                    @endif

                    <!-- Filter Section -->
                    <div class="mb-6 bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold mb-4">Filter Laporan</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <!-- Jenis Periode -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Periode</label>
                                <select wire:model.live="jenisPeriode"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="bulan">Per Bulan</option>
                                    <option value="custom">Custom Periode</option>
                                </select>
                            </div>

                            <!-- Filter Tipe -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Tipe Transaksi</label>
                                <select wire:model.live="tipeFilter"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="">Semua Transaksi</option>
                                    <option value="pemasukan">Pemasukan Saja</option>
                                    <option value="pengeluaran">Pengeluaran Saja</option>
                                </select>
                            </div>
                        </div>

                        <!-- Filter Bulan/Tahun atau Custom -->
                        @if ($jenisPeriode === 'bulan')
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Bulan</label>
                                    <select wire:model.live="bulan"
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}">
                                                {{ \Carbon\Carbon::create()->month($i)->format('F') }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Tahun</label>
                                    <select wire:model.live="tahun"
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        @for ($y = date('Y'); $y >= date('Y') - 5; $y--)
                                            <option value="{{ $y }}">{{ $y }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        @else
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Mulai</label>
                                    <input type="date" wire:model.live="tanggalMulai"
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Selesai</label>
                                    <input type="date" wire:model.live="tanggalSelesai"
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Summary Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                        <!-- Saldo Awal -->
                        <div class="bg-blue-100 p-4 rounded-lg shadow">
                            <div class="text-sm text-blue-600 font-medium">Saldo Awal</div>
                            <div class="text-2xl font-bold text-blue-700">Rp
                                {{ number_format($saldoAwal, 0, ',', '.') }}</div>
                        </div>

                        <!-- Total Pemasukan -->
                        <div class="bg-green-100 p-4 rounded-lg shadow">
                            <div class="text-sm text-green-600 font-medium">Total Pemasukan</div>
                            <div class="text-2xl font-bold text-green-700">Rp
                                {{ number_format($totalPemasukan, 0, ',', '.') }}</div>
                        </div>

                        <!-- Total Pengeluaran -->
                        <div class="bg-red-100 p-4 rounded-lg shadow">
                            <div class="text-sm text-red-600 font-medium">Total Pengeluaran</div>
                            <div class="text-2xl font-bold text-red-700">Rp
                                {{ number_format($totalPengeluaran, 0, ',', '.') }}</div>
                        </div>

                        <!-- Saldo Akhir -->
                        <div class="bg-purple-100 p-4 rounded-lg shadow">
                            <div class="text-sm text-purple-600 font-medium">Saldo Akhir</div>
                            <div class="text-2xl font-bold text-purple-700">Rp
                                {{ number_format($saldoAkhir, 0, ',', '.') }}</div>
                        </div>
                    </div>

                    <!-- Info Periode -->
                    <div class="bg-indigo-50 border-l-4 border-indigo-500 p-4 mb-6">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-indigo-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-indigo-700">
                                    <strong>Periode Laporan:</strong>
                                    @if ($jenisPeriode === 'bulan')
                                        {{ \Carbon\Carbon::create()->month($bulan)->format('F') }} {{ $tahun }}
                                    @else
                                        {{ \Carbon\Carbon::parse($tanggalMulai)->format('d/m/Y') }} -
                                        {{ \Carbon\Carbon::parse($tanggalSelesai)->format('d/m/Y') }}
                                    @endif
                                    @if ($tipeFilter)
                                        | Menampilkan: <strong>{{ ucfirst($tipeFilter) }}</strong>
                                    @else
                                        | Menampilkan: <strong>Semua Transaksi</strong>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Table Transaksi -->
                    <div class="overflow-x-auto">
                        <h3 class="text-lg font-semibold mb-4">Detail Transaksi</h3>
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        No</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tanggal</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Kategori</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Keterangan</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tipe</th>
                                    <th
                                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Pemasukan</th>
                                    <th
                                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Pengeluaran</th>
                                    <th
                                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Saldo</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <!-- Baris Saldo Awal -->
                                <tr class="bg-blue-50">
                                    <td colspan="5" class="px-6 py-4 text-sm font-semibold text-gray-900">SALDO AWAL
                                    </td>
                                    <td class="px-6 py-4 text-sm text-right text-gray-900">-</td>
                                    <td class="px-6 py-4 text-sm text-right text-gray-900">-</td>
                                    <td class="px-6 py-4 text-sm text-right font-bold text-blue-700">
                                        Rp {{ number_format($saldoAwal, 0, ',', '.') }}
                                    </td>
                                </tr>

                                @php $runningBalance = $saldoAwal; @endphp
                                @forelse($transactions as $index => $transaction)
                                    @php
                                        if ($transaction->tipe === 'pemasukan') {
                                            $runningBalance += $transaction->jumlah;
                                        } else {
                                            $runningBalance -= $transaction->jumlah;
                                        }
                                    @endphp
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $index + 1 }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $transaction->tanggal->format('d/m/Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $transaction->category->nama }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900">
                                            {{ $transaction->keterangan ?? '-' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $transaction->tipe === 'pemasukan' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ ucfirst($transaction->tipe) }}
                                            </span>
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-right text-green-600 font-medium">
                                            {{ $transaction->tipe === 'pemasukan' ? 'Rp ' . number_format($transaction->jumlah, 0, ',', '.') : '-' }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-right text-red-600 font-medium">
                                            {{ $transaction->tipe === 'pengeluaran' ? 'Rp ' . number_format($transaction->jumlah, 0, ',', '.') : '-' }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-right font-semibold text-gray-900">
                                            Rp {{ number_format($runningBalance, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="px-6 py-8 text-center text-gray-500">
                                            <div class="flex flex-col items-center">
                                                <svg class="h-12 w-12 text-gray-400 mb-2" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                                <p class="text-lg font-medium">Tidak ada transaksi pada periode ini</p>
                                                <p class="text-sm">Coba ubah filter atau periode laporan</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse

                                <!-- Baris Total -->
                                @if ($transactions->count() > 0)
                                    <tr class="bg-gray-100 font-bold">
                                        <td colspan="5" class="px-6 py-4 text-sm text-gray-900">TOTAL</td>
                                        <td class="px-6 py-4 text-sm text-right text-green-700">
                                            Rp {{ number_format($totalPemasukan, 0, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-right text-red-700">
                                            Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-right text-gray-900">-</td>
                                    </tr>

                                    <!-- Baris Saldo Akhir -->
                                    <tr class="bg-purple-50 font-bold">
                                        <td colspan="5" class="px-6 py-4 text-sm text-gray-900">SALDO AKHIR</td>
                                        <td class="px-6 py-4 text-sm text-right text-gray-900">-</td>
                                        <td class="px-6 py-4 text-sm text-right text-gray-900">-</td>
                                        <td class="px-6 py-4 text-sm text-right font-bold text-purple-700 text-lg">
                                            Rp {{ number_format($saldoAkhir, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <!-- Analisis Singkat -->
                    @if ($transactions->count() > 0)
                        <div class="mt-6 bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-lg font-semibold mb-3">Analisis Keuangan</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-gray-700">
                                        <strong>Selisih:</strong>
                                        <span
                                            class="{{ $totalPemasukan - $totalPengeluaran >= 0 ? 'text-green-600' : 'text-red-600' }} font-semibold">
                                            Rp {{ number_format($totalPemasukan - $totalPengeluaran, 0, ',', '.') }}
                                        </span>
                                    </p>
                                    <p class="text-sm text-gray-700 mt-2">
                                        <strong>Jumlah Transaksi:</strong> {{ $transactions->count() }} transaksi
                                    </p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-700">
                                        <strong>Rasio Pengeluaran:</strong>
                                        @if ($totalPemasukan > 0)
                                            {{ number_format(($totalPengeluaran / $totalPemasukan) * 100, 1) }}%
                                        @else
                                            0%
                                        @endif
                                    </p>
                                    <p class="text-sm text-gray-700 mt-2">
                                        <strong>Status:</strong>
                                        @if ($saldoAkhir > $saldoAwal)
                                            <span class="text-green-600 font-semibold">💹 Surplus</span>
                                        @elseif($saldoAkhir < $saldoAwal)
                                            <span class="text-red-600 font-semibold">📉 Defisit</span>
                                        @else
                                            <span class="text-blue-600 font-semibold">➡️ Seimbang</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Button Actions -->
                    <div class="mt-6 flex justify-between items-center">
                        <a href="{{ route('kas.dashboard') }}" class="text-blue-600 hover:text-blue-800">
                            ← Kembali ke Dashboard Kas
                        </a>
                        <button onclick="window.print()"
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            🖨️ Print Laporan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Print Styles -->
    <style>
        @media print {

            nav,
            .no-print,
            button {
                display: none !important;
            }

            .bg-white {
                box-shadow: none !important;
            }
        }
    </style>
</div>
