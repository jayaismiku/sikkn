<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'prodi';

    protected $primaryKey = 'prodi_id';

    protected $fillable = [
        'prodi_id', 
        'kode_prodi', 
        'nama_prodi',
        'kaprodi',
        'sekprodi',
        'fakultas',
        'created_at',
        'updated_at'
    ];
}

