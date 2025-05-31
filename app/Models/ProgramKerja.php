<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKerja extends Model
{
    use HasFactory;

    protected $table = 'program_kerja';
    
    protected $fillable = [
        'departemen',
        'program_kerja',
        'keterangan',
        'urutan'
    ];

    public static function getStructuredData()
    {
        return self::orderBy('urutan')->get()->groupBy('departemen');
    }
}
