<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_blog',
        'title',
        'content',
        'author',
        'status',
        'dashboardname',
        'views',
        'heart_react',
        'comment',
    ];
}
