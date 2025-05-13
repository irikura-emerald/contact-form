<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Auth;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function create(Question $question)
    {
        return view('answer.create', compact('question'));
    }

    public function store(Request $request, Question $question)
    {
        // 入力チェック
        $validated = $request->validate([
            'message' => 'required|max:4294967296',
        ]);

        // 新しく作るAnswerの情報
        $attributes = [
            'question_id' => $question->id,
            'user_id' => Auth::id(),
            'message' => $validated['message'],
        ];

        // 同じAnswerがあれば取得
        $answer = Answer::where($attributes)->first();

        // 同じものがない場合、Answerを保存する
        if ($answer) {
            $request->session()->flash('resultMessage', null);
        } else {
            Answer::create($attributes);
            $request->session()->flash('resultMessage', '回答を保存しました');
        }

        return view('answer.create', compact('question'));
    }

    public function update(Request $request, Question $question)
    {
        // 入力チェック
        $validated = $request->validate([
            'message' => 'required|max:4294967296',
        ]);

        // 本文が違う場合、それをAnswerに反映して更新
        $isMessageChanged = ($validated['message'] <=> $question->answer->message) != 0;
        if ($isMessageChanged) {
            $question->answer->update($validated);
            $request->session()->flash('resultMessage', '回答を更新しました');
        } else {
            $request->session()->flash('resultMessage', null);
        }

        return view('answer.create', compact('question'));
    }

    public function show()
    {
        return view('answer.show');
    }
}
