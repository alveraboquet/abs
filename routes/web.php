<?php

use App\Http\Controllers\EmailOtpController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/* 
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
 */

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    /*   Route::get('/dashboard', function () {
        return redirect('home');
    })->name('dashboard'); */
    /* Route::get('/', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard'); */
    /* Route::redirect('/', '/login'); */
    Route::get('/home', [UserController::class, 'home'])->name('home');

    Route::get('/my-team', [UserController::class, 'getDownline'])->name('my-team');
    Route::get('/invitation', function () {
        return Inertia::render('Invitation');
    })->name('invitation');
    Route::get('/projects', function () {
        return Inertia::render('Projects');
    })->name('projects');

    Route::get('/topup', function () {
        return Inertia::render('Topup');
    })->name('topup');
    Route::get('/settings', function () {
        return Inertia::render('Setting');
    })->name('setting');
    Route::get('/feedback-center', function () {
        return Inertia::render('FeedbackCenter');
    })->name('feedback-center');
    Route::get('/stacking', function () {
        return Inertia::render('Stacking');
    })->name('stacking');
    Route::get('/add', function () {
        return Inertia::render('Add');
    })->name('add');
    Route::get('/profile', function () {
        return Inertia::render('Profile');
    })->name('profile');
    Route::get('/kyc', function () {
        return Inertia::render('Kyc');
    })->name('kyc');
    Route::get('/abs', function () {
        return Inertia::render('AboutUs');
    })->name('abs');
    Route::get('/profile/1', function () {
        return Inertia::render('USDTAsset');
    })->name('usdt-asset');
    Route::get('/profile/2', function () {
        return Inertia::render('ROIAsset');
    })->name('roi-asset');
    Route::get('/profile/2/withdrawal-history', function () {
        return Inertia::render('WithdrawalHistory');
    })->name('withdrawal-history');

    Route::get('notifications', function () {
        return Inertia::render('Notifications');
    })->name('notifications');

    Route::get('/profile/1/topup-history', function () {
        return Inertia::render('TopupHistory');
    })->name('topup-history');

    Route::get('/manage-member', [UserController::class, 'manageMember'])->name('manage-member');
    Route::get('/manage-topup', [UserController::class, 'manageTopup'])->name('manage-topup');




    Route::post('/user/delete', [UserController::class, 'delete'])->name('user.delete');
    Route::post('/deposit', [PaymentController::class, 'deposit'])->name('deposit');
    Route::post('submit-kyc', [UserController::class, 'submitKyc'])->name('submit-kyc');
    Route::post('/orders/create', [OrderController::class, 'create'])->name('orders.create');
});
Route::post('email/verify', [EmailOtpController::class, 'create'])->name('email.verify');
Route::get('email/confirm-verify', [EmailOtpController::class, 'verify'])->name('email.verify.confirm');
Route::get('/test',  [UserController::class, 'calculateProfit']);
Route::get('locale/{lang}', function ($lang) {
    session()->put('locale', $lang);
    return redirect()->back();
});
Route::fallback(function () {
    return  redirect('home');
});
