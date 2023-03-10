<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->post('/admin/attendance/user/update', function (Request $request) {

    $user = App\Models\User::find($request->user['id']);

    $user->name = $request->user['name'];

    if (isset($request->user['password'])) {

        $user->password = Hash::make($request->user['password']);

        $user->plain_password = $request->user['password'];
    }

    $user->save();

    return true;

})->name('api.admin.attendance.user.update');
