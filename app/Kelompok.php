<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    protected $table = 'kelompok';
    
    protected $primaryKey = 'kelompok_id';

    protected $fillable = [
        'kelompok_id ',
        'nama_kelompok', 
        'jenis_kkn',
        'pendamping_id ', 
        'pemonev_id ', 
        'mahasiswa_id', 
        'desa_id', 
        'created_at', 
        'updated_at', 
    ];

    public function pengelompokan()
    {
        return $this->hasMany(Pengelompokan::class, 'kelompok_id', 'kelompok_id');
    }
}
