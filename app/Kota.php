<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'kota';

    protected $primaryKey = 'kota_id';

    protected $fillable = [
        'kota_id', 
        'nama_kota', 
        'provinsi_id',
    ];
}
