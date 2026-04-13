<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $fillable = ['jenjang', 'nama', 'profil', 'fasilitas', 'jurusan', 'data_guru', 'foto', 'struktur_organisasi', 'foto_struktur'];

    public function strukturs()
    {
        return $this->hasMany(StrukturSekolah::class)->orderBy('urutan');
    }
}
