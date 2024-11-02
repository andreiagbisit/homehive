<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VehicleStickerApplicationDetails;
use App\Models\VehicleStickerApplication;
use App\Models\PaymentCollector;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\VehicleStickerApplicationNotification;
use App\Models\User;
use App\Mail\VehicleRegistrationConfirmed;





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
        $application = VehicleStickerApplication::create([
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

         // Get all superadmins and admins
        $admins = User::whereIn('account_type_id', [1, 2])->get();

        // Send email to each admin
        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new VehicleStickerApplicationNotification($application));
        }
     
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

        // Check if the status is "paid" (assuming "1" represents "paid")
        if ($application->status == 1) {
            // Send email to the user who submitted the application
            Mail::to($application->user->email)->send(new VehicleRegistrationConfirmed($application));
        }


            // Check the authenticated user's role and redirect accordingly
        if (auth()->user()->account_type_id == 1) { // Super Admin
            return redirect()->route('manage.vehicle.sticker.applications.super.admin')->with('success', 'Application status updated successfully.');
        } elseif (auth()->user()->account_type_id == 2) { // Admin
            return redirect()->route('manage.vehicle.sticker.applications.admin')->with('success', 'Application status updated successfully.');
        }
    }

    public function destroy($id)
    {
        // Find the application by ID and delete it
        $application = VehicleStickerApplication::findOrFail($id);
        $application->delete();

        // Redirect based on user role
        if (auth()->user()->account_type_id == 1) { // Super Admin
            return redirect()->route('manage.vehicle.sticker.applications.super.admin')
                            ->with('success', 'Vehicle Sticker Application deleted successfully.');
        } elseif (auth()->user()->account_type_id == 2) { // Admin
            return redirect()->route('manage.vehicle.sticker.applications.admin')
                            ->with('success', 'Vehicle Sticker Application deleted successfully.');
        }

        // Fallback redirection if necessary
        return redirect()->back()->with('success', 'Vehicle Sticker Application deleted successfully.');
    }

    public function generateReport(Request $request)
    {
        // Validate input for month and year
        $request->validate([
            'month' => 'required|integer|min:1|max:12',
            'year' => 'required|integer|min:' . (date('Y') - 5) . '|max:' . (date('Y') + 5),
        ]);

        // Fetch applications based on filters
        $applications = VehicleStickerApplication::with('collector')
            ->whereMonth('date_of_payment', $request->month)
            ->whereYear('date_of_payment', $request->year)
            ->get();

        // Calculate the total fee
        $totalFee = $applications->sum('fee');

        // Create Dompdf instance and load view
        $dompdf = new Dompdf();
        $view = view('reports.vehicle-sticker', compact('applications', 'totalFee', 'request'))->render();
        $dompdf->loadHtml($view);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Stream the PDF for download
        return $dompdf->stream('vehicle_sticker_report_' . $request->month . '_' . $request->year . '.pdf');
    }
    
        public function storeSettingsAdmin(Request $request)
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

        // Redirect with a success message
        return redirect()->route('manage.vehicle.sticker.applications.admin')->with('success', 'Settings saved successfully.');
    }


    public function indexAdmin()
    {
        // Fetch all applications and pass them to the view
        $applications = VehicleStickerApplication::with('collector') // Include necessary relationships
                            ->get();

        // Return the view for the admin with the applications data
        return view('appt-and-res.manage-vehicle-sticker-applications-admin', compact('applications'));
    }

    public function viewApplicationAdmin($id)
    {
        // Retrieve the application with relationships (adjust as needed)
        $application = VehicleStickerApplication::with('collector', 'user')->findOrFail($id);

        // Return the view for admin
        return view('appt-and-res.view-appointment-admin', compact('application'));
    }

    public function editApplicationAdmin($id)
    {
        // Retrieve the application (with relationships if needed)
        $application = VehicleStickerApplication::with('collector', 'user')->findOrFail($id);

        // Return the edit view for admin
        return view('appt-and-res.edit-appointment-admin', compact('application'));
    }


}



