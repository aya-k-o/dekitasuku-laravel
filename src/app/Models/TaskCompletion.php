<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskCompletion extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'task_id',
        'child_id',
        'completed_at',
    ];

    //リレーション:このタスクの完了記録は、どのタスクに属しているか
    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    //リレーション:このタスク完了記録は、どの子供に属しているか
    public function child()
    {
        return $this->belongsTo(Child::class, 'child_id');
    }
}
