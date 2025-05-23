<?php
// app/Helpers/SavingsHelper.php

use App\Models\Earning;
use App\Models\Spending;
use App\Models\DailySaving;
use Carbon\Carbon;

if (!function_exists('updateMonthlySavingForUser')) {
    function updateMonthlySavingForUser($userId)
    {
        $now = Carbon::now();
        $startOfMonth = $now->copy()->startOfMonth()->format('Y-m-d');
        $endOfToday = $now->copy()->endOfDay();

        $totalIncome = Earning::where('space_id', $userId)
            ->whereBetween('happened_on', [$startOfMonth, $endOfToday])
            ->sum('amount') / 100;

        $totalExpense = Spending::where('space_id', $userId)
            ->whereBetween('happened_on', [$startOfMonth, $endOfToday])
            ->sum('amount') / 100;

        $balance = $totalIncome - $totalExpense;

        DailySaving::updateOrCreate(
            [
                'user_id' => $userId,
                'date'    => $startOfMonth,
            ],
            [
                'amount'  => $balance,
            ]
        );
    }
}
