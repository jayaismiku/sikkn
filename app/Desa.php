<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $table = 'desa';

    protected $primaryKey = 'desa_id';

    protected $fillable = [
        'desa_id', 
        'nama_desa', 
        'alamat', 
        'provinsi', 
        'kota', 
        'kecamatan', 
        'kelurahan', 
        'longitude', 
        'latitude', 
        'status',
        'created_at',
        'updated_at'
    ];

}
