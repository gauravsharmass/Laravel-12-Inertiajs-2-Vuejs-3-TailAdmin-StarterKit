<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showProfile(Request $request)
    {
        return inertia('Auth/Profile');
    }

    function updateProfile(ProfileRequest $request)
    {
        $validated = $request->validated();
        $update = User::where('id', Auth::user()->id)->update($validated);
        if($update){
            return back()->with('success', 'Profile updated successfully.');
        }
        return back()->with('error', 'Failed to update profile.');
    }
}
