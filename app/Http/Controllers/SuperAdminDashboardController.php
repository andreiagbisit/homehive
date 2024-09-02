<?php

// app/Http/Controllers/SuperAdminDashboardController.php
namespace App\Http\Controllers;

use Illuminate\View\View;

class SuperAdminDashboardController extends Controller
{
    public function index(): View
    {
        return view('dashboard-super-admin');
    }
}

// app/Http/Controllers/AdminDashboardController.php
namespace App\Http\Controllers;

use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        return view('dashboard-admin');
    }
}

// app/Http/Controllers/UserDashboardController.php
namespace App\Http\Controllers;

use Illuminate\View\View;

class UserDashboardController extends Controller
{
    public function index(): View
    {
        return view('dashboard-user');
    }
}
