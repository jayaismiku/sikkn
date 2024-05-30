<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $primaryKey = 'mahasiswa_id';

    public $timestamps = false;

    protected $fillable = [
        'mahasiswa_id',
        'nim', 
        'user_id', 
        'nama_lengkap',
        'alamat', 
        'provinsi_id', 
        'kota_id', 
        'kecamatan_id', 
        'kelurahan_id', 
        'telp', 
        'fakultas', 
        'prodi', 
        'semester', 
        'unggah_krs', 
        'validasi_krs',
        'unggah_keuangan',
        'validasi_keuangan', 
        'unggah_ukt',
        'validasi_ukt', 
        'sakit_berat',
        'alergi', 
    ];

}
