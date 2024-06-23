<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'kelurahan';

    protected $primaryKey = 'kelurahan_id';

    protected $fillable = [
        'kelurahan_id', 
        'nama_kelurahan', 
        'kecamatan_id',
    ];
}
