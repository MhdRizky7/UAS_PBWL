<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'tb_pelanggan';
    protected $primaryKey = 'pel_id';
protected $fillable = [
    'pel_id_gol',
    'pel_no',
    'pel_nama',
    'pel_alamat',
    'pel_hp',
    'pel_ktp',
    'pel_seri',
    'pel_aktif',
    'pel_id_user',
];


    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'pel_id_gol', 'gol_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'pel_id_user', 'id');
    }

    public function geneNoSeri()
    {
        $kode = '';
        for ($i = 0; $i <= 16; $i++) {
            $kode .= rand(0, 9);
        }

        return $kode;
    }

    public function geneMeteran()
    {
        $kode = '';
        for ($i = 0; $i <= 10; $i++) {
            $kode .= rand(0, 9);
        }

        return $kode;
    }

    public function geneKodePel()
    {
        $max_id = Pelanggan::max('pel_no');
        $nomor = '';

        if (!$max_id) {
            $nomor = 'PL001';
        } else {
            $explode = explode('PL', $max_id);
            $urut = (int) $explode[1] + 1;
            $nomor = 'PL' . sprintf('%03d', $urut);
        }

        return $nomor;
    }
}
