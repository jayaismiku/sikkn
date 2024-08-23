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
        'nama_mhs', 
        'jenis_kelamin', 
        'alamat', 
        'kelurahan_id', 
        'kecamatan_id', 
        'kota_id', 
        'provinsi_id', 
        'telp', 
        'fakultas', 
        'prodi', 
        'semester', 
        'jenis_kkn', 
        'unggah_krs', 
        'validasi_krs',
        'unggah_biaya',
        'validasi_biaya', 
        'unggah_ukt',
        'validasi_ukt', 
        'unggah_surat_kesediaan', 
        'validasi_surat_kesediaan', 
        'unggah_surat_ijin_ortu', 
        'validasi_surat_ijin_ortu', 
        'sakit_berat',
        'alergi', 
        'nama_ortu', 
        'telp_ortu', 
        'user_id', 
    ];

}
