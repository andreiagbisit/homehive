<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        $isDefaultProfilePicture = !empty($user->profile_picture) && $this->isDefaultProfilePicture($user->profile_picture);
    
        return view('profile/edit', [
            'user' => $user,
            'defaultProfilePictureUrl' => $this->getDefaultProfilePicture(),
            'isDefaultProfilePicture' => $isDefaultProfilePicture // Pass this variable
        ]);
    }
    

    /**
     * Update the user's profile information (including uploading new profile pictures).
     */
    
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
                // Check if a new profile picture has been uploaded
      
        // Check if a new profile picture has been uploaded
        if ($request->hasFile('profile_picture')) {
            
            // If the user already has a profile picture, delete the old one from Azure Blob Storage
            if ($user->profile_picture && !$this->isDefaultProfilePicture($user->profile_picture)) {
                $oldFileName = basename($user->profile_picture);
                Storage::disk('azure')->delete('profile-pictures/' . $oldFileName);
            }


            // Upload the new profile picture to Azure Blob Storage
            $file = $request->file('profile_picture');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Store the new file in the "profile-pictures" directory
            $filePath = Storage::disk('azure')->putFileAs('profile-pictures', $file, $fileName);

            // Get the URL of the uploaded file
            $fileUrl = Storage::disk('azure')->url($filePath);

            // Save the new profile picture URL in the database
            $user->profile_picture = $fileUrl;
        }

        // Validate input with unique constraints for username and email
        $request->validate([
            'username' => 'nullable|string|max:255|unique:users,uname,' . $user->id,
            'email' => 'nullable|string|email|max:255|unique:users,email,' . $user->id,
        ], [
            'username.unique' => 'The username has already been taken.',  // Custom message
            'email.unique' => 'The email has already been taken.',       // Custom message
        ]);
        

        // Update profile fields (other details)
        $user->uname = $request->input('username') ?? $user->uname;
        $user->fname = $request->input('first_name') ?? $user->fname;
        $user->mname = $request->input('middle_name') ?? $user->mname;
        $user->lname = $request->input('last_name') ?? $user->lname;
        $user->bdate = $request->input('birthdate') ?? $user->bdate;
        $user->email = $request->input('email') ?? $user->email;
        $user->contact_no = $request->input('contact_no') ?? $user->contact_no;
        $user->street = $request->input('street') ?? $user->street;
        $user->house_blk_no = $request->input('block_no') ?? $user->house_blk_no;
        $user->house_lot_no = $request->input('lot_no') ?? $user->house_lot_no;

        // If the password is being updated, hash and save it
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Mark email as unverified if it has changed
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Save the updated user information
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'Profile updated successfully.');
    }

    /**
     * Remove the user's profile picture.
     */
    public function removePicture(Request $request): RedirectResponse
    {
        $user = $request->user();

        // Remove the current profile picture from Azure Blob Storage if it's not the default
        if ($user->profile_picture && !$this->isDefaultProfilePicture($user->profile_picture)) {
            $fileName = basename($user->profile_picture);
            Storage::disk('azure')->delete('profile-pictures/' . $fileName);
        }

        // Set profile_picture to the default image URL
        $user->profile_picture = 'https://homehivemedia.blob.core.windows.net/homehivemedia/profile-pictures/default-profile.png';
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'Profile picture removed successfully.');
    }

    /**
     * Check if the profile picture is the default one.
     */
    protected function isDefaultProfilePicture(string $profilePictureUrl): bool
    {
        return $profilePictureUrl === 'https://homehivemedia.blob.core.windows.net/homehivemedia/profile-pictures/default-profile.png';
    }

    /**
     * Get the default profile picture URL from Azure Blob Storage.
     */
    protected function getDefaultProfilePicture(): string
    {
        return 'https://homehivemedia.blob.core.windows.net/homehivemedia/profile-pictures/default-profile.png';
    }

    public function show()
    {
        $user = Auth::user();
        return view('profile.details', compact('user'));  // Pass the user object to the view
    }

    public function updatePassword(Request $request)
    {
        // Validate the current and new passwords
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'current_password.required' => 'Please provide your current password.',
            'new_password.confirmed' => 'New password does not match.',
        ]);
    
        $user = $request->user();
    
        // Check if the current password matches
        if (!Hash::check($request->input('current_password'), $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['The provided password does not match your current password.'],
            ]);
        }
    
        // Update the user's password
        $user->password = Hash::make($request->input('new_password'));
        $user->save();
    
        // Redirect with a success message
        return Redirect::back()->with('status', 'Password updated successfully!');
    }

}
