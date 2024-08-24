<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengelompokan extends Model
{
    protected $table = 'pengelompokan';

    protected $primaryKey = 'pengelompokan_id';

    public $timestamps = false;

    protected $fillable = [
        'pengelompokan_id', 
        'kelompok_id',
        'nama_kelompok', 
        'nim', 
        'ketua_kelompok', 
    ];

    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class, 'kelompok_id', 'kelompok_id');
    }

}
