<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use \Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ForgotPasswordController extends Controller
{

    public function showForgotPasswordForm()
    {
         return Inertia::render('Auth/ForgotPassword');
    }
    public function forgotPassword(ForgotPasswordRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $status = Password::sendResetLink($validated);
        return $status === Password::ResetLinkSent
            ? back()->with('success', 'Password reset link sent successfully.')
            : back()->with('error', 'Failed to send password reset link.');
    }

    public function showResetForm(Request $request): \Inertia\Response
    {
        return Inertia::render('Auth/ResetPassword', [
            'token' => $request->route('token'),
            'email' => $request->query('email'),
        ]);
    }

    public function resetPassword(ResetPasswordRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $status = Password::reset(
            $validated,
            function ($user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ]);
                $user->save();
                event(new PasswordReset($user));
            }
        );

        return $status === Password::PasswordReset
            ? redirect()->route('login')->with('success', 'Your password has been reset successfully.')
            : back()->with('error', 'Failed to reset password.');
    }

    public function showChangePasswordForm(Request $request): \Inertia\Response
    {
        return Inertia::render('Auth/ChangePassword');
    }
    
    public function postChangePassword(ChangePasswordRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $update = User::where('id', Auth::user()->id)->update([
            'password' => Hash::make($validated['password']),
        ]);

        if($update){
            return back()->with('success', 'Your password has been changed successfully.');
        }
        return back()->with('error', 'Failed to change password.');
    }
}
