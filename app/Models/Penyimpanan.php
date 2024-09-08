<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyimpanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'deskripsi',
        'stok_tersedia',
        'harga_satuan',
        'kategori',
    ];

    protected $casts = [
        'harga_satuan' => 'decimal:2',
    ];
}
