<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubdivisionFacility;

class FacilityController extends Controller
{
    public function store(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'facility_name' => 'required|string|max:255',
            'fee' => 'required|numeric',
            'available_days' => 'required|array',
            'available_months' => 'nullable|array',
            'start_times' => 'required|array',
            'start_times.*' => 'required|date_format:H:i',
            'end_times' => 'required|array',
            'end_times.*' => 'required|date_format:H:i',
            'bulletin-board-category-color-picker' => 'required|string|max:7',
            'all_months' => 'nullable', // No need to specify boolean
        ]);
    
        // Check if "Available All Year" is selected
        $allMonthsSelected = $request->input('all_months', false); // Default to false if not present
        $availableMonths = $allMonthsSelected
            ? ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]
            : ($validatedData['available_months'] ?? []);
    
        // Create the facility entry
        $facility = SubdivisionFacility::create([
            'name' => $validatedData['facility_name'],
            'fee' => $validatedData['fee'],
            'available_days' => $validatedData['available_days'],
            'available_months' => $availableMonths,
            'hex_code' => $validatedData['bulletin-board-category-color-picker'],
        ]);
    
        // Save each time slot
        foreach ($validatedData['start_times'] as $index => $startTime) {
            $facility->timeSlots()->create([
                'start_time' => $startTime,
                'end_time' => $validatedData['end_times'][$index],
            ]);
        }

        // Redirect back to the facilities page with success message
        $route = auth()->user()->account_type_id == 1 
        ? 'manage.facilities.superadmin' 
        : 'manage.facilities.admin';

        return redirect()->route($route)->with('success', 'Facility added successfully');
    }

    public function manageFacilities()
    {
        // Retrieve all facilities with their time slots
        $facilities = SubdivisionFacility::with('timeSlots')->get();
    
        // Determine which view to return based on the route name
        if (\Route::currentRouteName() === 'manage.facilities.admin') {
            return view('appt-and-res.manage-facilities-admin', compact('facilities'));
        }
    
        return view('appt-and-res.manage-facilities-super-admin', compact('facilities'));
    }

    public function viewFacility($id)
    {
        // Retrieve the facility by its ID, including its time slots
        $facility = SubdivisionFacility::with('timeSlots')->findOrFail($id);

        // Pass the facility to the view
        return view('appt-and-res.view-facility-super-admin', compact('facility'));
    }

    public function editFacility($id)
    {
        $facility = SubdivisionFacility::with('timeSlots')->findOrFail($id);
        return view('appt-and-res.edit-facility-super-admin', compact('facility'));
    }

    public function updateFacility(Request $request, $id)
    {
        // Validate input data
        $validatedData = $request->validate([
            'facility_name' => 'required|string|max:255',
            'fee' => 'required|numeric',
            'available_days' => 'required|array',
            'available_months' => 'nullable|array',
            'start_times' => 'required|array',
            'start_times.*' => 'required|date_format:H:i',
            'end_times' => 'required|array',
            'end_times.*' => 'required|date_format:H:i',
            'bulletin-board-category-color-picker' => 'required|string|max:7',
            'all_months' => 'nullable',
        ]);
    
        // Check if "Available All Year" is selected
        $allMonthsSelected = $request->input('all_months', false);
        $availableMonths = $allMonthsSelected
            ? ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]
            : ($validatedData['available_months'] ?? []);
    
        // Find the facility and update it
        $facility = SubdivisionFacility::findOrFail($id);
        $facility->update([
            'name' => $validatedData['facility_name'],
            'fee' => $validatedData['fee'],
            'available_days' => $validatedData['available_days'],
            'available_months' => $availableMonths,
            'hex_code' => $validatedData['bulletin-board-category-color-picker'],
        ]);
    
        // Clear existing time slots and re-add them
        $facility->timeSlots()->delete(); // Remove old time slots
        foreach ($validatedData['start_times'] as $index => $startTime) {
            $facility->timeSlots()->create([
                'start_time' => $startTime,
                'end_time' => $validatedData['end_times'][$index],
            ]);
        }
    
        // Redirect back with success message
        $route = auth()->user()->account_type_id == 1 
        ? 'manage.facilities.superadmin' 
        : 'manage.facilities.admin';

        return redirect()->route($route)->with('success', 'Facility updated successfully');
    }
    

    public function destroy($id)
    {
        // Find the facility and soft delete it
        $facility = SubdivisionFacility::findOrFail($id);
        $facility->delete();

        // Redirect based on the user's account type
            $route = auth()->user()->account_type_id == 1 
            ? 'manage.facilities.superadmin' 
            : 'manage.facilities.admin';

        return redirect()->route($route)->with('success', 'Facility deleted successfully');
    }

    public function userViewFacilities()
    {
        // Retrieve all active facilities (you may add any necessary filters, e.g., checking for availability)
        $facilities = SubdivisionFacility::all();

        // Return view with facilities data
        return view('appt-and-res.user', compact('facilities'));
    }





}
