<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf;

class CollectionManagementController extends Controller
{
    public function generateReport(Request $request)
    {
        $month = $request->input('month');
        $statusId = 1; // Assuming status_id = 1 means 'paid'
    
        // Filter payments by month and paid status
        $payments = Payment::where('status_id', $statusId)
            ->whereMonth('pay_date', date('m', strtotime($month)))
            ->whereYear('pay_date', date('Y', strtotime($month)))
            ->get();
    
        // Generate PDF with filtered data
        $pdf = Pdf::loadView('reports.monthly_paid_households', compact('payments', 'month'));
    
        // Return PDF download response
        return $pdf->download("Paid_Households_Report_{$month}.pdf");
    }
    
}
