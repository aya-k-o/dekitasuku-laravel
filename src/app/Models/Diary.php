<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diary extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'child_id',
        'body',
        'mind_score',
        'body_score',
    ];

    //リレーション:この日記は、どの子供に属しているか
    public function child()
    {
        return $this->belongsTo(Child::class, 'child_id');
    }
}
