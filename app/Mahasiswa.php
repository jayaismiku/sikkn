<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $fillable = [
        'nim', 'user_id', 'nama_depan', 'nama_belakang', 'telp', 'alamat', 'provinsi_id', 'kota_id', 'kecamatan_id', 'kelurahan_id', 'fakultas', 'prodi', 'semester', 'krs', 'unggah_krs', 'keuangan', 'unggah_keuangan',
    ];

}
