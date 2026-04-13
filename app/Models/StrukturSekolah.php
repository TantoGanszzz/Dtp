<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StrukturSekolah extends Model
{
    protected $fillable = ['sekolah_id', 'jabatan', 'nama', 'foto', 'urutan'];

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class);
    }
}
