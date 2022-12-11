<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/papers','App\Http\Controllers\PaperController@index')->name('papers.index');

// 登録処理
Route::get('/papers/create','App\Http\Controllers\PaperController@create')->name('paper.create')->middleware('auth');
Route::post('/papers/store/','App\http\controllers\PaperController@store')->name('paper.store')->middleware('auth');

// 編集処理
Route::get('/papers/edit/{paper}','App\Http\Controllers\PaperController@edit')->name('paper.edit')->middleware('auth');
Route::put('/papers/edit/{paper}','App\Http\Controllers\PaperController@update')->name('paper.update')->middleware('auth');

// 詳細
Route::get('/papers/show/{paper}','App\Http\Controllers\PaperController@show')->name('paper.show');

// 削除処理
Route::delete('/papers/{paper}','App\Http\Controllers\PaperController@destroy')->name('paper.destroy')->middleware('auth');