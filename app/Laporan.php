<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';

    protected $primaryKey = 'laporan_id';

    protected $fillable = [
        'laporan_id',
        'judul_laporan', 
        'tipe_laporan', 
        'unggah_file',
        'tanggal_unggah', 
        'validasi', 
        'tanggal_validasi', 
        'kelompok_id', 
        'created_at', 
        'updated_at', 
    ];
}
