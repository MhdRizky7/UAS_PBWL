<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;

class Golongan extends Model
{
    use HasFactory;

    protected $table = "tb_golongan"; // Sesuaikan dengan nama tabel yang Anda gunakan

    protected $primaryKey = 'gol_id'; // Sesuaikan dengan nama primary key tabel
    protected $guarded = [];

    protected $fillable = [
        'gol_kode',
        'gol_nama',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
