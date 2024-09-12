<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AccountManagementController; // Include the AccountManagementController

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
})->name('password.request');

// Routes for authenticated users
Route::middleware(['auth', 'verified'])->group(function () {
    // Profile management routes
    Route::get('/profile-details', function () {
        return view('profile-details');
    })->name('profile.details');

    Route::patch('/profile-update-password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
    Route::patch('/profile/remove-picture', [ProfileController::class, 'removePicture'])->name('profile.remove.picture');


    Route::get('/profile-edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile-update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile-delete', [ProfileController::class, 'destroy'])->name('profile.destroy');

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
    Route::get('/dashboard-super-admin', function () {
        return view('dashboard-super-admin');
    })->name('dashboard.superadmin');

    // ACCOUNT MANAGEMENT

    Route::get('/acc-mgmt-super-admin', [AccountManagementController::class, 'index'])->name('account.management'); // List all users
    Route::get('/view-entry-super-admin/{id}', [AccountManagementController::class, 'show'])->name('superadmin.view'); // View a specific user
    Route::get('/edit-entry-superadmin-account-management/{id}', [AccountManagementController::class, 'edit'])->name('superadmin.edit'); // Edit a user form 
    Route::patch('/edit-entry-super-admin/{id}', [AccountManagementController::class, 'update'])->name('superadmin.update'); // Update user in the database
    Route::delete('/delete-entry-super-admin/{id}', [AccountManagementController::class, 'destroy'])->name('superadmin.destroy'); // Delete a user

    // Manage Roles Button Nav
    Route::get('/manage-roles-super-admin', function () {
        return view('manage-roles-super-admin');
    })->name('manage.roles.superadmin');

    // For Manage Role SuperAdmin/Admin View & Edit
    Route::get('/edit-entry-super-admin', function () {
        return view('edit-entry-super-admin');
    })->name('edit.entry.super.admin');

    Route::get('/view-entry-super-admin', function () {
        return view('view-entry-super-admin');
    })->name('view.entry.super.admin');

 
    Route::get('/bulletin-board-super-admin', function () {
        return view('bulletin-board-super-admin');
    })->name('bulletin.board');

    // COLLECTION MANAGEMENT

    Route::get('/collection-mgmt-super-admin', function () {
        return view('collection-mgmt-super-admin');
    })->name('collection.management');

    // For Collection Management SuperAdmin/Admin View & Edit

    // For Collection Management Add Entry

    // For Manage Categories in Collection Management

    Route::get('/manage-fund-collection-categories-super-admin', function () {
        return view('manage-fund-collection-categories-super-admin');
    })->name('manage.fund.collection.categories.superadmin');

    // View and Edit of Manage Categories

    // Add Category in Manage Categories


    // APPOINTMENT AND RESERVATION MANAGEMENT 

    Route::get('/appt-and-res-mgmt-super-admin', function () {
        return view('appt-and-res-mgmt-super-admin');
    })->name('appointment.reservation');

    // Manage Facility Reservation

    Route::get('/manage-facility-reservations-super-admin', function () {
        return view('manage-facility-reservations-super-admin');
    })->name('manage.facility.reservations.super.admin');

    // View and Edit of Facility Reservation 

    // Manage Facilities 

    // Manage Vehicle Sticker Application

    // View and Edit of Vehicle Sticker Application

    Route::get('/manage-vehicle-sticker-applications-super-admin', function () {
        return view('manage-vehicle-sticker-applications-super-admin');
    })->name('manage.vehicle.sticker.applications.super.admin');

    Route::get('/add-entry-super-admin', function () {
        return view('add-entry-super-admin');
    })->name('add.entry.superadmin');

   

   

    // Admin Routes
    Route::get('/dashboard-admin', function () {
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

    Route::get('/add-entry-admin', function () {
        return view('add-entry-admin');
    })->name('add.entry.admin');

    Route::get('/manage-fund-collection-categories-admin', function () {
        return view('manage-fund-collection-categories-admin');
    })->name('manage.fund.collection.categories.admin');

    Route::get('/manage-facility-reservations-admin', function () {
        return view('manage-facility-reservations-admin');
    })->name('manage.facility.reservations.admin');

    Route::get('/manage-vehicle-sticker-applications-admin', function () {
        return view('manage-vehicle-sticker-applications-admin');
    })->name('manage.vehicle.sticker.applications.admin');


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

    Route::get('/manage-payment-form', function () {
        return view('manage-payment-form');
    })->name('manage.payment.form');

    Route::get('/appt-and-res-form-facility-reservation', function () {
        return view('appt-and-res-form-facility-reservation');
    })->name('appt.and.res.form.facility.reservation');

    Route::get('/appt-and-res-form-vehicle-sticker-appointment', function () {
        return view('appt-and-res-form-vehicle-sticker-appointment');
    })->name('appt.and.res.form.vehicle.sticker.appointment');

});

// Login and logout routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

