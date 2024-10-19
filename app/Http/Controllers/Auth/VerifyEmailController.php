<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        // Check if the email has already been verified
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('login')->with('status', 'Your email is already verified.');
        }

        // Mark the email as verified
        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        // Log the user out after email verification
        Auth::logout();

        // Redirect the user to the login page with a message that they need admin approval
        return redirect()->route('login')->with('status', 'Your email has been verified. Please wait for admin approval to access your account.');
    }
}
