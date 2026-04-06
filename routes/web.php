<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CateController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\RoundplayController;
use App\Http\Livewire\Admin\Permission\Create as PermissionCreate;

use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    if (!auth()->user()) {
        return redirect()->route('login');
    }

    $user = auth()->user();

    if ($user->app == 'attendance') {
        return redirect()->route('attendance_dashboard');
    }

    if ($user->app == 'attendance-admin') {
        return redirect()->route('admin.dashboard');
    }

    if ($user->app == 'super-admin') {
        return redirect()->route('admin.dashboard');
    }

    return view('welcome');
});

Route::get('questions_archive', function () {
    $questions = DB::table('questions_archive')->get();
    return view('questions_archive', compact('questions'));
})
    ->middleware('userPermission:questions_archive')
    ->name('questions_archive');


/*
|--------------------------------------------------------------------------
|   admin
|--------------------------------------------------------------------------
*/


Route::middleware(['auth'])->group(function () {
    // user
    Route::get('admin/attendance/user/create', [UserController::class, 'create'])
        ->middleware('userPermission:attendance.user.create')
        ->name('admin.attendance.user.create');

    Route::get('admin/attendance/user/show/{id}', [UserController::class, 'show'])
        ->middleware('userPermission:attendance.user.show')
        ->name('admin.attendance.user.show');

    // roundplay
    Route::get('admin/attendance/roundplay/create', [RoundplayController::class, 'create'])
        ->middleware('userPermission:attendance.roundplay.create')
        ->name('admin.attendance.roundplay.create');

    Route::get('admin/attendance/roundplay/show/{roundplay}', [RoundplayController::class, 'show'])
        ->middleware('userPermission:attendance.roundplay.show')
        ->name('admin.attendance.roundplay.show');

    Route::get('admin/attendance/user_roundplay/{roundplay}', [RoundplayController::class, 'userRoundplay'])
        ->middleware('userPermission:attendance.user_roundplay')
        ->name('admin.attendance.user_roundplay');

    // cate
    Route::get('admin/attendance/cate/create', [CateController::class, 'create'])
        ->middleware('userPermission:attendance.cate.create')
        ->name('admin.attendance.cate.create');

    Route::post('admin/attendance/cate/store', [CateController::class, 'store'])
        ->middleware('userPermission:attendance.cate.create')
        ->name('admin.attendance.cate.store');

    // question
    Route::get('admin/attendance/question/create/{cate}', [QuestionController::class, 'create'])
        ->middleware('userPermission:attendance.question.create')
        ->name('admin.attendance.question.create');

    Route::get('admin/attendance/question/edit/{question}', [QuestionController::class, 'edit'])
        ->middleware('userPermission:attendance.question.edit')
        ->name('admin.attendance.question.edit');

    Route::post('admin/attendance/question/update/{question}', [QuestionController::class, 'update'])
        ->middleware('userPermission:attendance.question.edit')
        ->name('admin.attendance.question.update');

    Route::post('admin/attendance/question/archive/{question}', [QuestionController::class, 'archive'])
        ->middleware('userPermission:attendance.question.archive')
        ->name('admin.attendance.question.archive');

    // dashboard
    Route::get('admin/dashboard', [ProfileController::class, 'adminDashboard'])->name('admin.dashboard');
});


/*
|--------------------------------------------------------------------------
| attendance
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth'], 'prefix' => 'attendance'], function () {
    //cate
    Route::get('cate/index', [CateController::class, 'index'])
        ->middleware('userPermission:attendance.cate.index')
        ->name('attendance.cate.index');

    //question
    Route::get('question/index/{cate}', [QuestionController::class, 'index'])
        ->middleware('userPermission:attendance.question.index')
        ->name('attendance.question.index');

    Route::get('question/show/{question}', [QuestionController::class, 'show'])
        ->middleware('userPermission:attendance.question.show')
        ->name('attendance.question.show');

    Route::get('question/close/{question}', [QuestionController::class, 'close'])
        ->middleware('userPermission:attendance.question.close')
        ->name('attendance.question.close');

    //answer
    Route::get('question/answer/index/{question}', [AnswerController::class, 'questionAnswerIndex'])
        ->middleware('userPermission:attendance.question.answer.index')
        ->name('attendance.question.answer.index');

    //answer
    Route::get('roundplay/answer/index', [AnswerController::class, 'roundplayAnswerIndex'])
        ->middleware('userPermission:attendance.roundplay.answer.index')
        ->name('attendance.roundplay.answer.index');

    //answer
    Route::get('roundplay/result', [RoundplayController::class, 'roundplayResult'])
        ->middleware('userPermission:attendance.roundplay.result')
        ->name('attendance.roundplay.result');

    Route::post('roundplay/update_mark', [RoundplayController::class, 'updateMark'])
        ->middleware('userPermission:attendance.roundplay.result')
        ->name('attendance.roundplay.update_mark');
});


Route::get('attendance_dashboard', [ProfileController::class, 'attendanceDashboard'])
    ->middleware('attendance')
    ->name('attendance_dashboard');

Route::post('/attendance/send-answer', [ProfileController::class, 'sendAnswer'])->name('attendance.sendAnswer');

Route::get('/api/getOpenQuestion', [ProfileController::class, 'getOpenQuestion'])->name('api.getOpenQuestion');





require __DIR__ . '/auth.php';


/*
|--------------------------------------------------------------------------
| 
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
   
    Route::get('admin/role/index', [PermissionController::class, 'roleIndex'])->name('admin.role.index');

    Route::get('admin/role_permission/{role}', [PermissionController::class, 'rolePermission'])->name('admin.role_permission');

    Route::post('admin/role_permission/store/{role}', [PermissionController::class, 'rolePermissionStore'])->name('admin.role_permission.store');
});
