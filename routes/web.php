<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('/dashboard', [App\Http\Controllers\Questions::class, 'all'])->middleware('auth')
    ->name('dashboard');
Route::get('/question/{id}', [App\Http\Controllers\Questions::class, 'question'])->middleware('auth')->where('id', '[0-9]+');
Route::get('/logout', [App\Http\Controllers\User::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/delete/{id}', [App\Http\Controllers\User::class, 'delete'])->middleware('auth')->where('id', '[0-9]+');
Route::post('/add_comments/{id}', [App\Http\Controllers\Questions::class, 'add_comments'])->middleware('auth')->where('id', '[0-9]+');
Route::get('/add', [App\Http\Controllers\Questions::class, 'newQuestion'])->middleware('auth')->name('add');
Route::post('/newQuestion', [App\Http\Controllers\Questions::class, 'add'])->middleware('auth')->name('addQuestion');
Route::get('/questions/{id}', [App\Http\Controllers\Questions::class, 'QuestionsUser'])->middleware('auth')->where('id', '[0-9]+');
Route::get('/question_delete/{id}', [App\Http\Controllers\Questions::class, 'deleteQuestion'])->middleware('auth')->where('id', '[0-9]+');
Route::get('/admin', function () {
    if (Auth::user()->permission) {
        return view('user.admin',['users'=>DB::table('users')->get()]);
    };
});
