<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = "transaksi";
    protected $fillable = [
        'barang_id',
        'tanggal',
        'harga',
        'jumlah',
        'mitra',
        'kontak_id',
        'keterangan',
    ];
    public $timestamps = false;
}
