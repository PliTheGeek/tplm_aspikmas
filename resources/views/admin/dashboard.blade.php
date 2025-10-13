{{-- resources/views/admin/dashboard.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Selamat datang di halaman Admin!") }}

                    <div class="mt-4">
                        <h3 class="text-lg font-medium">Statistik Sederhana</h3>
                        <div class="p-4 bg-gray-100 rounded-lg mt-2">
                            <p>Total Pengguna Terdaftar: <strong>{{ $userCount }}</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>