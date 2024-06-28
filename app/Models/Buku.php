<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'tb_buku';
    protected $primaryKey = 'id';

    protected $fillable = [
        'judul_buku',
        'penulis',
        'penerbit',
        'th_terbit',
        'genre',
        'deskripsi',
        'sampul',
        'status',
    ];

    protected $hidden=[
        'created_at',
        'updated_at'
    ];

    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class);
    }
}