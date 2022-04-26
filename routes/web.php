<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\PostController;

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

Route::get('/',[HomeController::class,'index'])->name('index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

    Route::get('/calendar',[CalendarController::class,'index'])->name('calendars.index');

Route::prefix('post')->group(function(){
    Route::get('/',[PostController::class,'index'])->name('posts.index');
    Route::get('{id}',[PostController::class,'show'])->name('posts.show');
    Route::get('create',[PostController::class,'create'])->name('posts.create');
    Route::post('/',[PostController::class,'store'])->name('posts.store');
    Route::get('{id}/edit',[PostController::class,'edit'])->name('posts.edit');
    Route::post('{id}',[PostController::class,'update'])->name('posts.update');
    Route::delete('{id}',[PostController::class,'delete'])->name('posts.delete');
});

