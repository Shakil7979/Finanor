<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Services\BudgetService;

class ViewServiceProvider extends ServiceProvider
{ 

    public function boot()
    {
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $spaceId = Auth::user()->id;
                $dailyLimit = BudgetService::calculateDailyLimit($spaceId);
                $view->with('dailyLimit', $dailyLimit); 
            }
        });
    }

    public function register()
    {
        //
    }
}
