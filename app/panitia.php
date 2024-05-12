<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panitia extends Model
{
    protected $table = 'panitia';

    protected $fillable = [
        'panitia_id', 'user_id', 'pekerjaan',
    ];

}
