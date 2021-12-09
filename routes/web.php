<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;

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


//Auth::routes();

Route::get('/', [PagesController::class, 'index']);
Route::get('login', [PagesController::class, 'showLoginPage'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout',[App\Http\Controllers\Auth\LoginController::class,'logout']);
Route::get('register', [PagesController::class, 'showSignupPage']);
Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'register']);
Route::get('summary', [PagesController::class, 'showSummaryPage']);
Route::get('payment', [PagesController::class, 'showPaymentPage']);
Route::get('ticket', [PagesController::class, 'showTicketPage'])->middleware('ticket');
Route::get('flight', [PagesController::class, 'showFlightSelectionPage']);


//dynamic menu across both user and admin dashboard area
// Users
Route::prefix('user')->group(function () {
    Route::get('/', [UsersController::class, 'index']);
    Route::get('/profile', [UsersController::class, 'profile']);
    Route::get('/history', [UsersController::class, 'history']);
    Route::get('/bookTicket', [UsersController::class, 'bookTicket']);
    Route::get('/active', [UsersController::class, 'active']);
});

// Admin
Route::prefix('admin')->group(function () {

    Route::get('/', [AdminController::class, 'index']);

});

Route::prefix('payment')->group(function () {
    Route::get('/', [\App\Http\Controllers\PaymentsController::class, 'handler'])->name('pay');
    Route::get('/callback', [\App\Http\Controllers\PaymentsController::class, 'callback'])->name('payment.callback');
});

