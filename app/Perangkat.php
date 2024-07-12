<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perangkat extends Model
{
    protected $table = 'perangkatdesa';

    protected $primaryKey = 'perangkat_id';

    protected $fillable = [
        'perangkat_id', 'nama_lengkap', 'jabatan', 'telp', 'desa_id', 'created_at', 'updated_at',
    ];

}
