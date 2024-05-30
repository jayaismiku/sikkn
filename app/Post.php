<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $primaryKey = 'post_id';

    protected $fillable = [
        'post_id',
        'judul',
        'slug',
        'deskripsi', 
        'penulis',
        'created_at', 
        'updated_at', 
    ];

}
