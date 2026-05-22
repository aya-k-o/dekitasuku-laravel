<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;



class Child extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id' );
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'child_id');
    }

    //リレーション:この子供は、複数の日記を持っている
    public function diaries()
    {
        return $this->hasMany(Diary::class,'child_id');
    }

    //リレーション:この子供は、複数のタスク完了日記を持っている
    public function taskCompletions()
    {
        return $this->hasMany(TaskCompletion::class, 'child_id');
    }

    //リレーション:この子供は、複数のご褒美を持っている
    public function rewardExchanges()
    {
        return $this->hasMany(RewardExchange::class, 'child_id');
    }
}
