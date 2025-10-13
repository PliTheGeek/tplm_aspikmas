{{-- Menampilkan semua error di bagian atas --}}
@if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
        <p><strong>Harap perbaiki error di bawah ini:</strong></p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="space-y-4">
    {{-- Memanggil komponen untuk setiap field --}}
    <x-form.input 
        name="nama_lengkap" 
        label="Nama Lengkap" 
        :value="$karyawan->nama_lengkap ?? ''" 
    />

    <x-form.input 
        name="posisi" 
        label="Posisi" 
        :value="$karyawan->posisi ?? ''" 
    />

    <x-form.input 
        type="email" 
        name="email" 
        label="Email" 
        :value="$karyawan->email ?? ''" 
    />

    <x-form.input 
        type="date" 
        name="tanggal_masuk" 
        label="Tanggal Masuk" 
        :value="$karyawan->tanggal_masuk ?? ''" 
    />
</div>

<div class="mt-6 flex items-center justify-end gap-x-6">
    <a href="{{ route('admin.karyawan.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Batal</a>
    <button type="submit" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
        Simpan
    </button>
</div>