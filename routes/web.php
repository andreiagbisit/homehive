<?php

use App\Http\Controllers\PaymentCollectorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AccountManagementController; // Include the AccountManagementController
use App\Http\Controllers\BulletinBoardCategoryController;
use App\Http\Controllers\BulletinBoardController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\PaymentCategoryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CollectionManagementController;
use App\Http\Controllers\FacilityController;



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

/* Registration route
Route::get('/auth/create-new-acc', function () {
    return view('auth/create-new-acc');
})->name('register');*/

Route::get('/auth/forgot-password-draft', function () {
    return view('auth/forgot-password-draft');
})->name('password.request');

// Route to handle the request to send the password reset link
Route::post('/password/reset-link', [PasswordResetController::class, 'sendResetLink'])->name('password.request.submit');

// Route to show the reset password form (this is the form users see after clicking the link in their email)
Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');

// Route to actually reset the password
Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.reset.submit');


Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['throttle:6,1'])
    ->name('verification.send');

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

    Route::get('/acc-mgmt/super-admin', [AccountManagementController::class, 'index'])->name('account.management.superadmin'); // List all users for super admin
    Route::get('/acc-mgmt/admin', [AccountManagementController::class, 'index'])->name('account.management.admin'); // List all users
    Route::get('/acc-mgmt/view-entry-acc/{id}', [AccountManagementController::class, 'show'])->name('acc.mgmt.view.entry'); // Route to view a specific user
    Route::get('/acc-mgmt/edit-entry-acc/{id}', [AccountManagementController::class, 'edit'])->name('superadmin.edit'); // Edit a user form 
    Route::patch('/edit-entry/super-admin/{id}', [AccountManagementController::class, 'update'])->name('superadmin.update'); // Update user in the database
    Route::delete('/delete-entry-super-admin/{id}', [AccountManagementController::class, 'destroy'])->name('superadmin.destroy'); // Delete a user

    // MANAGE ROLE
    Route::get('/acc-mgmt/manage-roles', [AccountManagementController::class, 'manageRoles'])->name('manage.roles');

    Route::get('/acc-mgmt/edit-entry-role/{id}', [AccountManagementController::class, 'editRole'])
     ->name('acc.mgmt.edit.entry.role');

     Route::patch('/acc-mgmt/update-entry-role/{id}', [AccountManagementController::class, 'updateEntryRole'])
     ->name('acc.mgmt.update.entry.role'); 

     Route::patch('/acc-mgmt/promote-to-admin/{id}', [AccountManagementController::class, 'promoteToAdmin'])
     ->name('acc.mgmt.promote.admin');

    // Add the new verification route here
    Route::patch('/users/{user}/verify', [AccountManagementController::class, 'verify'])->name('users.verify');

    Route::post('/bulletin-board/store-category', [BulletinBoardCategoryController::class, 'store'])
     ->name('bulletin.board.store.category');

     Route::get('/bulletin-board/manage-categories-admin', [BulletinBoardCategoryController::class, 'index'])
     ->name('bulletin.board.manage.categories.admin');

     Route::get('/bulletin-board/view-category-admin/{id}', [BulletinBoardCategoryController::class, 'show'])
     ->name('bulletin.board.view.category.admin');

     Route::get('/bulletin-board/edit-category-admin/{id}', [BulletinBoardCategoryController::class, 'edit'])
    ->name('bulletin.board.edit.category.admin');
    
    Route::patch('/bulletin-board/update-category-admin/{id}', [BulletinBoardCategoryController::class, 'update'])
    ->name('bulletin.board.update.category.admin');

    Route::delete('/bulletin-board/delete-category/{id}', [BulletinBoardCategoryController::class, 'destroy'])
    ->name('bulletin.board.delete.category.admin');

    Route::get('/bulletin-board/admin', [BulletinBoardCategoryController::class, 'adminView'])->name('bulletin.board.admin');

    Route::get('/bulletin-board/super-admin', [BulletinBoardCategoryController::class, 'superAdminView'])->name('bulletin.board.superadmin');

    Route::get('/bulletin-board/user', [BulletinBoardCategoryController::class, 'userView'])->name('bulletin.board.user');

    // Redirection of email links from bulletin board entries notification
    Route::get('/bulletin-board', function () {
        $user = Auth::user();
        if ($user->account_type_id == 1) {
            return redirect()->route('bulletin.board.superadmin');
        } elseif ($user->account_type_id == 2) {
            return redirect()->route('bulletin.board.admin');
        } else {
            return redirect()->route('bulletin.board.user');
        }
    })->middleware('auth')->name('bulletin.board');    

    Route::post('/bulletin-board/store-entry', [BulletinBoardController::class, 'store'])->name('bulletin.board.store.entry.admin');

        // Route to show the edit form
    Route::get('/bulletin-board/edit-entry-admin/{id}', [BulletinBoardController::class, 'edit'])->name('bulletin.board.edit.entry.admin');

    // Route to handle form submission and update the entry
    Route::put('/bulletin-board/update-entry-admin/{id}', [BulletinBoardController::class, 'update'])->name('bulletin.board.update.admin');

    Route::delete('bulletin-board/admin/{id}', [BulletinBoardController::class, 'destroy'])->name('bulletin.board.destroy');

    Route::post('/collection-mgmt/store-collector', [PaymentCollectorController::class, 'store'])->name('store-collector');

    Route::get('/collection-mgmt/manage-collectors-super-admin', [PaymentCollectorController::class, 'manageCollectors'])->name('collection.mgmt.manage.collectors.superadmin');

    Route::get('/collection-mgmt/add-collector-admin', [PaymentCollectorController::class, 'addCollectorAdmin'])->name('collection.mgmt.add.collector.admin');

    Route::get('/collection-mgmt/manage-collectors-admin', [PaymentCollectorController::class, 'manageCollectorsAdmin'])->name('collection.mgmt.manage.collectors.admin');

    Route::get('collection-mgmt/edit-collector-super-admin/{id}', [PaymentCollectorController::class, 'editCollector'])->name('collection.mgmt.edit.collector.superadmin');

    Route::get('collection-mgmt/edit-collector-admin/{id}', [PaymentCollectorController::class, 'editCollector'])->name('collection.mgmt.edit.collector.admin');

    Route::put('/collection-mgmt/update-collector-super-admin/{id}', [PaymentCollectorController::class, 'update'])->name('collection.mgmt.update.collector.superadmin');

    Route::get('/collection-mgmt/view-collector-super-admin/{id}', [PaymentCollectorController::class, 'show'])->name('collection.mgmt.view.collector.superadmin');  

    Route::get('/collection-mgmt/view-collector-admin/{id}', [PaymentCollectorController::class, 'show'])->name('collection.mgmt.view.collector.admin');

    Route::delete('/collection-mgmt/manage-collectors-super-admin/{id}', [PaymentCollectorController::class, 'destroy'])->name('collection.mgmt.delete.collector.superadmin');

    



    Route::get('/collection-mgmt/add-category-super-admin', [PaymentCategoryController::class, 'create'])->name('collection.mgmt.add.category.superadmin');

    Route::get('/collection-mgmt/add-category-admin', [PaymentCategoryController::class, 'create'])->name('collection.mgmt.add.category.admin');

    Route::post('/collection-mgmt/store-category-super-admin', [PaymentCategoryController::class, 'store'])->name('store.category.superadmin');

    Route::post('/collection-mgmt/store-category-admin', [PaymentCategoryController::class, 'store'])->name('store.category.admin');

    Route::get('/collection-mgmt/manage-fund-collection-categories-super-admin', [PaymentCategoryController::class, 'index'])->name('manage.fund.collection.categories.superadmin');

    Route::get('/collection-mgmt/manage-fund-collection-categories-admin', [PaymentCategoryController::class, 'index'])->name('manage.fund.collection.categories.admin');

    Route::get('/collection-mgmt/view-category-super-admin/{id}', [PaymentCategoryController::class, 'show'])->name('collection.mgmt.view.category.superadmin');

    Route::get('/collection-mgmt/view-category-admin/{id}', [PaymentCategoryController::class, 'show'])->name('collection.mgmt.view.category.admin');

    Route::get('/collection-mgmt/edit-category-super-admin/{id}', [PaymentCategoryController::class, 'edit'])->name('collection.mgmt.edit.category.superadmin');

    Route::get('/collection-mgmt/edit-category-admin/{id}', [PaymentCategoryController::class, 'edit'])->name('collection.mgmt.edit.category.admin');

    Route::put('/collection-mgmt/update-category-super-admin/{id}', [PaymentCategoryController::class, 'update'])->name('collection.mgmt.update.category.superadmin');

    Route::delete('/collection-mgmt/delete-category-super-admin/{id}', [PaymentCategoryController::class, 'destroy'])->name('collection.mgmt.delete.category.superadmin');




    Route::get('/collection-mgmt/add-entry-super-admin', [PaymentCategoryController::class, 'createEntry'])->name('collection.mgmt.add.entry.superadmin');

    Route::get('/collection-mgmt/add-entry-admin', [PaymentCategoryController::class, 'createEntryForAdmin'])->name('collection.mgmt.add.entry.admin');

    Route::post('/collection-mgmt/add-entry-super-admin', [PaymentController::class, 'store'])->name('payment.store');

    Route::post('/collection-mgmt/add-entry-admin', [PaymentController::class, 'store'])->name('payment.store');

    Route::get('/collection-mgmt/super-admin', [PaymentController::class, 'index'])->name('collection.mgmt.superadmin');

    Route::get('/collection-mgmt/admin', [PaymentController::class, 'index'])->name('collection.mgmt.admin');

    Route::get('/collection-mgmt/view-entry-super-admin/{id}', [PaymentController::class, 'show'])->name('collection.mgmt.view.entry.superadmin');

    Route::get('/collection-mgmt/view-entry-admin/{id}', [PaymentController::class, 'show'])->name('collection.mgmt.view.entry.admin');

    Route::get('/collection-mgmt/edit-entry-super-admin/{id}', [PaymentController::class, 'edit'])->name('collection.mgmt.edit.entry.superadmin');
    
    Route::post('/collection-mgmt/edit-entry-super-admin/{id}', [PaymentController::class, 'update'])->name('payment.update');

    Route::get('/collection-mgmt/edit-entry-admin/{id}', [PaymentController::class, 'edit'])->name('collection.mgmt.edit.entry.admin');

    Route::post('/collection-mgmt/edit-entry-admin/{id}', [PaymentController::class, 'update'])->name('payment.update');

    Route::delete('/collection-mgmt/delete-payment-super-admin/{id}', [PaymentController::class, 'destroy'])->name('payment.delete');

    Route::delete('/collection-mgmt/delete-payment-admin/{id}', [PaymentController::class, 'destroy'])->name('payment.delete');

    Route::get('/payment-mgmt/user', [PaymentController::class, 'userPayments'])->name('payment.mgmt');

    Route::get('/payment-mgmt/manage-payment/{payment}', [PaymentController::class, 'managePayment'])->name('manage.payment');

    Route::post('/payment-mgmt/manage-payment/{id}', [PaymentController::class, 'submitPayment'])->name('payment.submit');

    Route::get('/collection-mgmt/generate-report', [CollectionManagementController::class, 'generateReport'])->name('generateReport');




    Route::post('/appt-and-res/store', [FacilityController::class, 'store'])->name('appt-and-res.store');

    Route::get('/appt-and-res/manage-facilities-super-admin', [FacilityController::class, 'manageFacilities'])->name('manage.facilities.superadmin');



    // For Manage Role SuperAdmin/Admin View & Edit
    Route::get('/edit-entry/super-admin', function () {
        return view('edit-entry/super-admin');
    })->name('edit.entry.super.admin');


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

    /*Route::get('/bulletin-board/manage-categories-admin', function () {
        return view('bulletin-board/manage-categories-admin');
    })->name('bulletin.board.manage.categories.admin');*/

    Route::get('/bulletin-board/add-category-super-admin', function () {
        return view('bulletin-board/add-category-super-admin');
    })->name('bulletin.board.add.category.superadmin');

    Route::get('/bulletin-board/add-category-admin', function () {
        return view('bulletin-board/add-category-admin');
    })->name('bulletin.board.add.category.admin');

    Route::get('/bulletin-board/edit-category-super-admin', function () {
        return view('bulletin-board/edit-category-super-admin');
    })->name('bulletin.board.edit.category.superadmin');

    /*Route::get('/bulletin-board/edit-category-admin', function () {
        return view('bulletin-board/edit-category-admin');
    })->name('bulletin.board.edit.category.admin');*/

    Route::get('/bulletin-board/view-category-super-admin', function () {
        return view('bulletin-board/view-category-super-admin');
    })->name('bulletin.board.view.category.superadmin');

    /*Route::get('/bulletin-board/view-category-admin', function () {
        return view('bulletin-board/view-category-admin');
    })->name('bulletin.board.view.category.admin');*/

    // COLLECTION MANAGEMENT

    /*Route::get('/collection-mgmt/admin', function () {
        return view('collection-mgmt/superadmin');
    })->name('collection.mgmt.admin');*/

    /*Route::get('/collection-mgmt/add-entry-admin', function () {
        return view('collection-mgmt/add-entry-admin');
    })->name('collection.mgmt.add.entry.admin');*/

    /*Route::get('/collection-mgmt/view-entry-admin', function () {
        return view('collection-mgmt/view-entry-admin');
    })->name('collection.mgmt.view.entry.admin');*/

    /*Route::get('/collection-mgmt/edit-entry-admin', function () {
        return view('collection-mgmt/edit-entry-admin');
    })->name('collection.mgmt.edit.entry.admin');*/

    Route::get('/collection-mgmt/add-collector-super-admin', function () {
        return view('collection-mgmt/add-collector-super-admin');
    })->name('collection.mgmt.add.collector.superadmin');
    
    /*Route::get('/collection-mgmt/add-category-super-admin', function () {
        return view('collection-mgmt/add-category-super-admin');
    })->name('collection.mgmt.add.category.superadmin');*/

    Route::get('/collection-mgmt/add-category-admin', function () {
        return view('collection-mgmt/add-category-admin');
    })->name('collection.mgmt.add.category.admin');

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

    Route::get('/appt-and-res/manage-settings-facility-reservation-super-admin', function () {
        return view('appt-and-res/manage-settings-facility-reservation-super-admin');
    })->name('appt.and.res.manage.settings.reservation.superadmin');

    Route::get('/appt-and-res/manage-settings-facility-reservation-admin', function () {
        return view('appt-and-res/manage-settings-facility-reservation-admin');
    })->name('appt.and.res.manage.settings.reservation.admin');

    Route::get('/appt-and-res/manage-settings-sticker-appt-super-admin', function () {
        return view('appt-and-res/manage-settings-sticker-appt-super-admin');
    })->name('appt.and.res.manage.settings.sticker.appt.superadmin');

    Route::get('/appt-and-res/manage-settings-sticker-appt-admin', function () {
        return view('appt-and-res/manage-settings-sticker-appt-admin');
    })->name('appt.and.res.manage.settings.sticker.appt.admin');

    // For Collection Management SuperAdmin/Admin View & Edit

    // For Collection Management Add Entry

    // For Manage Categories in Collection Management

    /*Route::get('/collection-mgmt/manage-fund-collection-categories-super-admin', function () {
        return view('collection-mgmt/manage-fund-collection-categories-super-admin');
    })->name('manage.fund.collection.categories.superadmin');*/

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

    /*Route::get('/appt-and-res/manage-facilities-super-admin', function () {
        return view('appt-and-res/manage-facilities-super-admin');
    })->name('manage.facilities.superadmin');*/

    


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

    Route::get('/add-entry/admin', function () {
        return view('add-entry/super-admin');
    })->name('add.entry.admin');

    // Admin Routes
    Route::get('/dashboard/admin', function () {
        return view('dashboard/admin');
    })->name('dashboard.admin');

    /*Route::get('/bulletin-board/admin', function () {
        return view('bulletin-board/admin');
    })->name('bulletin.board.admin');*/

    /*Route::get('/bulletin-board/edit-entry-admin', function () {
        return view('bulletin-board/edit-entry-admin');
    })->name('bulletin.board.edit.entry.admin');*/

    /*Route::get('/collection-mgmt/admin', function () {
        return view('collection-mgmt/admin');
    })->name('collection.mgmt.admin');*/

    Route::get('/add-entry/admin', function () {
        return view('add-entry/admin');
    })->name('add.entry.admin');

    Route::get('/appt-and-res/manage-facility-reservations-admin', function () {
        return view('appt-and-res/manage-facility-reservations-admin');
    })->name('manage.facility.reservations.admin');

    Route::get('/appt-and-res/manage-vehicle-sticker-applications-admin', function () {
        return view('appt-and-res/manage-vehicle-sticker-applications-admin');
    })->name('manage.vehicle.sticker.applications.admin');


    // User Routes
    Route::get('/dashboard/user', function () {
        return view('dashboard/user');
    })->name('dashboard.user');

    /*Route::get('/bulletin-board/user', function () {
        return view('bulletin-board/user');
    })->name('bulletin.board.user');*/

    /*Route::get('/payment-mgmt/user', function () {
        return view('payment-mgmt/user');
    })->name('payment.mgmt');*/

    Route::get('/appt-and-res/user', function () {
        return view('appt-and-res/user');
    })->name('appt.res');

    /*Route::get('/payment-mgmt/manage-payment', function () {
        return view('payment-mgmt/manage-payment');
    })->name('manage.payment');*/

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
