<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Track extends Model
{
    //
    use HasFactory;

    protected $fillable = ['title', 'artist', 'file_path'];
    
}

 
