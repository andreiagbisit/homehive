<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\SubdivisionFacility; // Adjust based on your models folder structure
use App\Models\FacilityTimeSlot;    // Adjust based on your models folder structure
use App\Models\PaymentCollector;    // Adjust based on your models folder structure
use Carbon\Carbon;                  // Carbon for date handling
use App\Models\FacilityReservation; // Adjust based on your models folder structure
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Carbon\CarbonPeriod;
use App\Mail\FacilityReservationNotification;
use Illuminate\Support\Facades\Mail;
use App\Mail\FacilityReservationPaidNotification; // Import the new mailable class
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Facility;

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
        $reservation = FacilityReservation::create([
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

                // Fetch superadmins and admins to notify
        $admins = User::whereIn('account_type_id', [1, 2])->get();

        // Send email to each superadmin and admin
        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new FacilityReservationNotification($reservation, $admin));
        }

        return redirect()->route('appt.res')->with('success', 'Facility reservation submitted successfully.');
    }


    
    public function showReservationForm($id)
    {
        $facility = SubdivisionFacility::with('timeSlots')->findOrFail($id);
        $availableDays = $facility->available_days;
        $availableMonths = $facility->available_months;
        $availableDates = $this->calculateAvailableDates($availableDays, $availableMonths);
    
        // Retrieve all collectors for GCash payment option
        $collectors = PaymentCollector::select('id', 'name', 'gcash_qr_code_path')->get();
    
        // Fetch existing reservations for this facility and identify booked slots
        $bookedSlots = FacilityReservation::where('facility_id', $id)
                        ->whereIn('appt_date', $availableDates)
                        ->get()
                        ->groupBy('appt_date')
                        ->map(function ($reservations) {
                            return $reservations->pluck('appt_start_time')->toArray();
                        });
    
        return view('appt-and-res.form-facility-reservation', compact('facility', 'availableDates', 'collectors', 'bookedSlots'));
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
        // Retrieve all facilities
        $facilities = SubdivisionFacility::all();

        // Fetch reservations with related details for users, facilities, and collectors
        $reservations = FacilityReservation::with(['user', 'facility', 'collector', 'paymentStatus'])
                        ->get();
    
        return view('appt-and-res.manage-facility-reservations-admin', compact('reservations','facilities'));
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

    public function show($id)
    {
        $reservation = FacilityReservation::with(['user', 'facility', 'collector', 'paymentStatus'])->findOrFail($id);
        
        return view('appt-and-res.view-reservation-admin', compact('reservation'));
    }

    public function edit($id)
    {
        $reservation = FacilityReservation::findOrFail($id);
        $facility = SubdivisionFacility::with(['availableDates', 'timeSlots'])->find($reservation->facility_id);
        
        $availableDays = $facility->available_days; // E.g., ['Saturday', 'Sunday']
        $availableMonths = $facility->available_months; // E.g., ['January', 'February', ...]
    
        // Generate dates for the entire year
        $currentYear = Carbon::now()->year;
        $generatedDates = [];
    
        foreach ($availableMonths as $month) {
            // Calculate the first day of the month
            $startDate = Carbon::createFromFormat('F Y', "$month $currentYear")->startOfMonth();
            $endDate = $startDate->copy()->endOfMonth();
    
            // Use CarbonPeriod to generate dates within this month
            foreach ($availableDays as $day) {
                $period = CarbonPeriod::create($startDate->next($day), '1 week', $endDate);
                foreach ($period as $date) {
                    $generatedDates[] = $date->format('Y-m-d');
                }
            }
        }
    
        // Remove duplicates and sort the dates
        $availableDates = collect($generatedDates)->unique()->sort();
    
        $availableTimeSlots = $facility->timeSlots; // Assuming this returns time slots for the facility
        $users = User::all();
        $collectors = PaymentCollector::all();
    
        return view('appt-and-res.edit-reservation-admin', compact('reservation', 'availableDates', 'availableTimeSlots', 'users', 'collectors', 'facility'));
    }

    private function generateAvailableDates($facility)
    {
        $availableDays = $facility->available_days; // e.g., [6, 0] for Saturday and Sunday
        $availableMonths = $facility->available_months; // e.g., [1, 2, ..., 12] for all months

        $startDate = Carbon::now()->startOfYear();
        $endDate = Carbon::now()->endOfYear();
        $availableDates = [];

        foreach ($availableMonths as $month) {
            $period = CarbonPeriod::create($startDate->copy()->month($month)->startOfMonth(), $endDate->copy()->month($month)->endOfMonth());

            foreach ($period as $date) {
                if (in_array($date->dayOfWeek, $availableDays)) {
                    $availableDates[] = $date->format('Y-m-d');
                }
            }
        }

        return $availableDates;
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'appt_date' => 'required|date',
            'appt_start_time' => 'required|date_format:H:i:s',
            'appt_end_time' => 'required|date_format:H:i:s',
            'fee' => 'required|numeric',
            'status' => 'required|in:1,2', // Assuming 1 for PAID, 2 for PENDING
            'payment_mode' => 'required|in:1,2', // Assuming 1 for GCash, 2 for On-site Payment
            'payment_collector_id' => 'nullable|exists:payment_collector,id', // Updated to the correct column
            'payment_date' => 'nullable|date',
        ]);

        // Find the reservation and update with validated data
        $reservation = FacilityReservation::findOrFail($id);
        $reservation->user_id = $request->user_id;
        $reservation->appt_date = Carbon::parse($request->appt_date);
        $reservation->appt_start_time = $request->appt_start_time;
        $reservation->appt_end_time = $request->appt_end_time;
        $reservation->fee = $request->fee;
        $reservation->payment_status = $request->status;
        $reservation->payment_mode_id = $request->payment_mode;
        $reservation->payment_collector_id = $request->payment_collector_id; // Updated to the correct column
        $reservation->payment_date = $request->payment_date ? Carbon::parse($request->payment_date) : null;

        // Save the updated reservation
        $reservation->save();

            // Check if the status was updated to PAID
        if ($request->status == 1) { // Assuming 1 means PAID
            // Send notification email to the user
            Mail::to($reservation->user->email)->send(new FacilityReservationPaidNotification($reservation));
        }

        // Redirect back with a success message
        return redirect()->route('manage.facility.reservations.admin')->with('success', 'Reservation updated successfully.');
        
    }
    
    public function manageReservationsSuperAdmin()
    {
        // Retrieve all facilities
        $facilities = SubdivisionFacility::all();

        // Fetch reservations with related details for users, facilities, and collectors
        $reservations = FacilityReservation::with(['user', 'facility', 'collector', 'paymentStatus'])->get();
        
        // Return the view with the reservations data
        return view('appt-and-res.manage-facility-reservations-super-admin', compact('reservations', 'facilities'));
    }

    public function viewReservationSuperAdmin($id)
    {
        $reservation = FacilityReservation::with(['user', 'facility', 'collector', 'paymentStatus'])->findOrFail($id);
        
        return view('appt-and-res.view-reservation-super-admin', compact('reservation'));
    }

    public function editReservationSuperAdmin($id)
    {
        $reservation = FacilityReservation::findOrFail($id);
        $facility = SubdivisionFacility::with(['availableDates', 'timeSlots'])->find($reservation->facility_id);
        
        $availableDays = $facility->available_days;
        $availableMonths = $facility->available_months;

        $currentYear = Carbon::now()->year;
        $generatedDates = [];

        foreach ($availableMonths as $month) {
            $startDate = Carbon::createFromFormat('F Y', "$month $currentYear")->startOfMonth();
            $endDate = $startDate->copy()->endOfMonth();

            foreach ($availableDays as $day) {
                $period = CarbonPeriod::create($startDate->next($day), '1 week', $endDate);
                foreach ($period as $date) {
                    $generatedDates[] = $date->format('Y-m-d');
                }
            }
        }

        $availableDates = collect($generatedDates)->unique()->sort();
        $availableTimeSlots = $facility->timeSlots;
        $users = User::all();
        $collectors = PaymentCollector::all();

        return view('appt-and-res.edit-reservation-super-admin', compact('reservation', 'availableDates', 'availableTimeSlots', 'users', 'collectors', 'facility'));
    }

    public function updateReservationSuperAdmin(Request $request, $id)
    {
        // Validation logic remains the same
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'appt_date' => 'required|date',
            'appt_start_time' => 'required|date_format:H:i:s',
            'appt_end_time' => 'required|date_format:H:i:s',
            'fee' => 'required|numeric',
            'status' => 'required|in:1,2',
            'payment_mode' => 'required|in:1,2',
            'payment_collector_id' => 'nullable|exists:payment_collector,id',
            'payment_date' => 'nullable|date',
        ]);

        $reservation = FacilityReservation::findOrFail($id);
        $reservation->user_id = $request->user_id;
        $reservation->appt_date = Carbon::parse($request->appt_date);
        $reservation->appt_start_time = $request->appt_start_time;
        $reservation->appt_end_time = $request->appt_end_time;
        $reservation->fee = $request->fee;
        $reservation->payment_status = $request->status;
        $reservation->payment_mode_id = $request->payment_mode;
        $reservation->payment_collector_id = $request->payment_collector_id;
        $reservation->payment_date = $request->payment_date ? Carbon::parse($request->payment_date) : null;

        $reservation->save();

            // Check if the status was updated to PAID
        if ($request->status == 1) { // Assuming 1 means PAID
            // Send notification email to the user
            Mail::to($reservation->user->email)->send(new FacilityReservationPaidNotification($reservation));
        }

        // Redirect to the superadmin management page
        return redirect()->route('manage.facility.reservations.superadmin')->with('success', 'Reservation updated successfully.');
    }




    public function generateReport(Request $request)
    {
        $query = FacilityReservation::query();

        // Apply filters
        if ($request->filled('facility')) {
            $query->where('facility_id', $request->facility);
        }

        if ($request->filled('fee')) {
            switch ($request->fee) {
                case 'low':
                    $query->where('fee', '<', 1000);
                    break;
                case 'medium':
                    $query->whereBetween('fee', [1000, 5000]);
                    break;
                case 'high':
                    $query->where('fee', '>', 5000);
                    break;
            }
        }

        if ($request->filled('status')) {
            $query->where('payment_status', $request->status === 'paid' ? 1 : 0);
        }

        if ($request->filled('month')) {
            $query->whereMonth('appt_date', Carbon::parse($request->month)->month)
                ->whereYear('appt_date', Carbon::parse($request->month)->year);
        }

        // Get filtered results
        $reservations = $query->get();

        // Calculate total revenue
        $totalRevenue = $reservations->sum('fee');

        // Generate PDF
        $dompdf = new Dompdf();
        $view = view('reports.facility_reservations', compact('reservations', 'totalRevenue'))->render();
        $dompdf->loadHtml($view);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->stream('Facility_Reservations_Report.pdf');
    }

    
    

    


}
