<?php

namespace App\Models;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'contenu',
        'created_at',
        'task_id',
    ];

    public function getUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id') ;
    }

    public function getTaskComment(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}
