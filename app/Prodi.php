<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'prodi';

    protected $fillable = [
        'prodi_id', 'kode_prodi', 'nama_prodi'
    ];
}
