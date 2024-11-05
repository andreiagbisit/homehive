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
    


}
