<?php

// app/Http/Controllers/Admin/DashboardController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Import model User

class DashboardController extends Controller
{
    public function index()
    {
        // Contoh mengambil data jumlah user
        $userCount = User::count();

        // Mengirim data ke view
        return view('admin.dashboard', [
            'userCount' => $userCount
        ]);
    }
}