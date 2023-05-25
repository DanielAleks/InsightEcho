<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // will not allow id to be set on mass assignments
    protected $gaurded = ['id'];

    // fillable only allows title and body to be set, not id, etc.
    // protected $fillable = ['title', 'body']
}
