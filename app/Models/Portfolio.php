<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'portfolio_img',
        'portfolio_type',
        'portfolio_title',
        'portfolio_url',
    ];
}
