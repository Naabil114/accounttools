<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategoriakun;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    public $timestamps = true;
    protected $primaryKey= 'id_produk';
    public $incrementing = false;
    
    protected $fillable = [
        'id_produk',
        'id_kategori',
        'email',
        'password',
        'nama_produk',
        'harga',
        'stok',
        'kategori',
        'foto',
        'deskripsi',
        'diskon',
        'status',
        'harga_akhir',
    ];
    public function kategoriakun()
    {
        return $this->belongsTo(Kategoriakun::class, 'id_kategori');
    }
}
