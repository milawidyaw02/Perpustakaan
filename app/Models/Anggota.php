<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table = 'tb_anggota';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_lengkap',
        'alamat',
        'no_telp',
        'email',
        'tgl_lahir',
        'tgl_bergabung',
        'status_anggota',
        'foto'
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