<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\IntroductionController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\AttendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\RecruitController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/',[HomeController::class,'index'])->name('index');

Route::prefix('calendar')->group(function(){
    Route::get('',[CalendarController::class,'index'])->name('calendars.index'); //顯示行事曆
    Route::get('/create/{month?}',[CalendarController::class,'create'])->name('calendar.create');
    Route::post('/',[CalendarController::class,'store'])->name('calendar.store');
    Route::get('/{id}/edit',[CalendarController::class,'edit'])->name('calendar.edit');
    Route::post('{id}',[CalendarController::class,'update'])->name('calendar.update');
    Route::delete('/{id}',[CalendarController::class,'destroy'])->name('calendar.destroy');
});

Route::prefix('posts')->group(function(){
    Route::get('',[PostController::class,'index'])->name('posts.index');
    Route::get('/create',[PostController::class,'create'])->name('posts.create');
    Route::post('/',[PostController::class,'store'])->name('posts.store');
    Route::get('/{id}/edit',[PostController::class,'edit'])->name('posts.edit');
    Route::post('{id}',[PostController::class,'update'])->name('posts.update');
    Route::delete('/{id}',[PostController::class,'destroy'])->name('posts.destroy');
    Route::get('/{id}',[PostController::class,'show'])->name('posts.show');
});

Route::prefix('teacher')->group(function(){
    Route::get('/',[TeacherController::class,'index'])->name('teacher.show');
    Route::get('/create',[TeacherController::class,'create'])->name('teacher.create');
    Route::post('/',[TeacherController::class,'store'])->name('teacher.store');
    Route::get('{id}/edit',[TeacherController::class,'edit'])->name('teacher.edit');
    Route::post('{id}',[TeacherController::class,'update'])->name('teacher.update');
    Route::delete('{id}',[TeacherController::class,'destroy'])->name('teacher.destroy');
});

Route::prefix('introduction')->group(function(){
    Route::get('/',[IntroductionController::class,'index'])->name('introduction.show');
    Route::get('/create',[IntroductionController::class,'create'])->name('introduction.create');
    Route::post('/',[IntroductionController::class,'store'])->name('introduction.store');
    Route::get('{id}/edit',[IntroductionController::class,'edit'])->name('introduction.edit');
    Route::post('{id}',[IntroductionController::class,'update'])->name('introduction.update');
    Route::delete('{id}',[IntroductionController::class,'destroy'])->name('introduction.destroy');
});

Route::prefix('award')->group(function(){
    Route::get('/',[AwardController::class,'index'])->name('award.show');
    Route::get('/create',[AwardController::class,'create'])->name('award.create');
    Route::post('/',[AwardController::class,'store'])->name('award.store');
    Route::get('{id}/edit',[AwardController::class,'edit'])->name('award.edit');
    Route::post('{id}',[AwardController::class,'update'])->name('award.update');
    Route::delete('{id}',[AwardController::class,'destroy'])->name('award.destroy');
});

Route::prefix('attend')->group(function(){
    Route::get('/',[AttendController::class,'index'])->name('attends.index'); //list
    Route::get('/create',[AttendController::class,'create'])->name('attends.create');
    Route::post('/',[AttendController::class,'store'])->name('attends.store');
    Route::get('{id}/edit',[AttendController::class,'edit'])->name('attends.edit');
    Route::post('{id}',[AttenddController::class,'update'])->name('attends.update');
    Route::delete('{id}',[AttendController::class,'destroy'])->name('attends.destroy');
    Route::get('/show',[AttendController::class,'show'])->name('attends.show');
});

Route::prefix('member')->group(function(){
    Route::get('/',[UserController::class,'edit'])->name('user.edit');
    Route::post('/{id}',[UserController::class,'update'])->name('user.update');
});

/*未完成
Route::prefix('equipment')->group(function(){
    Route::get('/',[EquipmentController::class,'index'])->name('attends.index'); //list
    Route::get('/',[EquipmentController::class,''])->name('attends.create');
    Route::get('/',[EquipmentController::class,'edit'])->name('attends.edit');
});*/

Route::prefix('recruit')->group(function(){
    Route::get('/',[RecruitController::class,'index'])->name('recruit.index');
    Route::get('/create',[RecruitController::class,'create'])->name('recruit.create');
    Route::post('/',[RecruitController::class,'store'])->name('recruit.store');
    Route::get('{id}/edit',[RecruitController::class,'edit'])->name('recruit.edit');
    Route::post('{id}',[RecruitController::class,'update'])->name('recruit.update');
    Route::delete('{id}',[RecruitController::class,'destroy'])->name('recruit.destroy');
    Route::get('/show',[RecruitController::class,'show'])->name('recruit.show');
});
