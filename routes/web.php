<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

// Home route - redirect to login if not authenticated
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    } else {
        return view('auth.login'); // Ensure this matches your custom login view
    }
});

// Authentication routes
require __DIR__.'/auth.php';

// Registration routes
Route::get('/create-new-account', [RegisteredUserController::class, 'create'])->name('register'); // For displaying the registration form
Route::post('/create-new-account', [RegisteredUserController::class, 'store'])->name('register.store'); // For handling the form submission

// Registration route
Route::get('/create-new-account', function () {
    return view('create-new-account');
})->name('register');

Route::get('/forgot-password', function () {
    return view('forgot-password');
}) ->name('password.request');


// Routes for authenticated users
Route::middleware(['auth', 'verified'])->group(function () {
    // Profile management routes
    Route::get('/profile-details', function () {
        return view('profile-details');
    })->name('profile.details');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dynamic dashboard redirection
    Route::get('/dashboard', function () {
        $user = Auth::user();
        switch ($user->account_type_id) {
            case 1:
                return redirect()->route('dashboard.superadmin');
            case 2:
                return redirect()->route('dashboard.admin');
            case 3:
                return redirect()->route('dashboard.user');
            default:
                return redirect()->route('dashboard.superadmin'); // Fallback for safety
        }
    })->name('dashboard');

    // Super Admin Routes
    Route::get('/dashboard/superadmin', function () {
        return view('dashboard-super-admin');
    })->name('dashboard.superadmin');

    Route::get('/acc-mgmt-super-admin', function () {
        return view('acc-mgmt-super-admin');
    })->name('account.management');

    Route::get('/bulletin-board-super-admin', function () {
        return view('bulletin-board-super-admin');
    })->name('bulletin.board');

    Route::get('/collection-mgmt-super-admin', function () {
        return view('collection-mgmt-super-admin');
    })->name('collection.management');

    Route::get('/appt-and-res-mgmt-super-admin', function () {
        return view('appt-and-res-mgmt-super-admin');
    })->name('appointment.reservation');

    // Admin Routes
    Route::get('/dashboard/admin', function () {
        return view('dashboard-admin');
    })->name('dashboard.admin');

    Route::get('/bulletin-board-admin', function () {
        return view('bulletin-board-admin');
    });

    Route::get('/collection-mgmt-admin', function () {
        return view('collection-mgmt-admin');
    });

    Route::get('/appt-and-res-mgmt-admin', function () {
        return view('appt-and-res-mgmt-admin');
    });

    // User Routes
    Route::get('/dashboard/user', function () {
        return view('dashboard-user');
    })->name('dashboard.user');

    Route::get('/bulletin-board-user', function () {
        return view('bulletin-board-user');
    });

    Route::get('/payment-mgmt-user', function () {
        return view('payment-mgmt-user');
    });

    Route::get('/appt-and-res-user', function () {
        return view('appt-and-res-user');
    });
});

// Login and logout routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

