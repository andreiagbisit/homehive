<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Attempt to authenticate the user with the provided credentials
        $request->authenticate();
    
        // Regenerate session to prevent session fixation attacks
        $request->session()->regenerate();
    
        // Get the authenticated user
        $user = Auth::user();
    
        // Check if the user has verified their email
        if (is_null($user->email_verified_at)) {
            // Log out the user immediately
            Auth::logout();
    
            // Redirect back to the login page with an error message about email verification
            return redirect()->route('login')->withErrors([
                'email' => 'Please verify your email address before logging in.',
            ]);
        }
    
        // Check if the user is admin-approved (is_verified)
        if (!$user->is_verified) {
            // Log out the user immediately
            Auth::logout();
    
            // Redirect back to the login page with an error message about admin approval
            return redirect()->route('login')->withErrors([
                'email' => 'Your account is awaiting admin approval. Please contact the administrator.',
            ]);
        }
    
        // Redirect based on the user’s role (account_type_id)
        switch ($user->account_type_id) {
            case 1:
                return redirect()->route('dashboard.superadmin');
            case 2:
                return redirect()->route('dashboard.admin');
            case 3:
                return redirect()->route('dashboard.user');
            default:
                return redirect()->route('dashboard.superadmin'); // Fallback route
        }
    }
    

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
