<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Earning;
use App\Models\Spending;
use App\Models\DailySaving;
use App\Models\User;
use Carbon\Carbon;

class CalculateMonthlySavings extends Command
{
    protected $signature = 'savings:calculate';
    protected $description = 'Daily update of current month\'s savings or overspending for each user';

    public function handle()
    {
        $now = Carbon::now();
        $startOfMonth = $now->copy()->startOfMonth();
        $today = $now->copy()->endOfDay();

        $users = User::all();

        foreach ($users as $user) {
            $totalIncome = Earning::where('space_id', $user->id)
                ->whereBetween('happened_on', [$startOfMonth, $today])
                ->sum('amount') / 100;

            $totalExpense = Spending::where('space_id', $user->id)
                ->whereBetween('happened_on', [$startOfMonth, $today])
                ->sum('amount') / 100;

            $balance = $totalIncome - $totalExpense;

            DailySaving::updateOrCreate(
                [
                    'space_id' => $user->id,
                    'recorded_for' => $startOfMonth->format('Y-m-d'), 
                ],
                [
                    'amount' => $balance,
                    'status' => $balance >= 0 ? 'saving' : 'overspent',
                ]
            );
        }

        $this->info('Monthly savings updated successfully for all users.');
    }
}
