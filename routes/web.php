<?php


    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\CalendarController;
    use App\Http\Controllers\PostController;
    use App\Http\Controllers\InformationController;
    use App\Http\Controllers\TeacherController;
    use App\Http\Controllers\IntroductionController;
    use App\Http\Controllers\AwardController;
    use App\Http\Controllers\ActiveController;
    use App\Http\Controllers\SheetMusicController;
    use App\Http\Controllers\SheetRequController;
    use App\Http\Controllers\AttendController;
    use App\Http\Controllers\UserController;

    use App\Http\Controllers\RecruitController;
    use App\Http\Controllers\AccountantController;
    use App\Http\Controllers\ApplyController;
    use App\Http\Controllers\EvaluationController;
    use App\Http\Controllers\PrecautionController;
    use App\Http\Controllers\ArchitectureController;
    use App\Http\Controllers\OrganizeController;




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

    Route::prefix('active')->group(function(){
        Route::get('show/{show}',[ActiveController::class,'show'])->name('active.show');
        Route::get('create',[ActiveController::class,'create'])->name('active.create');
        Route::post('/',[ActiveController::class,'store'])->name('active.store');
        Route::get('{id}/edit',[ActiveController::class,'edit'])->name('active.edit');
        Route::post('{id}',[ActiveController::class,'update'])->name('active.update');
        Route::delete('{id}',[ActiveController::class,'destroy'])->name('active.destroy');
    });

    Route::prefix('attend')->group(function(){
        Route::get('/',[AttendController::class,'index'])->name('attends.index'); //list
        Route::get('/create',[AttendController::class,'create'])->name('attends.create');
        Route::post('/',[AttendController::class,'store'])->name('attends.store');
        Route::get('{id}/edit',[AttendController::class,'edit'])->name('attends.edit');
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
        Route::get('/show',[RecruitController::class,'show'])->name('recruit.show');
        Route::get('/list',[RecruitController::class,'list'])->name('recruit.list');
    });

    Route::prefix('accountant')->group(function(){
        Route::get('/',[AccountantController::class,'create'])->name('accountant.create');
        Route::get('/show',[AccountantController::class,'show'])->name('accountant.show');
    });

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);


Route::get('/',[HomeController::class,'index'])->name('index');

Route::prefix('calendar')->group(function(){
    Route::get('',[CalendarController::class,'index'])->name('calendars.index'); //顯示行事曆
    Route::get('/create/{month?}',[CalendarController::class,'create'])->name('calendar.create')->middleware('auth');
});

Route::prefix('posts')->group(function(){
    Route::get('/tag/{tag?}',[PostController::class,'index'])->name('posts.index');
    Route::get('/create',[PostController::class,'create'])->name('posts.create')->middleware('auth');
    Route::post('/',[PostController::class,'store'])->name('posts.store')->middleware('auth');
    Route::get('/edit/{id}',[PostController::class,'edit'])->name('posts.edit')->middleware('auth');
    Route::post('/{id}',[PostController::class,'update'])->name('posts.update')->middleware('auth');
    Route::delete('/{id}',[PostController::class,'destroy'])->name('posts.destroy')->middleware('auth');
    Route::get('/show/{id}',[PostController::class,'show'])->name('posts.show');
});

Route::prefix('teacher')->group(function(){
    Route::get('/',[TeacherController::class,'index'])->name('teacher.show');
    Route::get('/create',[TeacherController::class,'create'])->name('teacher.create')->middleware('auth');
    Route::post('/',[TeacherController::class,'store'])->name('teacher.store')->middleware('auth');
    Route::get('{id}/edit',[TeacherController::class,'edit'])->name('teacher.edit')->middleware('auth');
    Route::post('{id}',[TeacherController::class,'update'])->name('teacher.update')->middleware('auth');
});

Route::prefix('introduction')->group(function(){
    Route::get('/',[IntroductionController::class,'index'])->name('introduction.show');
    Route::get('/create',[IntroductionController::class,'create'])->name('introduction.create')->middleware('auth');
    Route::post('/',[IntroductionController::class,'store'])->name('introduction.store')->middleware('auth');
    Route::get('{id}/edit',[IntroductionController::class,'edit'])->name('introduction.edit')->middleware('auth');
    Route::post('{id}',[IntroductionController::class,'update'])->name('introduction.update')->middleware('auth');
});

Route::prefix('award')->group(function(){
    Route::get('/',[AwardController::class,'index'])->name('award.show');
    Route::get('/create',[AwardController::class,'create'])->name('award.create')->middleware('auth');
    Route::post('/',[AwardController::class,'store'])->name('award.store')->middleware('auth');
    Route::get('{id}/edit',[AwardController::class,'edit'])->name('award.edit')->middleware('auth');
    Route::post('{id}',[AwardController::class,'update'])->name('award.update')->middleware('auth');
    Route::delete('{id}',[AwardController::class,'destroy'])->name('award.destroy')->middleware('auth');
});

Route::prefix('active')->group(function(){
    Route::get('show/{show}',[ActiveController::class,'show'])->name('active.show');
    Route::get('create',[ActiveController::class,'create'])->name('active.create')->middleware('auth');
    Route::post('/',[ActiveController::class,'store'])->name('active.store')->middleware('auth');
    Route::get('{id}/edit',[ActiveController::class,'edit'])->name('active.edit')->middleware('auth');
    Route::post('{id}',[ActiveController::class,'update'])->name('active.update')->middleware('auth');
    Route::delete('{id}',[ActiveController::class,'destroy'])->name('active.destroy')->middleware('auth');
});


Route::prefix('sheet')->group(function(){
    Route::get('/',[SheetMusicController::class,'index'])->name('sheet.show');
    Route::get('/past',[SheetMusicController::class,'past'])->name('sheet.past');
    Route::get('/past/search',[SheetMusicController::class,'search'])->name('sheet.search');
    Route::post('/past{id}',[SheetMusicController::class,'check'])->name('sheet.check');
    Route::post('/',[SheetMusicController::class,'store'])->name('sheet.store');
    Route::get('create',[SheetMusicController::class,'create'])->name('sheet.create');
    Route::get('{id}/edit',[SheetMusicController::class,'edit'])->name('sheet.edit');
    Route::post('{id}',[SheetMusicController::class,'update'])->name('sheet.update');
    Route::delete('{id}',[SheetMusicController::class,'destroy'])->name('sheet.destroy');
});


Route::prefix('apply')->group(function(){
    Route::get('/',[ApplyController::class,'index'])->name('apply.show'); //檢視all
    Route::get('/create',[ApplyController::class,'create'])->name('apply.create'); //新增
    Route::post('/',[ApplyController::class,'store'])->name('apply.store');
    Route::get('{id}/edit',[ApplyController::class,'edit'])->name('apply.edit'); //編輯狀態
    Route::post('{id}',[ApplyController::class,'update'])->name('apply.update');
});


Route::prefix('attend')->group(function(){
    Route::get('/',[AttendController::class,'index'])->name('attends.index')->middleware('auth'); //list
    Route::get('/create',[AttendController::class,'create'])->name('attends.create')->middleware('auth');
});

Route::prefix('member')->group(function(){
    Route::get('/',[UserController::class,'edit'])->name('user.edit')->middleware('auth');
    Route::put('/{id}',[UserController::class,'update'])->name('user.update')->middleware('auth');
    Route::put('/{id}/admin',[UserController::class,'adminUpdate'])->name('user.adminUpdate')->middleware('auth');
    Route::get('/{type?}/show',[UserController::class,'show'])->name('user.show')->middleware('auth');
});

Route::prefix('recruit')->group(function(){
    Route::get('/',[RecruitController::class,'index'])->name('recruit.index');
    Route::get('/create',[RecruitController::class,'create'])->name('recruit.create')->middleware('auth');
    Route::post('/',[RecruitController::class,'store'])->name('recruit.store')->middleware('auth');
    Route::get('{id}/edit',[RecruitController::class,'edit'])->name('recruit.edit')->middleware('auth');
    Route::post('{id}',[RecruitController::class,'update'])->name('recruit.update')->middleware('auth');
    Route::get('/show',[RecruitController::class,'show'])->name('recruit.show');
    Route::get('/list',[RecruitController::class,'list'])->name('recruit.list')->middleware('auth');
});

Route::prefix('accountant')->group(function(){
    Route::get('/',[AccountantController::class,'create'])->name('accountant.create')->middleware('auth');
    Route::get('/show',[AccountantController::class,'show'])->name('accountant.show')->middleware('auth');
});

Route::get('/reset-password/', function () {
    return view('auth.reset-password');})->middleware('auth')->name('password.reset');

Route::post('/reset-password',[UserController::class,'reset'])->middleware('auth')->name('password.update');

Route::get('/register',  function () {return view('auth.register');} )->name('register')->middleware('auth');
Route::post('/register', [UserController::class, 'store']);

Route::prefix('evaluation')->group(function(){
    Route::get('/',[EvaluationController::class,'index'])->name('evaluations.index');
    Route::get('/create',[EvaluationController::class,'create'])->name('evaluations.create')->middleware('auth');
    Route::post('/',[EvaluationController::class,'store'])->name('evaluations.store')->middleware('auth');
    Route::get('{id}/edit',[EvaluationController::class,'edit'])->name('evaluations.edit')->middleware('auth');
    Route::post('{id}',[EvaluationController::class,'update'])->name('evaluations.update')->middleware('auth');
});

Route::prefix('precautions')->group(function(){
    Route::get('/',[PrecautionController::class,'index'])->name('precautions.index');
    Route::get('/create',[PrecautionController::class,'create'])->name('precautions.create')->middleware('auth');
    Route::post('/',[PrecautionController::class,'store'])->name('precautions.store')->middleware('auth');
    Route::get('{id}/edit',[PrecautionController::class,'edit'])->name('precautions.edit')->middleware('auth');
    Route::post('{id}',[PrecautionController::class,'update'])->name('precautions.update')->middleware('auth');
});

Route::prefix('architecture')->group(function(){
    Route::get('/',[ArchitectureController::class,'index'])->name('architectures.index');
    Route::get('/create',[ArchitectureController::class,'create'])->name('architectures.create')->middleware('auth');
    Route::post('/',[ArchitectureController::class,'store'])->name('architectures.store')->middleware('auth');
    Route::get('{id}/edit',[ArchitectureController::class,'edit'])->name('architectures.edit')->middleware('auth');
    Route::post('{id}',[ArchitectureController::class,'update'])->name('architectures.update')->middleware('auth');
    Route::delete('/{id}',[ArchitectureController::class,'destroy'])->name('architectures.destroy')->middleware('auth');
});

Route::prefix('organize')->group(function(){
    Route::get('/',[OrganizeController::class,'index'])->name('organizes.index');
    Route::get('/create',[OrganizeController::class,'create'])->name('organizes.create')->middleware('auth');
    Route::post('/',[OrganizeController::class,'store'])->name('organizes.store')->middleware('auth');
    Route::get('{id}/edit',[OrganizeController::class,'edit'])->name('organizes.edit')->middleware('auth');
    Route::post('{id}',[OrganizeController::class,'update'])->name('organizes.update')->middleware('auth');
    Route::delete('/{id}',[OrganizeController::class,'destroy'])->name('organizes.destroy')->middleware('auth');
});
