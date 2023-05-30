<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            if (auth()->user()->role != 'admin' && auth()->user()->role != 'user') {
                Auth::guard('web')->logout();

                $request->session()->invalidate();

                $request->session()->regenerateToken();

                return back()->withErrors([
                    'email' => 'Sorry, the user is not registered yet.',
                ])->onlyInput('email');
            }

            $request->session()->regenerate();

            $route = RouteServiceProvider::HOME;

            if (auth()->user()->role == 'admin') {
                $route = route('cms.admin.index');
            }
            if (auth()->user()->role == 'user') {
                $route = route('cms.user.index');
            }


            return redirect()->intended($route);
        }

        return back()->withErrors([
            'email' => 'Sorry, the user is not registered yet.',
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
