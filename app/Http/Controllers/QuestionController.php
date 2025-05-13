<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create()
    {
        return view('question.create');
    }

    public function store(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'name' => 'max:255',
            'mail_address' => 'max:255',
            'telephonenumber' => 'max:255',
            'message' => 'required|max:4294967296',
        ]);

        // nameが未入力なら「匿名」にする
        if (empty($validated['name'])) {
            $validated['name'] = '匿名';
        }

        // すでに同じものがあるならそれを取得
        // ないなら新しいQuestionを作成
        $question = Question::with('answer')->where([
            ['name', $validated['name']],
            ['mail_address', $validated['mail_address']],
            ['telephonenumber', $validated['telephonenumber']],
            ['message', $validated['message']],
        ])->firstOr(fn() => Question::create($validated));

        // 取得したQuestionのidをviewへ渡す
        $request->session()->flash('questionId', $question->id);

        // CookieをIDの配列として取得
        // ない場合は空の配列を取得
        define('MY_QUESTION_IDS', 'myQuestionIds');
        $myQuestionIds = $request->hasCookie(MY_QUESTION_IDS)
            ? explode(',', $request->cookie(MY_QUESTION_IDS)) : [];

        // IDの配列に取得したQueistionのidを追加(重複は認めない)
        if (!in_array($question->id, $myQuestionIds)) {
            array_push($myQuestionIds, strval($question->id));
        }

        // viewを指定
        $response = response()->view('question.store');

        // Cookieの登録
        $response->cookie(MY_QUESTION_IDS, implode(',', $myQuestionIds), 7 * 24 * 60);
        return $response;
    }

    public function show()
    {
        define('PER_PAGE', 10);
        $questions = Question::paginate(PER_PAGE);
        return view('question.show', compact('questions'));
    }
}
