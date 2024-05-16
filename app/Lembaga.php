<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lembaga extends Model
{
    protected $table = 'lembaga';

    protected $fillable = [
        'lembaga_id', 'user_id', 'jabatan',
    ];

}
