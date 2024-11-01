<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VehicleStickerApplicationDetails;
use App\Models\VehicleStickerApplication;
use App\Models\PaymentCollector;



class VehicleStickerController extends Controller
{
     // Method to store new settings

     public function createSettings()
     {
         // Retrieve the first record or pass an empty model instance
         $details = VehicleStickerApplicationDetails::first() ?? new VehicleStickerApplicationDetails();
         return view('appt-and-res.manage-settings-sticker-appt-super-admin', compact('details'));
     }
     public function storeSettings(Request $request)
     {
         // Validate the request data
         $request->validate([
             'registered_vehicles' => 'required|integer',
             'vehicle_sticker_fee' => 'required|numeric',
             'hex_code' => 'required|string|max:7',
         ]);
     
         // Find the first record or create a new one if none exists
         $details = VehicleStickerApplicationDetails::first();
     
         if ($details) {
             // Update the existing record
             $details->update([
                 'registered_vehicles' => $request->input('registered_vehicles'),
                 'vehicle_sticker_fee' => $request->input('vehicle_sticker_fee'),
                 'hex_code' => $request->input('hex_code'),
             ]);
         } else {
             // Create a new record if none exists
             VehicleStickerApplicationDetails::create([
                 'registered_vehicles' => $request->input('registered_vehicles'),
                 'vehicle_sticker_fee' => $request->input('vehicle_sticker_fee'),
                 'hex_code' => $request->input('hex_code'),
             ]);
         }
     
         // Redirect back with a success message
         return redirect()->route('manage.vehicle.sticker.applications.super.admin')->with('success', 'Settings saved successfully.');
     }

     public function storeApplication(Request $request)
     {
         // Validation using the built-in method which handles validation errors automatically
         $request->validate([
             'registered_owner' => 'required|string|max:255',
             'make' => 'required|string|max:255',
             'series' => 'required|string|max:255',
             'color' => 'required|string|max:255',
             'plate_no' => 'required|string|max:10',
             'payment_mode_id' => 'required|integer',
             'payment_collector_id' => 'nullable|integer',
             'appt_date' => 'nullable|date',
             'appt_time' => 'nullable|string|max:8',
             'date_of_payment' => 'nullable|date',
             'receipt_img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
         ]);
     
         $receiptPath = null;
         if ($request->hasFile('receipt_img')) {
             $receiptPath = $request->file('receipt_img')->store('user-gcash-receipt-payments', 'azure');
         }
     
         // Retrieve the vehicle sticker fee from the application details
         $details = VehicleStickerApplicationDetails::first();
         $fee = $details ? $details->vehicle_sticker_fee : 0;
     
         // Create the application record
         VehicleStickerApplication::create([
             'user_id' => auth()->id(),
             'registered_owner' => $request->input('registered_owner'),
             'make' => $request->input('make'),
             'series' => $request->input('series'),
             'color' => $request->input('color'),
             'plate_no' => $request->input('plate_no'),
             'fee' => $fee,
             'payment_mode_id' => $request->input('payment_mode_id'),
             'payment_collector_id' => $request->input('payment_collector_id'),
             'appt_date' => $request->input('appt_date'),
             'appt_time' => $request->input('appt_time'),
             'date_of_payment' => $request->input('date_of_payment'),
             'receipt_img' => $receiptPath,
         ]);
     
         // Redirect with success message
         return redirect()->route('appt.res')->with('success', 'Vehicle Sticker Application submitted successfully.');
     }
     

    public function index()
    {
        // Fetch all applications and pass to the view
        $applications = VehicleStickerApplication::with('user', 'collector') // assuming relationships exist
                        ->get();

        return view('appt-and-res.manage-vehicle-sticker-applications-super-admin', compact('applications'));
    }

    public function createApplication()
    {
        // Retrieve the fee from the first record of VehicleStickerApplicationDetails
        $details = VehicleStickerApplicationDetails::first();
        $fee = $details ? $details->vehicle_sticker_fee : 0;

         // Retrieve the list of collectors from your PaymentCollector model
        $collectors = PaymentCollector::all();

        return view('appt-and-res.form-vehicle-sticker-appointment', compact('fee','collectors'));

        
    }

    public function viewApplication($id)
    {
        // Fetch the application using the ID
        $application = VehicleStickerApplication::with('user', 'collector')->find($id);

        if (!$application) {
            return redirect()->route('applications.list')->with('error', 'Application not found.');
        }

        // Pass the $application variable to the view
        return view('appt-and-res.view-appointment-super-admin', compact('application'));
    }

    public function editApplication($id)
    {
        // Retrieve the application by ID
        $application = VehicleStickerApplication::findOrFail($id);

        // Retrieve payment collectors if needed
        $collectors = PaymentCollector::all();

        // Pass the application and collectors data to the view
        return view('appt-and-res.edit-appointment-super-admin', compact('application', 'collectors'));
    }

    public function updateApplicationStatus(Request $request, $id)
    {
        $application = VehicleStickerApplication::findOrFail($id);
        $application->status = $request->input('status');
        $application->save();

        return redirect()->route('manage.vehicle.sticker.applications.super.admin')->with('success', 'Application status updated successfully.');
    }

    public function destroy($id)
    {
            // Find the application by ID
        $application = VehicleStickerApplication::findOrFail($id);
        $application->delete();
        
        return redirect()->route('manage.vehicle.sticker.applications.super.admin')
                        ->with('success', 'Vehicle Sticker Application deleted successfully.');
    }



    

    
}



