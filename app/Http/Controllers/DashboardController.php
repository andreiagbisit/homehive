<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payment;
use App\Models\PaymentCollector;
use App\Models\FacilityReservation;
use App\Models\VehicleStickerApplication;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; 
use App\Models\PaymentCategory;    


class DashboardController extends Controller
{
   

    public function index()
    {
        $hoaOfficerCount = User::whereIn('account_type_id', [1, 2])->count();
        $householdAccountsCount = User::where('account_type_id', 3)->count();
        $currentMonth = now()->month;
        $currentYear = now()->year;
    
        // Monthly Households Invoiced
        $householdsInvoicedCount = Payment::whereMonth('pay_date', $currentMonth)
            ->whereYear('pay_date', $currentYear)
            ->distinct('user_id')
            ->count('user_id');
    
        // Monthly Facility Reservation Requests
        $facilityReservationRequests = FacilityReservation::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->count();
    
        // Payment Collectors Count
        $paymentCollectorsCount = PaymentCollector::count();
    
        // Monthly Fund Collection
        $monthlyFundCollection = Payment::where('status_id', 1)
            ->whereMonth('pay_date', $currentMonth)
            ->whereYear('pay_date', $currentYear)
            ->sum('fee');
    
        // Annual Fund Collection
        $annualFundCollection = Payment::where('status_id', 1)
            ->whereYear('pay_date', $currentYear)
            ->sum('fee');
    
        $vehicleStickerRequests = VehicleStickerApplication::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->count();
    
        // Category Collection Data
        $fundCollectionByCategory = Payment::selectRaw('category_id, SUM(fee) as total')
            ->where('status_id', 1)
            ->whereMonth('pay_date', $currentMonth)
            ->whereYear('pay_date', $currentYear)
            ->groupBy('category_id')
            ->with('category')
            ->get();
    
        // Prepare data for the view
        $categoryNames = [];
        $categoryTotals = [];
        $categoryColors = [];
    
        foreach ($fundCollectionByCategory as $fund) {
            $categoryNames[] = $fund->category->name;
            $categoryTotals[] = $fund->total;  // Use the actual total fee amount
            $categoryColors[] = $fund->category->hex_code;
        }

         // Calculate percentages of completed collections
            $collectionsByCategory = Payment::selectRaw('category_id, COUNT(*) as total_expected_collections, SUM(CASE WHEN status_id = 1 THEN 1 ELSE 0 END) as actual_collections')
            ->groupBy('category_id')
            ->with('category')
            ->get();

        $categoryPercentages = [];
        foreach ($collectionsByCategory as $collection) {
            $totalExpected = $collection->total_expected_collections;
            $actual = $collection->actual_collections;
            
            // Calculate percentage of collections completed
            $percentage = ($totalExpected > 0) ? round(($actual / $totalExpected) * 100) : 0;
            $categoryPercentages[] = $percentage;
        }

    
        \Log::info('Category Totals Array:', $categoryTotals); // Log category totals to verify contents
        \Log::info('Total Fund Collection:', ['total' => array_sum($categoryTotals)]); // Log total
    
        // Monthly data calculation for bar chart
        $payments = Payment::where('status_id', 1)
            ->whereYear('pay_date', $currentYear)
            ->whereNull('deleted_at')
            ->get();
    
        $monthlyData = array_fill(1, 12, 0);
        foreach ($payments as $payment) {
            $month = (int) $payment->pay_date->format('n');
            $monthlyData[$month] += $payment->fee;
        }
    
        return view('dashboard.super-admin', compact(
            'hoaOfficerCount',
            'householdAccountsCount',
            'householdsInvoicedCount',
            'facilityReservationRequests',
            'paymentCollectorsCount',
            'monthlyFundCollection',
            'annualFundCollection',
            'vehicleStickerRequests',
            'categoryNames',
            'categoryTotals',
            'categoryColors',
            'monthlyData',
            'categoryPercentages'
        ));
    }

        public function userDashboard()
    {
        $currentUserId = Auth::id(); // Get the current user's ID
        $currentMonth = now()->month;
        $currentYear = now()->year;

        // Fetch pending payments for the current user for the current month
        $pendingPaymentsCount = Payment::where('user_id', $currentUserId)
            ->where('status_id', 2) // 2 represents "pending"
            ->whereMonth('pay_date', $currentMonth)
            ->whereYear('pay_date', $currentYear)
            ->count();

        // Fetch upcoming appointments for on-site payments
        $upcomingAppointmentsCount = VehicleStickerApplication::where('user_id', $currentUserId)
            ->where('payment_mode_id', 2) // Assuming 2 represents "on-site"
            ->whereDate('appt_date', '>=', now()) // Only future or current appointments
            ->where('status', 1) // Check for status of 1 (marked as paid)
            ->count();

        // Fetch registered vehicles for the user that are marked as paid
        $registeredVehiclesCount = VehicleStickerApplication::where('user_id', $currentUserId)
            ->where('status', 1) // Check for status of 1 (marked as paid)
            ->count();

        // Fetch reserved facilities for the user that are marked as paid and have a future appointment date
        $reservedFacilitiesCount = FacilityReservation::where('user_id', $currentUserId)
            ->where('payment_status', 1) // Check for payment_status of 1 (marked as paid)
            ->whereDate('appt_date', '>=', now()) // Only future or current reservations
            ->count();

        // Fetch payments made by the user in the current year that are marked as paid
        $payments = Payment::where('user_id', $currentUserId) // Filter by user ID
            ->where('status_id', 1) // 1 represents "paid"
            ->whereYear('pay_date', $currentYear)
            ->get();

        // Prepare data for categories
        $categoryTotals = [];
        $categoryNames = [];
        $categoryColors = []; // Assuming you have hex colors for categories
        $categoryCounts = []; // New array to store counts of payments per category

        // Get all payment categories
        $paymentCategories = PaymentCategory::all();

        foreach ($paymentCategories as $category) {
            // Get the total fees paid for this category by the current user
            $total = Payment::where('category_id', $category->id)
                ->where('user_id', $currentUserId) // Filter by user ID
                ->where('status_id', 1) // Only consider paid payments
                ->whereMonth('pay_date', $currentMonth)
                ->whereYear('pay_date', $currentYear)
                ->sum('fee');

            // Count of payments made for this category by the current user
            $count = Payment::where('category_id', $category->id)
                ->where('user_id', $currentUserId) // Filter by user ID
                ->where('status_id', 1) // Only consider paid payments
                ->whereMonth('pay_date', $currentMonth)
                ->whereYear('pay_date', $currentYear)
                ->count();

            // Calculate percentage based on expected total (assuming 1 for simplicity)
            $percentage = ($count > 0) ? 100 : 0; // If there's any payment, it should be 100%

            // Collecting category data
            $categoryNames[] = $category->name;
            $categoryTotals[] = $total; // Total fees for this category
            $categoryColors[] = $category->hex_code; // Assuming you have a hex_code field
            $categoryCounts[] = $count; // Store the count of payments made for this category
            $categoryPercentages[] = $percentage; // Collect percentage for this category
        }

        // Log results for debugging
        \Log::info('Category Totals:', $categoryTotals);
        \Log::info('Category Percentages:', $categoryPercentages);
        \Log::info('Category Counts:', $categoryCounts); // Log category counts for debugging

        // Pass the count to the view
        return view('dashboard.user', compact('pendingPaymentsCount', 
            'upcomingAppointmentsCount',
            'registeredVehiclesCount', 
            'reservedFacilitiesCount',
            'categoryNames',
            'categoryTotals',
            'categoryColors',
            'categoryPercentages',
            'categoryCounts')); // Include categoryCounts in the view data
    }

}
    
    



