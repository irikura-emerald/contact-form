<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function create()
    {
        return view('answer.create');
    }

    public function show()
    {
        return view('answer.show');
    }
}
