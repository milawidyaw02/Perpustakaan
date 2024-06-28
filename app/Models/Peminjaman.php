<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = "tb_peminjaman";
    protected $primaryKey = "id";

    protected $fillable = [
        'id_anggota',
        'id_buku',
        'tgl_pinjam',
        'tgl_kembali',
        'tgl_jatuh_tempo'
    ];

    protected $hidden = ['updated_at' , 'created_at'];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}