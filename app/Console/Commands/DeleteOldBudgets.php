<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Budget;
use Carbon\Carbon;

class DeleteOldBudgets extends Command
{
    // Command signature (used in scheduler and CLI)
    protected $signature = 'budgets:cleanup';

    // Command description
    protected $description = 'Delete all budgets from previous months';

    public function handle()
    {
        $today = Carbon::today();
        $currentMonth = $today->month;
        $currentYear = $today->year;

        // Delete budgets NOT in current month and year
        $deleted = Budget::whereMonth('starts_on', '!=', $currentMonth)
            ->orWhereYear('starts_on', '!=', $currentYear)
            ->delete();

        $this->info("Deleted $deleted old budget(s).");
    }
}
