<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendamping extends Model
{
    protected $table = 'pendamping';

    protected $fillable = [
        'pendamping_id', 'user_id'
    ];

}
