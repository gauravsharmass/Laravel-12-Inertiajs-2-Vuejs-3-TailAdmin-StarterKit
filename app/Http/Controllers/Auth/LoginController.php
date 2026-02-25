<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;



class LoginController extends Controller
{

    public function showLoginForm()
    {
        if(Auth::check()){
            if(Auth::user()->role_id == 1) {
                return redirect()->intended('/admin-dashboard');
            }
            return redirect()->intended('/user-dashboard');

        }
        return Inertia::render('Auth/Login');
    }
    public function login(LoginRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
            if (Auth::user()->role_id == 1) {
                return redirect()->intended('/admin-dashboard')->with('success', 'Logged in successfully');
            }

            return redirect()->intended('/user-dashboard')->with('success', 'Logged in successfully');
        }

        return back()->with(['error' => 'Invalid credentials,Please try again!'])->withInput();
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Logged out successfully');
    }
}
