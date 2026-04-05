<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    protected $fillable = ['judul', 'slug', 'isi', 'gambar', 'penulis'];

    protected static function boot()
    {
        parent::boot();
        static::creating(fn($b) => $b->slug = Str::slug($b->judul) . '-' . time());
    }
}
