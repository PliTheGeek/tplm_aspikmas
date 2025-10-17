<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = ['nama_lengkap', 'posisi', 'email', 'tanggal_masuk'];
}
