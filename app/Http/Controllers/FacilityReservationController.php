<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubdivisionFacility; // Adjust based on your models folder structure
use App\Models\FacilityTimeSlot;    // Adjust based on your models folder structure
use App\Models\PaymentCollector;    // Adjust based on your models folder structure
use Carbon\Carbon;                  // Carbon for date handling
use App\Models\FacilityReservation; // Adjust based on your models folder structure
use Illuminate\Support\Facades\Storage;


class FacilityReservationController extends Controller
{

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'facility_id' => 'required|exists:subdivision_facility,id',
            'appt_date' => 'required|date',
            'appt_time' => 'required', // The selected time slot (e.g., '13:00:00|14:00:00')
            'payment_mode' => 'required', // 'gcash' or 'onsite'
            'collector_id' => 'nullable|exists:payment_collector,id',
            'receipt' => 'nullable|file|mimes:jpg,png|max:2048', 
            'reference_no' => 'nullable|string|max:255',
        ]);

        // Map the payment mode to the appropriate ID
        $paymentModeId = $request->payment_mode == 'gcash' ? 1 : 2;

        // Split time slot into start and end times
        list($appt_start_time, $appt_end_time) = explode('|', $request->appt_time);

        // Set fields to null if payment mode is "on-site"
        $collectorId = $paymentModeId === 1 ? $request->collector_id : null;
        $receiptPath = null;
        $referenceNo = $paymentModeId === 1 ? $request->reference_no : null;

        // Handle file upload only if payment mode is "gcash"
        if ($paymentModeId === 1 && $request->hasFile('receipt')) {
            $receiptFile = $request->file('receipt');
            $fileName = 'user-gcash-receipt-' . time() . '.' . $receiptFile->getClientOriginalExtension();
            $receiptPath = "user-gcash-receipt-payments/$fileName";
            Storage::disk('azure')->put($receiptPath, file_get_contents($receiptFile));
            $receiptPath = Storage::disk('azure')->url($receiptPath);
        }

        // Set payment_date to the current date if GCash is selected
        $paymentDate = $paymentModeId === 1 ? now() : null;

        // Create the reservation
        FacilityReservation::create([
            'user_id' => auth()->id(),
            'facility_id' => $request->facility_id,
            'start_date' => $request->appt_date,
            'end_date' => $request->appt_date,
            'appt_start_time' => $appt_start_time,
            'appt_end_time' => $appt_end_time,
            'appt_date' => $request->appt_date,
            'fee' => SubdivisionFacility::findOrFail($request->facility_id)->fee,
            'payment_mode_id' => $paymentModeId,
            'payment_collector_id' => $collectorId,
            'reference_no' => $referenceNo,
            'receipt_path' => $receiptPath,
            'payment_date' => $request->payment_mode === 'gcash' ? now() : null,
        ]);

        return redirect()->route('appt.res')->with('success', 'Facility reservation submitted successfully.');
    }


    
    public function showReservationForm($id)
    {
        // Retrieve the facility based on ID
        $facility = SubdivisionFacility::with('timeSlots')->findOrFail($id);
    
        // Extract available days and months for selection options
        $availableDays = $facility->available_days;
        $availableMonths = $facility->available_months;
    
        // Calculate available dates based on the available days and months
        $availableDates = $this->calculateAvailableDates($availableDays, $availableMonths);
    
        // Retrieve all collectors for GCash payment option
        $collectors = PaymentCollector::select('id', 'name', 'gcash_qr_code_path')->get();
    
        // Pass data to the reservation form view
        return view('appt-and-res.form-facility-reservation', compact('facility', 'availableDates', 'collectors'));
    }
    

    // Helper function to calculate dates based on days of the week and months
    private function calculateAvailableDates($availableDays, $availableMonths)
    {
        $dates = [];
        $currentYear = now()->year;
        $maxDateCount = 100; // Set a reasonable limit to prevent memory overload

        // Map month names to numeric values
        $monthsMap = [
            'January' => 1,
            'February' => 2,
            'March' => 3,
            'April' => 4,
            'May' => 5,
            'June' => 6,
            'July' => 7,
            'August' => 8,
            'September' => 9,
            'October' => 10,
            'November' => 11,
            'December' => 12,
        ];

        foreach ($availableMonths as $monthName) {
            $monthNumber = $monthsMap[$monthName] ?? null;

            if ($monthNumber) {
                $startOfMonth = Carbon::createFromDate($currentYear, $monthNumber, 1);
                $endOfMonth = $startOfMonth->copy()->endOfMonth();

                while ($startOfMonth->lessThanOrEqualTo($endOfMonth)) {
                    // Check if the day is in the available days
                    if (in_array($startOfMonth->format('l'), $availableDays)) {
                        $dates[] = $startOfMonth->copy();
                        if (count($dates) >= $maxDateCount) {
                            // Break if we exceed the maximum date count
                            return $dates;
                        }
                    }
                    $startOfMonth->addDay();
                }
            }
        }

        return $dates;
    }

    public function manageReservations()
    {
        // Fetch reservations with related details for users, facilities, and collectors
        $reservations = FacilityReservation::with(['user', 'facility', 'collector', 'paymentStatus'])
                        ->get();
    
        return view('appt-and-res.manage-facility-reservations-admin', compact('reservations'));
    }

        public function destroy($id)
    {
        // Find the reservation and delete it
        $reservation = FacilityReservation::findOrFail($id);
        $reservation->delete();

        // Redirect back to the reservations management page with a success message
        return redirect()->route('manage.facility.reservations.admin')->with('success', 'Reservation deleted successfully');
    }

    public function updatePaymentMode(Request $request, $facilityId)
    {
        $request->validate([
            'payment_mode' => 'required|string'
        ]);

        $paymentModeId = $request->payment_mode === 'gcash' ? 1 : 2;

        // Find the reservation and update the payment mode
        $reservation = FacilityReservation::where('facility_id', $facilityId)->latest()->first();
        if ($reservation) {
            $reservation->payment_mode_id = $paymentModeId;
            $reservation->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Reservation not found'], 404);
    }


}
