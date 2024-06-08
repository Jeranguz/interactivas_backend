<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'courses_id',
        'categories_id',
        'tags_id',
        'users_id',
        'title',
        'start',
        'end',
        'status',
        'description',
        'image',
        'percentage',
    ];
}
