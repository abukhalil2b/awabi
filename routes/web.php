<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\attendance\UserController as AttendanceUserController;
use App\Http\Controllers\attendance\CateController as AttendanceCateController;
use App\Http\Controllers\attendance\QuestionController as AttendanceQuestionController;
use App\Http\Controllers\attendance\AnswerController as AttendanceAnswerController;
use App\Http\Controllers\attendance\RoundplayController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\WinnerController;
use App\Http\Controllers\WhatsappController;

use App\Http\Controllers\distance\CateController as DistanceCateController;
use App\Http\Controllers\distance\QuestionController as DistanceQuestionController;
use App\Http\Controllers\distance\UserController as DistanceUserController;
use App\Http\Controllers\distance\AnswerController as DistanceAnswerController;

use App\Http\Controllers\audience\AudienceController;

use App\Http\Livewire\Admin\Permission\Create as PermissionCreate;
use App\Http\Livewire\Audience\Register as AudienceRegister;
use App\Http\Livewire\Admin\Distance\UserSearch as DistanceUserSearch;
use App\Http\Livewire\Admin\Distance\Winner\Store as DistanceWinnerStore;

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

    if ($user->app == 'distance') {
        return redirect()->route('distance_dashboard');
    }

    if ($user->app == 'attendance') {
        return redirect()->route('attendance_dashboard');
    }

    if ($user->app == 'distance-admin' || $user->app == 'attendance-admin') {
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
    ->middleware('userPermission:attendance.user')
    ->name('questions_archive');


/*
|--------------------------------------------------------------------------
|   audience
|--------------------------------------------------------------------------
*/

// Route is open to all
Route::get('audience/register', AudienceRegister::class)
    ->name('audience.register');

/*
|--------------------------------------------------------------------------
|   admin
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth'], function () {

    Route::get('admin/setting/index', [SettingController::class, 'index'])
        ->middleware('userPermission:attendance.user')
        ->name('admin.setting.index');

    Route::get('admin/setting/show/{setting}', [SettingController::class, 'show'])->name('admin.setting.show');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('admin/audience/dashboard', [AudienceController::class, 'dashboard'])->name('admin.audience.dashboard');

    Route::get('admin/audience/index', [AudienceController::class, 'index'])->name('admin.audience.index');

    Route::post('admin/audience/storeSelected', [AudienceController::class, 'storeSelected'])->name('audience.store.selected');

    Route::post('admin/audience/delete', [AudienceController::class, 'delete'])->name('admin.audience.delete');
});

Route::middleware(['auth'])->group(function () {
    // user
    Route::get('admin/attendance/user/create', [AttendanceUserController::class, 'create'])
        ->middleware('userPermission:attendance.user.create')
        ->name('admin.attendance.user.create');

    Route::get('admin/attendance/user/show/{id}', [AttendanceUserController::class, 'show'])
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
    Route::get('admin/attendance/cate/create', [AttendanceCateController::class, 'create'])
        ->middleware('userPermission:attendance.cate.create')
        ->name('admin.attendance.cate.create');

    Route::post('admin/attendance/cate/store', [AttendanceCateController::class, 'store'])
        ->middleware('userPermission:attendance.cate.create')
        ->name('admin.attendance.cate.store');

    // question
    Route::get('admin/attendance/question/create/{cate}', [AttendanceQuestionController::class, 'create'])
        ->middleware('userPermission:attendance.question.create')
        ->name('admin.attendance.question.create');

    Route::get('admin/attendance/question/edit/{question}', [AttendanceQuestionController::class, 'edit'])
        ->middleware('userPermission:attendance.question.edit')
        ->name('admin.attendance.question.edit');

    Route::post('admin/attendance/question/update/{question}', [AttendanceQuestionController::class, 'update'])
        ->middleware('userPermission:attendance.question.edit')
        ->name('admin.attendance.question.update');

    Route::post('admin/attendance/question/delete/{question}', [AttendanceQuestionController::class, 'delete'])
        ->middleware('userPermission:attendance.question.delete')
        ->name('admin.attendance.question.delete');

    // dashboard
    Route::get('admin/dashboard', [ProfileController::class, 'adminDashboard'])->name('admin.dashboard');
});

Route::middleware(['auth'])->group(function () {
    // user
    Route::get('admin/distance/user/search', DistanceUserSearch::class)
        ->middleware('userPermission:distance.user.search')
        ->name('admin.distance.user.search');

    Route::get('admin/distance/user/create', [DistanceUserController::class, 'create'])
        ->middleware('userPermission:distance.user.create')
        ->name('admin.distance.user.create');

    Route::get('admin/distance/user/updateduser_index', [DistanceUserController::class, 'updateduserIndex'])
        ->middleware('userPermission:distance.user.updateduser_index')
        ->name('admin.distance.user.updateduser_index');

    Route::get('admin/distance/user/notupdateduser_index', [DistanceUserController::class, 'notupdateduserIndex'])
        ->middleware('userPermission:distance.user.notupdateduser_index')
        ->name('admin.distance.user.notupdateduser_index');

    Route::get('admin/distance/user/show/{id}', [DistanceUserController::class, 'show'])
        ->middleware('userPermission:distance.user.show')
        ->name('admin.distance.user.show');
    // cate
    Route::get('admin/distance/cate/create', [DistanceCateController::class, 'create'])
        ->middleware('userPermission:distance.cate.create')
        ->name('admin.distance.cate.create');

    Route::post('admin/distance/cate/store', [DistanceCateController::class, 'store'])
        ->middleware('userPermission:distance.cate.create')
        ->name('admin.distance.cate.store');

    Route::get('admin/distance/cate/active/{cate}', [DistanceCateController::class, 'active'])
        ->middleware('userPermission:distance.cate.active')
        ->name('admin.distance.cate.active');

    // question
    Route::get('admin/distance/question/create/{cate}', [DistanceQuestionController::class, 'create'])
        ->middleware('userPermission:distance.question.create')
        ->name('admin.distance.question.create');

    Route::get('admin/distance/question/edit/{question}', [DistanceQuestionController::class, 'edit'])
        ->middleware('userPermission:distance.question.edit')
        ->name('admin.distance.question.edit');

    Route::post('admin/distance/question/update/{question}', [DistanceQuestionController::class, 'update'])
        ->middleware('userPermission:distance.question.edit')
        ->name('admin.distance.question.update');

    Route::post('admin/distance/question/delete/{question}', [DistanceQuestionController::class, 'delete'])
        ->middleware('userPermission:distance.question.delete')
        ->name('admin.distance.question.delete');

    Route::post('admin/distance/question/delete_all', [DistanceQuestionController::class, 'deleteAllQuestions'])
        ->middleware('userPermission:distance.question.delete_all')
        ->name('admin.distance.question.delete_all');

    //answer
    Route::get('admin/distance/question/answer_index/{cate}', [DistanceQuestionController::class, 'answerIndex'])
        ->middleware('userPermission:distance.question.answer_index')
        ->name('admin.distance.question.answer_index');

    // winner
    Route::get('admin/distance/winner/index',DistanceWinnerStore::class)
        ->middleware('userPermission:distance.user')
        ->name('admin.distance.winner.index');

    Route::get('admin/distance/lot/dashboard', [WinnerController::class, 'lotDashboard'])
        ->middleware('userPermission:distance.user')
        ->name('admin.distance.lot.dashboard');

    // whatsapp
    Route::get('admin/distance/whatsapp/create', [WhatsappController::class, 'create'])
        ->middleware('userPermission:distance.user')
        ->name('admin.distance.whatsapp.create');

        Route::get('admin/distance/whatsapp/delete/{whatsapp}', [WhatsappController::class, 'destroy'])
        ->middleware('userPermission:distance.user')
        ->name('admin.distance.whatsapp.delete');

    Route::post('admin/distance/whatsapp/store', [WhatsappController::class, 'store'])
        ->middleware('userPermission:distance.user')
        ->name('admin.distance.whatsapp.store');
});


Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::get('distance/answer/dashboard', [DistanceAnswerController::class, 'dashboard'])
        ->name('admin.distance.answer.dashboard');

    Route::post('distance/answer/delete', [DistanceAnswerController::class, 'deleteAllAnswers'])
        ->name('admin.distance.answer.delete');
});

/*
|--------------------------------------------------------------------------
| attendance
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth'], 'prefix' => 'attendance'], function () {
    //cate
    Route::get('cate/index', [AttendanceCateController::class, 'index'])
        ->middleware('userPermission:attendance.cate.index')
        ->name('attendance.cate.index');

    //question
    Route::get('question/index/{cate}', [AttendanceQuestionController::class, 'index'])
        ->middleware('userPermission:attendance.question.index')
        ->name('attendance.question.index');

    Route::get('question/show/{question}', [AttendanceQuestionController::class, 'show'])
        ->middleware('userPermission:attendance.question.show')
        ->name('attendance.question.show');

    Route::get('question/close/{question}', [AttendanceQuestionController::class, 'close'])
        ->middleware('userPermission:attendance.question.close')
        ->name('attendance.question.close');

    //answer
    Route::get('question/answer/index/{question}', [AttendanceAnswerController::class, 'questionAnswerIndex'])
        ->middleware('userPermission:attendance.question.answer.index')
        ->name('attendance.question.answer.index');

    //answer
    Route::get('roundplay/answer/index', [AttendanceAnswerController::class, 'roundplayAnswerIndex'])
        ->middleware('userPermission:attendance.roundplay.answer.index')
        ->name('attendance.roundplay.answer.index');

    //answer
    Route::get('roundplay/result', [RoundplayController::class, 'roundplayResult'])
        ->middleware('userPermission:attendance.roundplay.result')
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


/*
|--------------------------------------------------------------------------
| 
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::get('admin/permission/create', PermissionCreate::class)->name('admin.permission.create');

    Route::get('admin/role/index', [PermissionController::class, 'roleIndex'])->name('admin.role.index');

    Route::get('admin/role_permission/{role}', [PermissionController::class, 'rolePermission'])->name('admin.role_permission');

    Route::post('admin/role_permission/store/{role}', [PermissionController::class, 'rolePermissionStore'])->name('admin.role_permission.store');
});
