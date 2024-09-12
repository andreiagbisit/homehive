<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage; // <-- Add this line
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Validation\Rules\Password; // This is correctly placed here, outside the class

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile-edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        //dd($request->all());  // Check the form data here
 
        $user = $request->user();

        // Update profile fields
        $user->uname = $request->input('username');
        $user->fname = $request->input('first_name');
        $user->mname = $request->input('middle_name');
        $user->lname = $request->input('last_name');
        $user->bdate = $request->input('birthdate');
        $user->email = $request->input('email');
        $user->contact_no = $request->input('contact_no');
        $user->street = $request->input('street');
        $user->house_blk_no = $request->input('block_no');
        $user->house_lot_no = $request->input('lot_no');

         // Handle image upload
        if ($request->hasFile('profile_picture')) {
            // Delete the old profile picture if it exists
            if ($user->profile_picture) {
                Storage::delete('public/' . $user->profile_picture);
            }

            // Store the new profile picture
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path; // Save the path in the database
        }

        // Check if password needs to be updated
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Mark email as unverified if it has changed
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Save changes
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'Profile updated successfully.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Update the user's password.
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = $request->user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'Password updated successfully.');
    }

    /*public function removePicture(Request $request): RedirectResponse
    {
        $user = $request->user();

        // Remove the current profile picture if it exists
        if ($user->profile_picture && Storage::exists('public/' . $user->profile_picture)) {
            Storage::delete('public/' . $user->profile_picture);
        }

        // Set profile_picture to null or a default value
        $user->profile_picture = null; // or a default image path if needed
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'Profile picture removed successfully.');
    }*/

}
