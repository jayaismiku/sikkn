<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    protected $table = 'logbook';

    protected $primaryKey = 'logbook_id';

    protected $fillable = [
        'logbook_id',
        'nama_kegiatan', 
        'tanggal_kegiatan', 
        'deskripsi_kegiatan',
        'foto_kegiatan', 
        'validasi', 
        'tanggal_validasi', 
        'nim', 
        'created_at', 
        'updated_at', 
    ];

}
