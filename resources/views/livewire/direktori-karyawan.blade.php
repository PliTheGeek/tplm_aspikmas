<div>
    <div class="mb-4">
        <input 
            type="text" 
            wire:model.live="search" 
            placeholder="Cari nama atau posisi karyawan..."
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
        >
    </div>

    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full divide-y-2 divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-left">Nama Lengkap</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-left">Posisi</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-left">Email</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($karyawans as $karyawan)
                <tr>
                    <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $karyawan->nama_lengkap }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $karyawan->posisi }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $karyawan->email }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center py-4 text-gray-500">Tidak ada karyawan yang cocok dengan pencarian.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $karyawans->links() }}
    </div>
</div>