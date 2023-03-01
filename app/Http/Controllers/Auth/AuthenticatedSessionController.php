<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    public function adminCreate()
    {
        return view('auth.admin.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {

        //add '@gmail.com' for normal user
        if ($request->app == null) {

            $request['email'] = $request['email'] . '@gmail.com';
        }

        $request->authenticate();

        $request->session()->regenerate();

        if ($request->user()->app == 'admin') {
            
            return redirect()->intended(RouteServiceProvider::ADMIN_HOME);

        } elseif ($request->user()->app == 'distance') {
            
            return redirect()->intended(RouteServiceProvider::DISTANCE_HOME);

        } elseif ($request->user()->app == 'attendance') {
            
            return redirect()->intended(RouteServiceProvider::ATTENDANCE_HOME);

        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
