<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monev extends Model
{
    protected $table = 'monev';

    protected $primaryKey = 'monev_id';

    protected $fillable = [
        'pemonev_id', 
        'kelompok_id', 
        'keadaan_mahasiswa', 
        'penilaian',
        'nilai',
        'catatan',
        'created_at',
        'updated_at',
    ];

}
