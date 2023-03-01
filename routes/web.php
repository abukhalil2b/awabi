<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\attendance\UserController as AttendanceUserController;
use App\Http\Controllers\attendance\CateController as AttendanceCateController;
use App\Http\Controllers\attendance\QuestionController as AttendanceQuestionController;
use App\Http\Controllers\attendance\AnswerController as AttendanceAnswerController;
use App\Http\Controllers\attendance\RoundplayController;

use App\Http\Controllers\distance\CateController as DistanceCateController;
use App\Http\Controllers\distance\QuestionController as DistanceQuestionController;
use App\Http\Controllers\distance\UserController as DistanceUserController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
|   admin
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->group(function () {
    // user
    Route::get('admin/attendance/user/create', [AttendanceUserController::class, 'create'])
        ->name('admin.attendance.user.create');

    Route::get('admin/attendance/user/show/{id}', [AttendanceUserController::class, 'show'])
        ->name('admin.attendance.user.show');

    // roundplay
    Route::get('admin/attendance/roundplay/create', [RoundplayController::class, 'create'])
        ->name('admin.attendance.roundplay.create');

    Route::get('admin/attendance/roundplay/show/{roundplay}', [RoundplayController::class, 'show'])
        ->name('admin.attendance.roundplay.show');

    Route::get('admin/attendance/user_roundplay/{roundplay}', [RoundplayController::class, 'userRoundplay'])
        ->name('admin.attendance.user_roundplay');

    // cate
    Route::get('admin/attendance/cate/create', [AttendanceCateController::class, 'create'])
        ->name('admin.attendance.cate.create');

    Route::post('admin/attendance/cate/store', [AttendanceCateController::class, 'store'])
        ->name('admin.attendance.cate.store');

    // question
    Route::get('admin/attendance/question/create/{cate}', [AttendanceQuestionController::class, 'create'])
        ->name('admin.attendance.question.create');

    Route::get('admin/attendance/question/edit/{question}', [AttendanceQuestionController::class, 'edit'])
        ->name('admin.attendance.question.edit');

    Route::post('admin/attendance/question/update/{question}', [AttendanceQuestionController::class, 'update'])
        ->name('admin.attendance.question.update');

    Route::post('admin/attendance/question/delete/{question}', [AttendanceQuestionController::class, 'delete'])
        ->name('admin.attendance.question.delete');

    // dashboard
    Route::get('admin/dashboard', [ProfileController::class, 'adminDashboard'])->name('admin.dashboard');
});

Route::middleware(['auth', 'admin'])->group(function () {
    // user
    Route::get('admin/distance/user/create', [DistanceUserController::class, 'create'])
        ->name('admin.distance.user.create');

    Route::get('admin/distance/user/show/{id}', [DistanceUserController::class, 'show'])
        ->name('admin.distance.user.show');
    // cate
    Route::get('admin/distance/cate/create', [DistanceCateController::class, 'create'])
        ->name('admin.distance.cate.create');

    Route::post('admin/distance/cate/store', [DistanceCateController::class, 'store'])
        ->name('admin.distance.cate.store');

    Route::get('admin/distance/cate/active/{cate}', [DistanceCateController::class, 'active'])
        ->name('admin.distance.cate.active');

    // question
    Route::get('admin/distance/question/create/{cate}', [DistanceQuestionController::class, 'create'])
        ->name('admin.distance.question.create');

    Route::get('admin/distance/question/edit/{question}', [DistanceQuestionController::class, 'edit'])
        ->name('admin.distance.question.edit');

    Route::post('admin/distance/question/update/{question}', [DistanceQuestionController::class, 'update'])
        ->name('admin.distance.question.update');

    Route::post('admin/distance/question/delete/{question}', [DistanceQuestionController::class, 'delete'])
        ->name('admin.distance.question.delete');
});

/*
|--------------------------------------------------------------------------
| attendance
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'attendance'], function () {
    //cate
    Route::get('cate/index', [AttendanceCateController::class, 'index'])->name('attendance.cate.index');

    //question
    Route::get('question/index/{cate}', [AttendanceQuestionController::class, 'index'])->name('attendance.question.index');

    Route::get('question/show/{question}', [AttendanceQuestionController::class, 'show'])->name('attendance.question.show');

    Route::get('question/close/{question}', [AttendanceQuestionController::class, 'close'])
        ->name('attendance.question.close');

    //answer
    Route::get('question/answer/index/{question}', [AttendanceAnswerController::class, 'questionAnswerIndex'])
        ->name('attendance.question.answer.index');

    //answer
    Route::get('roundplay/answer/index', [AttendanceAnswerController::class, 'roundplayAnswerIndex'])
        ->name('attendance.roundplay.answer.index');

    //answer
    Route::get('roundplay/result', [RoundplayController::class, 'roundplayResult'])
        ->name('attendance.roundplay.result');
});

/*
|--------------------------------------------------------------------------
| distance
|--------------------------------------------------------------------------
*/

Route::get('distance_dashboard', [ProfileController::class, 'distanceDashboard'])
    ->middleware('distance')
    ->name('distance_dashboard');

Route::get('attendance_dashboard', [ProfileController::class, 'attendanceDashboard'])
    ->middleware('attendance')
    ->name('attendance_dashboard');

/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'distance'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/state', [ProfileController::class, 'stateUpdate'])->name('state.update');
});

require __DIR__ . '/auth.php';
