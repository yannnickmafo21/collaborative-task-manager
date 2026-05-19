<?php

namespace App\Models;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MembersTasks extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'task_id',
    ];

    public function get_task_participe(): HasMany
    {
        return $this->hasMany(Task::class, "id" );
    }
}
