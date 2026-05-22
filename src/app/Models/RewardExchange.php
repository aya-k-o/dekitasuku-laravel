<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RewardExchange extends Model
{
    use HasFactory;

    protected $fillable = [
        'reward_id',
        'exchanged_at',
        
    ];

    public function child()
    {
        return $this->belongsTo(Child::class, 'child_id');
    }

    public function reward()
    {
        return $this->belongsTo(Reward::class, 'reward_id');
    }
}
