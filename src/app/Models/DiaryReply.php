<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaryReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'reply_text',
    ];
    //リレーション: この返信が属する日記
    public function diary()
    {
        return $this->belongsTo(Diary::class);
    }

    //リレーション: この返信を書いた親
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
