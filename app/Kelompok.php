<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    protected $table = 'kelompok';

    protected $primaryKey = 'kelompok_id';

    public $timestamps = false;

    protected $fillable = [
        'kelompok_id', 
        'nama_kelompok', 
        'pendamping_id', 
        'pemonev_id', 
    ];

}
