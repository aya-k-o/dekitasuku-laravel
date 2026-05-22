<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reward extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'required_points',
        'description',
    ];

    //リレーション:このご褒美を登録した親
    public function user()

    {
        return $this->belongsTo(User::class, 'user_id');

    }
}