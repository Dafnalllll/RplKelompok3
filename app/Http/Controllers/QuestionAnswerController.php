<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionsAnswer;

class QuestionAnswerController extends Controller
{
    public function store(Request $request, $questionId)
    {
        $request->validate([
            'answer' => 'required|string|max:2000',
        ]);

        QuestionsAnswer::updateOrCreate(
            ['question_id' => $questionId],
            ['answer' => $request->answer]
        );

        return back()->with('status', 'Jawaban Berhasil Diupdate!');
    }
}
