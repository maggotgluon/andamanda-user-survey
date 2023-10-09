<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\location;

class Answer extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime',
    ];
    // protected $casts = [
    //     'lacation' => location::class,
    // ];
}
