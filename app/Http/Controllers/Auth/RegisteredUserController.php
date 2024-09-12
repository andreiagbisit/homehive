<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View      
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Debug request data to ensure 'street' is present
          // dd($request->all());

        // Validate the registration data
        $request->validate([
            'uname' => ['required', 'string', 'max:255', 'unique:users'],
            'fname' => ['required', 'string', 'max:255'],
            'mname' => ['nullable', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'bdate' => ['required', 'date'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'contact_no' => ['required', 'string', 'max:20'],
            'street' => ['required', 'string', 'max:255'],
            'house_blk_no' => ['required', 'integer'],
            'house_lot_no' => ['required', 'integer'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Debug request data to ensure 'street' is present
        //Log::debug('Request Data:', $request->all());


        // Create the user with default roles
        $user = User::create([
            'uname' => $request->uname,
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'bdate' => $request->bdate,
            'email' => $request->email,
            'contact_no' => $request->contact_no,
            'street' => $request->street,   
            'house_blk_no' => $request->house_blk_no,
            'house_lot_no' => $request->house_lot_no,
            'password' => Hash::make($request->password),
            'account_type_id' => 3, // Set as Super Admin for the first user
            'subdivision_role_id' => null, // Optional for the Super Admin
        ]);


        //1 = superadmin
        //2 = admin
        //3 = user

        // Trigger the Registered event
        event(new Registered($user));

        // Log in the newly registered user
        Auth::login($user);

        // Redirect to the dashboard
        return redirect(route('dashboard', absolute: false));
        
        
    }
}
