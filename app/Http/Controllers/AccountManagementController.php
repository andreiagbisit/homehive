<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AccountManagementController extends Controller
{
    // Display all users
    public function index()
    {
        $users = User::all();
        return view('acc-mgmt-super-admin', compact('users'));
    }

    // Show the form for viewing the specified user
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('view-entry-super-admin', compact('user'));
    }

    // Show the form for editing the specified user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('edit-entry-superadmin-account-management', compact('user'));
    }

    // Update the specified user in the database
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate and update the user
        $request->validate([
            'uname' => 'required|string|max:255',
            'fname' => 'required|string|max:255',
            'mname' => 'nullable|string|max:255',
            'lname' => 'required|string|max:255',
            'bdate' => 'required|date',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'contact_no' => 'required|string|max:20',
            'street' => 'required|string|max:255',
            'house_blk_no' => 'required|integer',
            'house_lot_no' => 'required|integer',
        ]);

        $user->update($request->all());

        // Redirect back to the user's detail view after update
        return redirect()->route('superadmin.view', $id)->with('success', 'User updated successfully.');
    }

    // Remove the specified user from the database
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        // Redirect back to the account management page after deletion
        return redirect()->route('account.management')->with('success', 'User deleted successfully.');
    }
}
