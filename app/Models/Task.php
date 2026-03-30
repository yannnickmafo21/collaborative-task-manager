<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_creator_id',
        'task_name',
        'task_description',
        'task_date',
        'priority',
    ];

    public function getMembers()
    {
        return $this->belongsToMany(User::class,'members_tasks', 'user_id', 'task_id');
    }
}
