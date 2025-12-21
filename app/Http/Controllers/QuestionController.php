<?php

namespace App\Http\Controllers;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with('user')->latest()->get();
        return view('pages.admin.questionmanage', compact('questions'));
    }

    public function dashboard()
    {
        $questionCount = Question::count();
        return view('pages.admin.dashboard', compact('questionCount'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        Question::create([
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        return back()->with('success', 'Pertanyaan berhasil dikirim!');
    }

    public function question()
    {
        $questions = Question::with(['answer', 'user'])
            ->whereHas('answer')
            ->latest()
            ->get()
            ->map(function($q) {
                return [
                    'question' => $q->message,
                    'answer' => $q->answer->answer ?? '-',
                    'user' => [
                        'name' => $q->user->name ?? 'Anonim'
                    ]
                ];
            });

        return view('pages.user.faq', compact('questions'));
    }
}
