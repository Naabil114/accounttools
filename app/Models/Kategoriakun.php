<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoriakun extends Model
{
    use HasFactory;
    protected $table = 'kategoriakun';
    protected $primaryKey = 'id_kategori';
    
    

    protected $fillable = [
        'id_kategori',
        'foto',
        'nama',

    ];
    public function produk()
{
    return $this->hasMany(Produk::class, 'id_kategori');
}
    
}
