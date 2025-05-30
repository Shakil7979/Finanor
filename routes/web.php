<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EarningController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RecurringController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ResendVerificationMailController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\SpaceInviteController;
use App\Http\Controllers\SpendingController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TranslationsController;
use App\Http\Controllers\VerifyController;
use App\Http\Middleware\CheckIfSpaPrototypeIsEnabled;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);

    Route::get('/verify/{token}', VerifyController::class)->name('verify');

    Route::get('/reset_password', [ResetPasswordController::class, 'get'])->name('reset_password');
    Route::post('/reset_password', [ResetPasswordController::class, 'post']);

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/mail-verify', [RegisterController::class, 'mail_verify'])->name('mail_verify');
    Route::post('/verification-verify', [RegisterController::class, 'verification_verify'])->name('verification.verify');
});

Route::get('/dashboard', [DashboardController::class, '__invoke']);
Route::get('/get-chart-data', [DashboardController::class, 'getChartData'])->name('get.chart.data');
Route::get('/budget-alerts', [DashboardController::class, 'checkBudgetAlerts'])->name('budget.alerts');




Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard'); 



    Route::post('/resend-verification-mail', ResendVerificationMailController::class)->name('resend_verification_mail');

    Route::name('attachments.')->group(function() {
        Route::post('/attachments', [AttachmentController::class, 'store'])->name('store');
        Route::get('/attachments/{attachment}/download', [AttachmentController::class, 'download'])->name('download');
        Route::post('/attachments/{id}/delete', [AttachmentController::class, 'delete'])->name('destroy');
    });

    Route::resource('/transactions', TransactionController::class)->only(['index', 'create']);


    Route::name('earnings.')->group(function () {
        Route::get('/earnings/{earning}', [EarningController::class, 'show'])->name('show');
        Route::get('/earnings/create', [EarningController::class, 'create'])->name('create');
        Route::post('/earnings', [EarningController::class, 'store'])->name('store');
        Route::get('/earnings/{earning}/edit', [EarningController::class, 'edit'])->name('edit');
        Route::patch('/earnings/{earning}', [EarningController::class, 'update'])->name('update');
        Route::delete('/earnings/{earning}', [EarningController::class, 'destroy'])->name('destroy');
        Route::post('/earnings/{id}/restore', [EarningController::class, 'restore']);
    });

    Route::name('spendings.')->group(function () {
        Route::get('/spendings/{spending}', [SpendingController::class, 'show'])->name('show');
        Route::get('/spendings/create', [SpendingController::class, 'create'])->name('create');
        Route::post('/spendings', [SpendingController::class, 'store'])->name('store');
        Route::get('/spendings/{spending}/edit', [SpendingController::class, 'edit'])->name('edit');
        Route::patch('/spendings/{spending}', [SpendingController::class, 'update'])->name('update');
        Route::delete('/spendings/{spending}', [SpendingController::class, 'destroy'])->name('destroy');
        Route::post('/spendings/{id}/restore', [SpendingController::class, 'restore']); 
        Route::get('/emotion-summary', [SpendingController::class, 'emotionSummary']);
    });

    Route::resource('/recurrings', RecurringController::class)->only(['index', 'create', 'store', 'show']);

    Route::resource('/budgets', BudgetController::class)->only(['index', 'create', 'store']);
    Route::put('/update/budget-value', [BudgetController::class, 'updateBudgetValue']);

    Route::resource('/tags', TagController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

    Route::name('reports.')->group(function () {
        Route::get('/reports', [ReportController::class, 'index'])->name('index');
        Route::get('/reports/{slug}', [ReportController::class, 'show'])->name('show');
    });

    Route::name('imports.')->group(function () {
        Route::get('/imports', [ImportController::class, 'index'])->name('index');
        Route::get('/imports/create', [ImportController::class, 'create'])->name('create');
        Route::post('/imports', [ImportController::class, 'store'])->name('store');
        Route::get('/imports/{import}/prepare', [ImportController::class, 'getPrepare'])->name('prepare');
        Route::post('/imports/{import}/prepare', [ImportController::class, 'postPrepare']);
        Route::get('/imports/{import}/complete', [ImportController::class, 'getComplete'])->name('complete');
        Route::post('/imports/{import}/complete', [ImportController::class, 'postComplete']);
        Route::delete('/imports/{import}', [ImportController::class, 'destroy'])->name('destroy');
    });

    Route::resource('/activities', ActivityController::class)->only(['index']);

    Route::name('settings.')->group(function () {
        Route::get('/settings', [SettingsController::class, 'getIndex'])->name('index');
        Route::post('/settings', [SettingsController::class, 'postIndex'])->name('store');
        Route::get('/settings/profile', [SettingsController::class, 'getProfile'])->name('profile');
        Route::get('/settings/account', [SettingsController::class, 'getAccount'])->name('account');
        Route::get('/settings/preferences', [SettingsController::class, 'getPreferences'])->name('preferences');
        Route::get('/settings/dashboard', [SettingsController::class, 'getDashboard'])->name('dashboard');
        Route::get('/settings/spaces', [SettingsController::class, 'getSpaces'])->name('spaces.index');
    });

    Route::name('spaces.')->group(function () {
        Route::get('/spaces/create', [SpaceController::class, 'create'])->name('create');
        Route::post('/spaces', [SpaceController::class, 'store'])->name('store');
        Route::get('/spaces/{space}', [SpaceController::class, 'show'])->name('show');
        Route::get('/spaces/{space}/edit', [SpaceController::class, 'edit'])->name('edit');
        Route::post('/spaces/{space}/update', [SpaceController::class, 'update'])->name('update');
        Route::post('/spaces/{space}/invite', [SpaceController::class, 'invite'])->name('invite');
    });

    Route::name('space_invites.')->group(function () {
        Route::get('/spaces/{space}/invites/{invite}', [SpaceInviteController::class, 'show'])->name('show');
        Route::post('/spaces/{space}/invites/{invite}/accept', [SpaceInviteController::class, 'accept'])->name('accept');
        Route::post('/spaces/{space}/invites/{invite}/deny', [SpaceInviteController::class, 'deny'])->name('deny');
    });

    Route::get('/translations', TranslationsController::class);
});

Route::get('/logout', [LogoutController::class, 'index'])->name('logout');

Route::prefix('prototype')
    ->middleware(CheckIfSpaPrototypeIsEnabled::class)
    ->group(function () {
        Route::get('/', fn () => 'Hello world');
        Route::get('/{any}', \App\Http\Controllers\PrototypeController::class)->where('any', '.*');
    });
