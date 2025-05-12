<?php

namespace App\Http\Controllers;

use App\Models\Question;

class AnswerController extends Controller
{
    public function create(Question $question)
    {
        return view('answer.create', compact('question'));
    }

    public function show()
    {
        return view('answer.show');
    }
}
