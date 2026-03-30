<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembersTasks extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'task_id',
    ];
}
