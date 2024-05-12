<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';

    protected $fillable = [
        'admin_id', 'user_id', 'nama_depan', 'nama_belakang', 
    ];

}
