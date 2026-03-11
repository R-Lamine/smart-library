<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AiLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'prompt',
        'response_json',
    ];

    protected $casts = [
        'response_json' => 'array',
    ];
}