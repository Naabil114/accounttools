<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;
    protected $table = 'detail_transaksi';
    public $timestamps = true;
    protected $fillable = [
        'code_transaksi',
        'total_qty',
        'total_harga',
        'nama_customer',
        'telephone',
        'bulan',
        'status',
    ];
}
