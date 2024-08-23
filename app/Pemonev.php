<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemonev extends Model
{
    protected $table = 'pemonev';

    protected $primaryKey = 'pemonev_id';

    public $timestamps = false;

    protected $fillable = [
        'pemonev_id', 
        'nama_pemonev',
        'user_id', 
    ];

}
