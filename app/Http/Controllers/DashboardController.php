<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        return Inertia::render('Dashboard/AdminDashboard');
    }

    public function userDashboard()
    {
        return Inertia::render('Dashboard/UserDashboard');
    }
}
