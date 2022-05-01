<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\TeacherController;

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

Route::prefix('information')->group(function(){
    Route::get('/',[InformationController::class,'index'])->name('informations.index');
    Route::get('/',[TeacherController::class,'index'])->name('teacher.show');
    Route::get('create',[TeacherController::class,'create'])->name('teacher.create');
    Route::post('/',[TeacherController::class,'store'])->name('teacher.store');
    Route::get('{id}/edit',[TeacherController::class,'edit'])->name('teacher.edit');
    Route::post('{id}',[TeacherController::class,'update'])->name('teacher.update');
    Route::delete('{id}',[TeacherController::class,'delete'])->name('teacher.delete');

});
