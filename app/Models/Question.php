<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'message',
    ];

    // Relasi ke user
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Relasi ke jawaban
    public function answer()
    {
        return $this->hasOne(\App\Models\QuestionsAnswer::class, 'question_id');
    }
}
