<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';

    protected $primaryKey = 'dosen_id';

    public $timestamps = false;

    protected $fillable = [
        'dosen_id',
        'nidn', 
        'nip', 
        'user_id', 
        'nama_lengkap',
        'gelar_depan', 
        'gelar_belakang', 
        'pangkat', 
        'golongan', 
        'fakultas', 
        'prodi', 
        'telp', 
        'alamat', 
        'provinsi', 
        'kota', 
        'kecamatan', 
        'kelurahan',
    ];

}
