<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubdivisionFacility; // Adjust based on your models folder structure
use App\Models\FacilityTimeSlot;    // Adjust based on your models folder structure
use App\Models\PaymentCollector;    // Adjust based on your models folder structure
use Carbon\Carbon;                  // Carbon for date handling


class FacilityReservationController extends Controller
{

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
        $collectors = PaymentCollector::all();
    
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

    

}
