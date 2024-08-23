<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monev extends Model
{
    protected $table = 'monev';

    protected $primaryKey = 'monev_id';

    protected $fillable = [
        'panitia_id', 'nama_lengkap', 'pekerjaan', 'user_id',
    ];

}
