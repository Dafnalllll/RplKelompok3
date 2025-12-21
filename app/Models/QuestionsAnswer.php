<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionsAnswer extends Model
{
    use HasFactory;

    protected $table = 'questions_answer';

    protected $fillable = [
        'question_id',
        'answer',
    ];
}
