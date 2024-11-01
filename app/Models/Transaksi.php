<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    public $timestamps = true;
    protected $primaryKey = 'id_transaksi';
    protected $fillable = [
        'id_transaksi',
        'id_user',
        'id_produk',
        'status',
        'no_hp',
        'nama_customer',
        'total',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk'); // id_barang sebagai foreign key, id_produk sebagai primary key di tabel produk
    }
    

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id'); // id_barang sebagai foreign key, id_produk sebagai primary key di tabel produk
    }
    

}
