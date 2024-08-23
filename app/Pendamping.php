<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendamping extends Model
{
    protected $table = 'pendamping';

    protected $primaryKey = 'pendamping_id';

    public $timestamps = false;

    protected $fillable = [
        'pendamping_id', 
        'dosen_id', 
    ];

}
