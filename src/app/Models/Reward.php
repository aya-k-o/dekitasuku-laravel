<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reward extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'child_id',
        'points',
        'description',
    ];

    //リレーション:このご褒美は、どの子供に属しているか
    public function child()

    {
        return $this->belongsTo(Child::class, 'child_id');

    }
}