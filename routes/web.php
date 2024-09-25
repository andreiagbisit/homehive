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
Route::get('/auth/create-new-acc', [RegisteredUserController::class, 'create'])->name('register'); // For displaying the registration form
Route::post('/auth/create-new-acc', [RegisteredUserController::class, 'store'])->name('register.store'); // For handling the form submission

// Registration route
Route::get('/auth/create-new-acc', function () {
    return view('auth/create-new-acc');
})->name('register');

Route::get('/auth/forgot-password-draft', function () {
    return view('auth/forgot-password-draft');
})->name('password.request');

// Routes for authenticated users
Route::middleware(['auth', 'verified'])->group(function () {
    // Profile management routes
    Route::get('/profile/details', function () {
        return view('profile/details');
    })->name('profile.details');

    Route::patch('/profile-update-password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
    Route::patch('/profile/remove-picture', [ProfileController::class, 'removePicture'])->name('profile.remove.picture');


    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
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
    Route::get('/dashboard/super-admin', function () {
        return view('dashboard/super-admin');
    })->name('dashboard.superadmin');

    // ACCOUNT MANAGEMENT

    Route::get('/acc-mgmt/super-admin', [AccountManagementController::class, 'index'])->name('account.management'); // List all users
    Route::get('/view-entry/super-admin/{id}', [AccountManagementController::class, 'show'])->name('superadmin.view'); // View a specific user
    Route::get('/acc-mgmt/edit-entry-acc/{id}', [AccountManagementController::class, 'edit'])->name('superadmin.edit'); // Edit a user form 
    Route::patch('/edit-entry/super-admin/{id}', [AccountManagementController::class, 'update'])->name('superadmin.update'); // Update user in the database
    Route::delete('/delete-entry-super-admin/{id}', [AccountManagementController::class, 'destroy'])->name('superadmin.destroy'); // Delete a user

    Route::get('/acc-mgmt/view-entry-acc', function () {
        return view('acc-mgmt/view-entry-acc');
    })->name('acc.mgmt.view.entry');

    Route::get('/acc-mgmt/edit-entry-role', function () {
        return view('acc-mgmt/edit-entry-role');
    })->name('acc.mgmt.edit.entry.role');
    
    // Manage Roles Button Nav
    Route::get('/acc-mgmt/manage-roles', function () {
        return view('acc-mgmt/manage-roles');
    })->name('manage.roles');

    // For Manage Role SuperAdmin/Admin View & Edit
    Route::get('/edit-entry/super-admin', function () {
        return view('edit-entry/super-admin');
    })->name('edit.entry.super.admin');

    Route::get('/view-entry/super-admin', function () {
        return view('view-entry/super-admin');
    })->name('view.entry.super.admin');
 
    Route::get('/bulletin-board/super-admin', function () {
        return view('bulletin-board/super-admin');
    })->name('bulletin.board.superadmin');

    Route::get('/bulletin-board/edit-entry-super-admin', function () {
        return view('bulletin-board/edit-entry-super-admin');
    })->name('bulletin.board.edit.entry.superadmin');

    // BULLETIN BOARD - EDIT ENTRY ROUTES (SUPER ADMIN & ADMIN)
    Route::get('/bulletin-board/edit-entry', function () {
        $user = Auth::user(); // Get the currently authenticated user
    
        // Redirect based on the user's account_type_id
        if ($user->account_type_id == 1) {
            // Super Admin
            return redirect()->route('bulletin.board.edit.entry.superadmin');
        } elseif ($user->account_type_id == 2) {
            // Admin
            return redirect()->route('bulletin.board.edit.entry.admin');
        }
    })->name('bulletin.board.edit.entry');

    Route::get('/bulletin-board/manage-categories-super-admin', function () {
        return view('bulletin-board/manage-categories-super-admin');
    })->name('bulletin.board.manage.categories.superadmin');

    Route::get('/bulletin-board/manage-categories-admin', function () {
        return view('bulletin-board/manage-categories-admin');
    })->name('bulletin.board.manage.categories.admin');

    Route::get('/bulletin-board/add-category-super-admin', function () {
        return view('bulletin-board/add-category-super-admin');
    })->name('bulletin.board.add.category.superadmin');

    Route::get('/bulletin-board/add-category-admin', function () {
        return view('bulletin-board/add-category-admin');
    })->name('bulletin.board.add.category.admin');

    Route::get('/bulletin-board/edit-category-super-admin', function () {
        return view('bulletin-board/edit-category-super-admin');
    })->name('bulletin.board.edit.category.superadmin');

    Route::get('/bulletin-board/edit-category-admin', function () {
        return view('bulletin-board/edit-category-admin');
    })->name('bulletin.board.edit.category.admin');

    Route::get('/bulletin-board/view-category-super-admin', function () {
        return view('bulletin-board/view-category-super-admin');
    })->name('bulletin.board.view.category.superadmin');

    Route::get('/bulletin-board/view-category-admin', function () {
        return view('bulletin-board/view-category-admin');
    })->name('bulletin.board.view.category.admin');

    // COLLECTION MANAGEMENT

    Route::get('/collection-mgmt/super-admin', function () {
        return view('collection-mgmt/super-admin');
    })->name('collection.mgmt.superadmin');

    Route::get('/collection-mgmt/admin', function () {
        return view('collection-mgmt/admin');
    })->name('collection.mgmt.admin');

    Route::get('/collection-mgmt/add-entry-super-admin', function () {
        return view('collection-mgmt/add-entry-super-admin');
    })->name('collection.mgmt.add.entry.superadmin');

    Route::get('/collection-mgmt/add-entry-admin', function () {
        return view('collection-mgmt/add-entry-admin');
    })->name('collection.mgmt.add.entry.admin');

    Route::get('/collection-mgmt/view-entry-super-admin', function () {
        return view('collection-mgmt/view-entry-super-admin');
    })->name('collection.mgmt.view.entry.superadmin');

    Route::get('/collection-mgmt/view-entry-admin', function () {
        return view('collection-mgmt/view-entry-admin');
    })->name('collection.mgmt.view.entry.admin');

    Route::get('/collection-mgmt/edit-entry-super-admin', function () {
        return view('collection-mgmt/edit-entry-super-admin');
    })->name('collection.mgmt.edit.entry.superadmin');

    Route::get('/collection-mgmt/edit-entry-admin', function () {
        return view('collection-mgmt/edit-entry-admin');
    })->name('collection.mgmt.edit.entry.admin');

    Route::get('/collection-mgmt/manage-collectors-super-admin', function () {
        return view('collection-mgmt/manage-collectors-super-admin');
    })->name('collection.mgmt.manage.collectors.superadmin');

    Route::get('/collection-mgmt/manage-collectors-admin', function () {
        return view('collection-mgmt/manage-collectors-admin');
    })->name('collection.mgmt.manage.collectors.admin');

    Route::get('/collection-mgmt/view-collector-super-admin', function () {
        return view('collection-mgmt/view-collector-super-admin');
    })->name('collection.mgmt.view.collector.superadmin');

    Route::get('/collection-mgmt/view-collector-admin', function () {
        return view('collection-mgmt/view-collector-admin');
    })->name('collection.mgmt.view.collector.admin');

    Route::get('/collection-mgmt/add-collector-super-admin', function () {
        return view('collection-mgmt/add-collector-super-admin');
    })->name('collection.mgmt.add.collector.superadmin');

    Route::get('/collection-mgmt/edit-collector-super-admin', function () {
        return view('collection-mgmt/edit-collector-super-admin');
    })->name('collection.mgmt.edit.collector.superadmin');

    Route::get('/collection-mgmt/edit-collector-admin', function () {
        return view('collection-mgmt/edit-collector-admin');
    })->name('collection.mgmt.edit.collector.admin');
    
    Route::get('/collection-mgmt/add-category-super-admin', function () {
        return view('collection-mgmt/add-category-super-admin');
    })->name('collection.mgmt.add.category.superadmin');

    Route::get('/collection-mgmt/add-category-admin', function () {
        return view('collection-mgmt/add-category-admin');
    })->name('collection.mgmt.add.category.admin');

    Route::get('/collection-mgmt/edit-category-super-admin', function () {
        return view('collection-mgmt/edit-category-super-admin');
    })->name('collection.mgmt.edit.category.superadmin');

    Route::get('/collection-mgmt/edit-category-admin', function () {
        return view('collection-mgmt/edit-category-admin');
    })->name('collection.mgmt.edit.category.admin');

    Route::get('/collection-mgmt/view-category-super-admin', function () {
        return view('collection-mgmt/view-category-super-admin');
    })->name('collection.mgmt.view.category.superadmin');

    Route::get('/collection-mgmt/view-category-admin', function () {
        return view('collection-mgmt/view-category-admin');
    })->name('collection.mgmt.view.category.admin');

    Route::get('/appt-and-res/add-facility-super-admin', function () {
        return view('appt-and-res/add-facility-super-admin');
    })->name('appt.and.res.add.facility.superadmin');

    Route::get('/appt-and-res/add-facility-admin', function () {
        return view('appt-and-res/add-facility-admin');
    })->name('appt.and.res.add.facility.admin');

    Route::get('/appt-and-res/view-facility-super-admin', function () {
        return view('appt-and-res/view-facility-super-admin');
    })->name('appt.and.res.view.facility.superadmin');

    Route::get('/appt-and-res/view-facility-admin', function () {
        return view('appt-and-res/view-facility-admin');
    })->name('appt.and.res.view.facility.admin');

    Route::get('/appt-and-res/edit-facility-super-admin', function () {
        return view('appt-and-res/edit-facility-super-admin');
    })->name('appt.and.res.edit.facility.superadmin');

    Route::get('/appt-and-res/edit-facility-admin', function () {
        return view('appt-and-res/edit-facility-admin');
    })->name('appt.and.res.edit.facility.admin');

    Route::get('/appt-and-res/edit-appointment-super-admin', function () {
        return view('appt-and-res/edit-appointment-super-admin');
    })->name('appt.and.res.edit.appointment.superadmin');

    Route::get('/appt-and-res/edit-appointment-admin', function () {
        return view('appt-and-res/edit-appointment-admin');
    })->name('appt.and.res.edit.appointment.admin');

    Route::get('/appt-and-res/view-appointment-super-admin', function () {
        return view('appt-and-res/view-appointment-super-admin');
    })->name('appt.and.res.view.appointment.superadmin');

    Route::get('/appt-and-res/view-appointment-admin', function () {
        return view('appt-and-res/view-appointment-admin');
    })->name('appt.and.res.view.appointment.admin');

    Route::get('/appt-and-res/view-reservation-admin', function () {
        return view('appt-and-res/view-reservation-admin');
    })->name('appt.and.res.view.reservation.admin');

    Route::get('/appt-and-res/view-reservation-super-admin', function () {
        return view('appt-and-res/view-reservation-super-admin');
    })->name('appt.and.res.view.reservation.superadmin');

    Route::get('/appt-and-res/view-reservation-admin', function () {
        return view('appt-and-res/view-reservation-admin');
    })->name('appt.and.res.view.reservation.admin');

    Route::get('/appt-and-res/edit-reservation-superadmin', function () {
        return view('appt-and-res/edit-reservation-superadmin');
    })->name('appt.and.res.edit.reservation.superadmin');

    Route::get('/appt-and-res/edit-reservation-admin', function () {
        return view('appt-and-res/edit-reservation-admin');
    })->name('appt.and.res.edit.reservation.admin');

    Route::get('/appt-and-res/manage-rules-facility-reservation-super-admin', function () {
        return view('appt-and-res/manage-rules-facility-reservation-super-admin');
    })->name('appt.and.res.manage.rules.reservation.superadmin');

    Route::get('/appt-and-res/manage-rules-facility-reservation-admin', function () {
        return view('appt-and-res/manage-rules-facility-reservation-admin');
    })->name('appt.and.res.manage.rules.reservation.admin');

    Route::get('/appt-and-res/manage-rules-sticker-appt-super-admin', function () {
        return view('appt-and-res/manage-rules-sticker-appt-super-admin');
    })->name('appt.and.res.manage.rules.sticker.appt.superadmin');

    Route::get('/appt-and-res/manage-rules-sticker-appt-admin', function () {
        return view('appt-and-res/manage-rules-sticker-appt-admin');
    })->name('appt.and.res.manage.rules.sticker.appt.admin');

    // For Collection Management SuperAdmin/Admin View & Edit

    // For Collection Management Add Entry

    // For Manage Categories in Collection Management

    Route::get('/collection-mgmt/manage-fund-collection-categories-super-admin', function () {
        return view('collection-mgmt/manage-fund-collection-categories-super-admin');
    })->name('manage.fund.collection.categories.superadmin');

    // View and Edit of Manage Categories

    // Add Category in Manage Categories


    // APPOINTMENT AND RESERVATION MANAGEMENT 

    Route::get('/appt-and-res/mgmt-super-admin', function () {
        return view('appt-and-res/mgmt-super-admin');
    })->name('appt.res.mgmt.superadmin');

    Route::get('/appt-and-res/mgmt-admin', function () {
        return view('appt-and-res/mgmt-admin');
    })->name('appt.res.mgmt.admin');

    // Manage Facility Reservation

    Route::get('/appt-and-res/manage-facility-reservations-super-admin', function () {
        return view('appt-and-res/manage-facility-reservations-super-admin');
    })->name('manage.facility.reservations.superadmin');

    // View and Edit of Facility Reservation 

    // Manage Facilities 

    Route::get('/appt-and-res/manage-facilities-super-admin', function () {
        return view('appt-and-res/manage-facilities-super-admin');
    })->name('manage.facilities.superadmin');

    Route::get('/appt-and-res/manage-facilities-admin', function () {
        return view('appt-and-res/manage-facilities-admin');
    })->name('manage.facilities.admin');

    // Manage Vehicle Sticker Application

    // View and Edit of Vehicle Sticker Application

    Route::get('/appt-and-res/manage-vehicle-sticker-applications-super-admin', function () {
        return view('appt-and-res/manage-vehicle-sticker-applications-super-admin');
    })->name('manage.vehicle.sticker.applications.super.admin');

    Route::get('/add-entry/super-admin', function () {
        return view('add-entry/super-admin');
    })->name('add.entry.superadmin');

    // Admin Routes
    Route::get('/dashboard/admin', function () {
        return view('dashboard/admin');
    })->name('dashboard.admin');

    Route::get('/bulletin-board/admin', function () {
        return view('bulletin-board/admin');
    })->name('bulletin.board.admin');

    Route::get('/bulletin-board/edit-entry-admin', function () {
        return view('bulletin-board/edit-entry-admin');
    })->name('bulletin.board.edit.entry.admin');

    Route::get('/collection-mgmt/admin', function () {
        return view('collection-mgmt/admin');
    })->name('collection.mgmt.admin');

    Route::get('/add-entry/admin', function () {
        return view('add-entry/admin');
    })->name('add.entry.admin');

    Route::get('/collection-mgmt/manage-fund-collection-categories-admin', function () {
        return view('collection-mgmt/manage-fund-collection-categories-admin');
    })->name('manage.fund.collection.categories.admin');

    Route::get('/appt-and-res/manage-facility-reservations-admin', function () {
        return view('appt-and-res/manage-facility-reservations-admin');
    })->name('manage.facility.reservations.admin');

    Route::get('/manage-vehicle-sticker-applications-admin', function () {
        return view('manage-vehicle-sticker-applications-admin');
    })->name('manage.vehicle.sticker.applications.admin');


    // User Routes
    Route::get('/dashboard/user', function () {
        return view('dashboard/user');
    })->name('dashboard.user');

    Route::get('/bulletin-board/user', function () {
        return view('bulletin-board/user');
    })->name('bulletin.board.user');

    Route::get('/payment-mgmt/user', function () {
        return view('payment-mgmt/user');
    })->name('payment.mgmt');

    Route::get('/appt-and-res/user', function () {
        return view('appt-and-res/user');
    })->name('appt.res');

    Route::get('/payment-mgmt/manage-payment', function () {
        return view('payment-mgmt/manage-payment');
    })->name('manage.payment');

    Route::get('/appt-and-res/form-facility-reservation', function () {
        return view('appt-and-res/form-facility-reservation');
    })->name('appt.and.res.form.facility.reservation');

    Route::get('/appt-and-res/form-vehicle-sticker-appointment', function () {
        return view('appt-and-res/form-vehicle-sticker-appointment');
    })->name('appt.and.res.form.vehicle.sticker.appointment');

});

// Login and logout routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
