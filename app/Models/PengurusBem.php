<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengurusBem extends Model
{
    use HasFactory;
    protected $table = 'pengurus_bem';
    
    protected $fillable = [
        'jabatan',
        'nama',
        'npm',
        'angkatan',
        'departemen',
        'urutan'
    ];

    public static function getDepartemenList()
    {
        return [
            'Departemen Sumber daya Manusia',
            'Departemen sosial dan hubungan masyarakat',
            'Departemen Minat dan Bakat',
            'Departemen Keagamaan'
        ];
    }

    public static function getStructuredData()
    {
        $pengurus = self::orderBy('urutan')->get();
        
        $structured = [
            'pengurus_inti' => [],
            'departemen' => []
        ];

        foreach ($pengurus as $p) {
            if (empty($p->departemen)) {
                $structured['pengurus_inti'][] = $p;
            } else {
                if (!isset($structured['departemen'][$p->departemen])) {
                    $structured['departemen'][$p->departemen] = [];
                }
                $structured['departemen'][$p->departemen][] = $p;
            }
        }

        return $structured;
    }
}
