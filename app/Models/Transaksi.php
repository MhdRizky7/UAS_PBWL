<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = "tb_transaksi"; 

    protected $primaryKey = 'transaksi_id'; 

    protected $guarded = [];

    protected $fillable = [
        'transaksi_pelanggan_id',
        'transaksi_produk_id',
        'transaksi_jumlah',
        'transaksi_total_harga',
        'transaksi_tanggal',
         'status_pembayaran',
    ];

    protected $dates = [
        'transaksi_tanggal',
        'created_at',
        'updated_at',
    ];

   
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'transaksi_pelanggan_id', 'pel_id');
    }

    // Relasi dengan tabel produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'transaksi_produk_id', 'produk_id');
    }
}
