<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $karyawans = Karyawan::latest()->paginate(10); // Ambil data, urutkan dari terbaru
    return view('admin.karyawan.index', compact('karyawans'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'posisi' => 'required|string|max:255',
        'email' => 'required|email|unique:karyawans,email',
        'tanggal_masuk' => 'required|date',
    ]);

    Karyawan::create($validated);
        return redirect()->route('admin.karyawan.index')->with('success', 'Karyawan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('admin.karyawan.edit', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karyawan $karyawan) // <-- DIUBAH DI SINI
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            // Pastikan Anda menyertakan validasi email yang benar
            'email' => 'required|email|unique:karyawans,email,' . $karyawan->id,
            'tanggal_masuk' => 'required|date',
        ]);

        $karyawan->update($validated);
        
        return redirect()->route('admin.karyawan.index')->with('success', 'Data karyawan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan) // <-- DIUBAH DI SINI
    {
        $karyawan->delete();
        
        return redirect()->route('admin.karyawan.index')->with('success', 'Data karyawan berhasil dihapus.');
    }
}
