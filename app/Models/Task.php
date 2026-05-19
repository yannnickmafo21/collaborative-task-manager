<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_creator_id',
        'task_name',
        'task_description',
        'task_date',
        'priority',
        'status',
    ];

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'members_tasks', 'task_id', 'user_id');
    }

    

    public function comment_task(): HasMany
    {
        return $this->hasMany(Comments::class);
    }
}
