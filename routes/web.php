<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// トップ
Route::get('/', function (Request $request) {
    // return view('welcome');
    $myQuestionIds = explode(',', $request->cookie()['myQuestionIds']);
    return view('index', compact('myQuestionIds'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// お問い合わせ
Route::get('question/create', [QuestionController::class, 'create'])
    ->name('question.create');

Route::post('question/create', [QuestionController::class, 'store'])
    ->name('question.store');

// お問い合わせ一覧
Route::get('question/show', [QuestionController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('question.show');

// 回答編集
Route::get('answer/create/{question}', [AnswerController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('answer.create');

Route::post('answer/create/{question}', [AnswerController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('answer.create');

Route::patch('answer/create/{question}', [AnswerController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('answer.create');

// 回答閲覧
Route::get('answer/show/{question}', [AnswerController::class, 'show'])
    ->name('answer.show');

require __DIR__ . '/auth.php';
