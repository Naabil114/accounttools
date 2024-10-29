<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;
    protected $table = 'ulasan';
    protected $fillable = [
        'id_user',
        'rating',
        'komentar',
        'status',
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
}
