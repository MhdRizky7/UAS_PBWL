<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = "tb_produk"; // Sesuaikan dengan nama tabel yang Anda gunakan

    protected $primaryKey = 'produk_id'; // Sesuaikan dengan nama primary key tabel

    protected $guarded = [];

    protected $fillable = [
        'produk_pelanggan_id',
        'produk_nama',
        'kategori_produk',
        'produk_deskripsi',
        'produk_harga',
        'produk_stok',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // Relasi dengan tabel pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'produk_pelanggan_id', 'pel_id');
    }
}
