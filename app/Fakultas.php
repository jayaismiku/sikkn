<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    protected $table = 'fakultas';

    protected $fillable = [
        'fakultas_id', 'kode_fakultas', 'nama_fakultas', 'dekan', 'wadek', 'created_at', 'updated_at',
    ];
}
