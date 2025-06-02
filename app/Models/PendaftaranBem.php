<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranBem extends Model
{
    use HasFactory;
    protected $table = 'pendaftaran_bem';
    protected $fillable = [
        'nama',
        'npm',
        'program_studi',
        'jurusan',
        'angkatan',
        'departemen',
        'alamat',
        'ktm',
        'foto',
        'alasan',
    ];
}
