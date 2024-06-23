<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsi';

    protected $primaryKey = 'provinsi_id';

    protected $fillable = [
        'provinsi_id', 
        'nama_provinsi', 
        'status',
    ];
}
