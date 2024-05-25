<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nama_buku', 'deskripsi', 'kategori', 'tanggal_terbit', 'id_penulis'];
    public $timestamp = true;

    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'id_penulis');
    }
}
