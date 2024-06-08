<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'notices_id',
        'courses_id',
        'events_id',
        'highlighted',
        'read',
        'title',
        'body',
        'date',
    ];
}
