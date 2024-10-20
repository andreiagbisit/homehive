<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB; // Import DB Facade

class PasswordResetController extends Controller
{
    /**
     * Handle sending the password reset link.
     */
    public function sendResetLink(Request $request)
    {
        // Validate the email
        $request->validate([
            'email' => [
                'required',
                'email',
                function ($attribute, $value, $fail) {
                    // Use withTrashed() to include soft-deleted users
                    $user = \App\Models\User::withTrashed()->where('email', $value)->first();
        
                    // If no user exists with this email
                    if (!$user) {
                        $fail('This email address does not exist in our system.');
                    }
        
                    // If the user is soft-deleted, fail with a specific message
                    if ($user && $user->trashed()) {
                        $fail('This account has been deleted. Please contact support.');
                    }
                },
            ],
        ]);
        

        // Generate a reset token
        $token = Str::random(60);

        // Check if the email already exists in password_resets table
        $passwordReset = DB::table('password_resets')->where('email', $request->email)->first();

        if ($passwordReset) {
            // If the email already exists, update the token and timestamp
            DB::table('password_resets')->where('email', $request->email)->update([
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);
        } else {
            // If the email doesn't exist, insert a new record
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);
        }

        // Send reset link via email
        Mail::send('emails.password-reset', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Password Reset Request');
        });

        return back()->with('status', 'Password reset link has been sent to your email.');
    }

        public function showResetForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:8|confirmed',
            'token' => 'required'
        ]);

        // Find the token in the password_resets table
        $reset = DB::table('password_resets')->where('token', $request->token)->first();

        // If token not found or email doesn't match, return with error
        if (!$reset || $reset->email !== $request->email) {
            return back()->withErrors(['email' => 'Invalid password reset token or email.']);
        }

        // Update the user's password
        $user = User::where('email', $request->email)->first();
        $user->password = bcrypt($request->password);
        $user->save();

        // Delete the reset token after use
        DB::table('password_resets')->where('email', $request->email)->delete();

        // Redirect to login page with success message
        return redirect('/login')->with('status', 'Password reset successfully.');
    }

}
