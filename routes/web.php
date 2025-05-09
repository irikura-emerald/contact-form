<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('question/create', [QuestionController::class, 'create'])
    ->name('question.create');

Route::post('question/create', [QuestionController::class, 'store'])
    ->name('question.store');

Route::get('question/show', [QuestionController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('question.show');

Route::get('answer/create', [AnswerController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('answer.create');

Route::post('answer/show', [AnswerController::class, 'show'])
    ->name('answer.show');

require __DIR__ . '/auth.php';
