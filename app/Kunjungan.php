<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    protected $table = 'kunjungan';

    protected $primaryKey = 'kunjungan_id';

    protected $fillable = [
        'kunjungan_id',
        'dpl_id', 
        'jenis_kunjungan', 
        'unggah_sppd', 
        'bukti_kunjungan', 
        'tanggal_kunjungan', 
        'validasi', 
        'tanggal_validasi', 
        'created_at', 
        'updated_at', 
    ];
}
