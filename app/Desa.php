<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $table = 'desa';

    protected $fillable = [
        'desa_id', 'nama_desa', 'alamat', 'provinsi', 'kota', 'kecamatan', 'kelurahan', 'longitude', 'latitude', 'status',
    ];

}
