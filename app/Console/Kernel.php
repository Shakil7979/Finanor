<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Carbon\Carbon;

// Import command
use App\Console\Commands\CalculateMonthlySavings;
use App\Jobs\FetchConversionRates;
use App\Jobs\ProcessRecurrings;
use App\Jobs\SendWeeklyReports;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        CalculateMonthlySavings::class,
    ];

    protected function schedule(Schedule $schedule): void
    {
        $schedule->job(new ProcessRecurrings())->daily();
        $schedule->job(new FetchConversionRates())->daily();
        $schedule->job(new SendWeeklyReports())->weekly()->fridays()->at('21:00'); 

        // Run this savings command daily
        $schedule->command('savings:calculate')->dailyAt('23:55');
    }

    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
