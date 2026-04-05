<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ppdb extends Model
{
    protected $fillable = ['nama_lengkap', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'pilihan_sekolah', 'no_hp', 'status'];
}
