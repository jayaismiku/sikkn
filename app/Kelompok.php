<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    protected $table = 'kelompok';

    protected $primaryKey = 'kelompok_id';

    protected $fillable = [
        'kelompok_id', 
        'nama_kelompok', 
        'jenis_kkn', 
        'pendamping_id', 
        'pemonev_id', 
        'desa_id', 
    ];

}
