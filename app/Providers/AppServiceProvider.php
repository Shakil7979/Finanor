<?php

namespace App\Providers;

use App\Models\DailySaving;
use App\Models\Earning;
use App\Models\Space;
use App\Models\Spending;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;
use Auth;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        JsonResource::withoutWrapping();

        view()->composer('*', function ($view) {
            $selectedSpace = session('space_id') ? \App\Models\Space::find(session('space_id')) : null;

            $versionFileExists = file_exists(base_path() . '/version.txt');
            $versionNumber = $versionFileExists ? file_get_contents(base_path() . '/version.txt') : '-';

            $view->with([
                'userName' => auth()->check() ? auth()->user()->name : null,
                'currency' => $selectedSpace ? $selectedSpace->currency->symbol : '-',
                'selectedSpace' => $selectedSpace,
                'versionNumber' => $versionNumber
            ]);

            // ✅ Safe to call auth()->user() here
            if (auth()->check()) {
                $userId = auth()->id();
                $now = \Carbon\Carbon::now();
                $startOfMonth = $now->copy()->startOfMonth()->format('Y-m-d');
                $endOfToday = $now->copy()->endOfDay();

                $totalIncome = \App\Models\Earning::where('space_id', $userId)
                    ->whereBetween('happened_on', [$startOfMonth, $endOfToday])
                    ->sum('amount') / 100;

                $totalExpense = \App\Models\Spending::where('space_id', $userId)
                    ->whereBetween('happened_on', [$startOfMonth, $endOfToday])
                    ->sum('amount') / 100;

                $balance = $totalIncome - $totalExpense;

                \App\Models\DailySaving::updateOrCreate(
                    [
                        'user_id' => $userId,
                        'date'    => $startOfMonth,
                    ],
                    [
                        'amount'  => $balance,
                    ]
                );
            }
        });

    }

    public function register()
    {
        //
    }
}
