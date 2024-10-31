<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SubdivisionFacility;

class FixDoubleEncodedFacilities extends Command
{
    protected $signature = 'fix:double-encoded-facilities';

    // Command description
    protected $description = 'Fix double-encoded JSON in available_days and available_months for SubdivisionFacility records';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Fetch all SubdivisionFacility records
        $facilities = SubdivisionFacility::all();

        foreach ($facilities as $facility) {
            // Decode and re-encode to ensure JSON format is correct
            $facility->available_days = json_decode($facility->available_days, true); // Decode to array
            $facility->available_months = json_decode($facility->available_months, true); // Decode to array
            $facility->save(); // Save changes to the database
        }

        // Output success message
        $this->info('Double-encoded JSON data fixed successfully.');
    }
}
