<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panitia extends Model
{
    protected $table = 'panitia';

    protected $primaryKey = 'panitia_id';

    public $timestamps = false;

    protected $fillable = [
        'panitia_id', 'nama_lengkap', 'pekerjaan', 'user_id',
    ];

}
