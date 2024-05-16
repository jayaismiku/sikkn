<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';

    protected $fillable = [
        'nidn', 'nip', 'user_id', 'nama_depan', 'nama_belakang', 'gelar_depan', 'gelar_belakang', 'pangkat', 'golongan', 'fakultas', 'prodi', 'telp', 'alamat', 'provinsi', 'kota', 'kecamatan', 'kelurahan',
    ];

}
