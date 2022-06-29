<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = array(
        'id',
        'title',
        'content',
        'created_at',
        'updated_at'
    );
}
