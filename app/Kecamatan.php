<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';

    protected $primaryKey = 'kecamatan_id';

    protected $fillable = [
        'kecamatan_id', 
        'nama_kecamatan', 
        'kota_id',
    ];
}
