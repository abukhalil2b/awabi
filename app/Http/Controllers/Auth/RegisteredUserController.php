<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // return $request->all();

        //just we want name of user
        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        $users = User::where(['app' => 'attendance', 'name' => NULL])->get();

        if (count($users)) {

            $user = User::find($users[0]->id);

            $user->name = $request->name;

            $user->save();

            Auth::login($user);

            return redirect()->intended(RouteServiceProvider::ATTENDANCE_HOME);
        }
        die('<h1>انتهى التسجيل</h1>');
        // $randomPassword = rand(1111, 9999);

        // $user = User::create([
        //     'app' => 'attendance',
        //     'name' => $request->name,
        //     'email' => $request->name,
        //     'password' => Hash::make($randomPassword),
        //     'plain_password' => $randomPassword
        // ]);

        // Auth::login($user);

        // return redirect()->route('/');
    }
}
