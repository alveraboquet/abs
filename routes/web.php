<?php

use App\Http\Controllers\EmailOtpController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfitController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
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

Route::get('internal-register', function () {
    return Inertia::render('Auth/Register2');
})->name('internal-register');
Route::post('internal-register', [UserController::class, 'internalRegister']);

Route::get('/home', [UserController::class, 'home'])->name('home');
Route::get('/abs', function () {
    return Inertia::render('AboutUs');
})->name('abs');
Route::get('/projects', function () {
    return Inertia::render('Projects');
})->name('projects');


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
    Route::get('/staking', [UserController::class, 'getStaking'])->name('staking');
    Route::get('/staking/add', function () {
        return Inertia::render('StakingAdd');
    })->name('staking.add');
    Route::get('/staking/{id}/statement', [OrderController::class, 'getOrder'])->name('staking.statement');


    Route::prefix('profile')->group(function () {
        Route::get('/', function () {
            return Inertia::render('Profile');
        })->name('profile');

        Route::prefix('1')->name('usdt.')->group(function () {
            Route::match(['get', 'post'], '/', [UserController::class, 'getUSDTAsset'])->name('asset');

            Route::get('/topup', function () {
                return Inertia::render('Topup');
            })->name('topup');

            Route::get('/topup-history', [UserController::class, 'topupHistory'])->name('topup-history');
        });
        Route::prefix('2')->name('roi.')->group(function () {
            Route::match(['get', 'post'], '/', [UserController::class, 'getROIAsset'])->name('asset');

            Route::get('/withdrawal-history', [UserController::class, 'withdrawalHistory'])->name('withdrawal-history');
        });

        Route::get('/my-team', [UserController::class, 'getDownline'])->name('my-team');

        Route::get('/kyc', function () {
            return Inertia::render('Kyc');
        })->name('kyc');

        Route::get('/feedback-center', function () {
            return Inertia::render('FeedbackCenter');
        })->name('feedback-center');

        Route::get('/invitation', function () {
            return Inertia::render('Invitation');
        })->name('invitation');

        Route::get('/settings', function () {
            return Inertia::render('Setting');
        })->name('settings');


        Route::get('notifications', [NotificationController::class, 'index'])->name('notifications');
        Route::get('notifications/{id}', [NotificationController::class, 'getNotification'])->name('notifications.view');

        Route::get('project', function () {
            return Inertia::render('ProjectView');
        })->name('projects.view');
    });


    Route::middleware(['role:admin'])->name('admin.')->group(function () {



        Route::get('/manage-member', [UserController::class, 'manageMember'])->name('manage-member');
        Route::get('/manage-topup', [UserController::class, 'manageTopup'])->name('manage-topup');
        Route::get('/manage-withdraw', [UserController::class, 'manageWithdraw'])->name('manage-withdraw');
        Route::get('/manage-order', [UserController::class, 'manageOrder'])->name('manage-order');
        Route::post('/orders/update', [UserController::class, 'updateOrder'])->name('update-order');
        Route::post('/topup/update', [UserController::class, 'updateTopup'])->name('update-topup');
        Route::post('/withdraw/update', [UserController::class, 'updateWithdraw'])->name('update-withdraw');
        Route::get('/manage-notification', [NotificationController::class, 'manageNotification'])->name('manage-notification');
        Route::post('/notification/update', [NotificationController::class, 'updateNotification'])->name('update-notification');
        Route::post('/notification/create', [NotificationController::class, 'createNotification'])->name('create-notification');

        Route::post('/user/update', [UserController::class, 'updateUser'])->name('update-user');
        Route::post('/user/create-admin', [UserController::class, 'createAdmin'])->name('create-admin');
        Route::post('/user/update-kyc', [UserController::class, 'updateKYC'])->name('update-kyc');
    });



    Route::post('submit-feedback', [SupportController::class, 'create'])->name('submit-feedback');



    Route::post('/user/change-password', [UserController::class, 'changePassword'])->name('change-password');
    Route::post('/deposit', [PaymentController::class, 'topup'])->name('deposit');
    Route::post('submit-kyc', [UserController::class, 'submitKYC'])->name('submit-kyc');
    Route::post('/orders/create', [OrderController::class, 'create'])->name('orders.create');
});
Route::post('email/verify', [EmailOtpController::class, 'create'])->name('email.verify');
Route::get('email/confirm-verify', [EmailOtpController::class, 'verify'])->name('email.verify.confirm');
Route::get('/test',  [ProfitController::class, 'calculateProfit']);
Route::get('locale/{lang}', function ($lang) {
    App::setLocale($lang);
    Session::put('locale', $lang);
    return back();
});
Route::fallback(function () {
    return  redirect('home');
});
